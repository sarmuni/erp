<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Machinery_model extends MY_Model
{

    protected $table = 'spareparts';
    protected $primary_key = 'id';
    protected $create_date = 'created_at';
    protected $update_date = 'updated_at';

    function __construct()
    {
        parent::__construct();
    }
}
