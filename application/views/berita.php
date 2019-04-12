<div class="card mb-3">
          <div class="card-header">
            <table style="width : 100%">
      <tr>
        <td style="width : 50%">
          <i class="fas fa-table"></i>
          Data Table Berita
        <td align="right">
          
          <a style="background-color: #189cff; border: none;color: white;padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;" href="<?php echo base_url('index.php/c_berita/insertBerita');?>"><i class="fa fa-sign-in" aria-hidden="true"></i>Insert Data</a>
        </td>
      </tr>
      </table>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul Berita</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Isi Berita</th>
                    <th>Gambar</th>
                    <th>Tanggal Posting</th>
                    <th>Aksi</th>
          
                  </tr>
                </thead>
                
                <tbody>

                  <?php 
                  $no = 1;
                  foreach($berita->result() as $key) {?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $key->berita_judul;?></td>
                    <td><?php echo $key->kategori_nama;?></td>
                    <td><?php echo $key->adm_nama;?></td>
                    <td><?php $isi = $key->berita_isi;
                    echo substr($isi,0,50); echo '....';?></td>
                    <td><?php echo $key->berita_foto;?></td>
                    <td><?php echo $key->berita_tgl;?></td>
                    <td>
                            <a href="<?php echo base_url('index.php/c_berita/updateBerita/'). $key->berita_id;?>"data-toggle="modal" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>

                            <a onclick="deleteConfirm('<?php echo base_url('index.php/c_berita/deleteBerita/'). $key->berita_id;?>')" href="<?php echo base_url('index.php/c_berita/deleteBerita/'). $key->berita_id;?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                          </td>
                  </tr>
                 
                 <?php $no++; } ?>
                  
                </tbody>
              </table>

             
          </div>
          
        </div>


      </div>
      <!-- /.container-fluid -->

    </div>
