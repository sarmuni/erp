<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Agen_model extends MY_Model
{

    protected $table = 'tabel_master_agen';
    protected $primary_key = 'agen_id';
    protected $create_date = 'tanggal_dibuat';
    protected $update_date = 'tanggal_update';

    function __construct()
    {
        parent::__construct();
    }
}
