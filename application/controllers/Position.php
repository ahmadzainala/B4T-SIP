<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Position extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Position_model');
    }

    public function index()
    {
        if($this->session->userdata('id_position')!=NULL && $this->session->userdata('id_position') == 1){        
            $position = $this->Position_model->get_all();

            $data = array(
                'position_data' => $position
            );

            $this->template->load('template','position_list', $data);
        }
    }

    public function read($id) 
    {
        $row = $this->Position_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_position' => $row->id_position,
		'name_position' => $row->name_position,
	    );
            $this->template->load('template','position_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('position'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('position/create_action'),
	    'id_position' => set_value('id_position'),
	    'name_position' => set_value('name_position'),
	);
        $this->template->load('template','position_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name_position' => $this->input->post('name_position',TRUE),
	    );

            $this->Position_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('position'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Position_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('position/update_action'),
		'id_position' => set_value('id_position', $row->id_position),
		'name_position' => set_value('name_position', $row->name_position),
	    );
            $this->template->load('template','position_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('position'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_position', TRUE));
        } else {
            $data = array(
		'name_position' => $this->input->post('name_position',TRUE),
	    );

            $this->Position_model->update($this->input->post('id_position', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('position'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Position_model->get_by_id($id);

        if ($row) {
            $this->Position_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('position'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('position'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name_position', 'name position', 'trim|required');

	$this->form_validation->set_rules('id_position', 'id_position', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "position.xls";
        $judul = "position";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name Position");

	foreach ($this->Position_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name_position);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=position.doc");

        $data = array(
            'position_data' => $this->Position_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('position_doc',$data);
    }

}

