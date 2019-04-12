<?php

class m_berita extends CI_model{

	public function getBerita(){
       
        $this->db->select('*');
         $this->db->from('tb_admin, tb_berita, tb_kategori');
         $this->db->where('tb_berita.adm_id = tb_admin.adm_id');
         $this->db->where('tb_berita.kategori_id = tb_kategori.kategori_id');
         $this->db->order_by('tb_berita.berita_id DESC');
        $status = $this->db->get();
        return $status;
    
    }

    public function getBeritaId($berita_id){
       
        $this->db->select('*');
         $this->db->from('tb_admin, tb_berita, tb_kategori');
         $this->db->where('tb_berita.adm_id = tb_admin.adm_id');
         $this->db->where('tb_berita.kategori_id = tb_kategori.kategori_id');
         $this->db->where('tb_berita.berita_id', $berita_id);
         $this->db->order_by('tb_berita.berita_id DESC');
        $status = $this->db->get();
        return $status;
    
    }

    public function getKategori(){  
         $this->db->select('*');
         $this->db->from('tb_kategori'); 
        $this->db->order_by('kategori_id DESC');
        $status = $this->db->get();
        return $status;
    }

    public function getKategoriId($kategori_id){  
         $this->db->select('*');
         $this->db->from('tb_kategori'); 
          $this->db->where('kategori_id', $kategori_id);
        $this->db->order_by('kategori_id DESC');
        $status = $this->db->get();
        return $status;
    }

    public function getAdmin(){   
        return $this->db->get('tb_admin');
    }

    public function delete($tableName,$where){
		return $this->db->delete($tableName,$where);
		
    }

    public function updateBelajar($where, $table, $data){
        $this->db->where($where);
    $this->db->update($table,$data);
    }

}