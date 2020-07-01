<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Data Non domisili</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="http://localhost/kelompok_5/domisili/data_domisili">Data Non Domisili</a></li>
                        <li class="breadcrumb-item active">Detail Data Non Domisili</li>
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
                        <img src="<?= base_url('assets/img/domisili/') .
                                        $tb_domisili['surat_domisili'] ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= "NIK : " . $tb_domisili['nik']; ?></h5>
                            <p class="card-text"><?= "Alamat Asal          : " . $tb_domisili['alamat_asal']; ?></p>
                            <p class="card-text"><?= "Tanggal Surat Dibuat : " .  $tb_domisili['tgl_surat_dibuat']; ?></p>
                            <p class="card-text"><?= "Tanggal Surat Masuk  : " . $tb_domisili['tgl_surat_masuk']; ?></p>
                            <p class="card-text"><small class="text-muted"> <?= "Alasan Pindah    : " . $tb_domisili['alasan_pindah']; ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

    </html>