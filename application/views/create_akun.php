<?php $this->load->view('header.php') ?>
<div class="container" style="margin-top: 50px;">
    <h5>Create Accounts</h5>
    <hr>
    <form action="<?= base_url('Welcome/save_akun') ?>" method="POST">
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
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputname1" placeholder="Name">
            <?php echo form_error('name', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Role</label>
            <select name="role" class="form-control">
                <option value="admin">Admin</option>
                <option value="author">Author</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>