<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier_category_model extends CI_Model
{

    public $table = 'supplier_category';
    public $id = 'id_supplier_category';
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
        $this->db->like('id_supplier_category', $q);
	$this->db->or_like('id_category', $q);
	$this->db->or_like('id_supplier', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_supplier_category', $q);
	$this->db->or_like('id_category', $q);
	$this->db->or_like('id_supplier', $q);
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
        return $this->db->query('select * from supplier a, items_category b, supplier_category c where b.id_category = c.id_category and a.id_supplier=c.id_supplier')->result();
    }

    function get_by_id_detail($id)
    {
         return $this->db->query('select * from supplier a, items_category b, supplier_category c where b.id_category = c.id_category and a.id_supplier=c.id_supplier and c.id_supplier_category ='.$id)->row();
    }

}

