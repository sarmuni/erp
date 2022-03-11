<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales_orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('sales_orders_model');
        $this->load->model('ref_customers_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        $data['user']                          = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sales_orders']                  = $this->sales_orders_model->get_all('id', 'desc');

        $data['title'] = 'Sales Orders';
        $this->template->load('template_neura/index', 'sales_orders/index', $data);
    }

    public function getTableProductRow()
	{
		$products = $this->sales_orders_model->getActiveProductData();
		echo json_encode($products);
	}

    public function getProductValueById()
	{
		$product_id = $this->input->post('product_id');
		if($product_id) {
			$product_data = $this->sales_orders_model->getProductData($product_id);
			echo json_encode($product_data);
		}
	}


    function get_customers_by_id(){
        $id=$this->input->post('id');
        $data=$this->sales_orders_model->get_customers_id($id);
        echo json_encode($data);
    }



    public function form()
    {
        //Global Location Number
        $kode = 'QT-BIG';
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
        $d = date('d', strtotime($tanggal));
        $m = date('m', strtotime($tanggal));
        $y = date('y', strtotime($tanggal));
        $yx = date('Y', strtotime($tanggal));

        $last_code = $this->sales_orders_model->get_last_code($d, $m, $yx);
        if ($last_code > 0) {
            $l_code = substr($last_code['orders_number'], -4);
            $count = (int)$l_code + 1;
        } else {
            $count = 1;
        }
        $count = str_pad($count, 4, '0', STR_PAD_LEFT);

        $data['orders_number'] = $kode . $d . $m . $y . '-' . $count;
        //END NO

        $data['user']                       = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sales_orders']               = $this->sales_orders_model->get_all('id', 'desc');
        $data['option_customers']           = $this->ref_customers_model->get_all('id', 'desc');
        $data['products']                   = $this->sales_orders_model->getActiveProductData();

        $data['title'] = 'Sales Orders';
        $data['title_items'] = 'Detail Items';
        $this->template->load('template_neura/index', 'sales_orders/form', $data);
    }

    public function view($id,$pre_code)
    {
        $data['user']                          = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sales_orders']                  = $this->sales_orders_model->get_by_id($id);
        $data['sales_orders_detail']           = $this->sales_orders_detail_model->get_all_item($pre_code);
        $data['option_departments']            = $this->sales_orders_model->departments();
        $data['part_departments']              = $this->sales_orders_model->part_departments();
        $data['employee']                      = $this->employee_model->get_all('id','desc');

        $data['title'] = 'View Pre Requisition';
        $this->template->load('template_neura/index', 'sales_orders/view', $data);
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
            $data['sales_orders']            = $this->sales_orders_model->get_all('id', 'desc');
            $data['option_departments']         = $this->sales_orders_model->departments();

            $data['title']              = 'Pre Requisition';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'sales_orders/index', $data);
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

            $insert = $this->sales_orders_model->insert($data);

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

               
            $insert = $this->db->insert_batch('sales_orders_item_detail', $data1);

            if ($insert) {
                $this->session->set_flashdata('message', 'Success');
                redirect('sales_orders');
            } else {
                $this->session->set_flashdata('message', 'Failed');
                redirect('sales_orders');
            }
        }
    }

    function ambil_data()
    {

        $modul      = $this->input->post('modul');
        $id         = $this->input->post('id');

        if ($modul == "part_departments_id") {
            echo $this->sales_orders_model->part_departments_id($id);
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

        $delete = $this->sales_orders_model->delete($id);
        $delete = $this->sales_orders_detail_model->delete_item($pre_code);

        if ($delete) {
            redirect('sales_orders');
        } else {
            redirect('sales_orders');
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
            $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

            $data['sales_orders']           = $this->sales_orders_model->get_all('id', 'desc');


            $data['title'] = 'sales_orders';
            $this->session->set_flashdata('required', 'incomplete data');
            $this->template->load('template_neura/index', 'sales_orders/index', $data);

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
                'company_id'     => 1
            );

            $update = $this->sales_orders_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('message', 'Update');
                redirect('sales_orders');
            } else {
                $this->session->set_flashdata('message', 'Filed');
                redirect('sales_orders');
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

        $update = $this->sales_orders_model->update($id, $data);
        if ($update) {
            redirect('sales_orders');
        } else {
            redirect('sales_orders');
        }
    }


    public function pre_req_aprov_purchasing($id)
    {
        $data = array(
            'status'                    => 2,
            'verified_purchasing_date'  => date('Y-m-d H:i:s'),
            'verified_purchasing_by'    => $this->session->fullname
        );

        $update = $this->sales_orders_model->update($id, $data);
        if ($update) {
            redirect('sales_orders');
        } else {
            redirect('sales_orders');
        }
    }

    public function pre_req_approved_bod($id)
    {
        $data = array(
            'status'                    => 3,
            'approved_bod_by_date'      => date('Y-m-d H:i:s'),
            'approved_bod_by'           => $this->session->fullname
        );

        $update = $this->sales_orders_model->update($id, $data);
        if ($update) {
            redirect('sales_orders');
        } else {
            redirect('sales_orders');
        }
    }

    public function pre_req_approved_finance($id)
    {
        $data = array(
            'status'                    => 4,
            'approved_finance_date'     => date('Y-m-d H:i:s'),
            'approved_finance_by'       => $this->session->fullname
        );

        $update = $this->sales_orders_model->update($id, $data);
        if ($update) {
            redirect('sales_orders');
        } else {
            redirect('sales_orders');
        }
    }

}
