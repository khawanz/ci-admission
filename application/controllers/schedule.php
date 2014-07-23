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
        
        $this->load->library('form_validation');

        if(is_logged_in()){
            $data['title'] = 'Add Schedule';         
            
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');           
            $this->load->view('apps/add_schedule');
            $this->load->view('apps/template/footer');
        }
        else{
            $data['title'] = 'forbidden access';
            $this->load->view('apps/template/header', $data);
//            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/notaccessed');
            $this->load->view('apps/template/footer');
        }    
    }
    
    public function create(){
        $this->load->helper('form');
	$this->load->library('form_validation');

	$this->form_validation->set_rules('gelombang', 'Gelombang', 'required');
	$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('time1', 'Jam Awal', 'required');
        $this->form_validation->set_rules('time2', 'Jam Selesai', 'required');
        $this->form_validation->set_error_delimiters("<div class='error-message'>", "</div>");

	if ($this->form_validation->run() === FALSE)
	{
		$this->add();

	}
	else
	{
            $this->load->library('session');
            $this->schedule_model->create_schedule();
            $this->session->set_flashdata('success', 'SUCCESS creating new schedule!');
//            $data['success'] = 'SUCCESS!';
//            $this->load->view('apps/success_message',$data);               
            redirect('schedule');
	}
    }
    
    public function edit($id = null){       
        $this->load->helper(array('form', 'url','admission_helper'));       
        
        $this->load->library('form_validation');

        if(is_logged_in()){
            $schedule = $this->schedule_model->get_schedule_by_id($id);
            
            $data['title'] = 'Edit Schedule';         
            $data['schedule'] = $schedule[0];
            
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');           
            $this->load->view('apps/edit_schedule',$data);
            $this->load->view('apps/template/footer');
        }
        else{
            $data['title'] = 'forbidden access';
            $this->load->view('apps/template/header', $data);
//            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/notaccessed');
            $this->load->view('apps/template/footer');
        }  
    }
    
    public function update(){
        $this->load->helper(array('form','url'));
	$this->load->library('form_validation');	

	$this->form_validation->set_rules('gelombang', 'Gelombang', 'required');
	$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('time1', 'Jam Awal', 'required');
        $this->form_validation->set_rules('time2', 'Jam Selesai', 'required');
        $this->form_validation->set_error_delimiters("<div class='error-message'>", "</div>");
    
        $userbutton = $this->input->post('updateForm');
        if($userbutton == 'updateButton'){
            if ($this->form_validation->run() === FALSE)
            {
                    $this->edit();

            }
            else
            {
                $this->load->library('session');
                $this->schedule_model->update_schedule();
                $this->session->set_flashdata('success', 'Update schedule SUCCESS!');
                
                redirect('schedule');
            }
        }
        else if($userbutton == 'cancelButton'){
            redirect('schedule');
        }	
    }
    
    public function delete($id = null){    
        $this->load->helper('url');     
        $this->load->library('session');
        
        $this->schedule_model->delete_schedule($id);

        $this->session->set_flashdata('success', 'Success delete!');

        redirect('schedule');
    }
}
