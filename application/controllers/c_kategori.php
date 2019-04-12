<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_kategori extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('m_berita');

	}

	function index(){
		$data['kategori'] = $this->m_berita->getKategori();
		 $this->template->load('header','kategori',$data);
	}

	function insertKategori(){

		$this->template->load('header','insertKategori');
	}

	function aksiInsertKategori(){

		$simpan = array(
					"kategori_nama" => $this->input->post('kategori_nama'),
					"kategori_ket"=> $this->input->post('kategori_ket')
					
                );
               

         $this->db->insert('tb_kategori', $simpan);  

         redirect('c_kategori');      
	}

	function deleteKategori($kategori_id){

        $where = array('kategori_id' => $kategori_id);
        $this->m_berita->delete('tb_kategori',$where);
        redirect('c_kategori');
    
	}

	function updateKategori(){
		$kategori_id = $this->uri->segment(3);
		$data['kategori'] = $this->m_berita->getKategoriId($kategori_id);
		
		$this->template->load('header','updateKategori',$data);
	}

	function aksiUpdateKategori(){
		$kategori_id = $this->uri->segment(3);
		$simpan = array(
					"kategori_nama" => $this->input->post('kategori_nama'),
					"kategori_ket"=> $this->input->post('kategori_ket')
					
                );

         $where = array("kategori_id " =>$kategori_id);

        $this->m_berita->updateBelajar($where,'tb_kategori',$simpan); 

        redirect('c_kategori');

	}
}