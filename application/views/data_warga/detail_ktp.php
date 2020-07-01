<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Kartu Tanda Penduduk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="http://localhost/kelompok_5/data_warga/ktp">KTP</a></li>
                        <li class="breadcrumb-item active">Detail KTP</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            </div>
            <div class="card mb-3 col-lg-8">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/ktp/') .
                                        $tb_ktp['gambar_ktp'] ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $tb_ktp['nama'] . ", " . $tb_ktp['nik']; ?></h5>
                            <p class="card-text"><?= $tb_ktp['tempatLahir'] . ", " . $tb_ktp['tanggalLahir'];; ?></p>
                            <p class="card-text"><?= "Agama : " . $tb_ktp['agama']; ?></p>
                            <p class="card-text"><?= "pekerjaan : " . $tb_ktp['pekerjaan']; ?></p>
                            <p class="card-text"><?= "Kewarganegaraan : " . $tb_ktp['kewarganegaraan']; ?></p>
                            <p class="card-text"><small class="text-muted">
                                    <?= $tb_ktp['alamat'] . " - " .
                                        $tb_ktp['kelurahan'] . " - " .
                                        $tb_ktp['kecamatan']; ?></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

    </html>