<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tracking_history extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tracking_history_model');
        
    }

    public function index()
    {
        $Tracking_history = $this->Tracking_history_model->get_all();

        $data = array(
            'Tracking_history_data' => $Tracking_history
        );

        $this->template->load('template','Tracking_history_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tracking_history_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_catalog' => $row->id_catalog,
		'id_tracking' => $row->id_tracking,
		'id_user_acc' => $row->id_user_acc,
		'date_acc' => $row->date_acc,
		'acc' => $row->acc,
	    );
            $this->template->load('template','Tracking_history_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Tracking_history'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Tracking_history/create_action'),
	    'id_catalog' => set_value('id_catalog'),
	    'id_tracking' => set_value('id_tracking'),
	    'id_user_acc' => set_value('id_user_acc'),
	    'date_acc' => set_value('date_acc'),
	    'acc' => set_value('acc'),
	);
        $this->template->load('template','Tracking_history_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_tracking' => $this->input->post('id_tracking',TRUE),
		'id_user_acc' => $this->input->post('id_user_acc',TRUE),
		'date_acc' => $this->input->post('date_acc',TRUE),
		'acc' => $this->input->post('acc',TRUE),
	    );

            $this->Tracking_history_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Tracking_history'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tracking_history_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Tracking_history/update_action'),
		'id_catalog' => set_value('id_catalog', $row->id_catalog),
		'id_tracking' => set_value('id_tracking', $row->id_tracking),
		'id_user_acc' => set_value('id_user_acc', $row->id_user_acc),
		'date_acc' => set_value('date_acc', $row->date_acc),
		'acc' => set_value('acc', $row->acc),
	    );
            $this->template->load('template','Tracking_history_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Tracking_history'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_catalog', TRUE));
        } else {
            $data = array(
		'id_tracking' => $this->input->post('id_tracking',TRUE),
		'id_user_acc' => $this->input->post('id_user_acc',TRUE),
		'date_acc' => $this->input->post('date_acc',TRUE),
		'acc' => $this->input->post('acc',TRUE),
	    );

            $this->Tracking_history_model->update($this->input->post('id_catalog', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Tracking_history'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tracking_history_model->get_by_id($id);

        if ($row) {
            $this->Tracking_history_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Tracking_history'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Tracking_history'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_tracking', 'id tracking', 'trim|required');
	$this->form_validation->set_rules('id_user_acc', 'id user acc', 'trim|required');
	$this->form_validation->set_rules('date_acc', 'date acc', 'trim|required');
	$this->form_validation->set_rules('acc', 'acc', 'trim|required');

	$this->form_validation->set_rules('id_catalog', 'id_catalog', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "Tracking_history.xls";
        $judul = "Tracking_history";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tracking");
	xlsWriteLabel($tablehead, $kolomhead++, "Id User Acc");
	xlsWriteLabel($tablehead, $kolomhead++, "Date Acc");
	xlsWriteLabel($tablehead, $kolomhead++, "Acc");

	foreach ($this->Tracking_history_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_tracking);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user_acc);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date_acc);
	    xlsWriteNumber($tablebody, $kolombody++, $data->acc);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=Tracking_history.doc");

        $data = array(
            'Tracking_history_data' => $this->Tracking_history_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('Tracking_history_doc',$data);
    }

}

/* End of file Tracking_history.php */
/* Location: ./application/controllers/Tracking_history.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-17 10:10:12 */
/* http://harviacode.com */