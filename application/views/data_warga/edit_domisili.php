<?php

$id_user = $user['id_user'];
// $query_rt = "SELECT *
// FROM  `tb_Kk` JOIN `tb_ketuart`
// WHERE`tb_ketuart`.`user_id` = $id_user
// ";
$query_rt = "SELECT `tb_ktp`.`nik`, `tb_ketuart`.`nik`, `user_id`, `tb_rt_rw`.`kodeRt`,`rt`, `rw`
                              FROM  `tb_ktp` JOIN `tb_ketuart` ON  `tb_ketuart`.`nik` = `tb_ktp`.`nik`
                                             JOIN `tb_rt_rw`   ON  `tb_rt_rw`.`kodeRt` = `tb_ktp`.`kodeRt`
                              WHERE`tb_ketuart`.`user_id` = $id_user
                            ";

$rt_user = $this->db->query($query_rt)->row_array();
$rt_user_coba = $rt_user['kodeRt'];

$query_kodeRt = "SELECT * FROM `tb_ktp` WHERE `kodeRT` = $rt_user_coba ";
$rt = $this->db->query($query_kodeRt)->result();



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Warga</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Advanced Form</li>
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
                    <h3 class="card-title">Tambah Kartu Keluarga</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('domisili/update_domisili'); ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ID Domisili</label>
                                    <input type="text" class="form-control" name="id_domisili" value="<?php echo $domisili['id_domisili'] ?>" style="width: 100%;" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Kartu Penduduk</label>
                                    <select name="nik" class="form-control select2" style="width: 100%;">
                                        <option value=""><?php echo $domisili['nik']; ?></option>
                                        <?php
                                        foreach ($rt as $r) { ?>
                                            <option value="<?= $r->nik ?>"><?= $r->nik . " - " . $r->nama  ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat AsaL</label>
                                    <input type="text" class="form-control" name="alamat_asal" value="<?php echo $domisili['alamat_asal'] ?>" style="width: 100%;">

                                </div>
                                <div class="form-group">
                                    <label>Pindah Ke</label>
                                    <input type="text" name="pindah_ke" class="form-control" value="<?php echo $domisili['pindah_ke'] ?>" style="width: 100%;">

                                </div>
                                <div class="form-group">
                                    <label>Alasan Pindah</label>
                                    <input type="text" name="alasan_pindah" class="form-control" value="<?php echo $domisili['alasan_pindah'] ?>" style="width: 100%;">

                                </div>
                                <!-- /.form-group -->
                            </div>

                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Tanggal Surat Dibuat</label>
                                    <input type="text" name="tgl_dibuat" class="form-control" value="<?php echo $domisili['tgl_surat_dibuat'] ?>" style="width: 100%;">

                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat Masuk</label>
                                    <input type="text" name="tgl_masuk" class="form-control" value="<?php echo $domisili['tgl_surat_masuk'] ?>" style="width: 100%;">

                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" value="<?php echo $domisili['keterangan'] ?>" style="width: 100%;">

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Edit</button>
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