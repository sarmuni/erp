<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed');

class MY_Model extends CI_Model {
    
    protected $table = null;
    protected $primary_key = null;
    protected $create_date = null;
    protected $update_date = null;
        
    function __construct()
    {
        parent::__construct();
    }
    
    function get_all()
    {
        return $this->db->get($this->table)->result_array();
    }
    
    function get_all_order_by($order, $sort)
    {
        $this->db->order_by($order, $sort);
        return $this->db->get($this->table)->result_array();
    }
    
    function get($id)
    {
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table);
        
        if($query->num_rows() > 0) return $query->row_array();
        return false;
    }
    
    function insert($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $dt = date('Y-m-d H:i:s', time());

        if($this->create_date) $this->db->set($this->create_date, "'".$dt."'", false);
        if($this->update_date) $this->db->set($this->update_date, "'".$dt."'", false);
        
        return $this->db->insert($this->table, $data);
    }
    
    function update($id, $data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $dt = date('Y-m-d H:i:s', time());

        if($this->update_date) $this->db->set($this->update_date, "'".$dt."'", false);
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table, $data);
    }
    
    function delete($id)
    {
        $this->db->where($this->primary_key, $id);
        return $this->db->delete($this->table);   
    }
}