<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Harga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('harga_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['harga'] = $this->harga_model->get_all_order_by('id', 'desc');
        $data['title'] = 'Master Daftar Harga';

        $this->template->load('template_neura/index', 'harga/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required|trim');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['harga'] = $this->harga_model->get_all_order_by('id', 'desc');
            $data['title'] = 'Master Daftar Harga';
            $this->session->set_flashdata('required', 'data tidak lengkap');
            $this->template->load('template_neura/index', 'harga/index', $data);
        } else {

            $ukuran                = htmlspecialchars($this->input->post('ukuran'));
            $nominal               = htmlspecialchars($this->input->post('nominal'));
            $keterangan            = htmlspecialchars($this->input->post('keterangan'));
            $data = array(
                'ukuran'                   => $ukuran,
                'nominal'                  => $nominal,
                'keterangan'               => $keterangan

            );

            $insert = $this->harga_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Berhasil');
                redirect('harga');
            } else {
                $this->session->set_flashdata('message', 'Gagal');
                redirect('harga');
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->harga_model->delete($id);

        if ($delete) {
            redirect('harga');
        } else {
            redirect('harga');
        }
    }


    public function edit($id)
    {
        $ukuran                = $this->input->post('ukuran');
        $nominal               = $this->input->post('nominal');
        $keterangan            = $this->input->post('keterangan');

        $data = array(
            'ukuran'                   => $ukuran,
            'nominal'                  => $nominal,
            'keterangan'               => $keterangan

        );

        $update = $this->harga_model->update($id, $data);

        if ($update) {
            $this->session->set_flashdata('message', 'Berhasil Update');
            redirect('harga');
        } else {
            $this->session->set_flashdata('message', 'Gagal Update');
            redirect('harga');
        }
    }


    public function publish($id)
    {
        $data = array(
            'status'               => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->harga_model->update($id, $data);
        if ($update) {
            redirect('harga');
        } else {
            redirect('harga');
        }
    }


    public function unpublish($id)
    {
        $data = array(
            'status'               => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->harga_model->update($id, $data);
        if ($update) {
            redirect('harga');
        } else {
            redirect('harga');
        }
    }
}
