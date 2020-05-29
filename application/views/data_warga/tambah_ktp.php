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
                            <h3 class="card-title">Tambah Kartu Tanda Penduduk</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form action="<?= base_url('data_warga/tambah_ktp'); ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nomor NIK</label>
                                            <input type="text" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" style="width: 100%;">
                                            <?= form_error('nik', ' <small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Kartu Keluarga</label>
                                            <select class="form-control select2" style="width: 100%;">
                                                <option selected="selected">Alabama</option>
                                                <option>Alaska</option>
                                                <option>California</option>
                                                <option>Delaware</option>
                                                <option>Tennessee</option>
                                                <option>Texas</option>
                                                <option>Washington</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" style="width: 100%;">
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" style="width: 100%;">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="text" class="form-control" style="width: 100%;">
                                        </div>
                                        <div class="form-group">

                                            <label>Jenis Kelamin</label>
                                            <select class="form-control select2" style="width: 100%;">
                                                <option>Laki-Laki</option>
                                                <option>Perempuan</option>
                                                <option>Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Golongan Darah</label>
                                            <select class="form-control select2" style="width: 100%;">
                                                <option>A</option>
                                                <option>AB</option>
                                                <option>B</option>
                                                <option>O</option>
                                                <option>-</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>RT/RW</label>
                                            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option>RT 1 RW 1</option>
                                                <option>RT 4 RW 2</option>
                                                <option>RT 6 RW 2</option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Kelurahan</label>
                                            <input type="text" class="form-control" style="width: 100%;">
                                        </div>
                                        <div class="form-group">
                                            <label>Kecamtan</label>
                                            <input type="text" class="form-control" style="width: 100%;">
                                        </div>
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <input type="text" class="form-control" style="width: 100%;">
                                        </div>
                                        <div class="form-group">
                                            <label>Status Perkawinan</label>
                                            <input type="text" class="form-control" style="width: 100%;">
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <input type="text" class="form-control" style="width: 100%;">
                                        </div>
                                        <div class="form-group">
                                            <label>Kewarganegaraan</label>
                                            <input type="text" class="form-control" style="width: 100%;">
                                        </div>
                                        <div class="form-group">
                                            <label>Berlaku Hingga</label>
                                            <input type="text" class="form-control" style="width: 100%;">
                                            <label>Gambar KTP</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img src="<?= base_url('assets/img/ktp/') ?>" class="img-thumbnail">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="file" name="image" id="image">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Tambah</button>
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