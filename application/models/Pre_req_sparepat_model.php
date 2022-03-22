<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pre_req_sparepat_model extends MY_Model
{

    protected $table = 'requisition_sparepat';
    protected $primary_key = 'id';
    protected $create_date = 'created_date';
    protected $update_date = 'updated_date';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
            $sql = "SELECT * FROM {$this->table}";
     
        return $this->db->query($sql)->result_array();
    }

    function get_all_join()
    {
            $sql = "SELECT
            a.id,
            a.orders_number,
            a.created_date,
            b.company_name,
            a.sales_person_text,
            a.payment_method,
            COUNT(c.quantity)AS qty,
            SUM(c.total) AS total
            FROM sales_orders a
            LEFT JOIN ref_customers b ON a.`customer_id`=b.`id`
            LEFT JOIN sales_order_items c ON a.`orders_number`=c.`sales_orders_id`";
     
        return $this->db->query($sql)->result_array();
    }

    public function getActiveProductData()
	{
		$sql = "SELECT * FROM products";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getProductData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM products where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM products ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

    function get_customers_id($id){
        $hasil=$this->db->query("SELECT * FROM ref_customers WHERE id='$id'");
        return $hasil->result();
    }


    function get_by_id($id)
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id==12 OR $role_id==1) {
            $sql = "SELECT
            a.id,
            a.pre_code,
            a.pre_date,
            a.pre_deadline_date,
            b.fullname,
            c.name AS department,
            a.request_status,
            a.status,
            a.notes,
            SUM(d.pre_qty)AS total_item
            FROM sales_orders a
            LEFT JOIN auth_user b ON a.`request_user_id`=b.`id`
            LEFT JOIN ref_departments c ON a.`department_id`=c.`id`
            LEFT JOIN sales_orders_item_detail d ON a.`pre_code`=d.`item_pre_code`
            WHERE a.`id`='$id'
            GROUP BY a.`id`";
        }else{
            $sql = "SELECT
            a.id,
            a.pre_code,
            a.pre_date,
            a.pre_deadline_date,
            b.fullname,
            c.name AS department,
            a.request_status,
            a.status,
            a.notes,
            SUM(d.pre_qty)AS total_item
            FROM sales_orders a
            LEFT JOIN auth_user b ON a.`request_user_id`=b.`id`
            LEFT JOIN ref_departments c ON a.`department_id`=c.`id`
            LEFT JOIN sales_orders_item_detail d ON a.`pre_code`=d.`item_pre_code`
            WHERE a.`department_id`='$role_id' AND a.id='$id'
            GROUP BY a.`id`";
        }
        return $this->db->query($sql)->result_array();
    }

    function get_last_code($day, $month, $year)
    {
        $this->db->where('DAY(created_date)', $day);
        $this->db->where('MONTH(created_date)', $month);
        $this->db->where('YEAR(created_date)', $year);

        $this->db->order_by('created_date', 'desc');
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
