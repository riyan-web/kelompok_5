        <?php

        $id_user = $user['id_user'];
        $query_rt = "SELECT *
        FROM  `tb_ktp` JOIN `tb_ketuart` ON  `tb_ketuart`.`nik` = `tb_ktp`.`nik`
        WHERE`tb_ketuart`.`user_id` = $id_user
        ";

        $rt = $this->db->query($query_rt)->row_array();

        $grup_rt = $rt['kodeRt'];
        $query_ktp = "SELECT *
                        FROM `tb_ktp` JOIN `tb_rt_rw` ON `tb_rt_rw`.`kodeRt` = `tb_ktp`.`kodeRt`
                                      JOIN `tb_kk` ON `tb_kk`.`noKk` = `tb_ktp`.`noKk`
                                      WHERE `tb_ktp`.`kodeRt` = $grup_rt
                                      ";
        $ktp_query = $this->db->query($query_ktp)->result();
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
                                <li class="breadcrumb-item active">Data Warga</li>
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
                                <h3 class="card-title">Kartu Tanda Penduduk</h3>
                            </div>
                            <!-- /.card-header -->
                            <?= $this->session->flashdata('message'); ?>
                            <div class="card-body">
                                <a href="<?= base_url('data_warga/tambah_ktp') ?>">Tambah Data</a>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr bgcolor="aqua" align="center">
                                            <th style="width: 30px;">No.</th>
                                            <th>NIK</th>
                                            <th>Nama penduduk</th>
                                            <th>Tempat/Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>pekerjaan</th>
                                            <th style="width:150px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($ktp_query as $ktp) { ?>
                                            <tr>
                                                <th><?= $no ?> </th>
                                                <th><?php echo $ktp->nik ?></th>
                                                <th><?php echo $ktp->nama ?></th>
                                                <th><?php echo $ktp->tempatLahir ?> <?php echo $ktp->tanggalLahir ?></th>
                                                <th><?php echo $ktp->jenisKelamin ?></th>
                                                <th><?php echo $ktp->agama ?></th>
                                                <th><?php echo $ktp->pekerjaan ?></th>
                                                <th>
                                                    <button class="btn-lg warning"><?php echo anchor('data_warga/edit_ktp/' . $ktp->nik, 'Edit'); ?></button>
                                                    <button class="btn-lg danger"><?php echo anchor('data_warga/hapus_ktp/' . $ktp->nik, 'Hapus'); ?></button>
                                                    <button class="btn-lg danger"><?php echo anchor('data_warga/detail_ktp/' . $ktp->nik, 'detail'); ?></button>
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