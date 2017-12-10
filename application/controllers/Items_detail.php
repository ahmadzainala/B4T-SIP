<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Items_detail extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Items_detail_model');
    }

    public function index()
    {
        if($this->session->userdata('id_position')!=NULL && $this->session->userdata('id_position') == 1){        
            $items_detail = $this->Items_detail_model->get_all_detail();

            $data = array(
                'items_detail_data' => $items_detail
            );

            $this->template->load('template','items_detail_list', $data);
        }
    }

    public function read($id) 
    {
        $row = $this->Items_detail_model->get_by_id_detail($id);
        if ($row) {
            $data = array(
		'id_items_detail' => $row->id_items_detail,
		'name_category' => $row->name_category,
		'name_items' => $row->name_items,
	    );
            $this->template->load('template','items_detail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items_detail'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('items_detail/create_action'),
	    'id_items_detail' => set_value('id_items_detail'),
	    'id_category' => set_value('id_category'),
	    'name_items' => set_value('name_items'),
	);
        $this->template->load('template','items_detail_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_category' => $this->input->post('id_category',TRUE),
		'name_items' => $this->input->post('name_items',TRUE),
	    );

            $this->Items_detail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('items_detail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Items_detail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('items_detail/update_action'),
		'id_items_detail' => set_value('id_items_detail', $row->id_items_detail),
		'id_category' => set_value('id_category', $row->id_category),
		'name_items' => set_value('name_items', $row->name_items),
	    );
            $this->template->load('template','items_detail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items_detail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_items_detail', TRUE));
        } else {
            $data = array(
		'id_category' => $this->input->post('id_category',TRUE),
		'name_items' => $this->input->post('name_items',TRUE),
	    );

            $this->Items_detail_model->update($this->input->post('id_items_detail', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('items_detail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Items_detail_model->get_by_id($id);

        if ($row) {
            $this->Items_detail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('items_detail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('items_detail'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_category', 'id category', 'trim|required');
	$this->form_validation->set_rules('name_items', 'name items', 'trim|required');

	$this->form_validation->set_rules('id_items_detail', 'id_items_detail', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "items_detail.xls";
        $judul = "items_detail";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name Items");

	foreach ($this->Items_detail_model->get_all_detail() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_category);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name_items);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=items_detail.doc");

        $data = array(
            'items_detail_data' => $this->Items_detail_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('items_detail_doc',$data);
    }

}

