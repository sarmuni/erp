<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends MY_Model
{

    protected $table = 'auth_role';
    protected $primary_key = 'id';
    protected $create_date = 'date_created';
    protected $update_date = 'date_update';

    function __construct()
    {
        parent::__construct();
    }

    function get_all_by_id()
    {
        $this->db->where('id !=', 1);
        $this->db->where('id !=', 2);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) return $query->result_array();
        return false;
    }
}
