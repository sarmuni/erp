<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $company = $ci->db->get_where('ref_companies', ['id' => 1])->row_array();
        $companyName = $company['companyName'];
        $key = "UFQgQmF0YXZpYSBJbmRvIEdsb2JhbA==";

        if ($companyName == base64_decode($key)) {
            $role_id = $ci->session->userdata('role_id');
            $menu = $ci->uri->segment(1);
    
            $queryMenu = $ci->db->get_where('auth_menu', ['menu' => $menu])->row_array();
            $menu_id = $queryMenu['id'];
            $name_menu = $queryMenu['menu'];
    
    
            $user_access = $ci->db->get_where('auth_user_access_menu', [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]);
    
            if ($user_access->num_rows() < 1) {
                redirect('auth/blocked');
            }

        }else{
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('auth_user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
