<?php
require APPPATH . '/libraries/REST_Controller.php';
class Rest_pelanggan extends REST_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    // show data pelanggan methode get
    // http://localhost/logistik/rest_pelanggan
    // http://localhost/logistik/rest_pelanggan?no_resi=AL010821-0002
    function index_get()
    {
        $no_resi = $this->get('no_resi');
        if ($no_resi == '') {
            $pelanggan = $this->db->get('tabel_pelanggan')->result();
        } else {
            $this->db->where('no_resi', $no_resi);
            $pelanggan = $this->db->get('tabel_pelanggan')->result();
        }
        $this->response($pelanggan, 200);
    }

    // insert new data to pelanggan metode post form urlencode
    // http://localhost/logistik/rest_pelanggan
    function index_post()
    {
        $data = array(
            'no_resi'           => $this->post('no_resi'),
            'nama'              => $this->post('nama'),
            'no_ic_passport'    => $this->post('no_ic_passport'),
            'alamat'            => $this->post('alamat'),
            'hp'                => $this->post('hp')
        );
        $insert = $this->db->insert('tabel_pelanggan', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data pelanggan metode put dengan parameter no_resi form urlencode
    // http://localhost/logistik/rest_pelanggan
    function index_put()
    {
        $no_resi = $this->put('no_resi');
        $data = array(
            'no_resi'           => $this->post('no_resi'),
            'nama'              => $this->post('nama'),
            'no_ic_passport'    => $this->post('no_ic_passport'),
            'alamat'            => $this->post('alamat'),
            'hp'                => $this->post('hp')
        );
        $this->db->where('no_resi', $no_resi);
        $update = $this->db->update('tabel_pelanggan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete pelanggan metode delete parameter no_resi form urlencode
    // http://localhost/logistik/rest_pelanggan
    function index_delete()
    {
        $no_resi = $this->delete('no_resi');
        $this->db->where('no_resi', $no_resi);
        $delete = $this->db->delete('tabel_pelanggan');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
