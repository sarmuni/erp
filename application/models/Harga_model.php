<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Harga_model extends MY_Model
{

    protected $table = 'tabel_master_harga';
    protected $primary_key = 'id';
    protected $create_date = 'tanggal_dibuat';
    protected $update_date = 'tanggal_update';

    function __construct()
    {
        parent::__construct();
    }
}
