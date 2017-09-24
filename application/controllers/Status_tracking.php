<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Status_tracking extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Status_tracking_model');
        
    }

    public function index()
    {
        $status_tracking = $this->Status_tracking_model->get_all();

        $data = array(
            'status_tracking_data' => $status_tracking
        );

        $this->template->load('template','status_tracking_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Status_tracking_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_status_tracking' => $row->id_status_tracking,
		'description' => $row->description,
	    );
            $this->template->load('template','status_tracking_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status_tracking'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('status_tracking/create_action'),
	    'id_status_tracking' => set_value('id_status_tracking'),
	    'description' => set_value('description'),
	);
        $this->template->load('template','status_tracking_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Status_tracking_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('status_tracking'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Status_tracking_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('status_tracking/update_action'),
		'id_status_tracking' => set_value('id_status_tracking', $row->id_status_tracking),
		'description' => set_value('description', $row->description),
	    );
            $this->template->load('template','status_tracking_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status_tracking'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_status_tracking', TRUE));
        } else {
            $data = array(
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Status_tracking_model->update($this->input->post('id_status_tracking', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('status_tracking'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Status_tracking_model->get_by_id($id);

        if ($row) {
            $this->Status_tracking_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('status_tracking'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status_tracking'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('description', 'description', 'trim|required');

	$this->form_validation->set_rules('id_status_tracking', 'id_status_tracking', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "status_tracking.xls";
        $judul = "status_tracking";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Description");

	foreach ($this->Status_tracking_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=status_tracking.doc");

        $data = array(
            'status_tracking_data' => $this->Status_tracking_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('status_tracking_doc',$data);
    }

}

/* End of file Status_tracking.php */
/* Location: ./application/controllers/Status_tracking.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-17 10:09:48 */
/* http://harviacode.com */