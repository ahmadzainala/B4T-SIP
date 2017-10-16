<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	function __construct() {
	    parent::__construct();
	    $this->load->model('User_akun_model');
	    $this->load->model('Form_model');
 	}

	public function index()
	{
		//main page
		if($this->session->userdata('id_position') == 1){ //posisi admin
			$form = $this->Form_model->get_all_detail();	

		}else if($this->session->userdata('id_position') == 3){ //posisi Kepala Bidang
			$form = $this->Form_model->get_by_user_div($this->session->userdata('id_division'));	

		}else if($this->session->userdata('id_position') == 10){ //posisi Kepala Bidang
			$form = $this->Form_model->get_by_user_div($this->session->userdata('id_division'));	

		}else{ //posisi selain kepala
			$form = $this->Form_model->get_by_user($this->session->userdata('id_user'));	
		}
		$data = array(
            'form_data' => $form
        );
		
		//print_r($data);
		$this->load->view('header_login');
		$this->load->view('Main_login',$data);
		$this->load->view('footer');
	}

}