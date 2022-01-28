<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('kurir_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kurir'] = $this->kurir_model->get_all_order_by('id', 'desc');
        $data['title'] = 'Data Kurir';
        $this->template->load('template_neura/index', 'kurir/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[tabel_master_kurir.nik]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara', 'required|trim');
        $this->form_validation->set_rules('hp', 'HP', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['kurir'] = $this->kurir_model->get_all_order_by('id', 'desc');
            $data['title'] = 'Data Kurir';
            $this->session->set_flashdata('required', 'data tidak lengkap');
            $this->template->load('template_neura/index', 'kurir/index', $data);
        } else {

            $nik                = htmlspecialchars($this->input->post('nik', true));
            $nama               = htmlspecialchars($this->input->post('nama', true));
            $tempat_lahir       = htmlspecialchars($this->input->post('tempat_lahir', true));
            $tanggal_lahir      = htmlspecialchars($this->input->post('tanggal_lahir', true));
            $jenis_kelamin      = $this->input->post('jenis_kelamin');
            $alamat             = htmlspecialchars($this->input->post('alamat', true));
            $negara             = htmlspecialchars($this->input->post('negara', true));
            $hp                 = htmlspecialchars($this->input->post('hp', true));

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('upload', $this->upload->display_errors());
                redirect('kurir');
            } else {
                $image_data = $this->upload->data();
                $imgdata = file_get_contents($image_data['full_path']);
                $file_encode = base64_encode($imgdata);
                $data = array(
                    'nik'                   => $nik,
                    'nama'                  => $nama,
                    'tempat_lahir'          => $tempat_lahir,
                    'tanggal_lahir'         => $tanggal_lahir,
                    'jenis_kelamin'         => $jenis_kelamin,
                    'alamat'                => $alamat,
                    'negara'                => $negara,
                    'hp'                    => $hp,
                    'user_admin_dibuat'     => $this->session->role_id,
                    'tipe_foto'             => $this->upload->data('file_type'),
                    'ukuran_foto'           => $this->upload->data('file_size'),
                    'foto'                  => $file_encode,
                    'nama_foto'             => $this->upload->data('file_name')

                );

                $insert = $this->kurir_model->insert($data);
                unlink($image_data['full_path']);

                if ($insert) {
                    $this->session->set_flashdata('message', 'Berhasil');
                    redirect('kurir');
                } else {
                    $this->session->set_flashdata('message', 'Gagal');
                    redirect('kurir');
                }
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->kurir_model->delete($id);

        if ($delete) {
            redirect('kurir');
        } else {
            redirect('kurir');
        }
    }


    public function edit($id)
    {
        $nik                = htmlspecialchars($this->input->post('nik', true));
        $nama               = htmlspecialchars($this->input->post('nama', true));
        $tempat_lahir       = htmlspecialchars($this->input->post('tempat_lahir', true));
        $tanggal_lahir      = htmlspecialchars($this->input->post('tanggal_lahir', true));
        $jenis_kelamin      = $this->input->post('jenis_kelamin');
        $alamat             = htmlspecialchars($this->input->post('alamat', true));
        $negara             = htmlspecialchars($this->input->post('negara', true));
        $hp                 = htmlspecialchars($this->input->post('hp', true));

        $nik                = $this->input->post('nik');
        $nama               = $this->input->post('nama');
        $tempat_lahir       = $this->input->post('tempat_lahir');
        $tanggal_lahir      = $this->input->post('tanggal_lahir');
        $jenis_kelamin      = $this->input->post('jenis_kelamin');
        $alamat             = $this->input->post('alamat');
        $negara             = $this->input->post('negara');
        $hp                 = $this->input->post('hp');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('upload', $this->upload->display_errors());
            redirect('kurir');
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);

            $data = array(
                'nik'                   => $nik,
                'nama'                  => $nama,
                'tempat_lahir'          => $tempat_lahir,
                'tanggal_lahir'         => $tanggal_lahir,
                'jenis_kelamin'         => $jenis_kelamin,
                'alamat'                => $alamat,
                'negara'                => $negara,
                'hp'                    => $hp,
                'user_admin_update'     => $this->session->role_id,
                'tipe_foto'             => $this->upload->data('file_type'),
                'ukuran_foto'           => $this->upload->data('file_size'),
                'foto'                  => $file_encode,
                'nama_foto'             => $this->upload->data('file_name')

            );

            $update = $this->kurir_model->update($id, $data);
            unlink($image_data['full_path']);

            if ($update) {
                $this->session->set_flashdata('message', 'Berhasil Update');
                redirect('kurir');
            } else {
                $this->session->set_flashdata('message', 'Gagal Update');
                redirect('kurir');
            }
        }
    }


    public function publish($id)
    {
        $data = array(
            'status'               => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->kurir_model->update($id, $data);
        if ($update) {
            redirect('kurir');
        } else {
            redirect('kurir');
        }
    }


    public function unpublish($id)
    {
        $data = array(
            'status'               => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->kurir_model->update($id, $data);
        if ($update) {
            redirect('kurir');
        } else {
            redirect('kurir');
        }
    }
}
