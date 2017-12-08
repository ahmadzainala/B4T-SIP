<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form_content extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Form_content_model');
    }

    public function index()
    {
        if($this->session->userdata('id_position')!=NULL && $this->session->userdata('id_position') == 1){
            $form_content = $this->Form_content_model->get_all_detail();

            $data = array(
                'form_content_data' => $form_content
            );

            $this->template->load('template','form_content_list', $data);
        }
    }

    public function read($id) 
    {
        $row = $this->Form_content_model->get_by_id_detail($id);
        if ($row) {
            $data = array(
		'id_form_content' => $row->id_form_content,
		'id_form' => $row->id_form,
        'id_items_detail' => $row->id_items_detail,
		'name_items' => $row->name_items,
        'id_supplier' => $row->id_supplier,
		'name_supplier' => $row->name_supplier,
		'quantity' => $row->quantity,
		'status_acc' => $row->status_acc,
		'unit' => $row->unit,
		'quantity_origin' => $row->quantity_origin,
	    );
            $this->template->load('template','form_content_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('form_content'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Form_content_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('form_content/update_action'),
		'id_form_content' => set_value('id_form_content', $row->id_form_content),
		'id_form' => set_value('id_form', $row->id_form),
		'id_items_detail' => set_value('id_items_detail', $row->id_items_detail),
		'id_supplier' => set_value('id_supplier', $row->id_supplier),
		'quantity' => set_value('quantity', $row->quantity),
		'status_acc' => set_value('status_acc', $row->status_acc),
		'unit' => set_value('unit', $row->unit),
		'quantity_origin' => set_value('quantity_origin', $row->quantity_origin),
	    );
            $this->template->load('template','form_content_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('form_content'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_form_content', TRUE));
        } else {
            $data = array(
		'id_form' => $this->input->post('id_form',TRUE),
		'id_items_detail' => $this->input->post('id_items_detail',TRUE),
		'id_supplier' => $this->input->post('id_supplier',TRUE),
		'quantity' => $this->input->post('quantity',TRUE),
		'status_acc' => $this->input->post('status_acc',TRUE),
		'unit' => $this->input->post('unit',TRUE),
		'quantity_origin' => $this->input->post('quantity_origin',TRUE),
	    );

            $this->Form_content_model->update($this->input->post('id_form_content', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('form_content'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Form_content_model->get_by_id($id);

        if ($row) {
            $this->Form_content_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('form_content'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('form_content'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_form', 'id form', 'trim|required');
	$this->form_validation->set_rules('id_items_detail', 'id items detail', 'trim|required');
	$this->form_validation->set_rules('id_supplier', 'id supplier', 'trim|required');
	$this->form_validation->set_rules('quantity', 'quantity', 'trim|required');
	$this->form_validation->set_rules('status_acc', 'status acc', 'trim|required');
	$this->form_validation->set_rules('unit', 'unit', 'trim|required');
	$this->form_validation->set_rules('quantity_origin', 'quantity origin', 'trim|required');

	$this->form_validation->set_rules('id_form_content', 'id_form_content', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "form_content.xls";
        $judul = "form_content";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Form");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Items Detail");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Supplier");
	xlsWriteLabel($tablehead, $kolomhead++, "Quantity");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Acc");
	xlsWriteLabel($tablehead, $kolomhead++, "Unit");
	xlsWriteLabel($tablehead, $kolomhead++, "Quantity Origin");

	foreach ($this->Form_content_model->get_all_detail() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_form);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_items_detail);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_supplier);
	    xlsWriteNumber($tablebody, $kolombody++, $data->quantity);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status_acc);
	    xlsWriteLabel($tablebody, $kolombody++, $data->unit);
	    xlsWriteNumber($tablebody, $kolombody++, $data->quantity_origin);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=form_content.doc");

        $data = array(
            'form_content_data' => $this->Form_content_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('form_content_doc',$data);
    }

    function pdf()
    {
        $data = array(
            'form_content_data' => $this->Form_content_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('form_content_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('form_content.pdf', 'D'); 
    }

}

/* End of file Form_content.php */
/* Location: ./application/controllers/Form_content.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-22 00:47:45 */
/* http://harviacode.com */