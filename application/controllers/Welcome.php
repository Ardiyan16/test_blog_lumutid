<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_blog', 'blog');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function login()
	{
		$var['title'] = 'Login';
		$this->load->view('login', $var);
	}

	public function action_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'username tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'password tidak boleh kosong']);
		if ($this->form_validation->run() == false) {
			$this->login();
		} else {
			$this->proses_login();
		}
	}

	private function proses_login()
	{
		$username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

		$user = $this->db->get_where('account', ['username' => $username])->row_array();
		$cekpass = $this->db->get_where('account', array('password' => $password));

		if ($username == $user['username']) {
			if ($password == $user['password']) {
				$data = [
					'username' => $user['username'],
					'name' => $user['name'],
					'role' => $user['role'],
				];
				$this->session->set_userdata($data);
				redirect('Welcome/akun');
			} else {
				$this->session->unset_userdata('username');
				$this->session->unset_userdata('role');
				$this->session->unset_userdata('name');
				$this->session->set_flashdata('password_salah', true);
				redirect('Welcome/login');
			}
		} else {
			$this->session->set_flashdata('username_salah', true);
			redirect('Welcome/login');
		}
	}

	public function logout()
    {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('name');
        $this->session->set_flashdata('logout', true);
        redirect('Welcome/login');
    }

	public function akun()
	{
		$var['title'] = 'Akun';
		$var['akun'] = $this->blog->get_account();
		$this->load->view('akun', $var);
	}

	public function create_akun()
	{
		$var['title'] = 'Tambah Akun';
		$this->load->view('create_akun', $var);
	}

	public function save_akun()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[account.username]', ['is_unique' => 'username anda telah terdaftar', 'required' => 'username tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'password tidak boleh kosong']);
		$this->form_validation->set_rules('name', 'Username', 'required|trim', ['required' => 'name tidak boleh kosong']);
		if ($this->form_validation->run() == false) {
			$this->create_akun();
		} else {
			$this->proses_save_akun();
		}
	}

	private function proses_save_akun()
	{
		$this->blog->save_akun();
		$this->session->set_flashdata('success_create', true);
        redirect('Welcome/akun');
	}

	public function edit_akun($uniq)
	{
		$var['title'] = 'Edit Akun';
		$var['edit'] = $this->db->get_where('account', ['username' => $uniq])->row();
		// var_dump($var['edit']);
		$this->load->view('edit_akun', $var);
	}

	public function update_akun()
	{
		$uniq = $this->input->post('username');
		$this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'username tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'password tidak boleh kosong']);
		$this->form_validation->set_rules('name', 'Username', 'required|trim', ['required' => 'name tidak boleh kosong']);
		if ($this->form_validation->run() == false) {
			$this->edit_akun($uniq);
		} else {
			$this->proses_update_akun();
		}
	}

	private function proses_update_akun()
	{
		$this->blog->update_akun();
		$this->session->set_flashdata('success_update', true);
        redirect('Welcome/akun');
	}

	public function delete_akun($uniq)
	{
		$this->db->delete('account', ['username' => $uniq]);
		$this->session->set_flashdata('success_delete', true);
        redirect('Welcome/akun');
	}

	public function detail_akun($uniq)
	{
		$var['title'] = 'Edit Akun';
		$var['view'] = $this->db->get_where('account', ['username' => $uniq])->row();
		// var_dump($var['edit']);
		$this->load->view('detail_akun', $var);
	}

}
