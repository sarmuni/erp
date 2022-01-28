<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ref_area_zone extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('ref_area_zone_model');
        $this->load->model('ref_zone_division_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']                    = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['ref_area_zone']           = $this->ref_area_zone_model->get_all('id', 'desc');
        $data['ref_zone_division']       = $this->ref_zone_division_model->get_all('id', 'desc');

        $data['title'] = 'Master Area Zone';
        $this->template->load('template_neura/index', 'ref_area_zone/index', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('id_zone_division', 'Zone Name Division', 'required|trim');
        $this->form_validation->set_rules('name', 'Area Name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['ref_area_zone']      = $this->ref_area_zone_model->get_all('id', 'desc');

            $data['title']              = 'Master Area Zone';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'ref_area_zone/index', $data);
        } else {

            $id_zone_division            = htmlspecialchars($this->input->post('id_zone_division'));
            $name                        = htmlspecialchars($this->input->post('name'));
            $description                 = htmlspecialchars($this->input->post('description'));

             //Global Location Number
             $kode = 'GLN-AZ';
             date_default_timezone_set('Asia/Jakarta');
             $tanggal = date('Y-m-d H:i:s');
             $d = date('d', strtotime($tanggal));
             $m = date('m', strtotime($tanggal));
             $y = date('y', strtotime($tanggal));
             $yx = date('Y', strtotime($tanggal));

             $last_code = $this->ref_area_zone_model->get_last_code($d, $m, $yx);
             if (count($last_code) > 0) {
                 // $codes = explode('-', $last_code['gln_zd']);
                 $l_code = substr($last_code['gln_az'], -4);
                 $count = (int)$l_code + 1;
             } else {
                 $count = 1;
             }
             $count = str_pad($count, 4, '0', STR_PAD_LEFT);
             // $gln_zd = $kode . $d . $m . $y . '-' . str_pad($kurir, '0', STR_PAD_LEFT) . '-' . $count;
             $gln_az = $kode . $d . $m . $y . '-' . $count;
             //END NO

            $data = array(
                'id_zone_division'       => $id_zone_division,
                'gln_az'                 => $gln_az,
                'name'                   => $name,
                'description'            => $description
            );

            $insert = $this->ref_area_zone_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('ref_area_zone');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('ref_area_zone');
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->ref_area_zone_model->delete($id);

        if ($delete) {
            redirect('ref_area_zone');
        } else {
            redirect('ref_area_zone');
        }
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('id_zone_division', 'Zone Name', 'required|trim');
        $this->form_validation->set_rules('name', 'Area Name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['user']                       = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['ref_area_zone']          = $this->ref_area_zone_model->get_all('id', 'desc');

            $data['title'] = 'Master Zone Division';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'ref_area_zone/index', $data);
        } else {

            $id_zone_division            = htmlspecialchars($this->input->post('id_zone_division'));
            $name                        = htmlspecialchars($this->input->post('name'));
            $description                 = htmlspecialchars($this->input->post('description'));


            $data = array(
                'id_zone_division'       => $id_zone_division,
                'name'                   => $name,
                'description'            => $description
            );

            $update = $this->ref_area_zone_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('ref_area_zone');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('ref_area_zone');
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
