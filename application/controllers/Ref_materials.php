<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ref_materials extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('ref_materials_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']             = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ref_materials']    = $this->ref_materials_model->get_all('id', 'desc');

        $data['title'] = 'Master Materials';
        $this->template->load('template_neura/index', 'ref_materials/index', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('material_category', 'Material Category', 'required|trim');
        $this->form_validation->set_rules('material_code', 'Material Code', 'required|trim');
        $this->form_validation->set_rules('material_name', 'Material Name', 'required|trim');
        $this->form_validation->set_rules('material_brand', 'Material Brand', 'required|trim');
        $this->form_validation->set_rules('companyId', 'Company Id', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['ref_materials']          = $this->ref_materials_model->get_all('id', 'desc');

            $data['title']              = 'ref_materials';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'ref_materials/index', $data);
        } else {

            $material_category          = htmlspecialchars($this->input->post('material_category'));
            $material_code              = htmlspecialchars($this->input->post('material_code'));
            $material_name              = htmlspecialchars($this->input->post('material_name'));
            $material_brand             = htmlspecialchars($this->input->post('material_brand'));
            $companyId                  = htmlspecialchars($this->input->post('companyId'));
            $status                     = htmlspecialchars($this->input->post('status'));

            $data = array(
                'material_category'     => $material_category,
                'material_code'         => $material_code,
                'material_name'         => $material_name,
                'material_brand'        => $material_brand,
                'companyId'             => 1,
                'status'                => $status
            );

            $insert = $this->ref_materials_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('ref_materials');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('ref_materials');
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->ref_materials_model->delete($id);

        if ($delete) {
            redirect('ref_materials');
        } else {
            redirect('ref_materials');
        }
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('material_category', 'Supplier Name', 'required|trim');
        $this->form_validation->set_rules('material_code', 'Supplier material_code', 'required|trim');
        $this->form_validation->set_rules('material_name', 'Supplier Premise', 'required|trim');
        $this->form_validation->set_rules('material_brand', 'material_brand', 'required|trim');
        $this->form_validation->set_rules('companyId', 'Company Id', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['ref_materials']           = $this->ref_materials_model->get_all('id', 'desc');

            $data['title'] = 'Master Materials';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'ref_materials/index', $data);
        } else {

            $material_category   = htmlspecialchars($this->input->post('material_category'));
            $material_code       = htmlspecialchars($this->input->post('material_code'));
            $material_name       = htmlspecialchars($this->input->post('material_name'));
            $material_brand      = htmlspecialchars($this->input->post('material_brand'));
            $companyId           = htmlspecialchars($this->input->post('companyId'));
            $status              = htmlspecialchars($this->input->post('status'));


            $data = array(
                'material_category'      => $material_category,
                'material_code'          => $material_code,
                'material_name'          => $material_name,
                'material_brand'         => $material_brand,
                'companyId'              => $companyId,
                'status'                 => $status
            );

            $update = $this->ref_materials_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('ref_materials');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('ref_materials');
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
