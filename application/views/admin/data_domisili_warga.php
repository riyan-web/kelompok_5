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
                        <li class="breadcrumb-item"><a href="http://localhost/kelompok_5/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Domisili</li>
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
                        <h3 class="card-title">Data Warga Berdomisili Luar</h3>
                    </div>
                    <!-- /.card-header -->
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr bgcolor="aqua" align="center">
                                    <th style="width: 30px;">No.</th>
                                    <th>Nama</th>
                                    <th>Alamat Asal</th>
                                    <th>Pindah Ke</th>
                                    <th>Alasan Pindah</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Tanggal Masuk</th>
                                    <th>RT/RW</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($all_domisili as $dom) { ?>
                                    <tr>
                                        <th><?= $no ?> </th>
                                        <th><?php echo $dom->nama ?></th>
                                        <th><?php echo $dom->alamat_asal ?></th>
                                        <th><?php echo $dom->pindah_ke ?></th>
                                        <th><?php echo $dom->alasan_pindah ?></th>
                                        <th><?php echo $dom->tgl_surat_dibuat ?></th>
                                        <th><?php echo $dom->tgl_surat_masuk ?></th>
                                        <th><?php echo $dom->rt . " / " . $dom->rw ?></th>
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