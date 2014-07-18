<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('is_logged_in')){
    function is_logged_in(){
        $ci = &get_instance();
        $ci->load->library('session');
        $is_login = $ci->session->userdata('login');
        //$username = $this->session->userdata('username');
        if($is_login){
            return true;
        }
    }
}

    