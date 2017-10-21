<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Source_budget extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Source_budget_model');
    }

    public function index()
    {
        $source_budget = $this->Source_budget_model->get_all();

        $data = array(
            'source_budget_data' => $source_budget
        );

        $this->template->load('template','source_budget_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Source_budget_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_budget' => $row->id_budget,
		'name_source' => $row->name_source,
	    );
            $this->template->load('template','source_budget_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('source_budget'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('source_budget/create_action'),
	    'id_budget' => set_value('id_budget'),
	    'name_source' => set_value('name_source'),
	);
        $this->template->load('template','source_budget_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name_source' => $this->input->post('name_source',TRUE),
	    );

            $this->Source_budget_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('source_budget'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Source_budget_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('source_budget/update_action'),
		'id_budget' => set_value('id_budget', $row->id_budget),
		'name_source' => set_value('name_source', $row->name_source),
	    );
            $this->template->load('template','source_budget_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('source_budget'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_budget', TRUE));
        } else {
            $data = array(
		'name_source' => $this->input->post('name_source',TRUE),
	    );

            $this->Source_budget_model->update($this->input->post('id_budget', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('source_budget'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Source_budget_model->get_by_id($id);

        if ($row) {
            $this->Source_budget_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('source_budget'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('source_budget'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name_source', 'name source', 'trim|required');

	$this->form_validation->set_rules('id_budget', 'id_budget', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "source_budget.xls";
        $judul = "source_budget";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name Source");

	foreach ($this->Source_budget_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name_source);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=source_budget.doc");

        $data = array(
            'source_budget_data' => $this->Source_budget_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('source_budget_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'source_budget_data' => $this->Source_budget_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('source_budget_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('source_budget.pdf', 'D'); 
    }

}

/* End of file Source_budget.php */
/* Location: ./application/controllers/Source_budget.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-22 00:47:45 */
/* http://harviacode.com */