<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
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
    }
}
