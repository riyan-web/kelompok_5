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
                    <h1>Data Warga NON Domisili</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="http://localhost/kelompok_5/domisili/data_domisili">Data NON Domisili</a></li>
                        <li class="breadcrumb-item active">Edit Data NON Domisili</li>
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
                    <h3 class="card-title">Edit Data Non Domisili</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <?= $this->session->flashdata('message'); ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" name="id_domisili" value="<?php echo $domisili->id_domisili ?>" style="width: 100%;" readonly>
                                <div class="form-group">
                                    <label>Nomor Kartu Penduduk</label>
                                    <input type="text" class="form-control" name="nik" value="<?php echo $domisili->nik ?>" style="width: 100%;" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Alamat AsaL</label>
                                    <input type="text" class="form-control" name="alamat_asal" value="<?php echo $this->input->post('alamat_asal') ?? $domisili->alamat_asal ?>" style="width: 100%;">
                                    <?= form_error('alamat_asal', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Pindah Ke</label>
                                    <input type="text" name="pindah_ke" class="form-control" value="<?php echo $this->input->post('pindah_ke') ?? $domisili->pindah_ke ?>" style="width: 100%;">
                                    <?= form_error('pindah_ke', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Alasan Pindah</label>
                                    <input type="text" name="alasan_pindah" class="form-control" value="<?php echo $this->input->post('alasan_pindah') ?? $domisili->alasan_pindah ?>" style="width: 100%;">
                                    <?= form_error('alasan_pindah', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Tanggal Surat Dibuat</label>
                                    <input type="text" name="tgl_dibuat" class="form-control" value="<?php echo $this->input->post('tgl_dibuat') ?? $domisili->tgl_surat_dibuat ?>" style="width: 100%;">
                                    <?= form_error('tgl_dibuat', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Surat Masuk</label>
                                    <input type="text" name="tgl_masuk" class="form-control" value="<?php echo $this->input->post('tgl_masuk') ?? $domisili->tgl_surat_masuk ?>" style="width: 100%;">
                                    <?= form_error('tgl_masuk', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" value="<?php echo $this->input->post('keterangan') ?? $domisili->keterangan ?>" style="width: 100%;">
                                    <?= form_error('keterangan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Ganti Foto</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/domisili/') . $domisili->surat_domisili ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="file" name="image" id="image">
                                                <small>Biarkan Kosong Jika Gambar Tidak Mau Diganti</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</button>
                                    <button type="reset" class="btn btn-dark"><i class="fas fa-redo-alt"></i> Reset</button>
                                </div>
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