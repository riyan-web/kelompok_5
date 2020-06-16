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
                    <h1 class="m-0 text-dark">Detail Kartu Tanda Penduduk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Kartu Penduduk</a></li>
                        <li class="breadcrumb-item active">Detail Ktp</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="card border-success mb-3" style="max-width: 72rem;">
                <div class="card-header bg-transparent border-success"><?= $tb_kk['noKk'];  ?></div>
                <div class="card-body text-success">
                    <h5 class="card-title">Success card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-footer bg-transparent border-success">Footer</div>
            </div>
            <div class="card-deck">
                <?php foreach ($ktp_join as $kj) : ?>

                    <div class="card" style="width: 18rem;">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <img src="<?= base_url('assets/img/ktp/') . $kj->gambar_ktp; ?>" class="img-thumbnail" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $kj->nik ?></h5>
                                        <p class="card-text">Somequick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Cras justo odio</li>
                                        <li class="list-group-item">Dapibus ac facilisis in</li>
                                        <li class="list-group-item">Vestibulum at eros</li>
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