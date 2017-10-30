<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form_model extends CI_Model
{

    public $table = 'form';
    public $id = 'id_form';
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_form', $q);
	$this->db->or_like('id_user', $q);
	$this->db->or_like('date', $q);
	$this->db->or_like('information', $q);
	$this->db->or_like('information_kabid', $q);
	$this->db->or_like('information_TU', $q);
	$this->db->or_like('information_PPK', $q);
	$this->db->or_like('date_needs', $q);
	$this->db->or_like('that', $q);
	$this->db->or_like('read_status_Ketua', $q);
	$this->db->or_like('read_status_TU', $q);
	$this->db->or_like('read_status_PPK', $q);
	$this->db->or_like('status_submit', $q);
	$this->db->or_like('id_budget', $q);
	$this->db->or_like('name_activity', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_form', $q);
	$this->db->or_like('id_user', $q);
	$this->db->or_like('date', $q);
	$this->db->or_like('information', $q);
	$this->db->or_like('information_kabid', $q);
	$this->db->or_like('information_TU', $q);
	$this->db->or_like('information_PPK', $q);
	$this->db->or_like('date_needs', $q);
	$this->db->or_like('that', $q);
	$this->db->or_like('read_status_Ketua', $q);
	$this->db->or_like('read_status_TU', $q);
	$this->db->or_like('read_status_PPK', $q);
	$this->db->or_like('status_submit', $q);
	$this->db->or_like('id_budget', $q);
	$this->db->or_like('name_activity', $q);
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

     function get_all_detail()
    {
        return $this->db->query('select * from user_akun a, form b where a.id_user = b.id_user ORDER BY `date` DESC')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        return $this->db->query('select * from user_akun a, form b, tracking c, status_tracking d, source_budget e where a.id_user = b.id_user and c.id_form = b.id_form and c.id_status_tracking = d.id_status_tracking and b.status_submit=1 and b.id_budget=e.id_budget and b.id_form ='.$id)->row();
    }

    function get_by_id_new($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }


    //get by id user
    function get_by_user($id)
    {
        return $this->db->query('select * from user_akun a, form b, tracking c, status_tracking d where a.id_user = b.id_user and c.id_form = b.id_form and c.id_status_tracking = d.id_status_tracking and b.status_submit=1 and b.id_user ='.$id.' ORDER BY `date` DESC')->result();
    }

    function get_by_user_div($id)
    {
        return $this->db->query('SELECT * FROM `form` JOIN `user_akun` JOIN `tracking` JOIN `status_tracking` ON `form`.`id_user` = `user_akun`.`id_user` and `tracking`.`id_form` = `form`.`id_form` and `tracking`.`id_status_tracking` = `status_tracking`.`id_status_tracking` WHERE `form`.`status_submit`=1 and `user_akun`.`id_division` ='.$id.' ORDER BY `read_status_Ketua` ASC, `date` DESC')->result();
    }

    function get_by_user_acc_TU()
    {
        return $this->db->query('select * from user_akun a, form b, tracking c, status_tracking d, Tracking_history e where a.id_user = b.id_user and c.id_form = b.id_form and c.id_status_tracking = d.id_status_tracking and b.status_submit=1 and e.id_tracking=c.id_tracking and (c.id_status_tracking =1 or c.id_status_tracking =11 or c.id_status_tracking =12 or c.id_status_tracking =2 or c.id_status_tracking =3 or c.id_status_tracking =13 or c.id_status_tracking =6
            or c.id_status_tracking =5) GROUP BY `b`.`id_form` ORDER BY `read_status_TU` ASC, `date` DESC')->result();
    }

    function get_by_user_acc_PPKRM()
    {
        return $this->db->query('select * from user_akun a, form b, tracking c, status_tracking d, Tracking_history e where a.id_user = b.id_user and c.id_form = b.id_form and c.id_status_tracking = d.id_status_tracking and e.id_tracking=c.id_tracking and b.status_submit=1 and b.id_budget=2 and (c.id_status_tracking =12 or c.id_status_tracking =2 or c.id_status_tracking =3 or c.id_status_tracking =14 or c.id_status_tracking =6
            or c.id_status_tracking =5) GROUP BY `b`.`id_form` ORDER BY `read_status_PPK` ASC, `date` DESC')->result();
    }

    function get_by_user_acc_PPKBLU()
    {
        return $this->db->query('select * from user_akun a, form b, tracking c, status_tracking d, Tracking_history e where a.id_user = b.id_user and c.id_form = b.id_form and c.id_status_tracking = d.id_status_tracking and e.id_tracking=c.id_tracking and b.status_submit=1 and b.id_budget=1 and (c.id_status_tracking =12 or c.id_status_tracking =2 or c.id_status_tracking =3 or c.id_status_tracking =14 or c.id_status_tracking =6
            or c.id_status_tracking =5) GROUP BY `b`.`id_form` ORDER BY `read_status_PPK` ASC, `date` DESC')->result();
    }

     function get_by_user_pengadaan()
    {
        return $this->db->query('select * from user_akun a, form b, tracking c, status_tracking d, Tracking_history e where a.id_user = b.id_user and c.id_form = b.id_form and c.id_status_tracking = d.id_status_tracking and e.id_tracking=c.id_tracking and b.status_submit=1 and (c.id_status_tracking =3 or c.id_status_tracking =5 or c.id_status_tracking =6) GROUP BY `b`.`id_form` ORDER BY `date` DESC')->result();
    }

    //get by id user
    function get_by_user_now($id)
    {
        $this->db->where('id_user', $id);
        $this->db->order_by('id_form','desc');
        $this->db->limit(1);
        return $this->db->get($this->table)->row();
    }

    function delete_useless_form()
    {
        $this->db->where('status_submit', "0");
        $temp = $this->db->get($this->table)->result();
        $this->delete_child($temp);
        
        $this->db->where('status_submit', "0");
        $this->db->delete($this->table);
    }

    function delete_child($temp){
        foreach ($temp as $x) {
            $this->db->where('id_form', $x->id_form);
            $this->db->delete('form_content');
        }
    }

}

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-22 00:47:45 */
/* http://harviacode.com */