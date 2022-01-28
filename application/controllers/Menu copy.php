<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('auth_menu')->result_array();

        $data['title'] = 'Menus';
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('templates/auth_sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/auth_menu_footer', $data);
            $this->load->view('templates/auth_footer', $data);
        } else {
            $this->db->insert(
                'auth_menu',
                ['menu' => $this->input->post('menu'), 'description' => $this->input->post('description')]
            );

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Success ! your add menu has been created
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
            redirect('menu');
        }
    }
}
