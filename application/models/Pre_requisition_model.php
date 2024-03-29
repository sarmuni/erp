<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pre_requisition_model extends MY_Model
{

    protected $table = 'pre_requisition';
    protected $primary_key = 'id';
    protected $create_date = 'created_at';
    protected $update_date = 'updated_at';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id==1 OR $role_id==2  OR $role_id==12) {
            $sql = "SELECT
            a.id,
            a.pre_code,
            a.pre_date,
            a.pre_deadline_date,
            b.fullname,
            c.name AS department,
            a.department_id,
            a.request_status,
            a.request_user_id,
            a.supliers_id,
            a.status,
            a.notes,
            a.approved_hod_date,
            a.approved_hod_by,
            a.verified_purchasing_date,
            a.verified_purchasing_by,
            a.approved_bod_by_date,
            a.approved_bod_by,
            a.approved_finance_date,
            a.approved_finance_by,
            a.paid_by,
            a.paid_date,
            a.created_at,
            SUM(d.pre_qty)AS total_item
            FROM pre_requisition a
            LEFT JOIN auth_user b ON a.`request_user_id`=b.`id`
            LEFT JOIN ref_departments c ON a.`department_id`=c.`id`
            LEFT JOIN pre_requisition_item_detail d ON a.`pre_code`=d.`item_pre_code`";
            if ($role_id==12 OR $role_id==2) {
                $sql .=" WHERE a.status != 2 and a.status != 3";
            }
            $sql .=" GROUP BY a.`id`";
        }else{
            $sql = "SELECT
            a.id,
            a.pre_code,
            a.pre_date,
            a.pre_deadline_date,
            b.fullname,
            c.name AS department,
            a.department_id,
            a.request_status,
            a.request_user_id,
            a.supliers_id,
            a.status,
            a.notes,
            a.approved_hod_date,
            a.approved_hod_by,
            a.verified_purchasing_date,
            a.verified_purchasing_by,
            a.approved_bod_by_date,
            a.approved_bod_by,
            a.approved_finance_date,
            a.approved_finance_by,
            a.paid_by,
            a.paid_date,
            a.created_at,
            SUM(d.pre_qty)AS total_item
            FROM pre_requisition a
            LEFT JOIN auth_user b ON a.`request_user_id`=b.`id`
            LEFT JOIN ref_departments c ON a.`department_id`=c.`id`
            LEFT JOIN pre_requisition_item_detail d ON a.`pre_code`=d.`item_pre_code`
            WHERE a.`department_id`='$role_id' and a.`status` !='2'
            GROUP BY a.`id`";
        }
        return $this->db->query($sql)->result_array();
    }

    function get_by_id($id)
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id==1 OR $role_id==2 OR $role_id==12 OR $role_id==8) {
            $sql = "SELECT
            a.id,
            a.pre_code,
            a.number_po,
            a.pre_date,
            a.pre_deadline_date,
            b.fullname,
            c.name AS department,
            a.department_id,
            a.request_status,
            a.request_user_id,
            a.supliers_id,
            a.status,
            a.notes,
            a.approved_hod_date,
            a.approved_hod_by,
            a.verified_purchasing_date,
            a.verified_purchasing_by,
            a.approved_bod_by_date,
            a.approved_bod_by,
            a.approved_finance_date,
            a.approved_finance_by,
            a.paid_by,
            a.paid_date,
            a.created_at,
            SUM(d.pre_qty)AS total_item
            FROM pre_requisition a
            LEFT JOIN auth_user b ON a.`request_user_id`=b.`id`
            LEFT JOIN ref_departments c ON a.`department_id`=c.`id`
            LEFT JOIN pre_requisition_item_detail d ON a.`pre_code`=d.`item_pre_code`
            WHERE a.`id`='$id'
            GROUP BY a.`id`";
        }else{
            $sql = "SELECT
           a.id,
            a.pre_code,
            a.number_po,
            a.pre_date,
            a.pre_deadline_date,
            b.fullname,
            c.name AS department,
            a.department_id,
            a.request_status,
            a.request_user_id,
            a.supliers_id,
            a.status,
            a.notes,
            a.approved_hod_date,
            a.approved_hod_by,
            a.verified_purchasing_date,
            a.verified_purchasing_by,
            a.approved_bod_by_date,
            a.approved_bod_by,
            a.approved_finance_date,
            a.approved_finance_by,
            a.paid_by,
            a.paid_date,
            a.created_at,
            SUM(d.pre_qty)AS total_item
            FROM pre_requisition a
            LEFT JOIN auth_user b ON a.`request_user_id`=b.`id`
            LEFT JOIN ref_departments c ON a.`department_id`=c.`id`
            LEFT JOIN pre_requisition_item_detail d ON a.`pre_code`=d.`item_pre_code`
            WHERE a.`department_id`='$role_id' AND a.id='$id'
            GROUP BY a.`id`";
        }
        return $this->db->query($sql)->result_array();
    }

    function get_last_code($day, $month, $year)
    {
        $this->db->where('DAY(created_at)', $day);
        $this->db->where('MONTH(created_at)', $month);
        $this->db->where('YEAR(created_at)', $year);

        $this->db->order_by('created_at', 'desc');
        $this->db->limit(1);

        return $this->db->get($this->table)->row_array();
    }

    function call_function_procedure_head_of_dept($id)
    {
        $id = $this->session->userdata('id');

        $sql = "CALL Proc_head_of_dept('$id')";

        if($sql !== FALSE && $this->db->query($sql)->num_rows() == 1) 
        {
            return true;
        }
        else
        {
            return false;
        } 

        return $this->db->query($sql)->result_array();

    }


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
    //     a.date_created,
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
    //     a.date_created,
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
