<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permit_in_out extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('permit_in_out_model');
        $this->load->model('employee_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']                = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['permit_in_out']       = $this->permit_in_out_model->get_all('id', 'desc');
        $data['select_employee']     = $this->employee_model->get_all('id', 'desc');

        $data['title'] = 'Permit In Out';
        $this->template->load('template_neura/index', 'permit_in_out/index', $data);
    }

    public function form()
    {
        $data['user']                = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['permit_in_out']       = $this->permit_in_out_model->get_all('id', 'desc');
        $data['select_employee']     = $this->employee_model->get_all('id', 'desc');

        $data['title'] = 'Permit In Out';
        $this->template->load('template_neura/index', 'permit_in_out/form-add', $data);
    }

    public function form_edit($id)
    {
        $data['user']                = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['permit_in_out']       = $this->permit_in_out_model->get_permit_id($id, 'desc');
        $data['select_employee']     = $this->employee_model->get_all('id', 'desc');

        $data['title'] = 'Permit In Out';
        $this->template->load('template_neura/index', 'permit_in_out/form-edit', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('employee_name', 'Employee Name', 'required|trim');
        $this->form_validation->set_rules('permit_date', 'Permit Date', 'required|trim');
        $this->form_validation->set_rules('necessity', 'Necessity', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('time', 'Time', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['permit_in_out']      = $this->permit_in_out_model->get_all('id', 'desc');
            $data['select_employee']    = $this->employee_model->get_all('id', 'desc');

            $data['title']              = 'Permit In Out';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'permit_in_out/form-add', $data);
        } else {

            $employee_name              = htmlspecialchars($this->input->post('employee_name'));
            $permit_date                = htmlspecialchars($this->input->post('permit_date'));
            $necessity                  = htmlspecialchars($this->input->post('necessity'));
            $category                   = htmlspecialchars($this->input->post('category'));
            $time                       = htmlspecialchars($this->input->post('time'));

            //Global Location Number
            $kode = 'PERMIT';
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date('Y-m-d H:i:s');
            $d = date('d', strtotime($tanggal));
            $m = date('m', strtotime($tanggal));
            $y = date('y', strtotime($tanggal));
            $yx = date('Y', strtotime($tanggal));

            $last_code = $this->permit_in_out_model->get_last_code($d, $m, $yx);
            if (count($last_code) > 0) {
                $l_code = substr($last_code['qrcode_id'], -4);
                $count = (int)$l_code + 1;
            } else {
                $count = 1;
            }
            $count = str_pad($count, 4, '0', STR_PAD_LEFT);
            $qrcode_id = $kode . $d . $m . $y . '-' . $count;
            //END NO

            $data = array(
                'qrcode_id'             => $qrcode_id,
                'employee_name'         => $employee_name,
                'permit_date'           => $permit_date,
                'necessity'             => $necessity,
                'category'              => $category,
                'time'                  => $time
            );

            $insert = $this->permit_in_out_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('permit_in_out');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('permit_in_out');
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->permit_in_out_model->delete($id);

        if ($delete) {
            redirect('permit_in_out');
        } else {
            redirect('permit_in_out');
        }
    }

    
    public function deleteAll()
    {        
        $id     = $this->input->post('id');
        $delete = $this->permit_in_out_model->deleteAll($id); 
        if ($delete) {
            redirect('permit_in_out');
        } else {
            redirect('permit_in_out');
        }
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('employee_name', 'Employee Name', 'required|trim');
        $this->form_validation->set_rules('permit_date', 'Permit Date', 'required|trim');
        $this->form_validation->set_rules('necessity', 'Necessity', 'required|trim');
        $this->form_validation->set_rules('time', 'Time', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['permit_in_out']           = $this->permit_in_out_model->get_all('id', 'desc');

            $data['title'] = 'Master Permit In Out';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'permit_in_out/form-edit', $data);
        } else {

            $employee_name          = htmlspecialchars($this->input->post('employee_name'));
            $permit_date            = htmlspecialchars($this->input->post('permit_date'));
            $necessity              = htmlspecialchars($this->input->post('necessity'));
            $category               = htmlspecialchars($this->input->post('category'));
            $time                   = htmlspecialchars($this->input->post('time'));

            $data = array(
                'employee_name'     => $employee_name,
                'permit_date'       => $permit_date,
                'necessity'         => $necessity,
                'category'          => $category,
                'time'              => $time
            );



            $update = $this->permit_in_out_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('permit_in_out');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('permit_in_out');
            }
        }
    }


    public function aprov_depart_head($id)
    {
        $data = array(
            'status'              => 1,
            'aprov_depart_head'   => $this->session->fullname,
            'date_depart_head'    => date('Y-m-d H:i:s')
        );

        $update = $this->permit_in_out_model->update($id, $data);
        if ($update) {
            redirect('permit_in_out');
        } else {
            redirect('permit_in_out');
        }
    }



    public function aprov_security_pos($id)
    {
        $data = array(
            'status'              => 2,
            'aprov_security_pos'   => $this->session->fullname,
            'date_security_pos'    => date('Y-m-d H:i:s')
        );

        $update = $this->permit_in_out_model->update($id, $data);
        if ($update) {
            redirect('permit_in_out');
        } else {
            redirect('permit_in_out');
        }
    }

    public function aprov_hrd_manager($id)
    {
        $data = array(
            'status'              => 3,
            'aprov_hrd_manager'   => $this->session->fullname,
            'date_hrd_manager'    => date('Y-m-d H:i:s')
        );

        $update = $this->permit_in_out_model->update($id, $data);
        if ($update) {
            redirect('permit_in_out');
        } else {
            redirect('permit_in_out');
        }
    }


    // public function unpublish($id)
    // {
    //     $data = array(
    //         'is_active'               => 0,
    //         'user_admin_update'    => $this->session->role_id
    //     );

    //     $update = $this->account_user_model->update($id, $data);
    //     if ($update) {
    //         redirect('account_user');
    //     } else {
    //         redirect('account_user');
    //     }
    // }
}
