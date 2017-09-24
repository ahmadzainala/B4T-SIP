<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Division extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Division_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $division = $this->Division_model->get_all();

        $data = array(
            'division_data' => $division
        );

        $this->template->load('template','division_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Division_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_divison' => $row->id_divison,
		'name_division' => $row->name_division,
	    );
            $this->template->load('template','division_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('division'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('division/create_action'),
	    'id_divison' => set_value('id_divison'),
	    'name_division' => set_value('name_division'),
	);
        $this->template->load('template','division_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name_division' => $this->input->post('name_division',TRUE),
	    );

            $this->Division_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('division'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Division_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('division/update_action'),
		'id_divison' => set_value('id_divison', $row->id_divison),
		'name_division' => set_value('name_division', $row->name_division),
	    );
            $this->template->load('template','division_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('division'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_divison', TRUE));
        } else {
            $data = array(
		'name_division' => $this->input->post('name_division',TRUE),
	    );

            $this->Division_model->update($this->input->post('id_divison', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('division'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Division_model->get_by_id($id);

        if ($row) {
            $this->Division_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('division'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('division'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name_division', 'name division', 'trim|required');

	$this->form_validation->set_rules('id_divison', 'id_divison', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "division.xls";
        $judul = "division";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name Division");

	foreach ($this->Division_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name_division);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=division.doc");

        $data = array(
            'division_data' => $this->Division_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('division_doc',$data);
    }

}

/* End of file Division.php */
/* Location: ./application/controllers/Division.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-17 10:09:03 */
/* http://harviacode.com */