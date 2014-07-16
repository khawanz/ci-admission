<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    
    public function index($page = 'home'){
        $this->load->helper('url');
        $this->load->library('session');

        if($this->is_logged_in()){
            $this->load->view('apps/header');
            $this->load->view('apps/'.$page);
            $this->load->view('apps/footer');
        }
        else{
            $this->load->view('apps/header');
            $this->load->view('apps/notaccessed');
            $this->load->view('apps/footer');
        }

    }
    
    public function view($page = 'home2'){
        $this->load->helper('url');
        
       $this->load->view('apps/header');
        $this->load->view('apps/'.$page);
        $this->load->view('apps/footer');
    }
    
    public function logout(){
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        
        $this->session->sess_destroy();              
        
        $this->load->view('apps/header');
        $this->load->view('apps/login');
        $this->load->view('apps/footer');
    }
    
    public function is_logged_in(){
         $this->load->library('session');
        $is_login = $this->session->userdata('login');
        //$username = $this->session->userdata('username');
        if($is_login){
            return true;
        }
    }
}