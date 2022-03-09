<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ref_customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('ref_customers_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']             = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ref_customers']    = $this->ref_customers_model->get_all('id', 'desc');
        $data['option_country']    = $this->ref_customers_model->get_all_country('id', 'desc');

        $data['title'] = 'Master Customers';
        $this->template->load('template_neura/index', 'ref_customers/index', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('company_name', 'Company Name', 'required|trim');
        $this->form_validation->set_rules('brand', 'Brand', 'required|trim');
        $this->form_validation->set_rules('sku', 'SKU', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('street', 'Street', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'required|trim');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('telpon', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('website', 'Website', 'required|trim');
        $this->form_validation->set_rules('customer_type', 'Customer Type', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['ref_customers']      = $this->ref_customers_model->get_all('id', 'desc');
            $data['option_country']     = $this->ref_customers_model->get_all_country('id', 'desc');

            $data['title']              = 'ref_customers';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'ref_customers/index', $data);
        } else {

            $company_name               = htmlspecialchars($this->input->post('company_name'));
            $brand                      = htmlspecialchars($this->input->post('brand'));
            $sku                        = htmlspecialchars($this->input->post('sku'));
            $address                    = htmlspecialchars($this->input->post('address'));
            $street                     = htmlspecialchars($this->input->post('street'));
            $country                    = htmlspecialchars($this->input->post('country'));
            $zipcode                    = htmlspecialchars($this->input->post('zipcode'));
            $city                       = htmlspecialchars($this->input->post('city'));
            $telpon                     = htmlspecialchars($this->input->post('telpon'));
            $email                      = htmlspecialchars($this->input->post('email'));
            $website                    = htmlspecialchars($this->input->post('website'));
            $customer_type              = htmlspecialchars($this->input->post('customer_type'));

            $data = array(
                'company_name'          => $company_name,
                'brand'                 => $brand,
                'sku'                   => $sku,
                'address'               => $address,
                'street'                => $street,
                'country'               => $country,
                'zipcode'               => $zipcode,
                'city'                  => $city,
                'telpon'                => $telpon,
                'email'                 => $email,
                'website'               => $website,
                'customer_type'         => $customer_type
            );

            $insert = $this->ref_customers_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('ref_customers');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('ref_customers');
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->ref_customers_model->delete($id);

        if ($delete) {
            redirect('ref_customers');
        } else {
            redirect('ref_customers');
        }
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('company_name', 'Company Name', 'required|trim');
        $this->form_validation->set_rules('brand', 'Brand', 'required|trim');
        $this->form_validation->set_rules('sku', 'SKU', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('street', 'Street', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'required|trim');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('telpon', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('website', 'Website', 'required|trim');
        $this->form_validation->set_rules('customer_type', 'Customer Type', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['ref_customers']           = $this->ref_customers_model->get_all('id', 'desc');
            $data['option_country']          = $this->ref_customers_model->get_all_country('id', 'desc');

            $data['title'] = 'Master Customers';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'ref_customers/index', $data);
        } else {

            $company_name                    = htmlspecialchars($this->input->post('company_name'));
            $brand                           = htmlspecialchars($this->input->post('brand'));
            $sku                             = htmlspecialchars($this->input->post('sku'));
            $address                         = htmlspecialchars($this->input->post('address'));
            $street                          = htmlspecialchars($this->input->post('street'));
            $country                         = htmlspecialchars($this->input->post('country'));
            $zipcode                         = htmlspecialchars($this->input->post('zipcode'));
            $city                            = htmlspecialchars($this->input->post('city'));
            $telpon                          = htmlspecialchars($this->input->post('telpon'));
            $email                           = htmlspecialchars($this->input->post('email'));
            $website                         = htmlspecialchars($this->input->post('website'));
            $customer_type                   = htmlspecialchars($this->input->post('customer_type'));


            $data = array(
                'company_name'               => $company_name,
                'brand'                      => $brand,
                'sku'                        => $sku,
                'address'                    => $address,
                'street'                     => $street,
                'country'                    => $country,
                'zipcode'                    => $zipcode,
                'city'                       => $city,
                'telpon'                     => $telpon,
                'email'                      => $email,
                'website'                    => $website,
                'customer_type'              => $customer_type
            );

            $update = $this->ref_customers_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('ref_customers');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('ref_customers');
            }
        }
    }


    public function publish($id)
    {
        $data = array(
            'is_active'               => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->ref_customers_model->update($id, $data);
        if ($update) {
            redirect('ref_customers');
        } else {
            redirect('ref_customers');
        }
    }


    public function unpublish($id)
    {
        $data = array(
            'is_active'            => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->ref_customers_model->update($id, $data);
        if ($update) {
            redirect('ref_customers');
        } else {
            redirect('ref_customers');
        }
    }
}
