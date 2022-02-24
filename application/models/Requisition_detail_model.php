<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Requisition_detail_model extends MY_Model
{

    protected $table = 'pre_requisition_item_detail';
    protected $primary_key = 'id';
    protected $create_date = 'created_at';
    protected $update_date = 'updated_at';

    function __construct()
    {
        parent::__construct();
    }

    function delete_item($pre_code)
    {
        $this->db->where('item_pre_code', $pre_code);
        $this->db->delete($this->table);
    }

    function get_all_item($pre_code)
    {
        $sql = "SELECT * FROM pre_requisition_item_detail WHERE item_pre_code='$pre_code'";
        return $this->db->query($sql)->result_array();
    }
}
