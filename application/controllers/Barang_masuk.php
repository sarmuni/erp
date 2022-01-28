<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('barang_masuk_model');
        $this->load->model('pelanggan_model');
        $this->load->model('penerimaan_model');
        $this->load->model('kurir_model');
        $this->load->model('barang_model');
        $this->load->model('harga_model');
        $this->load->model('daftar_barang_model');
        $this->load->model('history_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan']          = $this->barang_masuk_model->get_all_barang_masuk('id', 'desc');

        $data['title']              = 'Barang Masuk';
        $this->template->load('template_neura/index', 'barang_masuk/index', $data);
    }

    public function view_barang()
    {
        $no_resi =  $this->uri->segment(3);
        $data['user']                       = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan']                  = $this->barang_masuk_model->get_all_barang_masuk_detail($no_resi);
        $data['kurir']                      = $this->kurir_model->get_all_order_by('id', 'desc');
        $data['barang']                     = $this->barang_model->get_all_by_no_resi($no_resi);
        $data['harga']                      = $this->harga_model->get_all_order_by('id', 'desc');
        $data['daftar_barang']              = $this->daftar_barang_model->get_all_order_by('id', 'asc');
        $data['title']                      = 'Barang Masuk';
        $this->template->load('template_neura/index', 'barang_masuk/view_barang', $data);
    }


    public function in_kargo($id)
    {
        $data = array(
            'in_kargo'               => 1,
            'in_kargo_pengirim'      => $this->session->role_id,
            'in_kargo_date'          => date('Y-m-d H:i:s')
        );

        $update = $this->pelanggan_model->update($id, $data);
        if ($update) {
            redirect('barang_masuk');
        } else {
            redirect('barang_masuk');
        }
    }
}
