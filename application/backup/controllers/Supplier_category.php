<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier_category extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_category_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $supplier_category = $this->Supplier_category_model->get_all();

        $data = array(
            'supplier_category_data' => $supplier_category
        );

        $this->template->load('template','supplier_category_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Supplier_category_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_supplier_category' => $row->id_supplier_category,
		'id_category' => $row->id_category,
	    );
            $this->template->load('template','supplier_category_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier_category'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('supplier_category/create_action'),
	    'id_supplier_category' => set_value('id_supplier_category'),
	    'id_category' => set_value('id_category'),
	);
        $this->template->load('template','supplier_category_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_category' => $this->input->post('id_category',TRUE),
	    );

            $this->Supplier_category_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('supplier_category'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Supplier_category_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('supplier_category/update_action'),
		'id_supplier_category' => set_value('id_supplier_category', $row->id_supplier_category),
		'id_category' => set_value('id_category', $row->id_category),
	    );
            $this->template->load('template','supplier_category_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier_category'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_supplier_category', TRUE));
        } else {
            $data = array(
		'id_category' => $this->input->post('id_category',TRUE),
	    );

            $this->Supplier_category_model->update($this->input->post('id_supplier_category', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('supplier_category'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Supplier_category_model->get_by_id($id);

        if ($row) {
            $this->Supplier_category_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('supplier_category'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('supplier_category'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_category', 'id category', 'trim|required');

	$this->form_validation->set_rules('id_supplier_category', 'id_supplier_category', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "supplier_category.xls";
        $judul = "supplier_category";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Category");

	foreach ($this->Supplier_category_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_category);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=supplier_category.doc");

        $data = array(
            'supplier_category_data' => $this->Supplier_category_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('supplier_category_doc',$data);
    }

}

/* End of file Supplier_category.php */
/* Location: ./application/controllers/Supplier_category.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-17 10:10:01 */
/* http://harviacode.com */