<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('daftar_barang_model');
        $this->load->model('daftar_barang_detail_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['daftar_barang']          = $this->daftar_barang_model->get_all_order_by('id', 'desc');
        $data['title']                  = 'Master Daftar Barang';
        $this->template->load('template_neura/index', 'daftar_barang/index', $data);
    }

    public function barang_detail($id)
    {
        $data['user']                   = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['daftar_barang_detail']   = $this->daftar_barang_detail_model->daftar_barang_detail($id);
        $data['title']                  = 'Master Daftar Barang Detail';
        $this->template->load('template_neura/index', 'daftar_barang/daftar_barang_detail', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('nama_barang', 'Ukuran', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['daftar_barang'] = $this->daftar_barang_model->get_all_order_by('id', 'desc');
            $data['title'] = 'Master Daftar Barang';
            $this->session->set_flashdata('required', 'data tidak lengkap');
            $this->template->load('template_neura/index', 'daftar_barang/index', $data);
        } else {

            $nama_barang                    = htmlspecialchars($this->input->post('nama_barang'));
            $keterangan                     = htmlspecialchars($this->input->post('keterangan'));
            $data = array(
                'nama_barang'              => $nama_barang,
                'keterangan'               => $keterangan

            );

            $insert = $this->daftar_barang_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Berhasil');
                redirect('daftar_barang');
            } else {
                $this->session->set_flashdata('message', 'Gagal');
                redirect('daftar_barang');
            }
        }
    }

    public function add_detail()
    {

        $this->form_validation->set_rules('nama_barang', 'Ukuran', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $id = $this->form_validation->set_rules('id_barang', 'Id Barang', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['daftar_barang_detail']   = $this->daftar_barang_detail_model->daftar_barang_detail($id);
            $data['title']                  = 'Master Daftar Barang Detail';
            $this->session->set_flashdata('required', 'data tidak lengkap');
            $this->template->load('template_neura/index', 'daftar_barang/daftar_barang_detail', $data);
        } else {

            $id_barang                      = htmlspecialchars($this->input->post('id_barang'));
            $nama_barang                    = htmlspecialchars($this->input->post('nama_barang'));
            $keterangan                     = htmlspecialchars($this->input->post('keterangan'));
            $data = array(
                'id_barang'                => $id_barang,
                'nama_barang'              => $nama_barang,
                'keterangan'               => $keterangan

            );

            $insert = $this->daftar_barang_detail_model->insert($data);

            if ($insert) {
                $this->session->set_flashdata('message', 'Berhasil');
                redirect('daftar_barang/barang_detail/' . $id_barang);
            } else {
                $this->session->set_flashdata('message', 'Gagal');
                redirect('daftar_barang/barang_detail/' . $id_barang);
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->daftar_barang_model->delete($id);

        if ($delete) {
            redirect('daftar_barang');
        } else {
            redirect('daftar_barang');
        }
    }

    public function delete_detail($id)
    {
        $id_barang = $this->uri->segment(4);
        $delete = $this->daftar_barang_detail_model->delete($id);

        if ($delete) {
            redirect('daftar_barang/barang_detail/' . $id_barang);
        } else {
            redirect('daftar_barang/barang_detail/' . $id_barang);
        }
    }


    public function edit($id)
    {
        $nama_barang                = $this->input->post('nama_barang');
        $keterangan                 = $this->input->post('keterangan');

        $data = array(
            'nama_barang'              => $nama_barang,
            'keterangan'               => $keterangan

        );

        $update = $this->daftar_barang_model->update($id, $data);

        if ($update) {
            $this->session->set_flashdata('message', 'Berhasil Update');
            redirect('daftar_barang');
        } else {
            $this->session->set_flashdata('message', 'Gagal Update');
            redirect('daftar_barang');
        }
    }

    public function edit_detail($id)
    {
        $nama_barang                = $this->input->post('nama_barang');
        $keterangan                 = $this->input->post('keterangan');
        $id_barang                  = $this->input->post('id_barang');

        $data = array(
            'nama_barang'              => $nama_barang,
            'keterangan'               => $keterangan

        );

        $update = $this->daftar_barang_detail_model->update($id, $data);

        if ($update) {
            $this->session->set_flashdata('message', 'Berhasil Update');
            redirect('daftar_barang/barang_detail/' . $id_barang);
        } else {
            $this->session->set_flashdata('message', 'Gagal Update');
            redirect('daftar_barang/barang_detail/' . $id_barang);
        }
    }


    public function publish($id)
    {
        $data = array(
            'status'               => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->daftar_barang_model->update($id, $data);
        if ($update) {
            redirect('daftar_barang');
        } else {
            redirect('daftar_barang');
        }
    }

    public function publish_detail($id)
    {

        $id_barang = $this->uri->segment(4);
        $data = array(
            'status'               => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->daftar_barang_detail_model->update($id, $data);
        if ($update) {
            redirect('daftar_barang/barang_detail/' . $id_barang);
        } else {
            redirect('daftar_barang/barang_detail/' . $id_barang);
        }
    }


    public function unpublish($id)
    {
        $data = array(
            'status'               => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->daftar_barang_model->update($id, $data);
        if ($update) {
            redirect('daftar_barang');
        } else {
            redirect('daftar_barang');
        }
    }

    public function unpublish_detail($id)
    {
        $id_barang = $this->uri->segment(4);
        $data = array(
            'status'               => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->daftar_barang_detail_model->update($id, $data);
        if ($update) {
            redirect('daftar_barang/barang_detail/' . $id_barang);
        } else {
            redirect('daftar_barang/barang_detail/' . $id_barang);
        }
    }
}
