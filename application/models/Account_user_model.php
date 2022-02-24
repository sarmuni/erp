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

    function get_all_join_account_user_id($id)
    {
        $sql = "SELECT
        a.*,
        b.role
        FROM auth_user a
        LEFT JOIN auth_role b
        ON a.`role_id`=b.`departments_id`
        WHERE a.id = '$id'";
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

    function call_function_procedure($role_id)
    {
       
        $sql = "CALL Proc_Menu('$role_id')";

        if($sql !== FALSE && $this->db->query($sql)->num_rows() == 1) 
        {
            return true;
        }
        else
        {
            return false;
        } 

        return $this->db->query($sql)->result_array();

    }

    function delete_role_id($role_id)
    {
        $sql = "DELETE
        FROM auth_user_access_menu
        WHERE role_id = '$role_id'";
        return $this->db->query($sql);
    }

    function count_users()
    {
        $user = $this->session->userdata('id');
        // if ($user == 1) {
            $sql = "SELECT COUNT(id) AS total FROM auth_user";
            return $this->db->query($sql)->result_array();
        // } else {
        //     $sql = "SELECT COUNT(id) AS total FROM auth_user WHERE user_admin_dibuat='$user'";
        //     return $this->db->query($sql)->result_array();
        // }
    }

}
