<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    
    public function index($page = 'home'){       
        $this->load->helper(array('url','admission_helper'));       
        $this->load->library('session');

        if(is_logged_in()){
            $data['title'] = 'Home';
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/'.$page);
            $this->load->view('apps/template/footer');
        }
        else{
            redirect(base_url().'login');
        }

    }
    
//    public function view($page = 'home2'){
//        $this->load->helper('url');
//        
//       $this->load->view('apps/header');
//        $this->load->view('apps/'.$page);
//        $this->load->view('apps/footer');
//    }
     
}