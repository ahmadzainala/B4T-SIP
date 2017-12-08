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
		$this->load->Model('Tracking_model');
		$this->load->Model('Status_tracking_model');
		$jmlmenunggudisetujui = $this->Tracking_model->get_total_menunggudisetujui($this->session->userdata('id_user'));
		$jmlmenunggudisetujuiKD = $this->Tracking_model->get_total_menunggudisetujuiKD($this->session->userdata('id_user'));
		$jmlmenunggudisetujuiTU = $this->Tracking_model->get_total_menunggudisetujuiTU($this->session->userdata('id_user'));
		$jmlmenunggudisetujuiPPK = $this->Tracking_model->get_total_menunggudisetujuiPPK($this->session->userdata('id_user'));
		$jmlprosespengadaan = $this->Tracking_model->get_total_prosespengadaan($this->session->userdata('id_user'));
		$jmltidakdisetujui = $this->Tracking_model->get_total_tidakdisetujui($this->session->userdata('id_user'));
		$jmlverifikasi = $this->Tracking_model->get_total_verifikasi($this->session->userdata('id_user'));
		$jmlselesaipengadaan = $this->Tracking_model->get_total_selesaipengadaan($this->session->userdata('id_user'));
		if($this->session->userdata('id_position') == 1){ //posisi admin
			$form = $this->Form_model->get_all_form_detail();	
		}else if($this->session->userdata('id_position') == 3){ //posisi Kepala Bidang
			$form = $this->Form_model->get_by_user_div($this->session->userdata('id_division'));	
		}else if($this->session->userdata('id_position') == 5){ //posisi Kepala Bagian TU
			$form = $this->Form_model->get_by_user_acc_TU();	
		}else if($this->session->userdata('id_position') == 6){ //posisi Kepala PPK
			if($this->session->userdata('id_division') == 3){
				$form = $this->Form_model->get_by_user_acc_PPKRM();	
			}else{
				$form = $this->Form_model->get_by_user_acc_PPKBLU();	
			}
		}else if($this->session->userdata('id_division') == 5){
			$form = $this->Form_model->get_by_user_pengadaan();	
		}else{ //posisi selain kepala
			$form = $this->Form_model->get_by_user($this->session->userdata('id_user'));	
		}

		$data = array(
            'form_data' => $form,
            'jmlmenunggudisetujui'=> $jmlmenunggudisetujui,
            'jmlselesaipengadaan'=> $jmlselesaipengadaan,
            'jmltidakdisetujui'=> $jmltidakdisetujui,
            'jmlprosespengadaan'=> $jmlprosespengadaan,
            'jmlmenunggudisetujuiPPK'=> $jmlmenunggudisetujuiPPK,
            'jmlmenunggudisetujuiTU'=> $jmlmenunggudisetujuiTU,
            'jmlverifikasi'=> $jmlverifikasi,
            'jmlmenunggudisetujuiKD'=> $jmlmenunggudisetujuiKD
        );
		
		//print_r($data);
		$this->load->view('Header_login');
		$this->load->view('Main_login',$data);
		$this->load->view('footer');
	}

	public function panduan(){
		$this->load->view('Header_login');
		$this->load->view('Panduan');
		$this->load->view('footer');
	}

}