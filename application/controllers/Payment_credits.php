<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_credits extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('payment_credits_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['payment_credits']    = $this->payment_credits_model->get_all('id', 'desc');

        $data['title'] = 'Payment Credits';
        $this->template->load('template_neura/index', 'payment_credits/index', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('name', 'Departments', 'required|trim');
        $this->form_validation->set_rules('budgetLimit', 'Budget Limit', 'required|trim');
        $this->form_validation->set_rules('departmentEmail', 'Department Email', 'required|trim');
        $this->form_validation->set_rules('budgetStartDate', 'Budget Start Date', 'required|trim');
        $this->form_validation->set_rules('budgetEndDate', 'Budget End Date', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['departments']        = $this->departments_model->get_all('id', 'desc');

            $data['title']              = 'Departments';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'departments/index', $data);
        } else {

            $name                       = htmlspecialchars($this->input->post('name'));
            $budgetLimit                = htmlspecialchars($this->input->post('budgetLimit'));
            $departmentEmail            = htmlspecialchars($this->input->post('departmentEmail'));
            $budgetStartDate            = htmlspecialchars($this->input->post('budgetStartDate'));
            $budgetEndDate              = htmlspecialchars($this->input->post('budgetEndDate'));


            $data = array(
                'name'                  => $name,
                'budgetLimit'           => $budgetLimit,
                'departmentEmail'       => $departmentEmail,
                'budgetStartDate'       => $budgetStartDate,
                'budgetEndDate'         => $budgetEndDate,
                'companyId'             => 1
            );

            $insert = $this->departments_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('departments');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('departments');
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->departments_model->delete($id);

        if ($delete) {
            redirect('departments');
        } else {
            redirect('departments');
        }
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('name', 'Departments', 'required|trim');
        $this->form_validation->set_rules('budgetLimit', 'Budget Limit', 'required|trim');
        $this->form_validation->set_rules('departmentEmail', 'Department Email', 'required|trim');
        $this->form_validation->set_rules('budgetStartDate', 'Budget Start Date', 'required|trim');
        $this->form_validation->set_rules('budgetEndDate', 'Budget End Date', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['departments']           = $this->departments_model->get_all('id', 'desc');

            $data['title'] = 'Departments';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'departments/index', $data);
        } else {

            $name                       = htmlspecialchars($this->input->post('name'));
            $budgetLimit                = htmlspecialchars($this->input->post('budgetLimit'));
            $departmentEmail            = htmlspecialchars($this->input->post('departmentEmail'));
            $budgetStartDate            = htmlspecialchars($this->input->post('budgetStartDate'));
            $budgetEndDate              = htmlspecialchars($this->input->post('budgetEndDate'));


            $data = array(
                'name'                  => $name,
                'budgetLimit'           => $budgetLimit,
                'departmentEmail'       => $departmentEmail,
                'budgetStartDate'       => $budgetStartDate,
                'budgetEndDate'         => $budgetEndDate,
                'companyId'             => 1
            );

            $update = $this->departments_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('departments');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('departments');
            }
        }
    }


    public function publish($id)
    {
        $data = array(
            'is_active'               => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->account_user_model->update($id, $data);
        if ($update) {
            redirect('account_user');
        } else {
            redirect('account_user');
        }
    }


    public function unpublish($id)
    {
        $data = array(
            'is_active'               => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->account_user_model->update($id, $data);
        if ($update) {
            redirect('account_user');
        } else {
            redirect('account_user');
        }
    }

    // public function profile()
    // {
    //     // $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['account_user']       = $this->account_user_model->get_all_join_profile_id('id', 'desc');
    //     // $data['kurir']              = $this->kurir_model->get_all_order_by('id', 'desc');
    //     $data['title']              = 'Profile';
    //     $data['title_foto']         = 'Foto';
    //     $this->template->load('template_neura/index', 'profile/index', $data);
    // }
}
