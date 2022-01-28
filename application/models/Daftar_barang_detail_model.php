<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Daftar_barang_detail_model extends MY_Model
{

    protected $table = 'tabel_master_barang_detail';
    protected $primary_key = 'id';
    protected $create_date = 'tanggal_dibuat';
    protected $update_date = 'tanggal_diupdate';

    function __construct()
    {
        parent::__construct();
    }

    function daftar_barang_detail($id)
    {
        $sql = "SELECT
        b.id, 
        a.nama_barang,
        b.id_barang,
        b.nama_barang AS nama_barang_detail,
        b.keterangan,
        b.status
        FROM tabel_master_barang_detail b
        LEFT JOIN tabel_master_barang a ON b.`id_barang`=a.`id`
        WHERE b.`id_barang`='$id'";
        return $this->db->query($sql)->result_array();
    }
}
