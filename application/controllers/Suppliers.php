<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('suppliers_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']             = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suppliers']        = $this->suppliers_model->get_all('id', 'desc');

        $data['title'] = 'Suppliers';
        $this->template->load('template_neura/index', 'suppliers/index', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('supplierName', 'Supplier Name', 'required|trim');
        $this->form_validation->set_rules('address', 'Supplier Address', 'required|trim');
        $this->form_validation->set_rules('location', 'Supplier Premise', 'required|trim');
        $this->form_validation->set_rules('website', 'Website', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('remarks', 'Remarks', 'required|trim');
        $this->form_validation->set_rules('supplierDiscount', 'Supplier Discount Percentage', 'required|trim');
        $this->form_validation->set_rules('picSupplier', 'PIC Supplier', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['suppliers']          = $this->suppliers_model->get_all('id', 'desc');

            $data['title']              = 'Suppliers';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'suppliers/index', $data);
        } else {

            $supplierName       = htmlspecialchars($this->input->post('supplierName'));
            $address            = htmlspecialchars($this->input->post('address'));
            $location           = htmlspecialchars($this->input->post('location'));
            $website            = htmlspecialchars($this->input->post('website'));
            $email              = htmlspecialchars($this->input->post('email'));
            $phone              = htmlspecialchars($this->input->post('phone'));
            $remarks            = htmlspecialchars($this->input->post('remarks'));
            $supplierDiscount   = htmlspecialchars($this->input->post('supplierDiscount'));
            $picSupplier        = htmlspecialchars($this->input->post('picSupplier'));


            $data = array(
                'supplierName'      => $supplierName,
                'address'           => $address,
                'location'          => $location,
                'website'           => $website,
                'email'             => $email,
                'phone'             => $phone,
                'remarks'           => $remarks,
                'supplierDiscount'  => $supplierDiscount,
                'picSupplier'       => $picSupplier,
                'companyId'         => 1
            );

            $insert = $this->suppliers_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('suppliers');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('suppliers');
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->suppliers_model->delete($id);

        if ($delete) {
            redirect('suppliers');
        } else {
            redirect('suppliers');
        }
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('supplierName', 'Supplier Name', 'required|trim');
        $this->form_validation->set_rules('address', 'Supplier Address', 'required|trim');
        $this->form_validation->set_rules('location', 'Supplier Premise', 'required|trim');
        $this->form_validation->set_rules('website', 'Website', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('remarks', 'Remarks', 'required|trim');
        $this->form_validation->set_rules('supplierDiscount', 'Supplier Discount Percentage', 'required|trim');
        $this->form_validation->set_rules('picSupplier', 'PIC Supplier', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['suppliers']           = $this->suppliers_model->get_all('id', 'desc');

            $data['title'] = 'suppliers';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'suppliers/index', $data);
        } else {

            $supplierName       = htmlspecialchars($this->input->post('supplierName'));
            $address            = htmlspecialchars($this->input->post('address'));
            $location           = htmlspecialchars($this->input->post('location'));
            $website            = htmlspecialchars($this->input->post('website'));
            $email              = htmlspecialchars($this->input->post('email'));
            $phone              = htmlspecialchars($this->input->post('phone'));
            $remarks            = htmlspecialchars($this->input->post('remarks'));
            $supplierDiscount   = htmlspecialchars($this->input->post('supplierDiscount'));
            $picSupplier        = htmlspecialchars($this->input->post('picSupplier'));

            $data = array(
                'supplierName'      => $supplierName,
                'address'           => $address,
                'location'          => $location,
                'website'           => $website,
                'email'             => $email,
                'phone'             => $phone,
                'remarks'           => $remarks,
                'supplierDiscount'  => $supplierDiscount,
                'picSupplier'       => $picSupplier,
                'companyId'         => 1
            );

            $update = $this->suppliers_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('suppliers');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('suppliers');
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
