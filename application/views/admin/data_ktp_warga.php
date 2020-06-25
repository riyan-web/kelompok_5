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
                        <li class="breadcrumb-item active">Data KTP Warga</li>
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
                        <h3 class="card-title">Data Kartu Tanda Penduduk Desa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr bgcolor="aqua" align="center">
                                    <th style="width: 30px;">No.</th>
                                    <th>NIK</th>
                                    <th>Nama penduduk</th>
                                    <th>Tempat/Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>RT/RW</th>
                                    <th>pekerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($all_ktp as $ktp) { ?>
                                    <tr>
                                        <th><?= $no ?> </th>
                                        <th><?php echo $ktp->nik ?></th>
                                        <th><?php echo $ktp->nama ?></th>
                                        <th><?php echo $ktp->tempatLahir ?> <?php echo $ktp->tanggalLahir ?></th>
                                        <th><?php echo $ktp->jenisKelamin ?></th>
                                        <th><?php echo $ktp->agama ?></th>
                                        <th><?php echo $ktp->rt . "/" . $ktp->rw ?></th>
                                        <th><?php echo $ktp->pekerjaan ?></th>
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