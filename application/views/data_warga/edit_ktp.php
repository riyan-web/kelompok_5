<?php

$id_user = $user['id_user'];
$query_rt = "SELECT `tb_ktp`.`nik`, `tb_ketuart`.`nik`, `user_id`, `tb_rt_rw`.`kodeRt`,`rt`, `rw`
             FROM  `tb_ktp` 
             JOIN `tb_ketuart` ON  `tb_ketuart`.`nik` = `tb_ktp`.`nik`
             JOIN `tb_rt_rw`   ON  `tb_rt_rw`.`kodeRt` = `tb_ktp`.`kodeRt`
             WHERE`tb_ketuart`.`user_id` = $id_user
            ";

$rt_user = $this->db->query($query_rt)->row_array();
$rt_user_coba = $rt_user['kodeRt'];

$query_kodeRt = "SELECT * FROM `tb_kk` WHERE `kodeRT` = $rt_user_coba ";
$rt = $this->db->query($query_kodeRt)->result();







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
                <?= $this->session->flashdata('message'); ?>
                <?php foreach ($tb_ktp as $ktp) { ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor NIK</label>
                                        <input type="text" class="form-control" name="nik" value="<?php echo $ktp->nik ?>" style="width: 100%;" readonly>
                                        <?= form_error('nik', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Kartu Keluarga</label>
                                        <select name="no_kk" class="form-control select2" style="width: 100%;">
                                            <option value=""><?php echo $ktp->noKk; ?></option>
                                            <?php
                                            foreach ($rt as $r) { ?>
                                                <option value="<?= $r->noKk ?>"><?= $r->noKk . " - " . $r->namaKk  ?></option>
                                                <?php  ?>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" style="width: 100%;" value="<?= $ktp->nama; ?>">
                                        <?= form_error('nama', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tmp_lahir" class="form-control" style="width: 100%;" value="<?= $ktp->tempatLahir; ?>">
                                        <?= form_error('tmp_lahir', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" name="tgl_lahir" class="form-control" style="width: 100%;" value="<?= $ktp->tanggalLahir; ?>">
                                        <?= form_error('tgl_lahir', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jk" class="form-control select2" style="width: 100%;">
                                            <option><?= $ktp->jenisKelamin; ?></option>
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                            <option>Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Golongan Darah</label>
                                        <select name="gol_darah" class="form-control select2" style="width: 100%;">
                                            <option><?= $ktp->golDarah; ?></option>
                                            <option>A</option>
                                            <option>AB</option>
                                            <option>B</option>
                                            <option>O</option>
                                            <option>-</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" name="alamat"> <?php echo $ktp->alamat; ?></textarea>
                                        <?= form_error('alamat', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="text" enabled="enabled" value="<?= $rt_user['rt']; ?>" class="form-control" style="width: 100%;">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="kode_rt" value="<?= $rt_user['kodeRt']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="text" enabled="enabled" value="<?= $rt_user['rw']; ?>" class="form-control" style="width: 100%;">
                                    </div>
                                    <!-- /.form-group -->
                                </div>

                                <!-- /.col -->
                                <div class="col-md-6">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input type="text" name="kelurahan" class="form-control" style="width: 100%;" value="<?= $ktp->kelurahan; ?>">
                                        <?= form_error('kelurahan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" name="kecamatan" class="form-control" style="width: 100%;" value="<?= $ktp->kecamatan; ?>">
                                        <?= form_error('kecamatan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select name="agama" class="form-control select2" style="width: 100%;">
                                            <option><?= $ktp->agama; ?></option>
                                            <option>Islam</option>
                                            <option>Kristen</option>
                                            <option>katolik</option>
                                            <option>Hindu</option>
                                            <option>Budha</option>
                                            <option>Konghucu</option>
                                            <option>Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Perkawinan</label>
                                        <select name="sta_perkawinan" class="form-control select2" style="width: 100%;">
                                            <option>statusPerkawinan</option>
                                            <option>Belum kawin</option>
                                            <option>Menikah</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" name="pekerjaan" class="form-control" style="width: 100%;" value="<?= $ktp->pekerjaan; ?>">
                                        <?= form_error('pekerjaan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Kewarganegaraan</label>
                                        <input type="text" name="kewarganegaraan" class="form-control" style="width: 100%;" value="<?= $ktp->kewarganegaraan; ?>">
                                        <?= form_error('kewarganegaraan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Berlaku Hingga</label>
                                        <input type="text" name="berlaku" class="form-control" style="width: 100%;" value="<?= $ktp->berlakuHingga; ?>">
                                        <?= form_error('berlaku', ' <small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Edit</button>
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
                <?php } ?>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</body>

</html>