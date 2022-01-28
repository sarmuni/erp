<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ref_rack_level extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('ref_rack_level_model');
        $this->load->model('ref_rack_location_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']                    = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['ref_rack_level']       = $this->ref_rack_level_model->get_all('id', 'desc');
        $data['ref_rack_location']    = $this->ref_rack_location_model->get_all('id', 'desc');

        $data['title'] = 'Master Rack level';
        $this->template->load('template_neura/index', 'ref_rack_level/index', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('id_rack_loc', 'Name Rack Location', 'required|trim');
        $this->form_validation->set_rules('name', 'Name Rack level', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['ref_rack_level']      = $this->ref_rack_level_model->get_all('id', 'desc');

            $data['title']              = 'Master Rack level';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'ref_rack_level/index', $data);
        } else {

            $id_rack_loc                = htmlspecialchars($this->input->post('id_rack_loc'));
            $name                        = htmlspecialchars($this->input->post('name'));
            $description                 = htmlspecialchars($this->input->post('description'));

             //Global level Number
             $kode = 'GLN-RLD';
             date_default_timezone_set('Asia/Jakarta');
             $tanggal = date('Y-m-d H:i:s');
             $d = date('d', strtotime($tanggal));
             $m = date('m', strtotime($tanggal));
             $y = date('y', strtotime($tanggal));
             $yx = date('Y', strtotime($tanggal));

             $last_code = $this->ref_rack_level_model->get_last_code($d, $m, $yx);
             if (count($last_code) > 0) {
                 // $codes = explode('-', $last_code['gln_zd']);
                 $l_code = substr($last_code['gln_rld'], -4);
                 $count = (int)$l_code + 1;
             } else {
                 $count = 1;
             }
             $count = str_pad($count, 4, '0', STR_PAD_LEFT);
             // $gln_zd = $kode . $d . $m . $y . '-' . str_pad($kurir, '0', STR_PAD_LEFT) . '-' . $count;
             $gln_rld = $kode . $d . $m . $y . '-' . $count;
             //END NO

            $data = array(
                'id_rack_loc'           => $id_rack_loc,
                'gln_rld'               => $gln_rld,
                'name'                   => $name,
                'description'            => $description
            );

            $insert = $this->ref_rack_level_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('ref_rack_level');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('ref_rack_level');
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->ref_rack_level_model->delete($id);

        if ($delete) {
            redirect('ref_rack_level');
        } else {
            redirect('ref_rack_level');
        }
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('id_rack_loc', 'Name Rack Location', 'required|trim');
        $this->form_validation->set_rules('name', 'Name Rack level', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['user']                       = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['ref_rack_level']          = $this->ref_rack_level_model->get_all('id', 'desc');

            $data['title'] = 'Master Rack level';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'ref_rack_level/index', $data);
        } else {

            $id_rack_loc                = htmlspecialchars($this->input->post('id_rack_loc'));
            $name                        = htmlspecialchars($this->input->post('name'));
            $description                 = htmlspecialchars($this->input->post('description'));


            $data = array(
                'id_rack_loc'            => $id_rack_loc,
                'name'                   => $name,
                'description'            => $description
            );

            $update = $this->ref_rack_level_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('ref_rack_level');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('ref_rack_level');
            }
        }
    }


    public function publish($id)
    {
        $data = array(
            'is_active'               => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->ref_rack_level_model->update($id, $data);
        if ($update) {
            redirect('ref_rack_level');
        } else {
            redirect('ref_rack_level');
        }
    }


    public function unpublish($id)
    {
        $data = array(
            'is_active'            => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->ref_rack_level_model->update($id, $data);
        if ($update) {
            redirect('ref_rack_level');
        } else {
            redirect('ref_rack_level');
        }
    }
}
