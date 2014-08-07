<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ub extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ub_model');
    }
    public function index($page = 'ub'){
        $this->load->helper(array('url','admission_helper'));
        $this->load->library('session');             
        
        if(is_logged_in()){            
            $data['title'] = 'Setting UB';
          
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/ub_page');
            $this->load->view('apps/template/footer');
        }
        else{
            $data['title'] = 'forbidden access';
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/notaccessed');
            $this->load->view('apps/template/footer');
        }    
        
    }
}
    