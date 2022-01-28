<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('spareparts_model');
        $this->load->model('warehouses_model');
        $this->load->model('departments_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();


        $data['title'] = 'Dashboard';
        $data['count_spareparts'] = $this->spareparts_model->count_spareparts();
        $data['count_warehouses'] = $this->warehouses_model->count_warehouses();
        $data['count_departments'] = $this->departments_model->count_departments();

        $this->template->load('template_neura/index', 'dashboard/index', $data);
    }
}
