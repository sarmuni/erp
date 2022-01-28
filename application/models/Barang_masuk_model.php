<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Barang_masuk_model extends MY_Model
{

    protected $table = 'tabel_barang';
    protected $primary_key = 'no_resi';
    protected $create_date = 'tanggal_dibuat';
    protected $update_date = 'tanggal_update';

    function __construct()
    {
        parent::__construct();
    }

    function get_all_barang_masuk()
    {
        $sql = "SELECT
        a.id,
        a.no_resi,
        a.nama AS nama_pelanggan,
        a.no_ic_passport,
        a.alamat AS alamat_pelanggan,
        a.hp,
        a.foto,
        a.nama_foto,
        a.tipe_foto,
        a.ukuran_foto,
        a.status,
        a.id_kurir,
        a.tanggal_dibuat,
        b.nama AS nama_penerima,
        b.alamat AS alamat_penerima,
        b.rt,
        b.rw,
        g.name AS desa,
        f.name AS kecamatan,
        e.name AS kabupaten,
        d.name AS provinsi,
        b.negara,
        b.hp1,
        b.hp2,
        c.nama AS nama_kurir,
        b.catatan,
        a.in_kargo,
        a.out_kargo
      FROM tabel_pelanggan a
      LEFT JOIN tabel_penerima b ON a.`no_resi`=b.`no_resi`
      LEFT JOIN tabel_master_kurir c ON a.`id_kurir`=c.`email`
      LEFT JOIN tabel_master_provinsi d ON b.`provinsi`=d.`id`
      LEFT JOIN tabel_master_kabupaten e ON b.`kabupaten`=e.`id`
      LEFT JOIN tabel_master_kecamatan f ON b.`kecamatan`=f.`id`
      LEFT JOIN tabel_master_desa g ON b.`desa`=g.`id`
      WHERE a.status='1' AND a.status_kirim_gudang='1' AND a.out_kargo='0'";
        return $this->db->query($sql)->result_array();
    }

    function get_all_barang_masuk_detail($no_resi)
    {
        $sql = "SELECT
        a.id,
        a.no_resi,
        a.nama AS nama_pelanggan,
        a.no_ic_passport,
        a.alamat AS alamat_pelanggan,
        a.hp,
        a.foto,
        a.nama_foto,
        a.tipe_foto,
        a.ukuran_foto,
        a.status,
        a.id_kurir,
        a.tanggal_dibuat,
        b.nama AS nama_penerima,
        b.alamat AS alamat_penerima,
        b.rt,
        b.rw,
        g.name AS desa,
        f.name AS kecamatan,
        e.name AS kabupaten,
        d.name AS provinsi,
        b.negara,
        b.hp1,
        b.hp2,
        c.nama AS nama_kurir,
        b.catatan,
        a.in_kargo,
        a.out_kargo
      FROM tabel_pelanggan a
      LEFT JOIN tabel_penerima b ON a.`no_resi`=b.`no_resi`
      LEFT JOIN tabel_master_kurir c ON a.`id_kurir`=c.`email`
      LEFT JOIN tabel_master_provinsi d ON b.`provinsi`=d.`id`
      LEFT JOIN tabel_master_kabupaten e ON b.`kabupaten`=e.`id`
      LEFT JOIN tabel_master_kecamatan f ON b.`kecamatan`=f.`id`
      LEFT JOIN tabel_master_desa g ON b.`desa`=g.`id`
      WHERE a.status='1' AND a.status_kirim_gudang='1' AND a.out_kargo='0' AND a.no_resi='$no_resi'";
        return $this->db->query($sql)->result_array();
    }
}
