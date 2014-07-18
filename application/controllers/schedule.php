<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {
    public function index($page = 'schedule'){
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');       
        
        $this->load->library('form_validation');
        
        if($this->is_logged_in()){
            $data['title'] = 'Schedule';
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/schedule');
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
    
    public function is_logged_in(){
         $this->load->library('session');
        $is_login = $this->session->userdata('login');
        //$username = $this->session->userdata('username');
        if($is_login){
            return true;
        }
    }
}
