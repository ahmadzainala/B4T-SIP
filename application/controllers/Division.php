<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Division extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Division_model');
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
		'id_division' => $row->id_division,
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
	    'id_division' => set_value('id_division'),
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
		'id_division' => set_value('id_division', $row->id_division),
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
            $this->update($this->input->post('id_division', TRUE));
        } else {
            $data = array(
		'name_division' => $this->input->post('name_division',TRUE),
	    );

            $this->Division_model->update($this->input->post('id_division', TRUE), $data);
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

	$this->form_validation->set_rules('id_division', 'id_division', 'trim');
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

    function pdf()
    {
         $data = array(
            'division_data' => $this->Division_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('division_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('division.pdf', 'D'); 
    }

}

/* End of file Division.php */
/* Location: ./application/controllers/Division.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-22 00:47:45 */
/* http://harviacode.com */