<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

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
        $data['pelanggan']          = $this->penerimaan_model->get_all_join_pelanggan_penerima('id', 'desc');
        $data['kurir']              = $this->kurir_model->get_all_order_by('id', 'desc');
        $data['title']              = 'Penerimaan';
        $this->template->load('template_neura/index', 'penerimaan/index', $data);
    }

    public function view_barang()
    {
        $no_resi =  $this->uri->segment(3);
        $data['user']                       = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan']                  = $this->penerimaan_model->get_all_join_pelanggan_penerima_by_noresi($no_resi);
        $data['kurir']                      = $this->kurir_model->get_all_order_by('id', 'desc');
        $data['barang']                     = $this->barang_model->get_all_by_no_resi($no_resi);
        $data['harga']                      = $this->harga_model->get_all_order_by('id', 'desc');
        $data['daftar_barang']              = $this->daftar_barang_model->get_all_order_by('id', 'asc');
        $data['title']                      = 'Penerimaan';
        $this->template->load('template_neura/index', 'penerimaan/view_barang', $data);
    }

    public function kirim_gudang($id)
    {
        $data = array(
            'status_kirim_gudang'         => 1,
            'status_pengirim_gudang'      => $this->session->role_id,
            'status_tanggal_gudang'       => date('Y-m-d H:i:s')
        );

        $update = $this->pelanggan_model->update($id, $data);
        if ($update) {
            redirect('penerimaan');
        } else {
            redirect('penerimaan');
        }
    }
}
