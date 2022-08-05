<?php $this->load->view('header.php') ?>
<div class="container" style="margin-top: 50px;">
    <h5>Detail Accounts</h5>
    <hr>
    <table id="tabelpendaftaran" class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Username</th>
                <th><?= $view->username ?></th>
            </tr>
            <tr>
                <th>Name</th>
                <th><?= $view->name ?></th>
            </tr>
            <tr>
                <th>Role</th>
                <th><?= $view->role ?></th>
            </tr>
        </thead>
</div>