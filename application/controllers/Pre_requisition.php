<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pre_requisition extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('pre_requisition_model');
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


        if ($this->form_validation->run() == false) {
            $data['user']                       = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['pre_requisition']            = $this->pre_requisition_model->get_all('id', 'desc');
            $data['option_departments']         = $this->pre_requisition_model->departments();

            $data['title']              = 'Pre Requisition';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'pre_requisition/index', $data);
        } else {

            $pre_code               = $this->input->post('pre_code');
            $pre_date               = htmlspecialchars($this->input->post('pre_date'));
            $pre_deadline_date      = htmlspecialchars($this->input->post('pre_deadline_date'));
            $request_user_id        = htmlspecialchars($this->input->post('request_user_id'));
            $department_id          = htmlspecialchars($this->input->post('department_id'));
            $request_status         = htmlspecialchars($this->input->post('request_status'));
            $notes                  = htmlspecialchars($this->input->post('notes'));
            $item_name              = htmlspecialchars($this->input->post('item_name'));
            $pre_qty                = htmlspecialchars($this->input->post('pre_qty'));
            $data = array();

            $data = array(
                'pre_code'          => $pre_code,
                'pre_date'          => $pre_date,
                'pre_deadline_date' => $pre_deadline_date,
                'request_user_id'   => $request_user_id,
                'department_id'     => $department_id,
                'request_status'    => $request_status,
                'notes'             => $notes
            );

            $insert = $this->pre_requisition_model->insert($data);
            
            $index = 0;
            foreach($pre_code as $datapre_code){
                    array_push($data, array(        
                        'item_pre_code'=>$datapre_code,        
                        'item_name'=>$item_name[$index],          
                        'pre_qty'=>$pre_qty[$index],
                    ));
            $index++;    
            }
            $insert = $this->pre_requisition_model->insert_batch($data);


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


    public function delete($id)
    {

        $delete = $this->pre_requisition_model->delete($id);

        if ($delete) {
            redirect('pre_requisition');
        } else {
            redirect('pre_requisition');
        }
    }


    public function edit($id)
    {

        $this->form_validation->set_rules('person_id', 'Person ID', 'required|trim');
        $this->form_validation->set_rules('person_name', 'Person Name', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('contact', 'Contact', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('effective_time', 'Effective Time', 'required|trim');
        $this->form_validation->set_rules('card_no', 'Card No', 'required|trim');
        $this->form_validation->set_rules('room_no', 'Room No', 'required|trim');
        $this->form_validation->set_rules('floor_no', 'Floor No', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Active', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['pre_requisition']           = $this->pre_requisition_model->get_all('id', 'desc');


            $data['title'] = 'pre_requisition';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'pre_requisition/index', $data);

        } else {

            $person_id          = htmlspecialchars($this->input->post('person_id'));
            $person_name        = htmlspecialchars($this->input->post('person_name'));
            $gender             = htmlspecialchars($this->input->post('gender'));
            $contact            = htmlspecialchars($this->input->post('contact'));
            $email              = htmlspecialchars($this->input->post('email'));
            $effective_time     = htmlspecialchars($this->input->post('effective_time'));
            $card_no            = htmlspecialchars($this->input->post('card_no'));
            $room_no            = htmlspecialchars($this->input->post('room_no'));
            $floor_no           = htmlspecialchars($this->input->post('floor_no'));
            $is_active          = htmlspecialchars($this->input->post('is_active'));


            $data = array(
                'person_id'      => $person_id,
                'person_name'    => $person_name,
                'gender'         => $gender,
                'contact'        => $contact,
                'email'          => $email,
                'effective_time' => $effective_time,
                'card_no'        => $card_no,
                'room_no'        => $room_no,
                'floor_no'       => $floor_no,
                'is_active'      => $is_active,
                'company_id'      => 1
            );

            $update = $this->pre_requisition_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('pre_requisition');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('pre_requisition');
            }
        }
    }


    public function publish($id)
    {
        $data = array(
            'is_active'            => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->pre_requisition_model->update($id, $data);
        if ($update) {
            redirect('pre_requisition');
        } else {
            redirect('pre_requisition');
        }
    }


    public function unpublish($id)
    {
        $data = array(
            'is_active'            => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->pre_requisition_model->update($id, $data);
        if ($update) {
            redirect('pre_requisition');
        } else {
            redirect('pre_requisition');
        }
    }

}
