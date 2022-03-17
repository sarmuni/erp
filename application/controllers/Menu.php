<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('menu_model');
        $this->load->model('submenu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']             = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu']             = $this->menu_model->get_all('urutan', 'asc');

        $data['title'] = 'Module Menu';
        $this->template->load('template_neura/index', 'menu/index', $data);
    }


    public function add()
    {

        $this->form_validation->set_rules('menu', 'Menu Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Is Active', 'required|trim');
        $this->form_validation->set_rules('urutan', 'Order', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']             = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['menu']             = $this->menu_model->get_all('id', 'desc');

            $data['title'] = 'Module Menu';
            $this->template->load('template_neura/index', 'menu/index', $data);

        } else {

            $menu                    = htmlspecialchars($this->input->post('menu'));
            $description             = htmlspecialchars($this->input->post('description'));
            $icon                    = htmlspecialchars($this->input->post('icon'));
            $is_active               = htmlspecialchars($this->input->post('is_active'));
            $urutan                  = htmlspecialchars($this->input->post('urutan'));

            $data = array(
                'menu'               => $menu,
                'description'        => $description,
                'icon'               => $icon,
                'is_active'          => $is_active,
                'urutan'             => $urutan
            );

            $insert = $this->menu_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('menu');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('menu');
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->menu_model->delete($id);

        if ($delete) {
            redirect('menu');
        } else {
            redirect('menu');
        }
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('menu', 'Menu Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Is Active', 'required|trim');
        $this->form_validation->set_rules('urutan', 'Order', 'required|trim');

    
        if ($this->form_validation->run() == false) {

            $data['user']             = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['menu']             = $this->menu_model->get_all('id', 'desc');

            $data['title'] = 'Module Menu';
            $this->template->load('template_neura/index', 'menu/index', $data);

        } else {

            $menu                    = htmlspecialchars($this->input->post('menu'));
            $description             = htmlspecialchars($this->input->post('description'));
            $icon                    = htmlspecialchars($this->input->post('icon'));
            $is_active               = htmlspecialchars($this->input->post('is_active'));
            $urutan                  = htmlspecialchars($this->input->post('urutan'));

            $data = array(
                'menu'               => $menu,
                'description'        => $description,
                'icon'               => $icon,
                'is_active'          => $is_active,
                'urutan'             => $urutan
            );

            $update = $this->menu_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('menu');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('menu');
            }
        }
    }


    public function publish($id)
    {
        $data = array(
            'is_active'               => 1
            // 'user_admin_update'    => $this->session->role_id
        );

        $update = $this->menu_model->update($id, $data);
        if ($update) {
            redirect('menu');
        } else {
            redirect('menu');
        }
    }


    public function unpublish($id)
    {
        $data = array(
            'is_active'            => 0
            // 'user_admin_update'    => $this->session->role_id
        );

        $update = $this->menu_model->update($id, $data);
        if ($update) {
            redirect('menu');
        } else {
            redirect('menu');
        }
    }


    public function submenu()
    {
        $data['user']             = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['submenu']          = $this->submenu_model->get_all('id', 'desc');
        $data['select_menu']             = $this->menu_model->get_all('id', 'desc');

        $data['title'] = 'Module Sub Menu';
        $this->template->load('template_neura/index', 'menu/submenu', $data);
    }

    public function edit_sub($id)
    {

        $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
        $this->form_validation->set_rules('title', 'Sub Menu', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Is Active', 'required|trim');

    
        if ($this->form_validation->run() == false) {

            $data['user']             = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['submenu']          = $this->submenu_model->get_all('id', 'desc');
            $data['menu']             = $this->menu_model->get_all('id', 'desc');

            $data['title'] = 'Module Sub Menu';
            $this->template->load('template_neura/index', 'menu/submenu', $data);

        } else {

            $menu_id                 = htmlspecialchars($this->input->post('menu_id'));
            $title                   = htmlspecialchars($this->input->post('title'));
            $url                     = htmlspecialchars($this->input->post('url'));
            $is_active               = htmlspecialchars($this->input->post('is_active'));

            $data = array(
                'menu_id'            => $menu_id,
                'title'              => $title,
                'url'                => $url,
                'is_active'          => $is_active
            );

            $update = $this->submenu_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('menu/submenu');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('menu/submenu');
            }
        }
    }



    public function add_sub()
    {

        $this->form_validation->set_rules('menu_id', 'Menu Title', 'required|trim');
        $this->form_validation->set_rules('title', 'title', 'required|trim');
        $this->form_validation->set_rules('url', 'url', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Is Active', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']             = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['submenu']          = $this->submenu_model->get_all('id', 'desc');
            $data['menu']             = $this->menu_model->get_all('id', 'desc');

            $data['title'] = 'Module Sub Menu';
            $this->template->load('template_neura/index', 'menu/submenu', $data);

        } else {

            $menu_id                 = htmlspecialchars($this->input->post('menu_id'));
            $title                   = htmlspecialchars($this->input->post('title'));
            $url                     = htmlspecialchars($this->input->post('url'));
            $is_active               = htmlspecialchars($this->input->post('is_active'));

            $data = array(
                'menu_id'            => $menu_id,
                'title'              => $title,
                'url'                => $url,
                'is_active'          => $is_active
            );

            $insert = $this->submenu_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('menu/submenu');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('menu/submenu');
            }
        }
    }

    
    public function delete_sub($id)
    {

        $delete = $this->submenu_model->delete($id);

        if ($delete) {
            redirect('menu/submenu');
        } else {
            redirect('menu/submenu');
        }
    }

}
