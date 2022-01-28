<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Machinery_model extends MY_Model
{

    protected $table = 'machinery_inbound';
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
        b.supplierName,
        c.name AS area_zone_location
        FROM machinery_inbound a
        LEFT JOIN ref_suppliers b ON a.`supplier_id`=b.`id`
        LEFT JOIN ref_area_zone_detail c ON a.`area_zone_id`=c.`id`";
        return $this->db->query($sql)->result_array();
    }

    function get_last_code($day, $month, $year)
    {
        $this->db->where('DAY(date_created)', $day);
        $this->db->where('MONTH(date_created)', $month);
        $this->db->where('YEAR(date_created)', $year);

        $this->db->order_by('date_created', 'desc');
        $this->db->limit(1);

        return $this->db->get($this->table)->row_array();
    }

    function view($id)
    {
        $sql = "SELECT
        a.*,
        b.name AS factory_location,
        c.name AS zone_division,
        d.name AS area_zone,
        e.name AS room_area,
        f.name AS rack_location,
        g.name AS rack_level,
        h.supplierName,
        h.address AS addres_supplier,
        h.location,
        h.website,
        h.email,
        h.phone,
        h.picSupplier,
        i.nik,
        i.name AS name_driver,
        i.gender,
        i.phone_number,
        i.email AS email_driver,
        i.sim_card,
        i.name AS name_driver,
        i.address AS address_driver,
        i.image AS foto_driver
        FROM machinery_inbound a
        LEFT JOIN ref_location_factory b ON a.`factory_location_id`=b.`id`
        LEFT JOIN ref_zone_division c ON a.`zone_division_id`=c.`id`
        LEFT JOIN ref_area_zone_detail d ON a.`area_zone_id`=d.`id`
        LEFT JOIN ref_room_area_zone_detail e ON a.`room_area_id`=e.`id`
        LEFT JOIN ref_rack_location_detail f ON a.`rack_location_id`=f.`id`
        LEFT JOIN ref_rack_level_detail g ON a.`rack_level_id`=g.`id`
        LEFT JOIN ref_suppliers h ON a.`supplier_id`=h.`id`
        LEFT JOIN ref_driver i ON a.`driver_id`=i.`id`
        WHERE a.`id`='$id'";
        return $this->db->query($sql)->result_array();
    }
    
    function insert_excel($temp_data){
		$insert = $this->db->insert_batch('machinery_inbound', $temp_data);
		if($insert){
			return true;
		}
	}

}
