<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Submenu_model extends MY_Model
{

    protected $table = 'auth_sub_menu';
    protected $primary_key = 'id';
    protected $create_date = 'date_created';
    protected $update_date = 'date_update';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $sql = "SELECT 
        b.description,
        a.*
        FROM auth_sub_menu a
        LEFT JOIN auth_menu b ON a.`menu_id`=b.`id`
        ORDER BY a.`menu_id`";
        return $this->db->query($sql)->result_array();
    }



}
