<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pre_requisition extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('pre_requisition_model');
        $this->load->model('pre_requisition_detail_model');
        $this->load->model('departments_model');
        $this->load->model('employee_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        $data['user']                          = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pre_requisition']               = $this->pre_requisition_model->get_all('id', 'desc');
        $data['option_departments']            = $this->pre_requisition_model->departments();
        $data['part_departments']              = $this->pre_requisition_model->part_departments();
        $data['employee']                      = $this->employee_model->get_all('id','desc');

        $id                                    = $this->session->userdata('id');
        $data['head_employee']                 = $this->pre_requisition_model->call_function_procedure_head_of_dept($id);

        $data['title'] = 'Pre Requisition';
        $this->template->load('template_neura/index', 'pre_requisition/index', $data);
    }

    public function form()
    {
        //Global Location Number
        $kode = 'PRE-REQ';
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
        $d = date('d', strtotime($tanggal));
        $m = date('m', strtotime($tanggal));
        $y = date('y', strtotime($tanggal));
        $yx = date('Y', strtotime($tanggal));

        $last_code = $this->pre_requisition_model->get_last_code($d, $m, $yx);
        if ($last_code > 0) {
            $l_code = substr($last_code['pre_code'], -4);
            $count = (int)$l_code + 1;
        } else {
            $count = 1;
        }
        $count = str_pad($count, 4, '0', STR_PAD_LEFT);

        $data['pre_code'] = $kode . $d . $m . $y . '-' . $count;
        //END NO

        $data['user']                          = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pre_requisition']               = $this->pre_requisition_model->get_all('id', 'desc');
        $data['option_departments']            = $this->pre_requisition_model->departments();
        $data['part_departments']              = $this->pre_requisition_model->part_departments();

        $data['title'] = 'Form Pre Requisition';
        $data['title_items'] = 'Detail Items';
        $this->template->load('template_neura/index', 'pre_requisition/form', $data);
    }

    public function view($id,$pre_code)
    {
        $data['user']                          = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pre_requisition']               = $this->pre_requisition_model->get_by_id($id);
        $data['pre_requisition_detail']        = $this->pre_requisition_detail_model->get_all_item($pre_code);
        $data['option_departments']            = $this->pre_requisition_model->departments();
        $data['part_departments']              = $this->pre_requisition_model->part_departments();
        $data['employee']                      = $this->employee_model->get_all('id','desc');

        $data['title'] = 'View Pre Requisition';
        $this->template->load('template_neura/index', 'pre_requisition/view', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('pre_code', 'Pre Requisition Code', 'required|trim');
        $this->form_validation->set_rules('pre_date', 'Pre Requisition Date', 'required|trim');
        $this->form_validation->set_rules('pre_deadline_date', 'Pre Requisition Deadline Date', 'required|trim');
        $this->form_validation->set_rules('request_user_id', 'Request User', 'required|trim');
        $this->form_validation->set_rules('department_id', 'Departements ', 'required|trim');
        $this->form_validation->set_rules('request_status', 'Request Status', 'required|trim');
        $this->form_validation->set_rules('notes', 'Notes', 'required|trim');
        $this->form_validation->set_rules('item_name', 'Description Details', 'required|trim');
        $this->form_validation->set_rules('pre_qty', 'Qty', 'required|trim');


        if ($this->form_validation->run() == true) {

            $data['user']                       = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['pre_requisition']            = $this->pre_requisition_model->get_all('id', 'desc');
            $data['option_departments']         = $this->pre_requisition_model->departments();

            $data['title']              = 'Pre Requisition';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'pre_requisition/index', $data);
        } else {

            $pre_code               = $this->input->post('pre_code');
            $pre_date               = $this->input->post('pre_date');
            $pre_deadline_date      = $this->input->post('pre_deadline_date');
            $request_user_id        = $this->input->post('request_user_id');
            $department_id          = $this->input->post('department_id');
            $request_status         = $this->input->post('request_status');
            $notes                  = $this->input->post('notes');
            $item_name              = $this->input->post('item_name');
            $pre_qty                = $this->input->post('pre_qty');

            $data = array(
                'pre_code'          => $pre_code,
                'pre_date'          => $pre_date,
                'pre_deadline_date' => $pre_deadline_date,
                'request_user_id'   => $request_user_id,
                'department_id'     => $department_id,
                'request_status'    => $request_status,
                'notes'             => $notes,
                'input_by'          => $this->session->userdata('fullname'),
                'input_date'        => date('Y-m-d H:i:s')
            );

            $insert = $this->pre_requisition_model->insert($data);

            $measurement            = $this->input->post('measurement');
            $estimated_price        = $this->input->post('estimated_price');
            $item_name              = $this->input->post('item_name');
            $pre_qty                = $this->input->post('pre_qty');
            $status                 = $this->input->post('status');
            $data1 = array();   
            
            $index = 0;
            foreach($item_name as $k){
              array_push($data1, array(
              'item_pre_code'       => $pre_code,  
              'item_name'           => $k,  
              'pre_qty'             => $pre_qty[$index],
              'measurement'         => strtoupper($measurement[$index]),
              'estimated_price'     => $estimated_price[$index],
              'status'              => $status[$index],
              'createdBy'           => $this->session->userdata('fullname'),
              'created_at'          => date('Y-m-d H:i:s'),
              ));
              $index++;
            }

               
            $insert = $this->db->insert_batch('pre_requisition_item_detail', $data1);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('pre_requisition');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('pre_requisition');
            }
        }
    }

    function ambil_data()
    {

        $modul      = $this->input->post('modul');
        $id         = $this->input->post('id');

        if ($modul == "part_departments_id") {
            echo $this->pre_requisition_model->part_departments_id($id);
        } 
        // else if ($modul == "kecamatan") {
        //     echo $this->pelanggan_model->kecamatan($id);
        // } else if ($modul == "kelurahan") {
        //     echo $this->pelanggan_model->kelurahan($id);
        // } else if ($modul == "id_barang") {
        //     echo $this->daftar_barang_model->daftar_barang_detail($id);
        // }
    }


    public function delete($id,$pre_code)
    {

        $delete = $this->pre_requisition_model->delete($id);
        $delete = $this->pre_requisition_detail_model->delete_item($pre_code);

        if ($delete) {
            redirect('pre_requisition');
        } else {
            redirect('pre_requisition');
        }
    }


    public function delete_items($id_pre,$pre_code,$id)
    {

        $delete = $this->pre_requisition_detail_model->delete($id);

        if ($delete) {
            redirect('pre_requisition/form_edit/' . $id_pre . '/' . $pre_code);
        } else {
            redirect('pre_requisition/form_edit/' . $id_pre . '/' . $pre_code);
        }
    }


    public function form_edit()
    {
        $id = $this->uri->segment(3);
        $pre_code = $this->uri->segment(4);

        $data['user']                          = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pre_requisition']               = $this->pre_requisition_model->get_by_id($id);
        $data['pre_requisition_detail']        = $this->pre_requisition_detail_model->get_all_item($pre_code);
        $data['option_departments']            = $this->pre_requisition_model->departments();
        $data['part_departments']              = $this->pre_requisition_model->part_departments();

        $data['title'] = 'Form Edit Pre Requisition';
        $data['title_items'] = 'Edit Detail Items';
        $this->template->load('template_neura/index', 'pre_requisition/edit', $data);
    }

    public function edit($id)
    {

        $this->form_validation->set_rules('pre_code', 'Pre Requisition Code', 'required|trim');
        $this->form_validation->set_rules('pre_date', 'Pre Requisition Date', 'required|trim');
        $this->form_validation->set_rules('pre_deadline_date', 'Pre Requisition Deadline Date', 'required|trim');
        $this->form_validation->set_rules('request_user_id', 'Request User', 'required|trim');
        $this->form_validation->set_rules('department_id', 'Departements ', 'required|trim');
        $this->form_validation->set_rules('request_status', 'Request Status', 'required|trim');
        $this->form_validation->set_rules('notes', 'Notes', 'required|trim');
        $this->form_validation->set_rules('item_name', 'Description Details', 'required|trim');
        $this->form_validation->set_rules('pre_qty', 'Qty', 'required|trim');

        if ($this->form_validation->run() == true) {

            $id = $this->uri->segment(3);
            $pre_code = $this->uri->segment(4);
    
            $data['user']                          = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['pre_requisition']               = $this->pre_requisition_model->get_by_id($id);
            $data['pre_requisition_detail']        = $this->pre_requisition_detail_model->get_all_item($pre_code);
            $data['option_departments']            = $this->pre_requisition_model->departments();
            $data['part_departments']              = $this->pre_requisition_model->part_departments();
    
            $data['title'] = 'Form Edit Pre Requisition';
            $data['title_items'] = 'Edit Detail Items';
            $this->template->load('template_neura/index', 'pre_requisition/edit', $data);

        } else {

            $pre_code               = $this->input->post('pre_code');
            $pre_date               = $this->input->post('pre_date');
            $pre_deadline_date      = $this->input->post('pre_deadline_date');
            $request_user_id        = $this->input->post('request_user_id');
            $department_id          = $this->input->post('department_id');
            $request_status         = $this->input->post('request_status');
            $notes                  = $this->input->post('notes');
            $item_name              = $this->input->post('item_name');
            $pre_qty                = $this->input->post('pre_qty');

            $data = array(
                'pre_code'          => $pre_code,
                'pre_date'          => $pre_date,
                'pre_deadline_date' => $pre_deadline_date,
                'request_user_id'   => $request_user_id,
                'department_id'     => $department_id,
                'request_status'    => $request_status,
                'notes'             => $notes,
                'updatedBy'         => $this->session->userdata('fullname'),
                'updated_at'        => date('Y-m-d H:i:s')
            );

            $update = $this->pre_requisition_model->update($id, $data);

            $delete = $this->pre_requisition_detail_model->delete_item($pre_code);

            $measurement            = $this->input->post('measurement');
            $estimated_price        = $this->input->post('estimated_price');
            $item_name              = $this->input->post('item_name');
            $pre_qty                = $this->input->post('pre_qty');
            $status                 = $this->input->post('status');
            $data1 = array();   
            
            $index = 0;
            foreach($item_name as $k){
              array_push($data1, array(
              'item_pre_code'       => $pre_code,  
              'item_name'           => $k,  
              'pre_qty'             => $pre_qty[$index],
              'measurement'         => strtoupper($measurement[$index]),
              'estimated_price'     => $estimated_price[$index],
              'status'              => $status[$index],
              'createdBy'           => $this->session->userdata('fullname'),
              'created_at'          => date('Y-m-d H:i:s'),
              ));
              $index++;
            }

            $insert = $this->db->insert_batch('pre_requisition_item_detail', $data1);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('pre_requisition');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('pre_requisition');
            }
        }
    }


    public function pre_req_aprov_hod($id)
    {
        $data = array(
            'status'               => 1,
            'approved_hod_date'    => date('Y-m-d H:i:s'),
            'approved_hod_by'      => $this->session->fullname
        );

        $update = $this->pre_requisition_model->update($id, $data);
        if ($update) {
            redirect('pre_requisition');
        } else {
            redirect('pre_requisition');
        }
    }


    public function pre_req_aprov_purchasing($id)
    {
        $data = array(
            'status'                    => 2,
            'verified_purchasing_date'  => date('Y-m-d H:i:s'),
            'verified_purchasing_by'    => $this->session->fullname
        );

        $update = $this->pre_requisition_model->update($id, $data);
        if ($update) {
            redirect('pre_requisition');
        } else {
            redirect('pre_requisition');
        }
    }

    public function pre_req_approved_bod($id)
    {
        $data = array(
            'status'                    => 3,
            'approved_bod_by_date'      => date('Y-m-d H:i:s'),
            'approved_bod_by'           => $this->session->fullname
        );

        $update = $this->pre_requisition_model->update($id, $data);
        if ($update) {
            redirect('pre_requisition');
        } else {
            redirect('pre_requisition');
        }
    }

    public function pre_req_approved_finance($id)
    {
        $data = array(
            'status'                    => 4,
            'approved_finance_date'     => date('Y-m-d H:i:s'),
            'approved_finance_by'       => $this->session->fullname
        );

        $update = $this->pre_requisition_model->update($id, $data);
        if ($update) {
            redirect('pre_requisition');
        } else {
            redirect('pre_requisition');
        }
    }

}
