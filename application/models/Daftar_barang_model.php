<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Daftar_barang_model extends MY_Model
{

    protected $table = 'tabel_master_barang';
    protected $primary_key = 'id';
    protected $create_date = 'tanggal_dibuat';
    protected $update_date = 'tanggal_update';

    function __construct()
    {
        parent::__construct();
    }


    function daftar_barang()
    {
        $this->db->order_by('id', 'ASC');
        $daftar_barang = $this->db->get('tabel_master_barang');
        return $daftar_barang->result_array();
    }

    function daftar_barang_detail($id)
    {
        $daftar_barang_detail = "";
        // $daftar_barang_detail = "<option value='0'>Pilih</pilih>";
        $this->db->order_by('nama_barang', 'ASC');
        $barang_detail = $this->db->get_where('tabel_master_barang_detail', array('id_barang' => $id));
        foreach ($barang_detail->result_array() as $data) {
            // $daftar_barang_detail .= "<option value='$data[id]'>$data[nama_barang]</option>";
            $daftar_barang_detail .= "<input class='form-check-input' type='checkbox' value='" . $data['nama_barang'] . "' name='barang_detail[]'> $data[nama_barang]<br>";
        }
        return $daftar_barang_detail;
    }
}
