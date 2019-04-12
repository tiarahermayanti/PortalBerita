
<?php foreach($berita->result() as $key){?>
<form action="<?php echo base_url('index.php/c_berita/aksiUpdateBerita/'). $key->berita_id;?>" method="post" enctype="multipart/form-data">
  
        <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="nama_promosi">Judul Berita</label>
                <input type="text" value="<?php echo $key->berita_judul;?>" class="form-control" id="nama_promosi" name="berita_judul" placeholder="Judul Berita">
            </div>
            <div class="form-group">
                 <label for="isi_promosi">Kategori</label>
                 
                  <select name="kategori" class="form-control">
                    <option value="<?php echo $key->kategori_id;?>"><?php echo $key->kategori_nama;?></option>
                    <?php foreach($kategori->result() as $b){?>
                    <option value="<?php echo $b->kategori_id;?>"><?php echo $b->kategori_nama;?></option>
                    <?php } ?>
                  </select>
               
             </div>
             <div class="form-group">
                 <label for="isi_promosi">Penulis</label>
                 <select name="penulis" class="form-control">
                    <option value="<?php echo $key->adm_id;?>"><?php echo $key->adm_nama;?></option>
                    <?php foreach($admin->result() as $a){?>
                    <option value="<?php echo $a->adm_id;?>"><?php echo $a->adm_nama;?></option>
                    <?php } ?>
                  </select>
             </div>
             <div class="form-group">
                 <label for="isi_promosi">Isi Berita</label>
                 <textarea type="text" class="form-control" id="isi_promosi" name="isi_berita" placeholder="Isi Berita"><?php echo $key->berita_isi;?></textarea>
             </div>
              <div class="form-group">
                  <label for="image">Gambar Berita</label>
                  <input type="file" value="<?php echo $key->berita_foto;?>" class="form-control" name="gambar" placeholder="Gambar Berita">
                  <div class="validation"></div>
              </div>
              

              <div class="modal-footer">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Simpan</button>
                   <a type="button" href="<?php echo base_url('index.php/c_berita');?>" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> Batal</a>
              </div>
        </div>
        
      </form>

      <?php } ?>