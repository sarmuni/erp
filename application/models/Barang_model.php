<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Barang_model extends MY_Model
{

    protected $table = 'tabel_barang';
    protected $primary_key = 'no_resi';
    protected $create_date = 'tanggal_dibuat';
    protected $update_date = 'tanggal_update';

    function __construct()
    {
        parent::__construct();
    }

    function get_last_code_resi($day, $month, $year)
    {
        $this->db->where('DAY(tanggal_dibuat)', $day);
        $this->db->where('MONTH(tanggal_dibuat)', $month);
        $this->db->where('YEAR(tanggal_dibuat)', $year);
        $this->db->order_by('tanggal_dibuat', 'desc');
        $this->db->limit(1);

        return $this->db->get($this->table)->row_array();
    }



    function get_all_by_no_resi($no_resi)
    {
        $sql = "SELECT 
        a.*,
        b.nama_barang
        FROM tabel_barang a
        LEFT JOIN tabel_master_barang b ON a.`nama_barang`=b.`id` 
        WHERE a.no_resi='$no_resi'";
        return $this->db->query($sql)->result_array();
    }


    function delete_barang($id)
    {
        $this->db->where('no_resi_barang', $id);
        $this->db->delete($this->table);
    }

    function get_last_code_resi_barang($no_resi, $day, $month, $year)
    {
        $this->db->where('no_resi', $no_resi);
        $this->db->where('DAY(tanggal_dibuat)', $day);
        $this->db->where('MONTH(tanggal_dibuat)', $month);
        $this->db->where('YEAR(tanggal_dibuat)', $year);
        $this->db->order_by('tanggal_dibuat', 'desc');
        $this->db->limit(1);

        return $this->db->get($this->table)->row_array();
    }

    function count_barang()
    {
        $user = $this->session->userdata('id');
        if ($user == 1) {
            $sql = "SELECT COUNT(id) AS total FROM tabel_barang";
            return $this->db->query($sql)->result_array();
        } else {
            $sql = "SELECT COUNT(id) AS total FROM tabel_barang WHERE user_admin_dibuat='$user'";
            return $this->db->query($sql)->result_array();
        }
    }
}
