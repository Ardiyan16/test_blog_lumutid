<?php $this->load->view('header.php') ?>
<div class="container" style="margin-top: 50px;">
    <h5>Login</h5>
    <p>Login to access</p>
    <hr>
    <form action="<?= base_url('Welcome/action_login') ?>" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
            <?php echo form_error('username', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            <?php echo form_error('password', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<script>
    <?php if ($this->session->flashdata('username_salah')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Username anda salah!',
            text: 'silahkan coba lagi',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('password_salah')) : ?>
        Swal.fire({
            icon: 'warning',
            title: 'Password anda masukkan salah!',
            text: 'silahkan coba lagi',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('logout')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Anda berhasil logout',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>

<!-- <?php $this->load->view('footer.php') ?> -->