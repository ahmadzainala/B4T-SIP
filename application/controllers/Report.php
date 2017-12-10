<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Form_model');
    }

    public function wordDokumen($id_form = NULL)
    {
        //echo $id_form;

        $this->load->model('Form_content_model');
        $item_list = $this->Form_content_model->get_all_detail_by_form($id_form);
        $this->load->model('Division_model');
        $form_data = $this->Form_model->get_by_id($id_form);
        $divisi = $this->Division_model->get_by_id($form_data->id_division);
        $this->load->model('Tracking_model');
        $form_acc = $this->Tracking_model->get_by_id_tracking_TU($form_data->id_tracking);

        $data = array(
            'divisi' => $divisi,
            'form_data' => $form_data,
            'item_list' => $item_list,
            'form_acc' => $form_acc
        );

        $date = explode(" ",$form_data->date);
        $docFilePath = $date[0]." ".$form_data->name." ".$form_data->id_form.".doc";
        
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=$docFilePath");

        
        $this->load->view('Pengajuan_doc',$data);
    }

     function PDFDokumen($id_form = NULL)
    {
        $this->load->model('Form_content_model');
        $item_list = $this->Form_content_model->get_all_detail_by_form($id_form);
        $this->load->model('Division_model');
        $form_data = $this->Form_model->get_by_id($id_form);
        $divisi = $this->Division_model->get_by_id($form_data->id_division);
        $this->load->model('Tracking_model');
        $form_acc = $this->Tracking_model->get_by_id_tracking_TU($form_data->id_tracking);

        $data = array(
            'divisi' => $divisi,
            'form_data' => $form_data,
            'item_list' => $item_list,
            'form_acc' => $form_acc
        );
        
        ini_set('memory_limit', '32M');

        //load the view and saved it into $html variabel
        $html = $this->load->view('Pengajuan_PDF', $data, true);

        //this the PDF file name that user will get download
        $date = explode(" ",$form_data->date);
        $pdfFilePath = $date[0]." ".$form_data->name." ".$form_data->id_form.".pdf";

        //load mPDF library
        $this->load->library('m_pdf');

        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");

        //$pdf = $this->pdf->load();
        //$pdf->WriteHTML($html);
        //$pdf->Output('Lembar Pengajuan.pdf', 'D'); 
    }
   
}
