<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct() {
	    parent::__construct();
	    $this->load->model('User_akun_model');
	    $this->load->model('Form_model');
 	}

	public function index()
	{

		$this->load->view('header');
		$this->load->view('main');
		$this->load->view('footer');
	}

	public function error_login()
	{
		$this->load->view('header');
		$this->load->view('notification');
		$this->load->view('main');
		$this->load->view('footer');
	}

	public function main_page()
	{
		$form = $this->Form_model->get_by_user($this->session->userdata('id_user'));
		$data = array(
            'form_data' => $form
        );
		
		//print_r($data);
		$this->load->view('header_login');
		$this->load->view('Main_login',$data);
		$this->load->view('footer');
	}

	public function add_form(){
		$that = "";
		$date_needs = "";
		$kategori = "";
		$items = "";
		$item_list = "";
		
		if(isset($_POST['add'])){
			$this->load->model('Form_content_model');
			$cek = $this->Form_content_model->get_by_item_quantity_form($_POST['item'],$_POST['quantity'],$this->session->userdata('id_form'));
			if($cek == 0){
				$data = array(
					'id_user' => $this->session->userdata('id_user'),
					'date' => date("Y-m-d"),
					'information' => "",
					'date_needs' => $_POST['date_needs'],
					'that' => $_POST['that'],
				    );
				$this->Form_model->update($this->session->userdata('id_form'),$data);

				$data = array(
					'id_form' => $this->session->userdata('id_form'),
					'id_items_detail' => $_POST['item'],
					'quantity' => $_POST['quantity'],
				    );
				
				$this->Form_content_model->insert($data);
				$this->session->set_userdata('category_item',NULL);
			}
		}

		if($this->session->userdata('id_form') == NULL){
			$data = array(
				'id_user' => $this->session->userdata('id_user'),
				'date' => date("Y-m-d"),
				'information' => "",
				'date_needs' => "Segera",
				'that' => "",
			    );

            $this->Form_model->insert($data);
			$form_data = $this->Form_model->get_by_user_now($this->session->userdata('id_user'),date("Y-m-d"));
			$this->session->set_userdata('id_form',$form_data->id_form);
		}else{
			$this->load->model('Form_content_model');
			$item_list = $this->Form_content_model->get_all_detail_by_form($this->session->userdata('id_form'));
		}

		if(isset($_POST["kategori"]) && $_POST['kategori'] != NULL){
			$data = array(
				'id_user' => $this->session->userdata('id_user'),
				'date' => date("Y-m-d"),
				'information' => "",
				'date_needs' => $_POST['date_needs'],
				'that' => $_POST['that'],
			    );

            $this->Form_model->update($this->session->userdata('id_form'),$data);
			$this->session->set_userdata('category_item',$_POST['kategori']);
            $form_data = $this->Form_model->get_by_user_now($this->session->userdata('id_user'),date("Y-m-d"));
		}

		$this->load->model('Items_category_model');
		$kategori = $this->Items_category_model->get_all();
		
		if($this->session->userdata('category_item') == NULL){	
			$items = "";
		}else{
			$this->load->model('Items_detail_model');
			$items = $this->Items_detail_model->get_by_category($this->session->userdata('category_item'));
		}
		
		$this->load->model('Division_model');
		$divisi = $this->Division_model->get_by_id($this->session->userdata('id_division'));
		$form_data = $this->Form_model->get_by_id($this->session->userdata('id_form'));
		$data = array(
            'data_kategori' => $kategori,
            'data_item' => $items,
            'divisi' => $divisi,
            'form_data' => $form_data,
            'item_list' => $item_list
        );

       //echo $this->session->userdata('id_form');
		
		$this->load->view('header_login');
		$this->load->view('Form_submit',$data);
		$this->load->view('footer');
	}

	public function submit_form(){
		$pass = md5($_POST['password']);
		$valid_user = $this->User_akun_model->get_data_user($this->session->userdata('username'),$pass);

		$data = array(
			'id_user' => $this->session->userdata('id_user'),
			'date' => date("Y-m-d"),
			'information' => $_POST['information']
		);
		$this->Form_model->update($this->session->userdata('id_form'),$data);

		if($valid_user != FALSE){
			$this->session->set_userdata('id_form',NULL);

			$form = $this->Form_model->get_by_user($this->session->userdata('id_user'));
			$data = array(
	            'form_data' => $form
	        );
		
			//print_r($data);
			$this->load->view('header_login');
			$this->load->view('Main_login',$data);
			$this->load->view('footer');
		}else{
			redirect('Login/add_form');
			
		}
	}

	public function validation()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    if ($this->form_validation->run() == FALSE) {
			redirect('Login/error_login');
	    } else {
	    	$user = $this->input->post('username');
    		$pass = md5($this->input->post('password'));
	    	$valid_user = $this->User_akun_model->get_data_user($user,$pass);
			
			if($valid_user == FALSE)
			{
				//$this->session->set_flashdata('error','Wrong Username / Password!');
				redirect('Login/error_login');
				//echo ">>$user----$pass";
			} else {
				// if the username and password is a match
				$this->session->set_userdata('id_user', $valid_user->id_user);
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('first_name', $valid_user->first_name);
				$this->session->set_userdata('last_name', $valid_user->last_name);
				$this->session->set_userdata('id_position', $valid_user->id_position);
				$this->session->set_userdata('id_division', $valid_user->id_division);
				
				switch(md5($valid_user->password)){
					case "21232f297a57a5a743894a0e4a801fc3": //admin
				      	redirect('menu_admin'); 
						//print_r($valid_user);
						break;
					default: 
				      	redirect('Login/main_page');
						break; 
				}
			}  
	    }
	}

	public function logout()
	{
		if($this->session->userdata('id_form') != NULL){
			$this->load->model('Form_content_model');
			$this->Form_content_model->delete_by_form($this->session->userdata('id_form'));
			$this->Form_model->delete($this->session->userdata('id_form'));
		}
		$this->session->sess_destroy();
		redirect('Login');
	}
}