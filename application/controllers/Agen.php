<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('agen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['agen'] = $this->agen_model->get_all_order_by('agen_id', 'desc');
        $data['title'] = 'Data Agen';

        $this->template->load('template_neura/index', 'agen/index', $data);
    }

    public function add()
    {

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|is_unique[tabel_master_agen.nik]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara', 'required|trim');
        $this->form_validation->set_rules('hp', 'HP', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['agen'] = $this->agen_model->get_all_order_by('agen_id', 'desc');
            $data['title'] = 'Data Agen';
            $this->session->set_flashdata('required', 'data tidak lengkap');
            $this->template->load('template_neura/index', 'agen/index', $data);
        } else {


            $nik                = htmlspecialchars($this->input->post('nik'));
            $nama               = htmlspecialchars($this->input->post('nama'));
            $tempat_lahir       = htmlspecialchars($this->input->post('tempat_lahir'));
            $tanggal_lahir      = htmlspecialchars($this->input->post('tanggal_lahir'));
            $jenis_kelamin      = htmlspecialchars($this->input->post('jenis_kelamin'));
            $alamat             = htmlspecialchars($this->input->post('alamat'));
            $negara             = htmlspecialchars($this->input->post('negara'));
            $hp                 = htmlspecialchars($this->input->post('hp'));

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('upload', $this->upload->display_errors());
                redirect('agen');
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

                $insert = $this->agen_model->insert($data);
                unlink($image_data['full_path']);

                if ($insert) {
                    $this->session->set_flashdata('message', 'Berhasil');
                    redirect('agen');
                } else {
                    $this->session->set_flashdata('message', 'Gagal');
                    redirect('agen');
                }
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->agen_model->delete($id);

        if ($delete) {
            redirect('agen');
        } else {
            redirect('agen');
        }
    }


    public function edit($id)
    {
        $nik                = $this->input->post('nik');
        $nama               = $this->input->post('nama');
        $tempat_lahir       = $this->input->post('tempat_lahir');
        $tanggal_lahir      = $this->input->post('tanggal_lahir');
        $jenis_kelamin      = $this->input->post('jenis_kelamin');
        $alamat             = $this->input->post('alamat');
        $negara             = $this->input->post('negara');
        $hp                 = $this->input->post('hp');


        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('upload', $this->upload->display_errors());
            redirect('agen');
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

            $update = $this->agen_model->update($id, $data);
            unlink($image_data['full_path']);

            if ($update) {
                $this->session->set_flashdata('message', 'Berhasil Update');
                redirect('agen');
            } else {
                $this->session->set_flashdata('message', 'Gagal Update');
                redirect('agen');
            }
        }
    }


    public function publish($id)
    {
        $data = array(
            'status'               => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->agen_model->update($id, $data);
        if ($update) {
            redirect('agen');
        } else {
            redirect('agen');
        }
    }


    public function unpublish($id)
    {
        $data = array(
            'status'               => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->agen_model->update($id, $data);
        if ($update) {
            redirect('agen');
        } else {
            redirect('agen');
        }
    }
}
