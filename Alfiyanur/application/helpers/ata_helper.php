<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }
}
function is_admin()
{
    $ci = get_instance();
    if ($ci->session->userdata('role_id') == 2) {
        redirect('auth/blocked');
    }
}
