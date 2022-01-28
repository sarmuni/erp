<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class History_model extends MY_Model
{

    protected $table = 'tabel_history';
    protected $primary_key = 'id';
    protected $create_date = 'tanggal_history';
    // protected $update_date = 'date_update';

    function __construct()
    {
        parent::__construct();
    }
}
