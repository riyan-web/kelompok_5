<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data RT</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">RT</a></li>
                        <li class="breadcrumb-item active">Data RT RW</li>
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
                        <a href="<?= base_url('rt/tambah_data_rt') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                        <br><br>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr bgcolor="aqua" align="center">
                                    <th style="width: 30px;">No.</th>
                                    <th>RT</th>
                                    <th>RW</th>
                                    <th style="width:150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($all_rt as $rt) { ?>
                                    <tr>
                                        <th><?= $no ?> </th>
                                        <th><?php echo $rt->rt ?></th>
                                        <th><?php echo $rt->rw ?></th>
                                        <th>
                                            <a href="<?= base_url('rt/edit_data_rt/' . $rt->kodeRt) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url('rt/hapus_data_rt/' . $rt->kodeRt) ?>" class="btn btn-danger hapus"><i class="fas fa-trash-alt"></i></a>
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