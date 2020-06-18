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
                        <h3 class="card-title">Kartu Keluarga</h3>
                    </div>
                    <!-- /.card-header -->
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <a href="<?= base_url('data_warga/tambah_kk') ?>">Tambah Data</a>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr bgcolor="aqua" align="center">
                                    <th style="width: 30px;">No.</th>
                                    <th>NIK</th>
                                    <th>Nomor KK</th>
                                    <th>Alamat Asal</th>
                                    <th>Pindah Ke</th>
                                    <th>Alasan Pindah</th>
                                    <th>Pengikut</th>
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
                                        <th><?php echo $dom->noKk ?></th>
                                        <th><?php echo $dom->alamat_asal ?></th>
                                        <th><?php echo $dom->pindah_ke ?></th>
                                        <th><?php echo $dom->alasan_pindah ?></th>
                                        <th><?php echo $dom->pengikut ?></th>
                                        <th><?php echo $dom->tgl_surat_dibuat ?></th>
                                        <th><?php echo $dom->tgl_surat_masuk ?></th>
                                        <th>
                                            <button class="btn-lg warning"><?php echo anchor('data_warga/edit_kk/' . $dom->noKk, 'Edit'); ?></button>
                                            <button class="btn-lg danger"><?php echo anchor('data_warga/hapus_kk/' . $dom->noKk, 'Hapus'); ?></button>
                                            <button class="btn-lg warning"><?php echo anchor('data_warga/detail_kk/' . $dom->noKk, 'Detail'); ?></button>
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