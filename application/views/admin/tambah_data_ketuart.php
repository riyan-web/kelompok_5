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
                                    <select name="user" class="form-control select2" style="width: 100%;">
                                        <option value="">- piilih -</option>
                                        <?php
                                        foreach ($user as $r) { ?>
                                            <option value="<?= $r->id_user ?>"><?= $r->nama ?></option>

                                        <?php } ?>
                                    </select>
                                    <br>
                                    <a href="<?= base_url('login/registrasi') ?>" class="btn btn-success">Tambah User</a>
                                </div>
                                <div class="form-group">
                                    <label>Pilih RT</label>
                                    <select name="nik" class="form-control select2" style="width: 100%;">
                                        <option value="">- piilih -</option>
                                        <?php
                                        foreach ($tb_rt_rw as $rt) { ?>
                                            <option value="<?= $r->id_user ?>"><?= $r->nama ?></option>

                                        <?php } ?>
                                    </select>
                                    <br>
                                    <a href="<?= base_url('admin/tambah_rt') ?>" class="btn btn-success">Tambah RT</a>
                                </div>
                                <div class="form-group">
                                    <label>Pindah Ke</label>
                                    <input type="text" name="pindah_ke" class="form-control" style="width: 100%;">
                                    <?= form_error('pindah_ke', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Alasan Pindah</label>
                                    <input type="text" name="alasan_pindah" class="form-control" style="width: 100%;">
                                    <?= form_error('alasan_pindah', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Tanggal Surat Dibuat</label>
                                    <input type="date" name="tgl_dibuat" class="form-control" style="width: 100%;">
                                    <?= form_error('tgl_dibuat', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat Masuk</label>
                                    <input type="date" name="tgl_masuk" class="form-control" style="width: 100%;">
                                    <?= form_error('tgl_masuk', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" style="width: 100%;">
                                    <?= form_error('keterangan', ' <small class="text-danger pl-2">', '</small>'); ?>
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