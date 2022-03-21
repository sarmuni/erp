<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category_inventaris_model extends MY_Model
{

    protected $table = 'ref_category_inventaris';
    protected $primary_key = 'id';
    protected $create_date = 'created_date';
    protected $update_date = 'update_date';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $sql = "SELECT * FROM ref_category_inventaris";
        return $this->db->query($sql)->result_array();
    }


}
