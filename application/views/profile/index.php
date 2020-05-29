<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
          <?php echo 'selamat datang ' . $user['nama']; ?>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
      <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?= base_url('assets/img/profile/') .
                        $user['image'] ?>" class="card-img">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $user['nama']; ?></h5>
              <p class="card-text"><?= $user['email']; ?></p>
              <?php
              $role_id = $this->session->userdata('role_id');
              if ($role_id >= 2) {
                $id_user = $user['id_user'];

                //JOIN KETUA RT dengan KTP
                $query_rt = "SELECT *
                              FROM  `tb_ktp` JOIN `tb_ketuart` ON  `tb_ketuart`.`nik` = `tb_ktp`.`nik`
                                             JOIN `tb_rt_rw`   ON  `tb_rt_rw`.`kodeRt` = `tb_ktp`.`kodeRt`
                              WHERE`tb_ketuart`.`user_id` = $id_user
                            ";

                $rt = $this->db->query($query_rt)->row_array();
                echo "NIK : " . $rt['nik'];
                echo "<br />";
                echo "NO KK : " . $rt['noKk'];
                echo "<br />";
                echo "RT : " . $rt['rt'];
                echo "<br />";
                echo "RW : " . $rt['rw'];
                echo "<br />";
                echo "Kelurahan : " . $rt['kelurahan'];
              }
              ?>
              <p class="card-text"><small class="text-muted"> <?= date('d F Y', $user['date_created']); ?></small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>

  </html>