<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function index($page = 'login'){
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        
        $this->load->view('apps/header');
        $this->load->view('apps/'.$page);
        $this->load->view('apps/footer');
    }
       
    
}