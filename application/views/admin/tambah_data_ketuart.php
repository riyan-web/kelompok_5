<?php

$query_user = "SELECT `user`.`id_user`, `user`.`nama`, `user`.`role_id`
               FROM `user` WHERE `user`.`role_id` = 2 ";
$user = $this->db->query($query_user)->result();


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Ketua RT</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="http://localhost/kelompok_5/admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="http://localhost/kelompok_5/admin/data_rt">Data Ketua RT</a></li>
                        <li class="breadcrumb-item active">Tambah Ketua RT</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Ketua RT</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('admin/tambah_data_ketuart'); ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pilih User</label>
                                    <select name="id_user" class="form-control select2" style="width: 100%;">
                                        <option value="">- piilih -</option>
                                        <?php
                                        foreach ($user as $u) { ?>
                                            <option value="<?= $u->id_user ?>"><?= $u->nama ?></option>

                                        <?php } ?>
                                    </select>
                                    <br>
                                    <a href="<?= base_url('login/registrasi') ?>" class="btn btn-success">Tambah User</a>
                                </div>
                                <div class="form-group">
                                    <label>Pilih KTP</label>
                                    <select name="nik" class="form-control select2" style="width: 100%;">
                                        <option value="">- piilih -</option>
                                        <?php
                                        foreach ($tb_ktp as $ktp) { ?>
                                            <option value="<?= $ktp->nik ?>"><?= $ktp->nama . " - " . $ktp->nik ?></option>

                                        <?php } ?>
                                    </select>
                                    <br>
                                    <a href="<?= base_url('data_warga/tambah_ktp') ?>" class="btn btn-success">Tambah KTP</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card -->
                </form>
                <!-- form -->
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</body>

</html>