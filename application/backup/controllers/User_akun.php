<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_akun extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_akun_model');
        $this->load->library('form_validation');
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
		'first_name' => $row->first_name,
		'last_name' => $row->last_name,
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
	    'first_name' => set_value('first_name'),
	    'last_name' => set_value('last_name'),
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
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
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
		'first_name' => set_value('first_name', $row->first_name),
		'last_name' => set_value('last_name', $row->last_name),
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
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
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
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
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
	xlsWriteLabel($tablehead, $kolomhead++, "First Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Last Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Position");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Division");

	foreach ($this->User_akun_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->first_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->last_name);
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

}

/* End of file User_akun.php */
/* Location: ./application/controllers/User_akun.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-17 10:10:18 */
/* http://harviacode.com */