<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_akun_model extends CI_Model
{

    public $table = 'user_akun';
    public $id = 'id_user';
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
        $this->db->like('id_user', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('id_position', $q);
	$this->db->or_like('id_division', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_user', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('id_position', $q);
	$this->db->or_like('id_division', $q);
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

    ////get data by username and pass
    public function get_data_user($user, $pass)
    {
        $hasil = $this->db->where('username', $user)
                          ->where('password', $pass)
                          ->limit(1)
                          ->get($this->table);
        
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }

    function get_all_detail()
    {
        return $this->db->query('select * from user_akun a, position b, division c where a.id_position = b.id_position and c.id_division = a.id_division')->result();
    }

    function get_name_div_pos($id)
    {
        return $this->db->query('select a.id_user, b.name_position, c.name_division from user_akun a, position b, division c where a.id_position = b.id_position and c.id_division = a.id_division and a.id_user = '.$id)->row();
    }
}

