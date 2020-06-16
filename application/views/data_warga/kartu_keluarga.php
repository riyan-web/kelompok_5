<?php

$id_user = $user['id_user'];

$query_rt = "SELECT `tb_ktp`.`nik`, `tb_ketuart`.`nik`, `user_id`, `tb_rt_rw`.`kodeRt`,`rt`, `rw`
                              FROM  `tb_ktp` JOIN `tb_ketuart` ON  `tb_ketuart`.`nik` = `tb_ktp`.`nik`
                                             JOIN `tb_rt_rw`   ON  `tb_rt_rw`.`kodeRt` = `tb_ktp`.`kodeRt`
                              WHERE`tb_ketuart`.`user_id` = $id_user
                            ";

$rt_user = $this->db->query($query_rt)->row_array();
$rt_user_coba = $rt_user['kodeRt'];

$query_kk = "SELECT * FROM `tb_kk` WHERE `kodeRT` = $rt_user_coba ";
$kartu_keluarga = $this->db->query($query_kk)->result();


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
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
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <a href="<?= base_url('data_warga/tambah_kk') ?>">Tambah Data</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr bgcolor="aqua" align="center">
                                    <th style="width: 30px;">No.</th>
                                    <th>Nomer KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Alamat</th>
                                    <th>Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Kode Pos</th>
                                    <th>Tanggal Dikeluarkan</th>
                                    <th style="width:150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($kartu_keluarga as $kk) { ?>
                                    <tr>
                                        <th><?= $no ?> </th>
                                        <th><?php echo $kk->noKk ?></th>
                                        <th><?php echo $kk->namaKk ?></th>
                                        <th><?php echo $kk->alamat ?></th>
                                        <th><?php echo $kk->kelurahan ?></th>
                                        <th><?php echo $kk->kecamatan ?></th>
                                        <th><?php echo $kk->kodepos ?></th>
                                        <th><?php echo $kk->dikeluarkanTanggal ?></th>
                                        <th>
                                            <button class="btn-lg warning"><?php echo anchor('data_warga/edit_kk/' . $kk->noKk, 'Edit'); ?></button>
                                            <button class="btn-lg danger"><?php echo anchor('data_warga/hapus_kk/' . $kk->noKk, 'Hapus'); ?></button>
                                            <button class="btn-lg warning"><?php echo anchor('data_warga/detail_kk/' . $kk->noKk, 'Detail'); ?></button>
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