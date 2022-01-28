<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ref_driver extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('ref_driver_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']             = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ref_driver']       = $this->ref_driver_model->get_all('id', 'desc');

        $data['title'] = 'Master Driver';
        $this->template->load('template_neura/index', 'ref_driver/index', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('nik', 'Material Category', 'required|trim');
        $this->form_validation->set_rules('name', 'Material Code', 'required|trim');
        $this->form_validation->set_rules('gender', 'Material Name', 'required|trim');
        $this->form_validation->set_rules('phone_number', 'Material Brand', 'required|trim');
        $this->form_validation->set_rules('email', 'Company Id', 'required|trim');
        $this->form_validation->set_rules('sim_card', 'SIM Number', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['ref_driver']          = $this->ref_driver_model->get_all('id', 'desc');

            $data['title']              = 'ref_driver';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'ref_driver/index', $data);
        } else {

            $nik                        = htmlspecialchars($this->input->post('nik'));
            $name                       = htmlspecialchars($this->input->post('name'));
            $gender                     = htmlspecialchars($this->input->post('gender'));
            $phone_number               = htmlspecialchars($this->input->post('phone_number'));
            $email                      = htmlspecialchars($this->input->post('email'));
            $sim_card                   = htmlspecialchars($this->input->post('sim_card'));
            $address                    = htmlspecialchars($this->input->post('address'));

            $data = array(
                'nik'                   => $nik,
                'name'                  => $name,
                'gender'                => $gender,
                'phone_number'          => $phone_number,
                'email'                 => $email,
                'sim_card'              => $sim_card,
                'address'               => $address
            );

            $insert = $this->ref_driver_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('ref_driver');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('ref_driver');
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->ref_driver_model->delete($id);

        if ($delete) {
            redirect('ref_driver');
        } else {
            redirect('ref_driver');
        }
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('nik', 'Supplier Name', 'required|trim');
        $this->form_validation->set_rules('name', 'Supplier name', 'required|trim');
        $this->form_validation->set_rules('gender', 'Supplier Premise', 'required|trim');
        $this->form_validation->set_rules('phone_number', 'phone_number', 'required|trim');
        $this->form_validation->set_rules('email', 'Company Id', 'required|trim');
        $this->form_validation->set_rules('sim_card', 'SIM Number', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['ref_driver']           = $this->ref_driver_model->get_all('id', 'desc');

            $data['title'] = 'Master driver';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'ref_driver/index', $data);
        } else {

            $nik                    = htmlspecialchars($this->input->post('nik'));
            $name                   = htmlspecialchars($this->input->post('name'));
            $gender                 = htmlspecialchars($this->input->post('gender'));
            $phone_number           = htmlspecialchars($this->input->post('phone_number'));
            $email                  = htmlspecialchars($this->input->post('email'));
            $sim_card               = htmlspecialchars($this->input->post('sim_card'));
            $address                = htmlspecialchars($this->input->post('address'));


            $data = array(
                'nik'               => $nik,
                'name'              => $name,
                'gender'            => $gender,
                'phone_number'      => $phone_number,
                'email'             => $email,
                'sim_card'          => $sim_card,
                'address'           => $address
            );

            $update = $this->ref_driver_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('ref_driver');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('ref_driver');
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
}
