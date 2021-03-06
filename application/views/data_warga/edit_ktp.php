<?php

$id_user = $user['id_user'];
$query_rt = "SELECT `tb_ktp`.`nik`, `tb_ketuart`.`nik`, `user_id`, `tb_rt_rw`.`kodeRt`,`rt`, `rw`
             FROM  `tb_ktp` 
             JOIN `tb_ketuart` ON  `tb_ketuart`.`nik` = `tb_ktp`.`nik`
             JOIN `tb_rt_rw`   ON  `tb_rt_rw`.`kodeRt` = `tb_ktp`.`kodeRt`
             WHERE`tb_ketuart`.`user_id` = $id_user
            ";

$rt_user = $this->db->query($query_rt)->row_array();
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
                        <li class="breadcrumb-item"><a href="http://localhost/kelompok_5/data_warga/ktp">KTP</a></li>
                        <li class="breadcrumb-item active">Edit KTP</li>
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
                    <h3 class="card-title">Edit Kartu Tanda Penduduk</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <?= $this->session->flashdata('message'); ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor NIK</label>
                                    <input type="text" class="form-control" name="nik" value="<?php echo $ktp->nik ?>" style="width: 100%;" readonly>
                                </div>
                                <div class="form-group">
                                    <label>RT / RW</label>
                                    <input type="text" enabled="enabled" value="<?= $rt_user['rt'] . " / " . $rt_user['rw']; ?>" class="form-control" style="width: 100%;" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Kartu Keluarga</label>
                                    <input type="text" class="form-control" name="no_kk" value="<?php echo $ktp->noKk ?>" style="width: 100%;" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" style="width: 100%;" value="<?php echo $this->input->post('nama') ?? $ktp->nama ?>">
                                    <?= form_error('nama', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" name="tmp_lahir" class="form-control" style="width: 100%;" value="<?php echo $this->input->post('tmp_lahir') ?? $ktp->tempatLahir ?>">
                                    <?= form_error('tmp_lahir', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" name="tgl_lahir" class="form-control" style="width: 100%;" value="<?php echo $this->input->post('tgl_lahir') ?? $ktp->tanggalLahir ?>">
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
                                    <textarea name="alamat" class="form-control" name="alamat"> <?php echo $this->input->post('alamat') ?? $ktp->alamat ?></textarea>
                                    <?= form_error('alamat', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <input type="hidden" name="kode_rt" value="<?= $rt_user['kodeRt']; ?>">
                                <!-- /.form-group -->
                            </div>

                            <!-- /.col -->
                            <div class="col-md-6">
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <input type="text" name="kelurahan" class="form-control" style="width: 100%;" value="<?php echo $this->input->post('kelurahan') ?? $ktp->kelurahan ?>">
                                    <?= form_error('kelurahan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" name="kecamatan" class="form-control" style="width: 100%;" value="<?php echo $this->input->post('kecamatan') ?? $ktp->kecamatan ?>">
                                    <?= form_error('kecamatan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <input type="text" name="kabupaten" class="form-control" value="<?php echo $this->input->post('kabupaten') ?? $ktp->kabupaten ?>" style="width: 100%;">
                                    <?= form_error('kabupaten', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="text" name="provinsi" class="form-control" value="<?php echo $this->input->post('provinsi') ?? $ktp->provinsi ?>" style="width: 100%;">
                                    <?= form_error('provinsi', ' <small class="text-danger pl-2">', '</small>'); ?>
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
                                        <option><?= $ktp->statusPerkawinan;  ?></option>
                                        <option>Belum kawin</option>
                                        <option>Menikah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control" style="width: 100%;" value="<?php echo $this->input->post('pekerjaan') ?? $ktp->pekerjaan ?>">
                                    <?= form_error('pekerjaan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Kewarganegaraan</label>
                                    <input type="text" name="kewarganegaraan" class="form-control" style="width: 100%;" value="<?php echo $this->input->post('kewarganegaraan') ?? $ktp->kewarganegaraan ?>">
                                    <?= form_error('kewarganegaraan', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Berlaku Hingga</label>
                                    <input type="text" name="berlaku" class="form-control" style="width: 100%;" value="<?php echo $this->input->post('berlaku') ?? $ktp->berlakuHingga ?>">
                                    <?= form_error('berlaku', ' <small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group-row">
                                    <label>Ganti Foto</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/ktp/') . $ktp->gambar_ktp ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="file" name="image" id="image">
                                                <small>Biarkan Kosong Jika Gambar Tidak Mau Diganti</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</button>
                                        <button type="reset" class="btn btn-dark"><i class="fas fa-redo-alt"></i> Reset</button>
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