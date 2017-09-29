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

	public function error_login($data = NULL)
	{
		$temp = array(
            'data' => $data
        );
		$this->load->view('header');
		$this->load->view('main');
		$this->load->view('footer');
		$this->load->view('notification',$temp);
	}

	public function main_page()
	{
		if($this->session->userdata('id_position') == 1){
			$form = $this->Form_model->get_all_detail();	

		}else if($this->session->userdata('id_position') == 3){
			$form = $this->Form_model->get_by_user_div($this->session->userdata('id_division'));	

		}else{
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

	public function edit_profile()
	{
		$name_dp = $this->User_akun_model->get_name_div_pos($this->session->userdata('id_user'));
		//print_r($data);
		$data = array(
            'name_dp' => $name_dp
        );
		$this->load->view('header_login');
		$this->load->view('Edit_profile',$data);
		//$this->load->view('footer');
	}

	public function submit_profile()
	{
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$p1 = $_POST['ps1'];
		$p2 = $_POST['ps2'];
		if($first_name == ""){
			$first_name = $this->session->userdata('first_name');
		}else{
			$this->session->set_userdata('first_name',$first_name);
		}
		if($last_name == ""){
			$last_name = $this->session->userdata('last_name');
		}else{
			$this->session->set_userdata('last_name',$last_name);
		}

		if($p1 != ""){
			if($p1 == $p2){
				$pass = md5($p1);
				$data = array(
		            'first_name' => $first_name,
		            'last_name' => $last_name,
		            'password' => $pass,
		        );
	       		$this->User_akun_model->update($this->session->userdata('id_user'),$data);
		        redirect('login/edit_profile');
			}else{
				$name_dp = $this->User_akun_model->get_name_div_pos($this->session->userdata('id_user'));
				//print_r($data);
				$data = array(
		            'name_dp' => $name_dp,
		            'data' => 3
		        );
				$this->load->view('header_login');
				$this->load->view('Edit_profile',$data);
				$this->load->view('notification',$data);
				//$this->load->view('footer');
			}
		}else{
			$data = array(
	            'first_name' => $first_name,
	            'last_name' => $last_name,
	        );
	        $this->User_akun_model->update($this->session->userdata('id_user'),$data);
	        redirect('login/edit_profile');
		}
	}

	public function edit_item(){
		
		$this->load->model('Form_content_model');
		if($_POST['id_item_val'] != ""){
			
			if($_POST['qty_val'] != "" && $_POST['unit_val'] != ""){
				$data = array(
					'quantity' => $_POST['qty_val'],
					'unit' => $_POST['unit_val'],
			    );
				$this->Form_content_model->update($_POST['id_item_val'],$data);
			}
		}else{
			echo $_POST['unit'];
			echo $_POST['delete'];
			$this->Form_content_model->delete($_POST['delete']);
		}
		redirect('login/add_form');
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
					'unit' => $_POST['unit']
				    );
				
				$this->Form_content_model->insert($data);
				$this->session->set_userdata('category_item',NULL);
			}
		}

		if($this->session->userdata('id_form') == NULL){
			$this->Form_model->delete_useless_form();
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
			$data = array(
				'status_submit' => 1
			);
			//echo $this->session->userdata('id_form');
			$this->Form_model->update($this->session->userdata('id_form'),$data);

			if($this->session->userdata('id_position') == 3){
				$data = array(
					'read_status_Ketua' => 1
				);
				$this->Form_model->update($this->session->userdata('id_form'),$data);
			}
			
			$this->session->set_userdata('id_form',NULL);

			redirect('login/main_page');
		}else{
			redirect('Login/add_form');
			
		}
	}

	public function detail_form($id_form = NULL){
		
		$this->load->model('Form_content_model');
		$item_list = $this->Form_content_model->get_all_detail_by_form($id_form);
		$this->load->model('Division_model');
		$divisi = $this->Division_model->get_by_id($this->session->userdata('id_division'));
		$form_data = $this->Form_model->get_by_id($id_form);

		$data = array(
            'divisi' => $divisi,
            'form_data' => $form_data,
            'item_list' => $item_list
        );

		$this->load->view('header_login');
		$this->load->view('Form_view',$data);
	}

	public function form_acc($id_form = NULL){
		
		$form_data = $this->Form_model->get_by_id($id_form);
		if($this->session->userdata('id_position') == 3){
			$data = array(
	            'read_status_Ketua' => 1
	        );
			$this->Form_model->update($id_form,$data);
		}
		$user_data = $this->User_akun_model->get_by_id($form_data->id_user);
		$this->load->model('Division_model');
		$divisi = $this->Division_model->get_by_id($user_data->id_division);
		$this->load->model('Form_content_model');
		$item_list = $this->Form_content_model->get_all_detail_by_form($id_form);

		$data = array(
            'divisi' => $divisi,
            'form_data' => $form_data,
            'item_list' => $item_list,
            'user_data' => $user_data
        );

		$this->load->view('header_login');
		$this->load->view('Form_acc',$data);
	}

	public function validation()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    if ($this->form_validation->run() == FALSE) {
			redirect('Login/error_login/1');
	    } else {
	    	$user = $this->input->post('username');
    		$pass = md5($this->input->post('password'));
	    	$valid_user = $this->User_akun_model->get_data_user($user,$pass);
			
			if($valid_user == FALSE)
			{
				//$this->session->set_flashdata('error','Wrong Username / Password!');
				redirect('Login/error_login/2');
				//echo ">>$user----$pass";
			} else {
				// if the username and password is a match
				$this->session->set_userdata('id_user', $valid_user->id_user);
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('first_name', $valid_user->first_name);
				$this->session->set_userdata('last_name', $valid_user->last_name);
				$this->session->set_userdata('id_position', $valid_user->id_position);
				$this->session->set_userdata('id_division', $valid_user->id_division);
				
				switch($valid_user->password){
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