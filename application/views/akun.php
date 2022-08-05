<?php $this->load->view('header.php') ?>
<div class="container" style="margin-top: 50px;">
    <h5>Accounts</h5>
    <hr>
    <a href="<?= base_url('Welcome/create_akun') ?>" class="btn btn-success">Create accounts</a>
    <table id="tabelpendaftaran" class="table table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($akun as $show) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $show->username ?></td>
                    <td><?= $show->name ?></td>
                    <td><?= $show->role ?></td>
                    <td>
                        <a href="<?= base_url('Welcome/detail_akun/' . $show->username) ?>" title="detail" class="badge bg-success" style="color: white;"><i class="fa fa-eye"></i></a>
                        <a href="<?= base_url('Welcome/edit_akun/' . $show->username) ?>" title="edit" class="badge bg-primary" style="color: white;"><i class="fa fa-edit"></i></a>
                        <a href="<?= base_url('Welcome/delete_akun/' . $show->username) ?>" onclick="return confirm('apakah anda yakin menghapus data ?')" title="Hapus" class="badge bg-danger" style="color: white;"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    <?php if ($this->session->flashdata('success_create')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Akun berhasil disimpan!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_update')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Akun berhasil diupdate!',
            showConfirmButton: true,
            // timer: 1500
        })

    <?php elseif ($this->session->flashdata('success_delete')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Akun berhasil dihapus',
            showConfirmButton: true,
            // timer: 1500
        })
    <?php endif ?>
</script>