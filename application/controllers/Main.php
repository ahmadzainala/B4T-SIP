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

		if($this->session->userdata('id_division') == 5){
				$form = $this->Form_model->get_by_user_pengadaan();
				$jmlunread = $this->Tracking_model->get_total_prosespengadaan_unread($this->session->userdata('id_division'));
				$jmlaction = $this->Tracking_model->get_total_prosespengadaan_action($this->session->userdata('id_division'));
				$jmldone = $this->Tracking_model->get_total_prosespengadaan_done($this->session->userdata('id_division'));
				
				
				$data = array(
		            'form_data' => $form,
		            'jmlunread' => $jmlunread,
		            'jmldone' => $jmldone,
		            'jmlaction' => $jmlaction,
		        );	
			}else{
			if($this->session->userdata('id_position') == 1){ //posisi admin
				$form = $this->Form_model->get_all_form_detail();
				$jmlmenunggudisetujui = $this->Tracking_model->get_total_menunggudisetujui_all();
				$jmlmenunggudisetujuiKD = $this->Tracking_model->get_total_menunggudisetujuiKD_admin();
				$jmlmenunggudisetujuiTU = $this->Tracking_model->get_total_menunggudisetujuiTU_admin();
				$jmlmenunggudisetujuiPPK = $this->Tracking_model->get_total_menunggudisetujuiPPK_admin();
				$jmlprosespengadaan = $this->Tracking_model->get_total_prosespengadaan_admin();
				$jmltidakdisetujui = $this->Tracking_model->get_total_tidakdisetujui_admin();
				$jmlverifikasi = $this->Tracking_model->get_total_verifikasi_admin();
				$jmlselesaipengadaan = $this->Tracking_model->get_total_selesaipengadaan_admin();
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
			}else if($this->session->userdata('id_position') == 3){ //posisi Kepala Bidang
				$form = $this->Form_model->get_by_user_div($this->session->userdata('id_division'));
				$jmlunread = $this->Tracking_model->get_total_menunggudisetujuiKD_unread($this->session->userdata('id_division'));
				$jmlaction = $this->Tracking_model->get_total_menunggudisetujuiKD_action($this->session->userdata('id_division'));
				$jmlaccept = $this->Tracking_model->get_total_menunggudisetujuiKD_accept($this->session->userdata('id_division'));
				$jmlreject = $this->Tracking_model->get_total_menunggudisetujuiKD_reject($this->session->userdata('id_division'));
				
				$data = array(
		            'form_data' => $form,
		            'jmlunread' => $jmlunread,
		            'jmlaccept' => $jmlaccept,
		            'jmlaction' => $jmlaction,
		            'jmlreject' => $jmlreject,
		        );	
			}else if($this->session->userdata('id_position') == 5){ //posisi Kepala Bagian TU
				$form = $this->Form_model->get_by_user_acc_TU();
				$jmlunread = $this->Tracking_model->get_total_menunggudisetujuiTU_unread();
				$jmlaction = $this->Tracking_model->get_total_menunggudisetujuiTU_action();
				$jmlaccept = $this->Tracking_model->get_total_menunggudisetujuiTU_accept();
				$jmlreject = $this->Tracking_model->get_total_menunggudisetujuiTU_reject();
				
				$data = array(
		            'form_data' => $form,
		            'jmlunread' => $jmlunread,
		            'jmlaccept' => $jmlaccept,
		            'jmlaction' => $jmlaction,
		            'jmlreject' => $jmlreject,
		        );
			}else if($this->session->userdata('id_position') == 6){ //posisi Kepala PPK
				if($this->session->userdata('id_division') == 3){ //RM
					$form = $this->Form_model->get_by_user_acc_PPKRM();
					$jmlunread = $this->Tracking_model->get_total_menunggudisetujuiPPKRM_unread();
					$jmlaction = $this->Tracking_model->get_total_menunggudisetujuiPPKRM_action();
					$jmlaccept = $this->Tracking_model->get_total_menunggudisetujuiPPKRM_accept();
					$jmlreject = $this->Tracking_model->get_total_menunggudisetujuiPPKRM_reject();
					
					$data = array(
			            'form_data' => $form,
			            'jmlunread' => $jmlunread,
			            'jmlaccept' => $jmlaccept,
			            'jmlaction' => $jmlaction,
			            'jmlreject' => $jmlreject,
			        );
				}else{
					$form = $this->Form_model->get_by_user_acc_PPKBLU();
					$jmlunread = $this->Tracking_model->get_total_menunggudisetujuiPPKBLU_unread();
					$jmlaction = $this->Tracking_model->get_total_menunggudisetujuiPPKBLU_action();
					$jmlaccept = $this->Tracking_model->get_total_menunggudisetujuiPPKBLU_accept();
					$jmlreject = $this->Tracking_model->get_total_menunggudisetujuiPPKBLU_reject();
					
					$data = array(
			            'form_data' => $form,
			            'jmlunread' => $jmlunread,
			            'jmlaccept' => $jmlaccept,
			            'jmlaction' => $jmlaction,
			            'jmlreject' => $jmlreject,
			        );
				}
			}else{ //posisi selain kepala
				$form = $this->Form_model->get_by_user($this->session->userdata('id_user'));
				$jmlmenunggudisetujui = $this->Tracking_model->get_total_menunggudisetujui($this->session->userdata('id_user'));
				$jmlmenunggudisetujuiKD = $this->Tracking_model->get_total_menunggudisetujuiKD($this->session->userdata('id_user'));
				$jmlmenunggudisetujuiTU = $this->Tracking_model->get_total_menunggudisetujuiTU($this->session->userdata('id_user'));
				$jmlmenunggudisetujuiPPK = $this->Tracking_model->get_total_menunggudisetujuiPPK($this->session->userdata('id_user'));
				$jmlprosespengadaan = $this->Tracking_model->get_total_prosespengadaan($this->session->userdata('id_user'));
				$jmltidakdisetujui = $this->Tracking_model->get_total_tidakdisetujui($this->session->userdata('id_user'));
				$jmlverifikasi = $this->Tracking_model->get_total_verifikasi($this->session->userdata('id_user'));
				$jmlselesaipengadaan = $this->Tracking_model->get_total_selesaipengadaan($this->session->userdata('id_user'));
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
			}
		}

		
		
		//print_r($data);
		$this->load->view('Header_login');
		$this->load->view('Main_login',$data);
		$this->load->view('Footer');
		
	}

	public function panduan(){
		if($this->session->userdata('id_user')!=Null){
			$this->load->view('Header_login');
			$this->load->view('Panduan');
			$this->load->view('Footer');
		}else{
			$this->load->view('Header');
			$this->load->view('Panduan');
		}
		//
	}

}
