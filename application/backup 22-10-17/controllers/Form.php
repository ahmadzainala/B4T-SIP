<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form extends CI_Controller
{
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Form_model');
        $this->load->library('form_validation');
    }

    // 1) Untuk Admin

    public function index()
    {
        $form = $this->Form_model->get_all();

        $data = array(
            'form_data' => $form
        );

        $this->template->load('template','form_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Form_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id_form' => $row->id_form,
    		'id_user' => $row->id_user,
    		'date' => $row->date,
    		'information' => $row->information,
    		'date_needs' => $row->date_needs,
    		'that' => $row->that,
    		'read_status_Ketua' => $row->read_status_Ketua,
    		'read_status_TU' => $row->read_status_TU,
    		'read_status_PPK' => $row->read_status_PPK,
    		'status_submit' => $row->status_submit,
    	    );
            $this->template->load('template','form_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('form'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('form/create_action'),
    	    'id_form' => set_value('id_form'),
    	    'id_user' => set_value('id_user'),
    	    'date' => set_value('date'),
    	    'information' => set_value('information'),
    	    'date_needs' => set_value('date_needs'),
    	    'that' => set_value('that'),
    	    'read_status_Ketua' => set_value('read_status_Ketua'),
    	    'read_status_TU' => set_value('read_status_TU'),
    	    'read_status_PPK' => set_value('read_status_PPK'),
    	    'status_submit' => set_value('status_submit'),
    	);
        $this->template->load('template','form_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'id_user' => $this->input->post('id_user',TRUE),
    		'date' => $this->input->post('date',TRUE),
    		'information' => $this->input->post('information',TRUE),
    		'date_needs' => $this->input->post('date_needs',TRUE),
    		'that' => $this->input->post('that',TRUE),
    		'read_status_Ketua' => $this->input->post('read_status_Ketua',TRUE),
    		'read_status_TU' => $this->input->post('read_status_TU',TRUE),
    		'read_status_PPK' => $this->input->post('read_status_PPK',TRUE),
    		'status_submit' => $this->input->post('status_submit',TRUE),
    	    );

            $this->Form_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('form'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Form_model->get_by_id($id);

        if ($row) {
            $data = array(
            'button' => 'Update',
            'action' => site_url('form/update_action'),
    		'id_form' => set_value('id_form', $row->id_form),
    		'id_user' => set_value('id_user', $row->id_user),
    		'date' => set_value('date', $row->date),
    		'information' => set_value('information', $row->information),
    		'date_needs' => set_value('date_needs', $row->date_needs),
    		'that' => set_value('that', $row->that),
    		'read_status_Ketua' => set_value('read_status_Ketua', $row->read_status_Ketua),
    		'read_status_TU' => set_value('read_status_TU', $row->read_status_TU),
    		'read_status_PPK' => set_value('read_status_PPK', $row->read_status_PPK),
    		'status_submit' => set_value('status_submit', $row->status_submit),
    	    );
            $this->template->load('template','form_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('form'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_form', TRUE));
        } else {
            $data = array(
    		'id_user' => $this->input->post('id_user',TRUE),
    		'date' => $this->input->post('date',TRUE),
    		'information' => $this->input->post('information',TRUE),
    		'date_needs' => $this->input->post('date_needs',TRUE),
    		'that' => $this->input->post('that',TRUE),
    		'read_status_Ketua' => $this->input->post('read_status_Ketua',TRUE),
    		'read_status_TU' => $this->input->post('read_status_TU',TRUE),
    		'read_status_PPK' => $this->input->post('read_status_PPK',TRUE),
    		'status_submit' => $this->input->post('status_submit',TRUE),
    	    );

            $this->Form_model->update($this->input->post('id_form', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('form'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Form_model->get_by_id($id);

        if ($row) {
            $this->Form_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('form'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('form'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('information', 'information', 'trim|required');
	$this->form_validation->set_rules('date_needs', 'date needs', 'trim|required');
	$this->form_validation->set_rules('that', 'that', 'trim|required');
	$this->form_validation->set_rules('read_status_Ketua', 'read status ketua', 'trim|required');
	$this->form_validation->set_rules('read_status_TU', 'read status tu', 'trim|required');
	$this->form_validation->set_rules('read_status_PPK', 'read status ppk', 'trim|required');
	$this->form_validation->set_rules('status_submit', 'status submit', 'trim|required');

	$this->form_validation->set_rules('id_form', 'id_form', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "form.xls";
        $judul = "form";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Id User");
        xlsWriteLabel($tablehead, $kolomhead++, "Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Information");
        xlsWriteLabel($tablehead, $kolomhead++, "Date Needs");
        xlsWriteLabel($tablehead, $kolomhead++, "That");
        xlsWriteLabel($tablehead, $kolomhead++, "Read Status Ketua");
        xlsWriteLabel($tablehead, $kolomhead++, "Read Status TU");
        xlsWriteLabel($tablehead, $kolomhead++, "Read Status PPK");
        xlsWriteLabel($tablehead, $kolomhead++, "Status Submit");

    	foreach ($this->Form_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->date);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->information);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->date_needs);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->that);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->read_status_Ketua);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->read_status_TU);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->read_status_PPK);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->status_submit);

    	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=form.doc");

        $data = array(
            'form_data' => $this->Form_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('form_doc',$data);
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
        redirect('Form/add_form');
    }
    // End Untuk Admin
    

    // 2) Untuk User
    public function add_form(){
        $that = "";
        $date_needs = "";
        $kategori = "";
        $items = "";
        $item_list = "";

        if(isset($_POST['add'])){

            $this->load->model('Items_category_model');
            $kategorinew = $this->Items_category_model->get_by_name($_POST['kategori']);
            if($kategorinew == NULL){
                $data = array(
                    'name_category' => $_POST['kategori'],
                    );
                $this->Items_category_model->insert($data);
                $kategorinew = $this->Items_category_model->get_by_name($_POST['kategori']);
            }

            $this->load->model('Items_detail_model');
            $itemnew = $this->Items_detail_model->get_by_name($_POST['item']);
            if($itemnew == NULL){
                $data = array(
                    'name_items' => $_POST['item'],
                    'id_category' => $kategorinew->id_category,
                    );
                $this->Items_detail_model->insert($data);
                $itemnew = $this->Items_detail_model->get_by_name($_POST['item']);
            }
            $this->load->model('Form_content_model');
            $cek = $this->Form_content_model->get_by_item_form($itemnew->id_items_detail,$this->session->userdata('id_form'));
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
                    'id_items_detail' => $itemnew->id_items_detail,
                    'quantity' => $_POST['quantity'],
                    'quantity_origin' => $_POST['quantity'],
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
                'information' => "",
                'date_needs' => "Segera",
                'that' => "",
                );

            $this->Form_model->insert($data);
            $form_data = $this->Form_model->get_by_user_now($this->session->userdata('id_user'));
            $this->session->set_userdata('id_form',$form_data->id_form);
        }else{
            $this->load->model('Form_content_model');
            $item_list = $this->Form_content_model->get_all_detail_by_form($this->session->userdata('id_form'));
        }

        if(isset($_POST["kategori"]) && $_POST['kategori'] != NULL){
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'information' => "",
                'date_needs' => $_POST['date_needs'],
                'that' => $_POST['that'],
                );

            $this->Form_model->update($this->session->userdata('id_form'),$data);
            $this->session->set_userdata('category_item',$_POST['kategori']);
            $form_data = $this->Form_model->get_by_user_now($this->session->userdata('id_user'));
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
        $form_data = $this->Form_model->get_by_id_new($this->session->userdata('id_form'));
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
        $this->load->model('User_akun_model');
        $pass = md5($_POST['password']);
        $valid_user = $this->User_akun_model->get_data_user($this->session->userdata('username'),$pass);

        $data = array(
            'id_user' => $this->session->userdata('id_user'),
            'information' => $_POST['information']
        );
        $this->Form_model->update($this->session->userdata('id_form'),$data);

        if($valid_user != FALSE){
            $this->load->model('Form_content_model');
            $item_list = $this->Form_content_model->get_all_detail_by_form($this->session->userdata('id_form'));
            if($item_list==NULL){
                $this->session->set_flashdata('error','Tidak ada barang yang dipesan!');
                $this->load->view('Notification');
                redirect('Form/add_form');
            }else{
                $this->load->model('Tracking_model');
                $this->load->model('Tracking_history_model');
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

                    $data2 = array(
                        'id_status_tracking' => 1,
                        'id_form' => $this->session->userdata('id_form'),
                    );
                    $this->Tracking_model->insert($data2);

                    $id_track = $this->Tracking_model->get_by_id_form($this->session->userdata('id_form'));
                    $data3 = array(
                        'id_tracking' => $id_track,
                        'id_user_acc' => $this->session->userdata('id_position'),
                        'date_acc' => date('Y-m-d'),
                        'acc' => 1,
                    );
                    $this->Tracking_history_model->insert($data3);
                }else{
                    $data2 = array(
                        'id_status_tracking' => 0,
                        'id_form' => $this->session->userdata('id_form'),
                    );
                    $this->Tracking_model->insert($data2);
                }
                
                $this->session->set_userdata('id_form',NULL);

                $this->session->set_flashdata('error','Berhasil mengirim formulir pengadaan.');
                $this->load->view('Notification');
                redirect('Main');
            }
        }else{
            $this->session->set_flashdata('error','Password Salah!');
            $this->load->view('Notification');
            redirect('Form/add_form');
            
        }
    }

    public function detail_form($id_form = NULL){
        
        $this->load->model('Form_content_model');
        $item_list = $this->Form_content_model->get_all_detail_by_form($id_form);
        $this->load->model('Division_model');
        $form_data = $this->Form_model->get_by_id($id_form);
        $divisi = $this->Division_model->get_by_id($form_data->id_division);
        $this->load->model('Tracking_model');
        $form_acc = $this->Tracking_model->get_by_id_tracking_TU($form_data->id_tracking);

        $data = array(
            'divisi' => $divisi,
            'form_data' => $form_data,
            'item_list' => $item_list,
            'form_acc' => $form_acc
        );

        $this->load->view('header_login');
        $this->load->view('Form_view',$data);
    }

    public function form_acc($id_form = NULL){
        $this->load->model('User_akun_model');
        $this->load->model('Tracking_model');
        $form_data = $this->Form_model->get_by_id($id_form);
        if($this->session->userdata('id_position') == 3){
            $data = array(
                'read_status_Ketua' => 1
            );
            $this->Form_model->update($id_form,$data);

            $id_track = $this->Tracking_model->get_by_id_form($id_form);
            $data = array(
                'id_status_tracking' => 10
            );
            $this->Tracking_model->update($id_track->id_tracking,$data);
            
            $this->load->model('Form_content_model');
            $item_list = $this->Form_content_model->get_all_detail_by_form($id_form);
        }else if($this->session->userdata('id_position') == 5){
            $data = array(
                'read_status_TU' => 1
            );
            $this->Form_model->update($id_form,$data);

            $id_track = $this->Tracking_model->get_by_id_form($id_form);
            $data = array(
                'id_status_tracking' => 11
            );
            $this->Tracking_model->update($id_track->id_tracking,$data);
       
            $this->load->model('Form_content_model');
            $item_list = $this->Form_content_model->get_all_detail_by_form_acc($id_form);
        }else if($this->session->userdata('id_position') == 6){
            $data = array(
                'read_status_PPK' => 1
            );
            $this->Form_model->update($id_form,$data);

            $id_track = $this->Tracking_model->get_by_id_form($id_form);
            $data = array(
                'id_status_tracking' => 12
            );
            $this->Tracking_model->update($id_track->id_tracking,$data);

            $this->load->model('Form_content_model');
            $item_list = $this->Form_content_model->get_all_detail_by_form_acc($id_form);
        }


        $user_data = $this->User_akun_model->get_by_id($form_data->id_user);
        $this->load->model('Division_model');
        $divisi = $this->Division_model->get_by_id($user_data->id_division);
        

        $data = array(
            'divisi' => $divisi,
            'form_data' => $form_data,
            'item_list' => $item_list,
            'user_data' => $user_data,
            'id_form' => $id_form
        );

        $this->load->view('header_login');
        $this->load->view('Form_acc',$data);
    }

    public function acc(){
        $this->load->model('Tracking_model');
        $this->load->model('Tracking_history_model');
        $this->load->model('Form_content_model');
        $item_list = $this->Form_content_model->get_all_detail_by_form($_POST['id_form']); 
        $stat = 0;

        foreach ($item_list as $item) {
            if(isset($_POST["$item->id_items_detail"]) && $_POST['status_acc'] == 1){
                $stat = 1;
            }
        }

        if($stat == 1 || $_POST['status_acc'] == 2){
            if($_POST['status_acc'] != 2){
                foreach ($item_list as $item) {
                    if(isset($_POST["$item->id_items_detail"]) && $_POST['status_acc'] == 1){
                        $data = array(
                            'quantity' => $_POST['qty'.$item->id_items_detail],
                            'status_acc' => 1,
                            );
                        $this->Form_content_model->update($item->id_form_content,$data);
                    }else{
                         $data = array(
                            'quantity' => 0,
                            'status_acc' => 0,
                            );
                        $this->Form_content_model->update($item->id_form_content,$data);
                    }
                }
            }
            
            if($this->session->userdata('id_position') == 3){
                $id_track = $this->Tracking_model->get_by_id_form($_POST['id_form']);
                if($_POST['status_acc'] == 1){
                    $data = array(
                        'id_status_tracking' => 1
                    );
                }else if($_POST['status_acc'] == 2){
                    $data = array(
                        'id_status_tracking' => 6
                    );
                }else{
                    $data = array(
                        'id_status_tracking' => 4
                    );
                }
                $this->Tracking_model->update($id_track->id_tracking,$data);

                $data2 = array(
                    'id_tracking' => $id_track->id_tracking,
                    'id_user_acc' => $this->session->userdata('id_position'),
                    'date_acc' => date('Y-m-d'),
                    'acc' => $_POST['status_acc'],
                );
                $this->Tracking_history_model->insert($data2);

                $data3 = array(
                    'information_kabid' => $_POST['keterangan']
                );
                $this->Form_model->update($_POST['id_form'],$data3);
            }else if($this->session->userdata('id_position') == 5){
                $id_track = $this->Tracking_model->get_by_id_form($_POST['id_form']);
                if($_POST['status_acc'] == 1){
                    $data = array(
                        'id_status_tracking' => 2
                    );
                }else if($_POST['status_acc'] == 2){
                    $data = array(
                        'id_status_tracking' => 6
                    );
                }else{
                    $data = array(
                        'id_status_tracking' => 4
                    );
                }
                $this->Tracking_model->update($id_track->id_tracking,$data);

                $data2 = array(
                    'id_tracking' => $id_track->id_tracking,
                    'id_user_acc' => $this->session->userdata('id_position'),
                    'date_acc' => date('Y-m-d'),
                    'acc' => $_POST['status_acc'],
                );
                $this->Tracking_history_model->insert($data2);

                $data3 = array(
                    'information_TU' => $_POST['keterangan']
                );
                $this->Form_model->update($_POST['id_form'],$data3);
            }
            else if($this->session->userdata('id_position') == 6){
                $id_track = $this->Tracking_model->get_by_id_form($_POST['id_form']);
                if($_POST['status_acc'] == 1){
                    $data = array(
                        'id_status_tracking' => 3
                    );
                }else if($_POST['status_acc'] == 2){
                    $data = array(
                        'id_status_tracking' => 6
                    );
                }else{
                    $data = array(
                        'id_status_tracking' => 4
                    );
                }
                $this->Tracking_model->update($id_track->id_tracking,$data);

                $data2 = array(
                    'id_tracking' => $id_track->id_tracking,
                    'id_user_acc' => $this->session->userdata('id_position'),
                    'date_acc' => date('Y-m-d'),
                    'acc' => $_POST['status_acc'],
                );
                $this->Tracking_history_model->insert($data2);

                $data3 = array(
                    'information_PPK' => $_POST['keterangan']
                );
                $this->Form_model->update($_POST['id_form'],$data3);
            }
            $this->session->set_flashdata('error','Anda berhasil menyetujui pengadaan barang.');
            $this->load->view('Notification');
            redirect('Main');
        }else{
            redirect('Form/Form_acc/'.$_POST['id_form']);
        }
    }

    public function edit_form($id_form = NULL){
        $this->session->set_userdata('id_form',$id_form);
        $that = "";
        $date_needs = "";
        $kategori = "";
        $items = "";
        $item_list = "";

        if(isset($_POST['add'])){

            $this->load->model('Items_category_model');
            $kategorinew = $this->Items_category_model->get_by_name($_POST['kategori']);
            if($kategorinew == NULL){
                $data = array(
                    'name_category' => $_POST['kategori'],
                    );
                $this->Items_category_model->insert($data);
                $kategorinew = $this->Items_category_model->get_by_name($_POST['kategori']);
            }

            $this->load->model('Items_detail_model');
            $itemnew = $this->Items_detail_model->get_by_name($_POST['item']);
            if($itemnew == NULL){
                $data = array(
                    'name_items' => $_POST['item'],
                    'id_category' => $kategorinew->id_category,
                    );
                $this->Items_detail_model->insert($data);
                $itemnew = $this->Items_detail_model->get_by_name($_POST['item']);
            }
            $this->load->model('Form_content_model');
            $cek = $this->Form_content_model->get_by_item_form($itemnew->id_items_detail,$this->session->userdata('id_form'));
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
                    'id_items_detail' => $itemnew->id_items_detail,
                    'quantity' => $_POST['quantity'],
                    'quantity_origin' => $_POST['quantity'],
                    'unit' => $_POST['unit']
                    );
                
                $this->Form_content_model->insert($data);
                $this->session->set_userdata('category_item',NULL);
            }
        }

        $this->load->model('Form_content_model');
        $item_list = $this->Form_content_model->get_all_detail_by_form($this->session->userdata('id_form'));

        if(isset($_POST["kategori"]) && $_POST['kategori'] != NULL){
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'information' => "",
                'date_needs' => $_POST['date_needs'],
                'that' => $_POST['that'],
                );

            $this->Form_model->update($this->session->userdata('id_form'),$data);
            $this->session->set_userdata('category_item',$_POST['kategori']);
            $form_data = $this->Form_model->get_by_user_now($this->session->userdata('id_user'));
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
        $form_data = $this->Form_model->get_by_id_new($this->session->userdata('id_form'));
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

    public function autocompleteCat(){
        $this->load->model('Items_category_model');
        $term = trim(strip_tags($_GET['term']));
        //$term = trim("a");
 
        
        //query database untuk mengecek tabel Country 
        $result = $this->Items_category_model->get_like($term);
        
        foreach ($result as $row) {
            $data['value']=htmlentities(stripslashes($row->name_category));
            $data['id']=(int)$row->id_category;
        //buat array yang nantinya akan di konversi ke json
            $row_set[] = $data;
        }

        //data hasil query yang dikirim kembali dalam format json
        echo json_encode($row_set);
    }

    public function autocompleteItems($kategori = NULL){
        $this->load->model('Items_detail_model');
        $term = trim(strip_tags($_GET['term']));
        //$term = trim("p");
        //$kategori = "ATK";
 
        
        //query database untuk mengecek tabel Country 
        $result = $this->Items_detail_model->get_like($term,$kategori);
        
        foreach ($result as $row) {
            $data['value']=htmlentities(stripslashes($row->name_items));
            $data['id']=(int)$row->id_items_detail;
        //buat array yang nantinya akan di konversi ke json
            $row_set[] = $data;
        }

        //data hasil query yang dikirim kembali dalam format json
        echo json_encode($row_set);
    }

    public function autocompleteCat2($item = NULL){
        $this->load->model('Items_category_model');
       
        //query database untuk mengecek tabel Country 
        $result = $this->Items_category_model->get_id_category_by_item_name($item);
        if($result != NULL){
            $data['value']=htmlentities(stripslashes($result->name_category));
            echo json_encode($data);
        }else{
            $this->autocompleteCat();
        }
    }

}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-27 09:48:51 */
/* http://harviacode.com */