<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_blog extends CI_Model
{
    private $akun = 'account';

    public function get_account()
    {
        return $this->db->get($this->akun)->result();
    }

    public function save_akun()
    {
        $post = $this->input->post();
        $this->username = $post['username'];
        $this->password = $post['password'];
        $this->name = $post['name'];
        $this->role = $post['role'];
        $this->db->insert($this->akun, $this);
    }

    public function update_akun()
    {
        $post = $this->input->post();
        $this->username = $post['username'];
        $this->password = $post['password'];
        $this->name = $post['name'];
        $this->role = $post['role'];
        $this->db->update($this->akun, $this, ['username' => $post['username']]);
    }
}