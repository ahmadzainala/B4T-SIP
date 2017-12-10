<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Items_category extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Items_category_model');
    }

    public function index()
    {
        if($this->session->userdata('id_position')!=NULL && $this->session->userdata('id_position') == 1){        
            $items_category = $this->Items_category_model->get_all();

            $data = array(
                'items_category_data' => $items_category
            );

            $this->template->load('template','items_category_list', $data);
        }
    }

    public function read($id) 
    {
        $row = $this->Items_category_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_category' => $row->id_category,
		'name_category' => $row->name_category,
	    );
            $this->template->load('template','items_category_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items_category'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('items_category/create_action'),
	    'id_category' => set_value('id_category'),
	    'name_category' => set_value('name_category'),
	);
        $this->template->load('template','items_category_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name_category' => $this->input->post('name_category',TRUE),
	    );

            $this->Items_category_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('items_category'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Items_category_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('items_category/update_action'),
		'id_category' => set_value('id_category', $row->id_category),
		'name_category' => set_value('name_category', $row->name_category),
	    );
            $this->template->load('template','items_category_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items_category'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_category', TRUE));
        } else {
            $data = array(
		'name_category' => $this->input->post('name_category',TRUE),
	    );

            $this->Items_category_model->update($this->input->post('id_category', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('items_category'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Items_category_model->get_by_id($id);

        if ($row) {
            $this->Items_category_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('items_category'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items_category'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name_category', 'name category', 'trim|required');

	$this->form_validation->set_rules('id_category', 'id_category', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "items_category.xls";
        $judul = "items_category";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name Category");

	foreach ($this->Items_category_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name_category);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=items_category.doc");

        $data = array(
            'items_category_data' => $this->Items_category_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('items_category_doc',$data);
    }

}
