<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penerimaan_model extends MY_Model
{

    protected $table = 'tabel_penerima';
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

        // $this->db->where('id_unit_usaha', $unit_usaha);

        $this->db->order_by('tanggal_dibuat', 'desc');
        $this->db->limit(1);

        return $this->db->get($this->table)->row_array();
    }

    function get_all_join_pelanggan_penerima()
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
        b.catatan
      FROM tabel_pelanggan a
      LEFT JOIN tabel_penerima b ON a.`no_resi`=b.`no_resi`
      LEFT JOIN tabel_master_kurir c ON a.`id_kurir`=c.`email`
      LEFT JOIN tabel_master_provinsi d ON b.`provinsi`=d.`id`
      LEFT JOIN tabel_master_kabupaten e ON b.`kabupaten`=e.`id`
      LEFT JOIN tabel_master_kecamatan f ON b.`kecamatan`=f.`id`
      LEFT JOIN tabel_master_desa g ON b.`desa`=g.`id`
      WHERE a.status='1' AND a.status_kirim_gudang='0'";
        return $this->db->query($sql)->result_array();
    }

    function get_all_join_pelanggan_penerima_by_noresi($no_resi)
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
        b.catatan
      FROM tabel_pelanggan a
      LEFT JOIN tabel_penerima b ON a.`no_resi`=b.`no_resi`
      LEFT JOIN tabel_master_kurir c ON a.`id_kurir`=c.`email`
      LEFT JOIN tabel_master_provinsi d ON b.`provinsi`=d.`id`
      LEFT JOIN tabel_master_kabupaten e ON b.`kabupaten`=e.`id`
      LEFT JOIN tabel_master_kecamatan f ON b.`kecamatan`=f.`id`
      LEFT JOIN tabel_master_desa g ON b.`desa`=g.`id`
      WHERE a.status='1' AND a.status_kirim_gudang='0' AND a.no_resi='$no_resi'";
        return $this->db->query($sql)->result_array();
    }
}
