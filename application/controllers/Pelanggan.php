<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
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
        $data['pelanggan']          = $this->pelanggan_model->get_all_join_pelanggan_penerima('id', 'desc');
        $data['kurir']              = $this->kurir_model->get_all_order_by('id', 'desc');
        $data['daftar_barang']      = $this->daftar_barang_model->daftar_barang();
        $data['provinsi']           = $this->pelanggan_model->provinsi();

        $data['title']              = 'Pelanggan';
        $this->template->load('template_neura/index', 'pelanggan/index', $data);
    }

    function ambil_data()
    {

        $modul = $this->input->post('modul');
        $id = $this->input->post('id');

        if ($modul == "kabupaten") {
            echo $this->pelanggan_model->kabupaten($id);
        } else if ($modul == "kecamatan") {
            echo $this->pelanggan_model->kecamatan($id);
        } else if ($modul == "kelurahan") {
            echo $this->pelanggan_model->kelurahan($id);
        } else if ($modul == "id_barang") {
            echo $this->daftar_barang_model->daftar_barang_detail($id);
        }
    }


    public function add()
    {
        //pengirim
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_ic_passport', 'No Passport', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('hp', 'HP', 'required|trim');
        $this->form_validation->set_rules('id_kurir', 'Kurir', 'required|trim');

        //penerima
        $this->form_validation->set_rules('penerima_nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('penerima_alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('rt', 'RT', 'required|trim');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim');
        $this->form_validation->set_rules('desa', 'Desa', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('negara', 'Negara', 'required|trim');
        $this->form_validation->set_rules('hp1', 'HP 1', 'required|trim');
        $this->form_validation->set_rules('hp2', 'HP 2', 'required|trim');
        $this->form_validation->set_rules('catatan', 'HP 2', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['pelanggan']           = $this->pelanggan_model->get_all_order_by('id', 'desc');
            $data['title']              = 'Data pelanggan';
            $this->session->set_flashdata('required', 'data tidak lengkap');
            $this->template->load('template_neura/index', 'pelanggan/index', $data);
        } else {

            //pengirim
            $nama                        = htmlspecialchars($this->input->post('nama'));
            $no_ic_passport              = htmlspecialchars($this->input->post('no_ic_passport'));
            $alamat                      = htmlspecialchars($this->input->post('alamat'));
            $hp                          = htmlspecialchars($this->input->post('hp'));
            $kurir                       = htmlspecialchars($this->input->post('id_kurir'));

            //penerima
            $penerima_nama               = htmlspecialchars($this->input->post('penerima_nama'));
            $penerima_alamat             = htmlspecialchars($this->input->post('penerima_alamat'));
            $penerima_rt                 = htmlspecialchars($this->input->post('rt'));
            $penerima_rw                 = htmlspecialchars($this->input->post('rw'));
            $penerima_desa               = htmlspecialchars($this->input->post('desa'));
            $penerima_kecamatan          = htmlspecialchars($this->input->post('kecamatan'));
            $penerima_kabupaten          = htmlspecialchars($this->input->post('kabupaten'));
            $penerima_provinsi           = htmlspecialchars($this->input->post('provinsi'));
            $penerima_negara             = htmlspecialchars($this->input->post('negara'));
            $penerima_hp1                = htmlspecialchars($this->input->post('hp1'));
            $penerima_hp2                = htmlspecialchars($this->input->post('hp2'));
            $catatan                     = htmlspecialchars($this->input->post('catatan'));


            //NO RESI 
            $kode = 'AL';
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date('Y-m-d H:i:s');
            $d = date('d', strtotime($tanggal));
            $m = date('m', strtotime($tanggal));
            $y = date('y', strtotime($tanggal));
            $yx = date('Y', strtotime($tanggal));
            $last_code = $this->pelanggan_model->get_last_code_resi($d, $m, $yx);
            if (count($last_code) > 0) {
                // $codes = explode('-', $last_code['no_resi']);
                $l_code = substr($last_code['no_resi'], -4);
                $count = (int)$l_code + 1;
            } else {
                $count = 1;
            }
            $count = str_pad($count, 4, '0', STR_PAD_LEFT);
            // $kode_no_resi = $kode . $d . $m . $y . '-' . str_pad($kurir, '0', STR_PAD_LEFT) . '-' . $count;
            $kode_no_resi = $kode . $d . $m . $y . '-' . $count;
            //END NO RESI


            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('upload', $this->upload->display_errors());
                redirect('pelanggan');
            } else {
                $image_data = $this->upload->data();
                $imgdata = file_get_contents($image_data['full_path']);
                $file_encode = base64_encode($imgdata);

                $data = array(
                    'no_resi'               => $kode_no_resi,
                    'nama'                  => $nama,
                    'no_ic_passport'        => $no_ic_passport,
                    'alamat'                => $alamat,
                    'hp'                    => $hp,
                    'id_kurir'              => $this->session->userdata('email'),
                    'user_admin_dibuat'     => $this->session->role_id,
                    'tipe_foto'             => $this->upload->data('file_type'),
                    'ukuran_foto'           => $this->upload->data('file_size'),
                    'foto'                  => $file_encode,
                    'nama_foto'             => $this->upload->data('file_name')

                );
                $insert = $this->pelanggan_model->insert($data);

                // penerima
                $data = array(
                    'no_resi'               => $kode_no_resi,
                    'nama'                  => $penerima_nama,
                    'alamat'                => $penerima_alamat,
                    'rt'                    => $penerima_rt,
                    'rw'                    => $penerima_rw,
                    'desa'                  => $penerima_desa,
                    'kecamatan'             => $penerima_kecamatan,
                    'kabupaten'             => $penerima_kabupaten,
                    'provinsi'              => $penerima_provinsi,
                    'negara'                => $penerima_negara,
                    'hp1'                   => $penerima_hp1,
                    'hp2'                   => $penerima_hp2,
                    'catatan'               => $catatan

                );

                $insert = $this->penerimaan_model->insert($data);

                // History
                $data = array(
                    'urutan'               => 1,
                    'no_resi'              => $kode_no_resi,
                    'nama_history'         => 'Input Kurir'
                );

                $insert = $this->history_model->insert($data);
                // end history

                unlink($image_data['full_path']);
                if ($insert) {
                    $this->session->set_flashdata('message', 'Berhasil');
                    redirect('pelanggan');
                } else {
                    $this->session->set_flashdata('message', 'Gagal');
                    redirect('pelanggan');
                }
            }
        }
    }


    public function delete($id)
    {

        $delete = $this->pelanggan_model->delete($id);
        $delete = $this->penerimaan_model->delete($id);
        $delete = $this->barang_model->delete($id);

        if ($delete) {
            redirect('pelanggan');
        } else {
            redirect('pelanggan');
        }
    }


    public function edit($id)
    {
        //pengirim
        $no_resi                     = htmlspecialchars($this->input->post('no_resi'));
        $nama_pelanggan              = htmlspecialchars($this->input->post('nama_pelanggan'));
        $no_ic_passport              = htmlspecialchars($this->input->post('no_ic_passport'));
        $alamat_pelanggan            = htmlspecialchars($this->input->post('alamat_pelanggan'));
        $hp                          = htmlspecialchars($this->input->post('hp'));
        $kurir                       = htmlspecialchars($this->input->post('id_kurir'));

        //penerima
        $penerima_nama               = htmlspecialchars($this->input->post('nama_penerima'));
        $penerima_alamat             = htmlspecialchars($this->input->post('alamat_penerima'));
        $penerima_rt                 = htmlspecialchars($this->input->post('rt'));
        $penerima_rw                 = htmlspecialchars($this->input->post('rw'));
        $penerima_desa               = htmlspecialchars($this->input->post('desa'));
        $penerima_kelurahan          = htmlspecialchars($this->input->post('kelurahan'));
        $penerima_kecamatan          = htmlspecialchars($this->input->post('kecamatan'));
        $penerima_kabupaten          = htmlspecialchars($this->input->post('kabupaten'));
        $penerima_provinsi           = htmlspecialchars($this->input->post('provinsi'));
        $penerima_negara             = htmlspecialchars($this->input->post('negara'));
        $penerima_hp1                = htmlspecialchars($this->input->post('hp1'));
        $penerima_hp2                = htmlspecialchars($this->input->post('hp2'));


        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('upload', $this->upload->display_errors());
            redirect('pelanggan');
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);

            //pelanggan
            $data = array(
                'no_resi'               => $no_resi,
                'nama'                  => $nama_pelanggan,
                'no_ic_passport'        => $no_ic_passport,
                'alamat'                => $alamat_pelanggan,
                'hp'                    => $hp,
                'id_kurir'              => $kurir,
                'user_admin_dibuat'     => $this->session->role_id,
                'tipe_foto'             => $this->upload->data('file_type'),
                'ukuran_foto'           => $this->upload->data('file_size'),
                'foto'                  => $file_encode,
                'nama_foto'             => $this->upload->data('file_name')

            );
            $update = $this->pelanggan_model->update($id, $data);

            // penerima
            $data = array(
                'no_resi'               => $no_resi,
                'nama'                  => $penerima_nama,
                'alamat'                => $penerima_alamat,
                'rt'                    => $penerima_rt,
                'rw'                    => $penerima_rw,
                'desa'                  => $penerima_desa,
                'kelurahan'             => $penerima_kelurahan,
                'kecamatan'             => $penerima_kecamatan,
                'kabupaten'             => $penerima_kabupaten,
                'provinsi'              => $penerima_provinsi,
                'negara'                => $penerima_negara,
                'hp1'                   => $penerima_hp1,
                'hp2'                   => $penerima_hp2

            );

            $update = $this->penerimaan_model->update($id, $data);

            unlink($image_data['full_path']);
            if ($update) {
                $this->session->set_flashdata('message', 'Berhasil Update');
                redirect('pelanggan');
            } else {
                $this->session->set_flashdata('message', 'Gagal Update');
                redirect('pelanggan');
            }
        }
    }

    public function view_barang()
    {
        $no_resi                            = $this->uri->segment(3);
        $data['user']                       = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan']                  = $this->pelanggan_model->get_all_join_pelanggan_penerima_by_noresi($no_resi);
        $data['kurir']                      = $this->kurir_model->get_all_order_by('id', 'desc');
        $data['barang']                     = $this->barang_model->get_all_by_no_resi($no_resi);
        $data['harga']                      = $this->harga_model->get_all_order_by('id', 'desc');
        // $data['daftar_barang']              = $this->daftar_barang_model->get_all_order_by('id', 'asc');
        $data['daftar_barang']              = $this->daftar_barang_model->daftar_barang();
        $data['title']                      = 'Pelanggan';
        $this->template->load('template_neura/index', 'pelanggan/view_barang', $data);
    }


    public function add_barang()
    {

        $this->form_validation->set_rules('no_resi', 'No Resi', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('size', 'Size', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user']               = $this->db->get_where('auth_user', ['email' => $this->session->userdata('email')])->row_array();
            $data['pelanggan']          = $this->pelanggan_model->get_all_join_pelanggan_penerima('id', 'desc');
            $data['kurir']              = $this->kurir_model->get_all_order_by('id', 'desc');
            $data['barang']             = $this->barang_model->get_all_order_by('id', 'desc');
            $data['harga']              = $this->harga_model->get_all_order_by('id', 'desc');
            $data['title']              = 'Pelanggan';
            $this->session->set_flashdata('required', 'data tidak lengkap');
            $this->template->load('template_neura/index', 'pelanggan/view_barang', $data);
        } else {


            $no_resi                    = htmlspecialchars($this->input->post('no_resi'));
            $nama_barang                = htmlspecialchars($this->input->post('nama_barang'));
            $size                       = htmlspecialchars($this->input->post('size'));
            $harga                      = htmlspecialchars($this->input->post('harga'));
            $barang_detail              = $this->input->post('barang_detail');
            $keterangan                 = htmlspecialchars($this->input->post('keterangan'));


            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_barang')) {
                $this->session->set_flashdata('upload', $this->upload->display_errors());
                redirect('pelanggan/view_barang/' . $no_resi);
            } else {
                $image_data = $this->upload->data();
                $imgdata = file_get_contents($image_data['full_path']);
                $file_encode = base64_encode($imgdata);

                //NO RESI BARANG
                date_default_timezone_set('Asia/Jakarta');
                $tanggal = date('Y-m-d H:i:s');
                $d = date('d', strtotime($tanggal));
                $m = date('m', strtotime($tanggal));
                $yx = date('Y', strtotime($tanggal));
                $last_code = $this->barang_model->get_last_code_resi_barang($no_resi, $d, $m, $yx);

                if (count($last_code) > 0) {
                    $l_code = substr($last_code['no_resi_barang'], -2);
                    $count = (int)$l_code + 1;
                } else {
                    $count = 1;
                }

                $no = str_pad($count, 2, '0', STR_PAD_LEFT);
                $no_resi_barang = $no_resi . '-' . $no;
                //END NO RESI BARANG

                //BARCODE
                $tanggal = date('Y-m-d H:i:s');
                $d = date('d', strtotime($tanggal));
                $m = date('m', strtotime($tanggal));
                $y = date('y', strtotime($tanggal));
                $h = date('H', strtotime($tanggal));
                $i = date('i', strtotime($tanggal));
                $s = date('s', strtotime($tanggal));
                $explode = explode('-', $no_resi_barang);
                $e_2 = $explode[1];
                $resi = substr($explode[0], 2);

                $barcode = $resi . $e_2 . $no . $d . $m . $y . $h . $i . $s;
                //BARCODE

                $data = array(
                    'no_resi'               => $no_resi,
                    'no_resi_barang'        => $no_resi_barang,
                    'barcode'               => $barcode,
                    'nama_barang'           => $nama_barang,
                    'size'                  => $size,
                    'harga'                 => $harga,
                    'barang_detail'         => implode(",", $barang_detail),
                    'keterangan'            => $keterangan,
                    'tipe_foto'             => $this->upload->data('file_type'),
                    'ukuran_foto'           => $this->upload->data('file_size'),
                    'foto_barang'           => $file_encode,
                    'nama_foto'             => $this->upload->data('file_name')

                );

                $insert = $this->barang_model->insert($data);
                unlink($image_data['full_path']);

                if ($insert) {
                    $this->session->set_flashdata('message', 'Berhasil');
                    redirect('pelanggan/view_barang/' . $no_resi);
                } else {
                    $this->session->set_flashdata('message', 'Gagal');
                    redirect('pelanggan/view_barang/' . $no_resi);
                }
            }
        }
    }


    public function delete_barang($id)
    {
        $no_resi =  substr($this->uri->segment(3), 0, -3);

        $delete = $this->barang_model->delete_barang($id);
        if ($delete) {
            redirect('pelanggan/view_barang/' . $no_resi);
        } else {
            redirect('pelanggan/view_barang/' . $no_resi);
        }
    }

    public function publish($id)
    {
        $data = array(
            'status'               => 1,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->pelanggan_model->update($id, $data);
        if ($update) {
            redirect('pelanggan');
        } else {
            redirect('pelanggan');
        }
    }


    public function unpublish($id)
    {
        $data = array(
            'status'               => 0,
            'user_admin_update'    => $this->session->role_id
        );

        $update = $this->pelanggan_model->update($id, $data);
        if ($update) {
            redirect('pelanggan');
        } else {
            redirect('pelanggan');
        }
    }

    public function terima_agen($no_resi)
    {
        $data = array(
            'status'               => 1,
            'diterima_oleh'        => $this->session->role_id,
            'diterima_tanggal'     => date('Y-m-d H:i:s')
        );

        $update = $this->pelanggan_model->update($no_resi, $data);


        // History
        $data = array(
            'urutan'               => 2,
            'no_resi'              => $no_resi,
            'nama_history'         => 'Terima Agen'
        );

        $update = $this->history_model->insert($data);
        // end history

        if ($update) {
            redirect('pelanggan');
        } else {
            redirect('pelanggan');
        }
    }
}
