<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tracking_history_model extends CI_Model
{

    public $table = 'tracking_history';
    public $id = 'id_catalog';
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
        $this->db->like('id_catalog', $q);
	$this->db->or_like('id_tracking', $q);
	$this->db->or_like('id_user_acc', $q);
	$this->db->or_like('date_acc', $q);
	$this->db->or_like('acc', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_catalog', $q);
	$this->db->or_like('id_tracking', $q);
	$this->db->or_like('id_user_acc', $q);
	$this->db->or_like('date_acc', $q);
	$this->db->or_like('acc', $q);
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
        return $this->db->query('select * from tracking_history a, position b, user_akun c, division d, tracking e where a.id_tracking = e.id_tracking and a.id_user_acc=b.id_position and c.id_position = b.id_position and c.id_division = d.id_division and c.date_create <= a.date_acc and c.date_expired >= a.date_acc')->result();
    }

    function get_by_id_detail($id)
    {
         return $this->db->query('select * from tracking_history a, position b, user_akun c, division d, tracking e where a.id_tracking = e.id_tracking and a.id_user_acc=b.id_position and c.id_position = b.id_position and c.id_division = d.id_division and c.date_create <= a.date_acc and c.date_expired >= a.date_acc and a.id_catalog ='.$id)->row();
    } 

}

