<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function index($page = 'login'){
        $this->load->helper(array('form', 'url','admission_helper'));
        $this->load->library('session');       
        
        $this->load->library('form_validation');
        
        if(is_logged_in()){
            redirect(base_url().'home');
        }
        else{     
            $data['title'] = 'Login';
            $this->load->view('apps/template/header',$data);
            $this->load->view('apps/'.$page);
            $this->load->view('apps/template/footer');
        }       
        
    }
       
    public function logout(){
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        
        $this->session->sess_destroy();              
        
        $data['title'] = 'Logout';
        $this->load->view('apps/template/header',$data);       
        $this->load->view('apps/login');
        $this->load->view('apps/template/footer');
    }

}