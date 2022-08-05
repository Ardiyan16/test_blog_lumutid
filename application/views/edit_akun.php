<?php $this->load->view('header.php') ?>
<div class="container" style="margin-top: 50px;">
    <h5>Edit Accounts</h5>
    <hr>
    <form action="<?= base_url('Welcome/update_akun') ?>" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" value="<?= $edit->username ?>" readonly class="form-control" name="username" aria-describedby="emailHelp" placeholder="Enter username">
            <?php echo form_error('username', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" value="<?= $edit->password ?>" class="form-control" name="password" placeholder="Password">
            <?php echo form_error('password', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputname1" placeholder="Name" value="<?= $edit->name ?>">
            <?php echo form_error('name', '<small style="color: red;" class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Role</label>
            <select name="role" class="form-control">
                <option  <?php if ($edit->role == 'admin') {
                            echo "selected=\"selected\"";
                        } ?>  value="admin">Admin</option>
                <option <?php if ($edit->role == 'author') {
                            echo "selected=\"selected\"";
                        } ?> value="author">Author</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>