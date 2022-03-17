<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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

        if ($this->session->userdata('role_id') == 1) {
            # Administartor
            $this->template->load('template_neura/index', 'dashboard/index_1', $data);
        }elseif ($this->session->userdata('role_id') == 2) {
            # Board of Director
            $this->template->load('template_neura/index', 'dashboard/index_2', $data);
        }elseif ($this->session->userdata('role_id') == 3) {
            # Factory Management
            $this->template->load('template_neura/index', 'dashboard/index_3', $data);
        }elseif ($this->session->userdata('role_id') == 4) {
            # Quality Assurance
            $this->template->load('template_neura/index', 'dashboard/index_4', $data);
        }elseif ($this->session->userdata('role_id') == 5) {
            # Production
            $this->template->load('template_neura/index', 'dashboard/index_5', $data);
        }elseif ($this->session->userdata('role_id') == 6) {
            # Engineer
            $this->template->load('template_neura/index', 'dashboard/index_6', $data);
        }elseif ($this->session->userdata('role_id') == 7) {
            # HR & GA
            $this->template->load('template_neura/index', 'dashboard/index_7', $data);
        }elseif ($this->session->userdata('role_id') == 8) {
            # Finance
            $this->template->load('template_neura/index', 'dashboard/index_8', $data);
        }elseif ($this->session->userdata('role_id') == 9) {
            # Warehouse
            $this->template->load('template_neura/index', 'dashboard/index_9', $data);
        }elseif ($this->session->userdata('role_id') == 10) {
            # Building Management
            $this->template->load('template_neura/index', 'dashboard/index_10', $data);
        }elseif ($this->session->userdata('role_id') == 11) {
            # Internal Security
            $this->template->load('template_neura/index', 'dashboard/index_11', $data);
        }elseif ($this->session->userdata('role_id') == 12) {
            # Supply Chain
            $this->template->load('template_neura/index', 'dashboard/index_12', $data);
        }elseif ($this->session->userdata('role_id') == 13) {
            # Information Technology
            $this->template->load('template_neura/index', 'dashboard/index_13', $data);
        }else{
            $this->template->load('template_neura/index', 'dashboard/404', $data);
        }
       
    }


}
