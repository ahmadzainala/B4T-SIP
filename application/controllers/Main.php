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
		$jmlmenunggudisetujui = $this->Tracking_model->get_total_menunggudisetujui();
		$jmlmenunggudisetujuiKD = $this->Tracking_model->get_total_menunggudisetujuiKD();
		$jmlmenunggudisetujuiTU = $this->Tracking_model->get_total_menunggudisetujuiTU();
		$jmlmenunggudisetujuiPPK = $this->Tracking_model->get_total_menunggudisetujuiPPK();
		$jmlprosespengadaan = $this->Tracking_model->get_total_prosespengadaan();
		$jmltidakdisetujui = $this->Tracking_model->get_total_tidakdisetujui();
		$jmlselesaipengadaan = $this->Tracking_model->get_total_selesaipengadaan();
		if($this->session->userdata('id_position') == 1){ //posisi admin
			$form = $this->Form_model->get_all_detail();	
		}else if($this->session->userdata('id_position') == 3){ //posisi Kepala Bidang
			$form = $this->Form_model->get_by_user_div($this->session->userdata('id_division'));	
		}else if($this->session->userdata('id_position') == 5){ //posisi Kepala Bagian TU
			$form = $this->Form_model->get_by_user_acc_TU();	
		}else if($this->session->userdata('id_position') == 6){ //posisi Kepala PPK
			$form = $this->Form_model->get_by_user_acc_PPK();	

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
            'jmlmenunggudisetujuiKD'=> $jmlmenunggudisetujuiKD
        );
		
		//print_r($data);
		$this->load->view('header_login');
		$this->load->view('Main_login',$data);
		$this->load->view('footer');
	}

}