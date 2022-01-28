<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ref_location_factory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('ref_location_factory_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']                       = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ref_location_factory']       = $this->ref_location_factory_model->get_all('id', 'desc');

        $data['title'] = 'Master Location Factory';
        $this->template->load('template_neura/index', 'ref_location_factory/index', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('company_id', 'Name Campany', 'required|trim');
        $this->form_validation->set_rules('name', 'Name Factory', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('province', 'Province', 'required|trim');
        $this->form_validation->set_rules('district', 'District', 'required|trim');
        $this->form_validation->set_rules('village', 'Village', 'required|trim');
        $this->form_validation->set_rules('postal_code', 'Postal Code', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('contact', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['ref_location_factory']          = $this->ref_location_factory_model->get_all('id', 'desc');

            $data['title']              = 'Location Factory';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'ref_location_factory/index', $data);
        } else {

            $company_id                  = htmlspecialchars($this->input->post('company_id'));
            $name                        = htmlspecialchars($this->input->post('name'));
            $country                     = htmlspecialchars($this->input->post('country'));
            $province                    = htmlspecialchars($this->input->post('province'));
            $district                    = htmlspecialchars($this->input->post('district'));
            $village                     = htmlspecialchars($this->input->post('village'));
            $postal_code                 = htmlspecialchars($this->input->post('postal_code'));
            $address                     = htmlspecialchars($this->input->post('address'));
            $contact                     = htmlspecialchars($this->input->post('contact'));
            $email                       = htmlspecialchars($this->input->post('email'));
            $description                 = htmlspecialchars($this->input->post('description'));

             //Global Location Number
             $kode = 'GLN';
             date_default_timezone_set('Asia/Jakarta');
             $tanggal = date('Y-m-d H:i:s');
             $d = date('d', strtotime($tanggal));
             $m = date('m', strtotime($tanggal));
             $y = date('y', strtotime($tanggal));
             $yx = date('Y', strtotime($tanggal));

             $last_code = $this->ref_location_factory_model->get_last_code($d, $m, $yx);
             if (count($last_code) > 0) {
                 // $codes = explode('-', $last_code['global_location_number']);
                 $l_code = substr($last_code['global_location_number'], -4);
                 $count = (int)$l_code + 1;
             } else {
                 $count = 1;
             }
             $count = str_pad($count, 4, '0', STR_PAD_LEFT);
             // $global_location_number = $kode . $d . $m . $y . '-' . str_pad($kurir, '0', STR_PAD_LEFT) . '-' . $count;
             $global_location_number = $kode . $d . $m . $y . '-' . $count;
             //END NO



            $data = array(
                'company_id'             => $company_id,
                'global_location_number' => $global_location_number,
                'name'                   => $name,
                'country'                => $country,
                'province'               => $province,
                'district'               => $district,
                'village'                => $village,
                'postal_code'            => $postal_code,
                'address'                => $address,
                'contact'                => $contact,
                'email'                  => $email,
                'description'            => $description
            );

            $insert = $this->ref_location_factory_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('ref_location_factory');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('ref_location_factory');
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->ref_location_factory_model->delete($id);

        if ($delete) {
            redirect('ref_location_factory');
        } else {
            redirect('ref_location_factory');
        }
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('company_id', 'Name Campany', 'required|trim');
        $this->form_validation->set_rules('name', 'Name Factory', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('province', 'Province', 'required|trim');
        $this->form_validation->set_rules('district', 'District', 'required|trim');
        $this->form_validation->set_rules('village', 'Village', 'required|trim');
        $this->form_validation->set_rules('postal_code', 'Postal Code', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('contact', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['ref_location_factory']           = $this->ref_location_factory_model->get_all('id', 'desc');

            $data['title'] = 'Master Location Factory';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'ref_location_factory/index', $data);
        } else {

            $company_id                  = htmlspecialchars($this->input->post('company_id'));
            $name                        = htmlspecialchars($this->input->post('name'));
            $country                     = htmlspecialchars($this->input->post('country'));
            $province                    = htmlspecialchars($this->input->post('province'));
            $district                    = htmlspecialchars($this->input->post('district'));
            $village                     = htmlspecialchars($this->input->post('village'));
            $postal_code                 = htmlspecialchars($this->input->post('postal_code'));
            $address                     = htmlspecialchars($this->input->post('address'));
            $contact                     = htmlspecialchars($this->input->post('contact'));
            $email                       = htmlspecialchars($this->input->post('email'));
            $description                 = htmlspecialchars($this->input->post('description'));


            $data = array(
                'company_id'             => $company_id,
                'name'                   => $name,
                'country'                => $country,
                'province'               => $province,
                'district'               => $district,
                'village'                => $village,
                'postal_code'            => $postal_code,
                'address'                => $address,
                'contact'                => $contact,
                'email'                  => $email,
                'description'            => $description
            );

            $update = $this->ref_location_factory_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('ref_location_factory');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('ref_location_factory');
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
