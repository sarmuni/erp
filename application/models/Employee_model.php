<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends MY_Model
{

    protected $table = 'ref_personnel';
    protected $primary_key = 'id';
    protected $create_date = 'date_created';
    protected $update_date = 'date_update';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $sql = "SELECT 
        a.*,
        b.name AS name_departments
        FROM ref_personnel a
        LEFT JOIN ref_departments b
        ON a.`departments_id`=b.`id`
        ";
        return $this->db->query($sql)->result_array();
    }

    
    function get_all_by_departements($departments_id, $year, $status,$gender)
    {
        if($departments_id > 0) $this->db->where('departments_id', $departments_id);
        if($year > 0) $this->db->where('YEAR(effective_time)', $year);
        if($gender > 0) $this->db->where('gender', $gender);
        if($status > 0) $this->db->where('is_active', $status);
        $this->db->order_by('id', 'desc');
        return $this->db->get($this->table)->result_array();
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

    function departments()
    {
        $this->db->order_by('name', 'ASC');
        $result = $this->db->get('ref_departments');
        return $result->result_array();
    }

    function part_departments()
    {
        $this->db->order_by('name', 'ASC');
        $result = $this->db->get('ref_departments_detail');
        return $result->result_array();
    }

    function part_departments_id($id_def)
    {
        $part_departments_id = "<option value='0'>-- Select --</pilih>";
        $this->db->order_by('name', 'ASC');
        $result = $this->db->get_where('ref_departments_detail', array('id_def' => $id_def));
        foreach ($result->result_array() as $data) {
            $part_departments_id .= "<option value='$data[id]'>$data[name]</option>";
        }
        return $part_departments_id;
    }

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
