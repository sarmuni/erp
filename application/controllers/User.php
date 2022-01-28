<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['users'] = $this->users_model->get_all_order_by('id', 'asc');
        $data['title'] = 'Users';

        $this->template->load('template_neura/index', 'account_user/index', $data);
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
