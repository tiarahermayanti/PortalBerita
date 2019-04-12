<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_berita extends CI_Controller{

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
            redirect("c_login");
        }
		$this->load->model('m_berita');

	}

	function index(){
		$data['berita'] = $this->m_berita->getBerita();
		 $this->template->load('header','berita',$data);
	}

	function insertBerita(){
		$data['berita'] = $this->m_berita->getBerita();
		$data['kategori'] = $this->m_berita->getKategori();
		$data['admin'] = $this->m_berita->getAdmin();
		$this->template->load('header','insertBerita',$data);
	}

	function aksiInsertBerita(){

		$simpan = array(
					"berita_judul" => $this->input->post('berita_judul'),
					"kategori_id"=> $this->input->post('kategori'),
					"adm_id"=> $this->input->post('penulis'),
					"berita_isi"=> $this->input->post('isi_berita'),
                    "berita_foto" => $_FILES['gambar']['name'],
                    
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'], "./images/" . $value['name']);
                }

         $this->db->insert('tb_berita', $simpan);  

         redirect('c_berita');      
	}

	function deleteBerita($berita_id){

        $where = array('berita_id' => $berita_id);
        $this->m_berita->delete('tb_berita',$where);
        redirect('c_berita');
    
	}

	function updateBerita(){
		$berita_id = $this->uri->segment(3);
		$data['berita'] = $this->m_berita->getBeritaId($berita_id);
		$data['kategori'] = $this->m_berita->getKategori();
		$data['admin'] = $this->m_berita->getAdmin();
		$this->template->load('header','updateBerita',$data);
	}

	function aksiUpdateBerita(){
		$berita_id = $this->uri->segment(3);
		$simpan = array(
					"berita_judul" => $this->input->post('berita_judul'),
					"kategori_id"=> $this->input->post('kategori'),
					"adm_id"=> $this->input->post('penulis'),
					"berita_isi"=> $this->input->post('isi_berita'),
                    "berita_foto" => $_FILES['gambar']['name'],
                    
                );
                foreach ($_FILES as  $key => $value){
                    move_uploaded_file($value['tmp_name'], "./images/" . $value['name']);
                }

         $where = array("berita_id " =>$berita_id);

        $this->m_berita->updateBelajar($where,'tb_berita',$simpan); 

        redirect('c_berita');

	}

	
}