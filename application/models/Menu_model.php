<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends MY_Model
{

    protected $table = 'auth_menu';
    protected $primary_key = 'id';
    protected $create_date = 'date_created';
    protected $update_date = 'date_update';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $sql = "SELECT * FROM auth_menu";
        return $this->db->query($sql)->result_array();
    }


    function count_departments()
    {
        $user = $this->session->userdata('id');
        // if ($user == 1) {
            $sql = "SELECT COUNT(id) AS total FROM departments";
            return $this->db->query($sql)->result_array();
        // } else {
        //     $sql = "SELECT COUNT(id) AS total FROM spareparts WHERE user_admin_dibuat='$user'";
        //     return $this->db->query($sql)->result_array();
        // }
    }
}
