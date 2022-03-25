<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('spareparts_model');
        $this->load->model('warehouses_model');
        $this->load->model('departments_model');
        $this->load->model('account_user_model');
        $this->load->model('materials_model');
        $this->load->model('machinery_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();


        $data['title'] = 'Dashboard';
        $data['count_spareparts'] = $this->spareparts_model->count_spareparts();
        $data['count_warehouses'] = $this->warehouses_model->count_warehouses();
        $data['count_departments'] = $this->departments_model->count_departments();
        $data['count_users'] = $this->account_user_model->count_users();
        $data['count_materials'] = $this->materials_model->count_materials();
        $data['count_machinery'] = $this->machinery_model->count_machinery();

        // $this->template->load('template_neura/index', 'dashboard/index_1', $data);
        $this->template->load('template_adminlte/index', 'dashboard/index_1a', $data);
    }

    public function role()
    {

        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('auth_role')->result_array();
        $data['title'] = 'Module Role';
        $this->template->load('template_adminlte/index', 'role/index', $data);
        // $this->template->load('template_neura/index', 'role/index', $data);
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('auth_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $this->db->where('id !=', 12);
        $data['menu'] = $this->db->get('auth_menu')->result_array();

        $this->template->load('template_adminlte/index', 'role/role_access', $data);
        // $this->template->load('template_neura/index', 'role/role_access', $data);
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('auth_user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('auth_user_access_menu', $data);
        } else {
            $this->db->delete('auth_user_access_menu', $data);
        }
        $this->session->set_flashdata('message', 'Success');
        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
}
