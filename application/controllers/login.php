<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
	    parent::__construct();
	    $this->load->model('User_akun_model');
	    $this->load->model('Form_model');
 	}

	public function index()
	{
		//index login
		if($this->session->userdata('username')== NULL){
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('footer');
		}else{
			redirect('Main');
		}
	}

	public function error_login()
	{
		//Ada error

		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
		$this->load->view('notification');
	}

	public function validation()
	{
		//Validation

		//Rule Form
		$this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    if ($this->form_validation->run() == FALSE) {
			//Form tidak terisi
			$this->session->set_flashdata('error','Incomplete Form Login!');
			redirect('Login/error_login');
	    } else {
	    	$user = $this->input->post('username');
    		$pass = md5($this->input->post('password'));
	    	$valid_user = $this->User_akun_model->get_data_user($user,$pass);
			
			//Cek user
			if($valid_user == FALSE)
			{
				//Tidak Valid
				$this->session->set_flashdata('error','Wrong Username / Password!');
				redirect('Login/error_login');
			} else {
				// Valid
				// Data user disimpan di session
				$this->session->set_userdata('id_user', $valid_user->id_user);
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('name', $valid_user->name);
				$this->session->set_userdata('id_position', $valid_user->id_position);
				$this->session->set_userdata('id_division', $valid_user->id_division);
				
				switch($valid_user->password){
					case "21232f297a57a5a743894a0e4a801fc3": //admin
				      	redirect('menu_admin');
						break;
					default: 
				      	redirect('Main');
						break; 
				}
			}  
	    }
	}

	public function logout()
	{
		//jika awalnya user membuat form namun tidak di submit
		if($this->session->userdata('id_form') != NULL){
			$temp = $this->Form_model->get_by_id($this->session->userdata('id_form'));
			if($temp->status_submit == 0){
				$this->load->model('Form_content_model');
				$this->Form_content_model->delete_by_form($this->session->userdata('id_form'));
				$this->Form_model->delete($this->session->userdata('id_form'));
			}
		}
		$this->session->sess_destroy();
		redirect('Login');
	}
}