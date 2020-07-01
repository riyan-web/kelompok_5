<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ketua RT</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="http://localhost/kelompok_5/Rt/tambah_data_ketuart">Tambah Ketua RT</a></li>
                        <li class="breadcrumb-item"><a href="http://localhost/kelompok_5/Rt/tambah_ktp_ketua">Tambah KTP RT</a></li>
                        <li class="breadcrumb-item active">Tambah KK RT</li>
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
                    <h3 class="card-title">Tambah Kartu Keluarga</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('rt/tambah_kk_ketua'); ?>" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Kartu Keluarga</label>
                                    <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor Kartu Keluarga" style="width: 100%;">
                                    <?= form_error('no_kk', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kepala Keluarga</label>
                                    <input type="text" name="nama_kk" class="form-control" style="width: 100%;">
                                    <?= form_error('nama_kk', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" style="width: 100%;">
                                    <?= form_error('alamat', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Dikeluarkan</label>
                                    <input type="date" name="tgl_dikeluarkan" class="form-control" style="width: 100%;">
                                    <?= form_error('tgl_dikeluarkan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Pilih RT</label>
                                    <select name="kode_rt" class="form-control select2" style="width: 100%;">
                                        <option value="">- piilih -</option>
                                        <?php
                                        $query = "SELECT * FROM `tb_rt_rw`";
                                        $query_rt = $this->db->query($query)->result();
                                        foreach ($query_rt as $rt) { ?>
                                            <option value="<?= $rt->kodeRt ?>"><?= "RT : " . $rt->rt . " RW : " . $rt->rw  ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('kode_rt', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    <br>
                                    <a href="<?= base_url('Rt/tambah_data_rt') ?>" class="btn btn-success"><i class="fas fa-book"></i> Tambah RT</a>
                                </div>


                                <!-- /.form-group -->
                            </div>

                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <input type="text" name="kelurahan" class="form-control" style="width: 100%;">
                                    <?= form_error('kelurahan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" name="kecamatan" class="form-control" style="width: 100%;">
                                    <?= form_error('kecamatan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <input type="text" name="kabupaten" class="form-control" style="width: 100%;">
                                    <?= form_error('kabupaten', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="text" name="provinsi" class="form-control" style="width: 100%;">
                                    <?= form_error('provinsi', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Kode POS</label>
                                    <input type="text" name="kode_pos" class="form-control" style="width: 100%;">
                                    <?= form_error('kode_pos', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
                                    <button type="reset" class="btn btn-dark"><i class="fas fa-redo-alt"></i> Reset</button>
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