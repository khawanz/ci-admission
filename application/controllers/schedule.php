<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('schedule_model');
    }
    public function index($page = 'schedule'){
        $this->load->helper(array('url','admission_helper'));
        $this->load->library('session');             
        
        if(is_logged_in()){
            $schedule = $this->schedule_model->get_schedule();
            $data['title'] = 'Schedule';
            $data['schedule'] = $schedule;
            
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/list_schedule');
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
    
    public function add(){
        $this->load->helper(array('form', 'url','admission_helper'));
        $this->load->library('session'); 
        $this->load->library('form_validation');
        
        if(is_logged_in()){
            $data['title'] = 'Add Schedule';         
            
            $schedule = $this->schedule_model->get_schedule();
            $data['title'] = 'Add Schedule';
            $data['schedule'] = $schedule;
            
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/add_schedule');
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
