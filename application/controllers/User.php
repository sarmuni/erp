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

        $this->template->load('template_neura/index', 'dashboard/index', $data);
    }

    // public function index()
    // {
    //     $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

    //     $data['title'] = 'Users';
    //     $this->load->view('templates/auth_header', $data);
    //     $this->load->view('templates/auth_sidebar', $data);
    //     $this->load->view('user/index', $data);
    //     $this->load->view('templates/auth_menu_footer', $data);
    //     $this->load->view('templates/auth_footer', $data);
    // }
}
