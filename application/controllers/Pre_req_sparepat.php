<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pre_req_sparepat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('pre_req_sparepat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['pre_requisition_sparepat'] = $this->pre_requisition_sparepat_model->get_all_join('id', 'desc');

        $data['title'] = 'Pre Requisition Sparepat';
        $this->template->load('template_neura/index', 'pre_req_sparepat/index', $data);
    }

}
