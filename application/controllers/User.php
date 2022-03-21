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

    public function profile()
    {
        $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['profile']            = $this->account_user_model->get_all_join_profile_id('id', 'desc');
        
        $data['title']              = 'Profile';
        $data['title_foto']         = 'Foto';
        $this->template->load('template_neura/index', 'profile/index', $data);
    }


    public function upload_avatar($id)
    {

        $this->form_validation->set_rules('image', 'Image', 'required|trim');

        if ($this->form_validation->run() == true) {
            $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profile']           = $this->account_user_model->get_all_order_by('id', 'desc');

            $data['title'] = 'Account User';
            $this->session->set_flashdata('required', 'Not Completed');
            $this->template->load('template_neura/index', 'user/profile', $data);
        } else {

            $id                   = $this->input->post('id');
            $image                = $this->input->post('image');

            
            $file_name = str_replace('.','',$id);
            $config['upload_path']          = FCPATH.'/uploads/avatar/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 1024; // 1MB
            $config['max_width']            = 1080;
            $config['max_height']           = 1080;
    
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('image')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $uploaded_data = $this->upload->data();
    
                $data = array(
                    'id'               => $id,
                    'image'            => $uploaded_data['file_name']
                );

            }
            
            $update = $this->account_user_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Success Upload');
                redirect('user/profile');
            } else {
                $this->session->set_flashdata('message', 'Filed Upload');
                redirect('user/profile');
            }
        }
    }


    public function profile_edit($id)
    {

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['profile']           = $this->account_user_model->get_all_order_by('id', 'desc');
            $data['role_id']                = $this->role_model->get_all_by_id('id', 'desc');

            $data['title'] = 'Account User';
            $this->session->set_flashdata('required', 'data tidak lengkap');
            $this->template->load('template_neura/index', 'user/profile', $data);
        } else {

            $fullname                = htmlspecialchars($this->input->post('fullname'));
            $email                   = htmlspecialchars($this->input->post('email'));
            $password                = htmlspecialchars($this->input->post('password'));
            $phone                   = htmlspecialchars($this->input->post('phone'));


            if ($password=='') {
                $data = array(
                    'fullname'               => $fullname,
                    'email'                  => $email,
                    'phone'                  => $phone
                );
            }else{
                $data = array(
                    'fullname'               => $fullname,
                    'email'                  => $email,
                    'password'               => password_hash($password, PASSWORD_DEFAULT),
                    'phone'                  => $phone
                );
            }

            $update = $this->account_user_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Success Update');
                redirect('user/profile');
            } else {
                $this->session->set_flashdata('message', 'Filed Update');
                redirect('user/profile');
            }
        }
    }


}
