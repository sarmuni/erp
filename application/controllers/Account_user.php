<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('account_user_model');
        $this->load->model('employee_model');
        $this->load->model('menu_model');
        $this->load->model('role_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['account_user']       = $this->account_user_model->get_all_join_account_user('id', 'desc');
        $data['role_id']            = $this->role_model->get_all_by_id('id', 'desc');
        $data['person_id']          = $this->employee_model->get_all('id', 'desc');

        $data['title'] = 'Account Users';
        $this->template->load('template_neura/index', 'account_user/index', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('person_id', 'Person ID', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[auth_user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[confirmpassword]');
        $this->form_validation->set_rules('confirmpassword', 'ConfirmPassword', 'required|trim|matches[password]');
        $this->form_validation->set_rules('role_id', 'Level', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['account_user']       = $this->account_user_model->get_all_order_by('id', 'desc');

            $data['title']              = 'Account User';
            $this->session->set_flashdata('required', 'data tidak lengkap');
            $this->template->load('template_neura/index', 'account_user/index', $data);
        } else {

            $fullname                = htmlspecialchars($this->input->post('fullname'));
            $person_id               = htmlspecialchars($this->input->post('person_id'));
            $email                   = htmlspecialchars($this->input->post('email'));
            $password                = htmlspecialchars($this->input->post('password'));
            $phone                   = htmlspecialchars($this->input->post('phone'));
            $role_id                 = htmlspecialchars($this->input->post('role_id'));


            $data = array(
                'fullname'               => $fullname,
                'person_id'              => $person_id,
                'email'                  => $email,
                'password'               => password_hash($password, PASSWORD_DEFAULT),
                'phone'                  => $phone,
                'role_id'                => $role_id,
                'is_active'              => 0
            );

            $insert = $this->account_user_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Berhasil');
                redirect('account_user');
            } else {
                $this->session->set_flashdata('message', 'Gagal');
                redirect('account_user');
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->account_user_model->delete($id);

        if ($delete) {
            redirect('account_user');
        } else {
            redirect('account_user');
        }
    }

    public function module($id){

        $data['user']             = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu']             = $this->menu_model->get_all('id', 'desc');
        $data['account_user']     = $this->account_user_model->get_all_join_account_user_id($id);

        $data['title'] = 'Module Menu';
        $data['title_foto'] = 'Foto';
        $data['title_user'] = 'Identitas User';
        $this->template->load('template_neura/index', 'account_user/module', $data);

    }


    public function edit($id)
    {

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('person_id', 'Person ID', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        // $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[confirmpassword]');
        // $this->form_validation->set_rules('confirmpassword', 'ConfirmPassword', 'required|trim|matches[password]');
        $this->form_validation->set_rules('role_id', 'Level', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['account_user']           = $this->account_user_model->get_all_order_by('id', 'desc');
            $data['role_id']                = $this->role_model->get_all_by_id('id', 'desc');

            $data['title'] = 'Account User';
            $this->session->set_flashdata('required', 'data tidak lengkap');
            $this->template->load('template_neura/index', 'account_user/index', $data);
        } else {

            $fullname                = htmlspecialchars($this->input->post('fullname'));
            $email                   = htmlspecialchars($this->input->post('email'));
            $person_id               = htmlspecialchars($this->input->post('person_id'));
            $password                = htmlspecialchars($this->input->post('password'));
            $phone                   = htmlspecialchars($this->input->post('phone'));
            $role_id                 = htmlspecialchars($this->input->post('role_id'));

            if ($password=='') {
                $data = array(
                    'fullname'               => $fullname,
                    'email'                  => $email,
                    'person_id'              => $person_id,
                    'phone'                  => $phone,
                    'role_id'                => $role_id,
                    'is_active'              => 1
                );
            }else{
                $data = array(
                    'fullname'               => $fullname,
                    'email'                  => $email,
                    'person_id'              => $person_id,
                    'password'               => password_hash($password, PASSWORD_DEFAULT),
                    'phone'                  => $phone,
                    'role_id'                => $role_id,
                    'is_active'              => 1
                );
            }

            $update = $this->account_user_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Berhasil Update');
                redirect('account_user');
            } else {
                $this->session->set_flashdata('message', 'Gagal Update');
                redirect('account_user');
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
            $data['account_user']           = $this->account_user_model->get_all_order_by('id', 'desc');
            $data['role_id']                = $this->role_model->get_all_by_id('id', 'desc');

            $data['title'] = 'Account User';
            $this->session->set_flashdata('required', 'data tidak lengkap');
            $this->template->load('template_neura/index', 'account_user/profile', $data);
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
                redirect('account_user/profile');
            } else {
                $this->session->set_flashdata('message', 'Filed Update');
                redirect('account_user/profile');
            }
        }
    }

    public function upload_avatar($id)
    {

        $this->form_validation->set_rules('image', 'Image', 'required|trim');

        if ($this->form_validation->run() == true) {
            $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['account_user']           = $this->account_user_model->get_all_order_by('id', 'desc');

            $data['title'] = 'Account User';
            $this->session->set_flashdata('required', 'Not Completed');
            $this->template->load('template_neura/index', 'account_user/profile', $data);
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
                redirect('account_user/profile');
            } else {
                $this->session->set_flashdata('message', 'Filed Upload');
                redirect('account_user/profile');
            }
        }
    }


    public function publish($id,$role_id)
    {
        $data = array(
            'is_active'               => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->account_user_model->update($id, $data);

        if ($id != 1 OR $role_id != 12) {
            $update = $this->account_user_model->call_function_procedure($role_id,$data);
        }


        if ($update) {
            redirect('account_user');
        } else {
            redirect('account_user');
        }
    }


    public function unpublish($id,$role_id)
    {
        $data = array(
            'is_active'            => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->account_user_model->update($id, $data);

        if ($id != 1 OR $role_id != 12 ) {
            $update = $this->account_user_model->delete_role_id($role_id,$data);
        }

        if ($update) {
            redirect('account_user');
        } else {
            redirect('account_user');
        }
    }

    public function profile()
    {
        $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['account_user']       = $this->account_user_model->get_all_join_profile_id('id', 'desc');
        
        $data['title']              = 'User Account';
        $data['title_foto']         = 'Foto';
        $this->template->load('template_neura/index', 'profile/index', $data);
    }
}
