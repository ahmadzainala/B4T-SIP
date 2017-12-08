<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Items_detail_model extends CI_Model
{

    public $table = 'items_detail';
    public $id = 'id_items_detail';
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
        $this->db->like('id_items_detail', $q);
	$this->db->or_like('id_category', $q);
	$this->db->or_like('name_items', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_items_detail', $q);
	$this->db->or_like('id_category', $q);
	$this->db->or_like('name_items', $q);
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
        return $this->db->query('select * from items_detail a, items_category b where a.id_category = b.id_category')->result();
    }

    function get_by_id_detail($id)
    {
        return $this->db->query('select * from items_detail a, items_category b where a.id_category = b.id_category and a.id_items_detail ='.$id)->row();
    }

    function get_by_category($id)
    {
        $this->db->where('id_category', $id);
        return $this->db->get($this->table)->result();
    }

    function get_by_name($name)
    {
        $this->db->where('name_items', $name);
        return $this->db->get($this->table)->row();
    }

    function get_like($term,$kategori){
        if($kategori!=''){
            //return $this->db->query('select * from user_akun a, position b, division c where a.id_position = b.id_position and c.id_division = a.id_division')->result();
            return $this->db->query("SELECT * FROM items_category a, items_detail b WHERE a.id_category = b.id_category and a.name_category LIKE '".$kategori."%' and b.name_items LIKE '".$term."%'")->result();
        }else{
            return $this->db->query("SELECT * FROM items_detail WHERE name_items LIKE '".$term."%'")->result();
        }
    }
}
