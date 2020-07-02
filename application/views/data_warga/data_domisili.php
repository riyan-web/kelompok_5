<?php

$id_user = $user['id_user'];

$query_rt = "SELECT `tb_ktp`.`nik`, `tb_ketuart`.`nik`, `user_id`, `tb_rt_rw`.`kodeRt`,`rt`, `rw`
                              FROM  `tb_ktp` JOIN `tb_ketuart` ON  `tb_ketuart`.`nik` = `tb_ktp`.`nik`
                                             JOIN `tb_rt_rw`   ON  `tb_rt_rw`.`kodeRt` = `tb_ktp`.`kodeRt`
                              WHERE`tb_ketuart`.`user_id` = $id_user
                            ";

$rt_user = $this->db->query($query_rt)->row_array();
$rt_user_coba = $rt_user['kodeRt'];

$query_kk = "SELECT * FROM `domisili`
                      JOIN `tb_ktp` ON `domisili`.`nik` = `tb_ktp`.`nik`
                      WHERE `tb_ktp`.`kodeRT` = $rt_user_coba ";
$domisili = $this->db->query($query_kk)->result();


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Warga Non Domisili</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Domisili</a></li>
                        <li class="breadcrumb-item active">Data Non Domisili</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Warga Berdomisili Luar</h3>
                    </div>
                    <!-- /.card-header -->
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <a href="<?= base_url('domisili/tambah_data_domisili') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                        <br><br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr bgcolor="aqua" align="center">
                                    <th style="width: 30px;">No.</th>
                                    <th>NIK</th>
                                    <th>Alamat Asal</th>
                                    <th>Pindah Ke</th>
                                    <th>Alasan Pindah</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Tanggal Masuk</th>
                                    <th style="width:150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($domisili as $dom) { ?>
                                    <tr>
                                        <th><?= $no ?> </th>
                                        <th><?php echo $dom->nik ?></th>
                                        <th><?php echo $dom->alamat_asal ?></th>
                                        <th><?php echo $dom->pindah_ke ?></th>
                                        <th><?php echo $dom->alasan_pindah ?></th>
                                        <th><?php echo $dom->tgl_surat_dibuat ?></th>
                                        <th><?php echo $dom->tgl_surat_masuk ?></th>
                                        <th>
                                            <a href="<?= base_url('domisili/edit_domisili/' . $dom->id_domisili) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('domisili/hapus_domisili/' . $dom->id_domisili) ?>" class="btn btn-danger hapus"><i class="fas fa-trash-alt"></i></a>
                                            <a href="<?= base_url('domisili/detail_domisili/' . $dom->id_domisili) ?>" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                        </th>
                                    </tr>
                                    <?php $no++ ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</body>

</html>