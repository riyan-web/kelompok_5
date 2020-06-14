<?php

$id_user = $user['id_user'];

$query_rt = "SELECT `tb_ktp`.`nik`, `tb_ketuart`.`nik`, `user_id`, `tb_rt_rw`.`kodeRt`,`rt`, `rw`
                              FROM  `tb_ktp` JOIN `tb_ketuart` ON  `tb_ketuart`.`nik` = `tb_ktp`.`nik`
                                             JOIN `tb_rt_rw`   ON  `tb_rt_rw`.`kodeRt` = `tb_ktp`.`kodeRt`
                              WHERE`tb_ketuart`.`user_id` = $id_user
                            ";

$rt_user = $this->db->query($query_rt)->row_array();
$rt_user_coba = $rt_user['kodeRt'];

$query_kodeRt = "SELECT * FROM `tb_kk` WHERE `kodeRT` = $rt_user_coba ";
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
                    <h3 class="card-title">Edit Kartu Keluarga</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <?= $this->session->flashdata('message'); ?>
                <?php foreach ($tb_kk as $kk) { ?>
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Kartu Keluarga</label>
                                        <input type="text" class="form-control" id="no_kk" name="no_kk" value="<?php echo $kk->noKk ?>" style="width: 100%;" readonly>
                                        <?= form_error('no_kk', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Kepala Keluarga</label>
                                        <input type="text" name="nama_kk" class="form-control" value="<?php echo $kk->namaKk ?>" style="width: 100%;">
                                        <?= form_error('nama_kk', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="<?php echo $kk->alamat ?>" style="width: 100%;">
                                        <?= form_error('alamat', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Dikeluarkan</label>
                                        <input type="text" name="tgl_dikeluarkan" class="form-control" value="<?php echo $kk->dikeluarkanTanggal ?>" style="width: 100%;">
                                        <?= form_error('tgl_dikeluarkan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="text" value="<?= $rt_user['rt']; ?>" class="form-control" style="width: 100%;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="kode_rt" value="<?= $rt_user['kodeRt']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="text" enabled="enabled" value="<?= $rt_user['rw']; ?>" class="form-control" style="width: 100%;" readonly>
                                    </div>

                                    <!-- /.form-group -->
                                </div>

                                <!-- /.col -->
                                <div class="col-md-6">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input type="text" name="kelurahan" class="form-control" value="<?php echo $kk->kelurahan ?>" style="width: 100%;">
                                        <?= form_error('kelurahan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" name="kecamatan" class="form-control" value="<?php echo $kk->kecamatan ?>" style="width: 100%;">
                                        <?= form_error('kecamatan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <input type="text" name="kabupaten" class="form-control" value="<?php echo $kk->kabupaten ?>" style="width: 100%;">
                                        <?= form_error('kabupaten', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input type="text" name="provinsi" class="form-control" value="<?php echo $kk->provinsi ?>" style="width: 100%;">
                                        <?= form_error('provinsi', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode POS</label>
                                        <input type="text" name="kode_pos" class="form-control" value="<?php echo $kk->kodepos ?>" style="width: 100%;">
                                        <?= form_error('kode_pos', ' <small class="text-danger pl-2">', '</small>'); ?>
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
                <?php } ?>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</body>

</html>