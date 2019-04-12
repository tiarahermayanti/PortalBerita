<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_login extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->model('m_login');

	}

	function index(){
        $this->load->view('login');
    }

	function aksi_login(){
		$email = $this->input->post('inputEmail');
		$pass = $this->input->post('inputPassword');

		$where = array('adm_email' => $email,
				'adm_pass' => md5($pass));

		$cek = $this->m_login->cek_login("tb_admin", $where);

		if($cek->num_rows() == 0){
			echo '<script language="javascript">';
            echo 'alert("Email dan kata sandi salah");';
             echo 'window.location= "'.base_url('index.php/c_login').'";';
            echo '</script>';
		} else {
			foreach ($cek->result() as $login){
            $data_session = array(
                
                'email' => $email,
                'status' => "login",
                'adm_id' => $login->adm_id,
                'adm_nama' => $login->adm_nama
                
            );

                $this->session->set_userdata($data_session);
           
            }
            redirect('c_berita');
		}
	}

	function logout(){
        $this->session->sess_destroy();
        redirect("c_login");
    }

}