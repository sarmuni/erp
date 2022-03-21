<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inventaris_model extends MY_Model
{

    protected $table = 'register_inventaris';
    protected $primary_key = 'id';
    protected $create_date = 'create_date';
    protected $update_date = 'update_date';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $sql = "SELECT * FROM register_inventaris";
        return $this->db->query($sql)->result_array();
    }

    function get_last_code($day, $month, $year)
    {
        $this->db->where('DAY(create_date)', $day);
        $this->db->where('MONTH(create_date)', $month);
        $this->db->where('YEAR(create_date)', $year);

        $this->db->order_by('create_date', 'desc');
        $this->db->limit(1);

        return $this->db->get($this->table)->row_array();
    }

}
