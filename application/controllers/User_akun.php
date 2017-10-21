<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_akun extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_akun_model');
    }

    public function index()
    {
        $user_akun = $this->User_akun_model->get_all();

        $data = array(
            'user_akun_data' => $user_akun
        );

        $this->template->load('template','user_akun_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_akun_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'username' => $row->username,
		'password' => $row->password,
		'name' => $row->name,
		'id_position' => $row->id_position,
		'id_division' => $row->id_division,
	    );
            $this->template->load('template','user_akun_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_akun'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user_akun/create_action'),
	    'id_user' => set_value('id_user'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'name' => set_value('name'),
	    'id_position' => set_value('id_position'),
	    'id_division' => set_value('id_division'),
	);
        $this->template->load('template','user_akun_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'name' => $this->input->post('name',TRUE),
		'id_position' => $this->input->post('id_position',TRUE),
		'id_division' => $this->input->post('id_division',TRUE),
	    );

            $this->User_akun_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user_akun'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_akun_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user_akun/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'name' => set_value('name', $row->name),
		'id_position' => set_value('id_position', $row->id_position),
		'id_division' => set_value('id_division', $row->id_division),
	    );
            $this->template->load('template','user_akun_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_akun'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'name' => $this->input->post('name',TRUE),
		'id_position' => $this->input->post('id_position',TRUE),
		'id_division' => $this->input->post('id_division',TRUE),
	    );

            $this->User_akun_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user_akun'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_akun_model->get_by_id($id);

        if ($row) {
            $this->User_akun_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user_akun'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_akun'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('id_position', 'id position', 'trim|required');
	$this->form_validation->set_rules('id_division', 'id division', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user_akun.xls";
        $judul = "user_akun";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Position");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Division");

	foreach ($this->User_akun_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_position);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_division);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user_akun.doc");

        $data = array(
            'user_akun_data' => $this->User_akun_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('user_akun_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'user_akun_data' => $this->User_akun_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('user_akun_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('user_akun.pdf', 'D'); 
    }

     // 2) Untuk User
    public function edit_profile()
    {
        $name_dp = $this->User_akun_model->get_name_div_pos($this->session->userdata('id_user'));
        //print_r($data);
        $data = array(
            'name_dp' => $name_dp
        );
        $this->load->view('header_login');
        //$this->load->view('edit_profile_ranggi');
        $this->load->view('Edit_profile',$data);
        //$this->load->view('footer');
    }

    public function submit_profile()
    {
        $name = $_POST['name'];
        $name = $_POST['name'];
        $p1 = $_POST['ps1'];
        $p2 = $_POST['ps2'];
        if($name == ""){
            $name = $this->session->userdata('name');
        }else{
            $this->session->set_userdata('name',$name);
        }
        if($name == ""){
            $name = $this->session->userdata('name');
        }else{
            $this->session->set_userdata('name',$name);
        }

        if($p1 != ""){
            if($p1 == $p2){
                $pass = md5($p1);
                $data = array(
                    'name' => $name,
                    'name' => $name,
                    'password' => $pass,
                );
                $this->User_akun_model->update($this->session->userdata('id_user'),$data);
                redirect('User_akun/edit_profile');
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
                'name' => $name,
                'name' => $name,
            );
            $this->User_akun_model->update($this->session->userdata('id_user'),$data);
            redirect('User_akun/edit_profile');
        }
    }

}

/* End of file User_akun.php */
/* Location: ./application/controllers/User_akun.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-22 00:47:45 */
/* http://harviacode.com */