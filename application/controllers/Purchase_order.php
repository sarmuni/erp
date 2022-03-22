<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('requisition_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['purchase_order'] = $this->requisition_model->get_all_po('id', 'desc');

        $data['title'] = 'Purchase Order';
        $this->template->load('template_neura/index', 'purchase_order/index', $data);
    }

    // public function add()
    // {

    //     $this->form_validation->set_rules('person_id', 'Person ID', 'required|trim');
    //     $this->form_validation->set_rules('person_name', 'Person Name', 'required|trim');
    //     $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
    //     $this->form_validation->set_rules('contact', 'Contact', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim');
    //     $this->form_validation->set_rules('effective_time', 'Effective Time', 'required|trim');
    //     $this->form_validation->set_rules('card_no', 'Card No', 'required|trim');
    //     $this->form_validation->set_rules('room_no', 'Room No', 'required|trim');
    //     $this->form_validation->set_rules('floor_no', 'Floor No', 'required|trim');
    //     $this->form_validation->set_rules('is_active', 'Active', 'required|trim');


    //     if ($this->form_validation->run() == false) {
    //         $data['user']                       = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['employee']                   = $this->employee_model->get_all('id', 'desc');
    //         $data['option_departments']         = $this->employee_model->departments();

    //         $data['title']              = 'Employee';
    //         $this->session->set_flashdata('required', 'incomplete data');
    //         $this->template->load('template_neura/index', 'employee/index', $data);
    //     } else {

    //         $person_id          = htmlspecialchars($this->input->post('person_id'));
    //         $person_name        = htmlspecialchars($this->input->post('person_name'));
    //         $gender             = htmlspecialchars($this->input->post('gender'));
    //         $contact            = htmlspecialchars($this->input->post('contact'));
    //         $email              = htmlspecialchars($this->input->post('email'));
    //         $effective_time     = htmlspecialchars($this->input->post('effective_time'));
    //         $card_no            = htmlspecialchars($this->input->post('card_no'));
    //         $room_no            = htmlspecialchars($this->input->post('room_no'));
    //         $floor_no           = htmlspecialchars($this->input->post('floor_no'));
    //         $is_active          = htmlspecialchars($this->input->post('is_active'));


    //         $data = array(
    //             'person_id'      => $person_id,
    //             'person_name'    => $person_name,
    //             'gender'         => $gender,
    //             'contact'        => $contact,
    //             'email'          => $email,
    //             'effective_time' => $effective_time,
    //             'card_no'        => $card_no,
    //             'room_no'        => $room_no,
    //             'floor_no'       => $floor_no,
    //             'is_active'      => $is_active,
    //             'company_id'      => 1
    //         );

    //         $insert = $this->employee_model->insert($data);

    //         if ($insert) {
    //             $this->session->set_flashdata('message', 'Success');
    //             redirect('employee');
    //         } else {
    //             $this->session->set_flashdata('message', 'Failed');
    //             redirect('employee');
    //         }
    //     }
    // }

    // function ambil_data()
    // {

    //     $modul      = $this->input->post('modul');
    //     $id         = $this->input->post('id');

    //     if ($modul == "part_departments_id") {
    //         echo $this->employee_model->part_departments_id($id);
    //     } 
    //     // else if ($modul == "kecamatan") {
    //     //     echo $this->pelanggan_model->kecamatan($id);
    //     // } else if ($modul == "kelurahan") {
    //     //     echo $this->pelanggan_model->kelurahan($id);
    //     // } else if ($modul == "id_barang") {
    //     //     echo $this->daftar_barang_model->daftar_barang_detail($id);
    //     // }
    // }


    // public function delete($id)
    // {

    //     $delete = $this->employee_model->delete($id);

    //     if ($delete) {
    //         redirect('employee');
    //     } else {
    //         redirect('employee');
    //     }
    // }


    // public function edit($id)
    // {

    //     $this->form_validation->set_rules('person_id', 'Person ID', 'required|trim');
    //     $this->form_validation->set_rules('person_name', 'Person Name', 'required|trim');
    //     $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
    //     $this->form_validation->set_rules('contact', 'Contact', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim');
    //     $this->form_validation->set_rules('effective_time', 'Effective Time', 'required|trim');
    //     $this->form_validation->set_rules('card_no', 'Card No', 'required|trim');
    //     $this->form_validation->set_rules('room_no', 'Room No', 'required|trim');
    //     $this->form_validation->set_rules('floor_no', 'Floor No', 'required|trim');
    //     $this->form_validation->set_rules('is_active', 'Active', 'required|trim');

    //     if ($this->form_validation->run() == false) {
    //         $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

    //         $data['employee']           = $this->employee_model->get_all('id', 'desc');


    //         $data['title'] = 'Employee';
    //         $this->session->set_flashdata('required', 'incomplete data');
    //         $this->template->load('template_neura/index', 'employee/index', $data);

    //     } else {

    //         $person_id          = htmlspecialchars($this->input->post('person_id'));
    //         $person_name        = htmlspecialchars($this->input->post('person_name'));
    //         $gender             = htmlspecialchars($this->input->post('gender'));
    //         $contact            = htmlspecialchars($this->input->post('contact'));
    //         $email              = htmlspecialchars($this->input->post('email'));
    //         $effective_time     = htmlspecialchars($this->input->post('effective_time'));
    //         $card_no            = htmlspecialchars($this->input->post('card_no'));
    //         $room_no            = htmlspecialchars($this->input->post('room_no'));
    //         $floor_no           = htmlspecialchars($this->input->post('floor_no'));
    //         $is_active          = htmlspecialchars($this->input->post('is_active'));


    //         $data = array(
    //             'person_id'      => $person_id,
    //             'person_name'    => $person_name,
    //             'gender'         => $gender,
    //             'contact'        => $contact,
    //             'email'          => $email,
    //             'effective_time' => $effective_time,
    //             'card_no'        => $card_no,
    //             'room_no'        => $room_no,
    //             'floor_no'       => $floor_no,
    //             'is_active'      => $is_active,
    //             'company_id'      => 1
    //         );

    //         $update = $this->employee_model->update($id, $data);

    //         if ($update) {
    //             $this->session->set_flashdata('message', 'Update');
    //             redirect('employee');
    //         } else {
    //             $this->session->set_flashdata('message', 'Filed');
    //             redirect('employee');
    //         }
    //     }
    // }


    // public function publish($id)
    // {
    //     $data = array(
    //         'is_active'            => 1,
    //         'user_admin_update'    => $this->session->role_id
    //     );

    //     $update = $this->employee_model->update($id, $data);
    //     if ($update) {
    //         redirect('employee');
    //     } else {
    //         redirect('employee');
    //     }
    // }


    // public function unpublish($id)
    // {
    //     $data = array(
    //         'is_active'            => 0,
    //         'user_admin_update'    => $this->session->role_id
    //     );

    //     $update = $this->employee_model->update($id, $data);
    //     if ($update) {
    //         redirect('employee');
    //     } else {
    //         redirect('employee');
    //     }
    // }

}
