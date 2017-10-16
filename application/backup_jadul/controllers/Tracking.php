<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tracking extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tracking_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $tracking = $this->Tracking_model->get_all();

        $data = array(
            'tracking_data' => $tracking
        );

        $this->template->load('template','tracking_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tracking_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tracking' => $row->id_tracking,
		'id_status_tracking' => $row->id_status_tracking,
		'id_form' => $row->id_form,
	    );
            $this->template->load('template','tracking_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tracking'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tracking/create_action'),
	    'id_tracking' => set_value('id_tracking'),
	    'id_status_tracking' => set_value('id_status_tracking'),
	    'id_form' => set_value('id_form'),
	);
        $this->template->load('template','tracking_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_status_tracking' => $this->input->post('id_status_tracking',TRUE),
		'id_form' => $this->input->post('id_form',TRUE),
	    );

            $this->Tracking_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tracking'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tracking_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tracking/update_action'),
		'id_tracking' => set_value('id_tracking', $row->id_tracking),
		'id_status_tracking' => set_value('id_status_tracking', $row->id_status_tracking),
		'id_form' => set_value('id_form', $row->id_form),
	    );
            $this->template->load('template','tracking_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tracking'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tracking', TRUE));
        } else {
            $data = array(
		'id_status_tracking' => $this->input->post('id_status_tracking',TRUE),
		'id_form' => $this->input->post('id_form',TRUE),
	    );

            $this->Tracking_model->update($this->input->post('id_tracking', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tracking'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tracking_model->get_by_id($id);

        if ($row) {
            $this->Tracking_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tracking'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tracking'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_status_tracking', 'id status tracking', 'trim|required');
	$this->form_validation->set_rules('id_form', 'id form', 'trim|required');

	$this->form_validation->set_rules('id_tracking', 'id_tracking', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tracking.xls";
        $judul = "tracking";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Status Tracking");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Form");

	foreach ($this->Tracking_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_status_tracking);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_form);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tracking.doc");

        $data = array(
            'tracking_data' => $this->Tracking_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tracking_doc',$data);
    }

}

/* End of file Tracking.php */
/* Location: ./application/controllers/Tracking.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-17 10:10:06 */
/* http://harviacode.com */