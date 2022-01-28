<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Account_user_model extends MY_Model
{

    protected $table = 'auth_user';
    protected $primary_key = 'id';
    protected $create_date = 'date_created';
    protected $update_date = 'date_update';

    function __construct()
    {
        parent::__construct();
    }

    function get_all_join_account_user()
    {
        $sql = "SELECT
        a.*,
        b.role
        FROM auth_user a
        LEFT JOIN auth_role b
        ON a.`role_id`=b.`departments_id`";
        return $this->db->query($sql)->result_array();
    }
    function get_all_join_profile_id()
    {
        $email = $this->session->userdata('email');
        $sql = "SELECT
        a.*,
        b.role
        FROM auth_user a
        LEFT JOIN auth_role b
        ON a.`role_id`=b.`departments_id`
        WHERE a.email='$email'";
        return $this->db->query($sql)->result_array();
    }
}
