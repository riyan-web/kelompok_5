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
                        <li class="breadcrumb-item active">Data Ketua RT</li>
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
                        <h3 class="card-title">Data Ketua RT Desa</h3>
                    </div>
                    <!-- /.card-header -->
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <a href="<?= base_url('Rt/tambah_data_ketuart') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                        <br><br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr bgcolor="aqua" align="center">
                                    <th style="width: 30px;">No.</th>
                                    <th>Nama</th>
                                    <th>No Induk Kependudukan</th>
                                    <th>Email</th>
                                    <th>Ketua RT</th>
                                    <th>RW</th>
                                    <th style="width:150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($ketua_rt as $rt) { ?>
                                    <tr>
                                        <th><?= $no ?> </th>
                                        <th><?php echo $rt->nama ?></th>
                                        <th><?php echo $rt->nik ?></th>
                                        <th><?php echo $rt->email ?></th>
                                        <th><?php echo $rt->rt ?></th>
                                        <th><?php echo $rt->rw ?></th>
                                        <th>
                                            <a href="<?= base_url('rt/hapus_ketua_rt/' . $rt->id_ketua_rt) ?>" class="btn btn-danger hapus"><i class="fas fa-trash-alt"></i></a>
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