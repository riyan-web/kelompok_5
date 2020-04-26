  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Ganti Password</h1>
                      <?php echo 'selamat datang ' . $user['nama']; ?>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item active">Dashboard v1</li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
              <div class="row">
                  <div class="col-lg-6">
                      <?= $this->session->flashdata('message'); ?>
                      <form action="<?= base_url('profile/ganti_password'); ?>" method="post">
                          <div class="form-group">
                              <label for="password_lama">Masukkan Password Anda</label>
                              <input type="password" class="form-control" id="password_lama" name="password_lama">
                              <?= form_error('password_lama', ' <small class="text-danger pl-2">', '</small>'); ?>
                          </div>
                          <div class="form-group">
                              <label for="password_baru1">Masukkan Password Baru </label>
                              <input type="password" class="form-control" id="password_baru1" name="password_baru1">
                              <?= form_error('password_baru1', ' <small class="text-danger pl-2">', '</small>'); ?>
                          </div>
                          <div class="form-group">
                              <label for="password_baru2">Konfirmasi Password Baru</label>
                              <input type="password" class="form-control" id="password_baru2" name="password_baru2">
                              <?= form_error('password_baru2', ' <small class="text-danger pl-2">', '</small>'); ?>
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary">Ganti Password</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </body>

  </html>