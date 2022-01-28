<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Intro extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Introduction';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('intro/index');
        $this->load->view('templates/auth_footer');
    }
}
