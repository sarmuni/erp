<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Suppliers_model extends MY_Model
{

    protected $table = 'ref_suppliers';
    protected $primary_key = 'id';
    protected $create_date = 'created_at';
    protected $update_date = 'updated_at';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $sql = "SELECT * FROM ref_suppliers";
        return $this->db->query($sql)->result_array();
    }

    function get_by_id($id)
    {
        $sql = "SELECT * FROM ref_suppliers Where id = $id";
        return $this->db->query($sql)->result_array();
    }

    // function get_last_code_resi($day, $month, $year)
    // {
    //     $this->db->where('DAY(tanggal_dibuat)', $day);
    //     $this->db->where('MONTH(tanggal_dibuat)', $month);
    //     $this->db->where('YEAR(tanggal_dibuat)', $year);

    //     $this->db->order_by('tanggal_dibuat', 'desc');
    //     $this->db->limit(1);

    //     return $this->db->get($this->table)->row_array();
    // }

    // function get_all_join_pelanggan_penerima()
    // {
    //     $sql = "SELECT
    //     a.id,
    //     a.no_resi,
    //     a.nama AS nama_pelanggan,
    //     a.no_ic_passport,
    //     a.alamat AS alamat_pelanggan,
    //     a.hp,
    //     a.foto,
    //     a.nama_foto,
    //     a.tipe_foto,
    //     a.ukuran_foto,
    //     a.status,
    //     a.id_kurir,
    //     a.tanggal_dibuat,
    //     b.nama AS nama_penerima,
    //     b.alamat AS alamat_penerima,
    //     b.rt,
    //     b.rw,
    //     g.name AS desa,
    //     f.name AS kecamatan,
    //     e.name AS kabupaten,
    //     d.name AS provinsi,
    //     b.negara,
    //     b.hp1,
    //     b.hp2,
    //     c.nama AS nama_kurir,
    //     b.catatan
    //   FROM tabel_pelanggan a
    //   LEFT JOIN tabel_penerima b ON a.`no_resi`=b.`no_resi`
    //   LEFT JOIN tabel_master_kurir c ON a.`id_kurir`=c.`email`
    //   LEFT JOIN tabel_master_provinsi d ON b.`provinsi`=d.`id`
    //   LEFT JOIN tabel_master_kabupaten e ON b.`kabupaten`=e.`id`
    //   LEFT JOIN tabel_master_kecamatan f ON b.`kecamatan`=f.`id`
    //   LEFT JOIN tabel_master_desa g ON b.`desa`=g.`id`
    //   WHERE a.status='0'";
    //     return $this->db->query($sql)->result_array();
    // }

    // function get_all_join_pelanggan_penerima_by_noresi($no_resi)
    // {
    //     $sql = "SELECT
    //     a.id,
    //     a.no_resi,
    //     a.nama AS nama_pelanggan,
    //     a.no_ic_passport,
    //     a.alamat AS alamat_pelanggan,
    //     a.hp,
    //     a.foto,
    //     a.nama_foto,
    //     a.tipe_foto,
    //     a.ukuran_foto,
    //     a.status,
    //     a.id_kurir,
    //     a.tanggal_dibuat,
    //     b.nama AS nama_penerima,
    //     b.alamat AS alamat_penerima,
    //     b.rt,
    //     b.rw,
    //     g.name AS desa,
    //     f.name AS kecamatan,
    //     e.name AS kabupaten,
    //     d.name AS provinsi,
    //     b.negara,
    //     b.hp1,
    //     b.hp2,
    //     c.nama AS nama_kurir,
    //     b.catatan
    //   FROM tabel_pelanggan a
    //   LEFT JOIN tabel_penerima b ON a.`no_resi`=b.`no_resi`
    //   LEFT JOIN tabel_master_kurir c ON a.`id_kurir`=c.`email`
    //   LEFT JOIN tabel_master_provinsi d ON b.`provinsi`=d.`id`
    //   LEFT JOIN tabel_master_kabupaten e ON b.`kabupaten`=e.`id`
    //   LEFT JOIN tabel_master_kecamatan f ON b.`kecamatan`=f.`id`
    //   LEFT JOIN tabel_master_desa g ON b.`desa`=g.`id`
    //   WHERE a.status='0' AND a.no_resi='$no_resi'";
    //     return $this->db->query($sql)->result_array();
    // }

    // function provinsi()
    // {
    //     $this->db->order_by('name', 'ASC');
    //     $provinces = $this->db->get('tabel_master_provinsi');
    //     return $provinces->result_array();
    // }

    // function kabupaten($provId)
    // {
    //     $kabupaten = "<option value='0'>Pilih</pilih>";
    //     $this->db->order_by('name', 'ASC');
    //     $kab = $this->db->get_where('tabel_master_kabupaten', array('province_id' => $provId));
    //     foreach ($kab->result_array() as $data) {
    //         $kabupaten .= "<option value='$data[id]'>$data[name]</option>";
    //     }
    //     return $kabupaten;
    // }

    // function kecamatan($kabId)
    // {
    //     $kecamatan = "<option value='0'>Pilih</pilih>";
    //     $this->db->order_by('name', 'ASC');
    //     $kec = $this->db->get_where('tabel_master_kecamatan', array('regency_id' => $kabId));
    //     foreach ($kec->result_array() as $data) {
    //         $kecamatan .= "<option value='$data[id]'>$data[name]</option>";
    //     }
    //     return $kecamatan;
    // }

    // function kelurahan($kecId)
    // {
    //     $kelurahan = "<option value='0'>Pilih</pilih>";
    //     $this->db->order_by('name', 'ASC');
    //     $kel = $this->db->get_where('tabel_master_desa', array('district_id' => $kecId));
    //     foreach ($kel->result_array() as $data) {
    //         $kelurahan .= "<option value='$data[id]'>$data[name]</option>";
    //     }
    //     return $kelurahan;
    // }

    function count_departments()
    {
        $user = $this->session->userdata('id');
        // if ($user == 1) {
            $sql = "SELECT COUNT(id) AS total FROM departments";
            return $this->db->query($sql)->result_array();
        // } else {
        //     $sql = "SELECT COUNT(id) AS total FROM spareparts WHERE user_admin_dibuat='$user'";
        //     return $this->db->query($sql)->result_array();
        // }
    }
}
