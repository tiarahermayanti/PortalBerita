<form action="<?php echo base_url('index.php/c_kategori/aksiInsertKategori');?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="nama_promosi">Nama Kategori</label>
                <input type="text" class="form-control"  name="kategori_nama" placeholder="Nama Kategori">
            </div>
            <div class="form-group">
                <label for="nama_promosi">Keterangan Kategori</label>
                <textarea type="text" class="form-control" name="kategori_ket" placeholder="Keterangan Kategori"></textarea>
            </div>

              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/c_kategori');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
      </form>