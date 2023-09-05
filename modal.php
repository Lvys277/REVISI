<!-- Modal cerita -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload cerita</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <form method="POST" action="simpan-cerita.php">
              <div class="wrapper">
                <textarea spellcheck="false" name="deskripsi" placeholder="Ketik sesuatu..." required></textarea>
                <button style="margin-left:377px;margin-top:15px;" type="submit" class="btn btn-primary ">Upload</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal gambar -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload gambar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <div class="card-body">
              <form action="simpan-gambar.php" method="POST" enctype="multipart/form-data">
                <div class="form-group fw-bold">
                  <label>Judul</label>
                  <input type="text" name="judul" placeholder="Masukkan judul" class="form-control">
                </div>
                <div class="form-group fw-bold">
                  <label>GAMBAR</label>
                  <input type="file" name="gambar" class="form-control">
                </div>
                <br>
                <div style="margin-left:228px;">
                  <button type="reset" class="btn btn-danger mt-2">Reset</button>
                  <button type="submit" class="btn btn-primary mt-2">Upload</button>
                  
</div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Modal Profil -->
  
<div class="modal fade" id="staticBackdrop0" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Gambar Profil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card-body">
            <form method="POST" action="edit-foto-profil.php" enctype="multipart/form-data">
                <?php include 'tampilan-foto.php'; ?>
                <div>
                  <img style="border-radius:50%;width:280px;" src="image/<?php echo $row['gambar']; ?>" >
                  <input style="margin-top:18px;margin-bottom:18px;" type="file" name="gambar"
                    class="form-control" width="100px">
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
        </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>