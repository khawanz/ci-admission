<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    
    public function index($page = 'home'){
        $this->load->helper('url');
        
        $this->load->view('apps/header');
        $this->load->view('apps/'.$page);
        $this->load->view('apps/footer');

    }
    
    public function view($page = 'home2'){
        $this->load->helper('url');
        
       $this->load->view('apps/header');
        $this->load->view('apps/'.$page);
        $this->load->view('apps/footer');
    }
    
}