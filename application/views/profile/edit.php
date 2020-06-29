<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Profil</h1>
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

          <form action="<?= base_url('profile/edit'); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Email" name="email" value="<?= $user['email']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2 col-form-label">Masukkan Foto</div>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <input type="file" name="image" id="image">
                  </div>
                </div>
              </div> 
            </div>
            <div class="form-group row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </body>

  </html>

  $config['upload_path']          = './assets/img/domisili';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = 'domisili-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
            $config['max_size']             = 2048; // 2MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);

            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $where = array('id_domisili' => $id_domisili);
                    $query = $this->domisili_model->edit_domisili($where, 'domisili');
                    $item = $query->row();
                    if($item->surat_domisili != null){
                        $target_file = './assets/img/domisili'.$item->surat_domisili;
                        unlink($target_file);
                    }
                    $post['image'] = $this->upload->data('file_name');
                    $this->domisili_model->update_domisili($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success" role="alert">Data Domisili Berhasil Diubah</div>'
                        );
                        redirect('domisili/data_domisili');
                    }
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Cek Kembali File Upload</div>', $error);
                    redirect('domisili/tambah_data_domisili');
                }
            } else {
                $post['image'] = 'null';
                $this->domisili_model->update_domisili($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">Data Domisili Ditambahkan.</div>'
                    );
                    redirect('domisili/data_domisili');
                }
            }