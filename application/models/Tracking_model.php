<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tracking_model extends CI_Model
{

    public $table = 'tracking';
    public $id = 'id_tracking';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_tracking', $q);
	$this->db->or_like('id_status_tracking', $q);
	$this->db->or_like('id_form', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_tracking', $q);
	$this->db->or_like('id_status_tracking', $q);
	$this->db->or_like('id_form', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_by_id_form($id)
    {
        $this->db->where('id_form', $id);
        return $this->db->get($this->table)->row();
    }
    

    function get_by_id_tracking_TU($id_track){
        return $this->db->query('select * from Tracking_history b, tracking c where c.id_tracking = b.id_tracking and b.id_user_acc =5')->row();
    }

    function get_total_menunggudisetujui($id){
        $this->db->where("(id_status_tracking!='5' AND id_status_tracking!='3' AND id_status_tracking!='4')", NULL, FALSE);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_total_menunggudisetujuiKD($id){
         return $this->db->query('select * from tracking c, form b, user_akun a where c.id_form=b.id_form and a.id_user = b.id_user and a.id_user = '.$id.' and (c.id_status_tracking =0 or c.id_status_tracking =10)')->num_rows();
    }

    function get_total_menunggudisetujuiTU($id){
        return $this->db->query('select * from tracking c, form b, user_akun a where c.id_form=b.id_form and a.id_user = b.id_user and a.id_user = '.$id.' and (c.id_status_tracking =1 or c.id_status_tracking =11)')->num_rows();
    }

    function get_total_menunggudisetujuiPPK($id){
        return $this->db->query('select * from tracking c, form b, user_akun a where c.id_form=b.id_form and a.id_user = b.id_user and a.id_user = '.$id.' and (c.id_status_tracking =2 or c.id_status_tracking =12)')->num_rows();
    }

    function get_total_prosespengadaan($id){
       return $this->db->query('select * from tracking c, form b, user_akun a where c.id_form=b.id_form and a.id_user = b.id_user and a.id_user = '.$id.' and (c.id_status_tracking =3)')->num_rows();
    }

    function get_total_tidakdisetujui($id){
        return $this->db->query('select * from tracking c, form b, user_akun a where c.id_form=b.id_form and a.id_user = b.id_user and a.id_user = '.$id.' and (c.id_status_tracking =4 or c.id_status_tracking =13 or c.id_status_tracking =14)')->num_rows();
    }

    function get_total_verifikasi($id){
        return $this->db->query('select * from tracking c, form b, user_akun a where c.id_form=b.id_form and a.id_user = b.id_user and a.id_user = '.$id.' and (c.id_status_tracking =6)')->num_rows();
    }

    function get_total_selesaipengadaan($id){
        return $this->db->query('select * from tracking c, form b, user_akun a where c.id_form=b.id_form and a.id_user = b.id_user and a.id_user = '.$id.' and (c.id_status_tracking =5)')->num_rows();
    }

}

