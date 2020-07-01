<?php

$no_kk = $tb_kk['noKk'];


$ktp = "SELECT * FROM `tb_ktp` 
                 JOIN `tb_kk` ON `tb_kk`.`noKk` = `tb_ktp`.`noKk`
                 WHERE `tb_ktp`.`noKk` = $no_kk
              ";

$ktp_join = $this->db->query($ktp)->result();

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Kartu Keluarga</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="http://localhost/kelompok_5/data_warga/kartu_keluarga">Kartu Keluarga</a></li>
                        <li class="breadcrumb-item active">Detail KK</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="card border-success mb-3" style="max-width: 72rem;">
                <div class="card-header bg-transparent border-success"><?= "Nomor Kartu Keluarga : " . $tb_kk['noKk'];  ?></div>
                <div class="card-body text-success">
                    <h5 class="card-title"><?= "Kepala Keluarga : " . $tb_kk['namaKk'];  ?></h5>
                    <p class="card-text"> <?= $tb_kk['alamat'] . " - " .
                                                $tb_kk['kelurahan'] . " - " .
                                                $tb_kk['kecamatan'] . " - " .
                                                $tb_kk['kabupaten'] . " - " .
                                                $tb_kk['provinsi']; ?>
                    </p>
                </div>
                <div class="card-footer bg-transparent border-success"></div>
            </div>
            <h1 class="m-0 text-dark">Anggota Keluarga : </h1>
            <br>
            <div class="card-deck">
                <?php foreach ($ktp_join as $kj) : ?>

                    <div class="card" style="width: 18rem;">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img src="<?= base_url('assets/img/ktp/') . $kj->gambar_ktp; ?>" class="img-thumbnail" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $kj->nama . ", " . $kj->nik; ?></h5>
                                        <p class="card-text"><?= $kj->tempatLahir . ", " . $kj->tanggalLahir; ?></p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><?= "Agama : " . $kj->agama; ?></li>
                                        <li class="list-group-item"><?= "pekerjaan : " . $kj->pekerjaan; ?></li>
                                        <li class="list-group-item"><?= "Kewarganegaraan : " . $kj->kewarganegaraan; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>

<!-- /.content-header -->


</body>

</html>