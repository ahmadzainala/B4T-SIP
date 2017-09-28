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

}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-27 09:48:51 */
/* http://harviacode.com */