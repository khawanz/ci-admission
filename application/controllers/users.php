<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }
    public function index($page = 'users'){
        $this->load->helper(array('url','admission_helper'));       
        $this->load->library('session');

        if(is_logged_in()){
            $data['title'] = 'User List';
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/list_user');
            $this->load->view('apps/template/footer');
        }
        else{
            $data['title'] = 'forbidden access';
            $this->load->view('apps/template/header', $data);          
            $this->load->view('apps/notaccessed');
            $this->load->view('apps/template/footer');
        }
    }
    
    public function add(){
        $this->load->helper(array('url','admission_helper'));       
        $this->load->library('session');

         $this->load->library('form_validation');
        if(is_logged_in()){
            $data['title'] = 'Add User';
            
            $roles = $this->users_model->get_roles();
            $data['roles'] = $roles;
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/add_user_1',$data);
            $this->load->view('apps/template/footer');
        }
        else{
            $data['title'] = 'forbidden access';
            $this->load->view('apps/template/header', $data);          
            $this->load->view('apps/notaccessed');
            $this->load->view('apps/template/footer');
        }
    }
    
    public function step1($next_step = FALSE){
        
        $this->load->helper(array('form', 'url','admission_helper'));       
        $this->load->library(array('form_validation', 'session'));

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');       
        $this->form_validation->set_rules('roles', 'Role', 'required');
        $this->form_validation->set_error_delimiters("<div class='error-message'>", "</div>");
        
        if ($this->form_validation->run() === FALSE)
	{
            $this->add();
            //redirect(base_url().'users/add'); not working!
	}
	else
	{
            if(isset($next_step)){
                $roles = $this->input->post('roles');
                $next_step = FALSE;
                foreach($roles as $role){
                    if($role == 'matriculant'){
                        $next_step = TRUE;
                    }
                }
            }
                     
            //it will take to next step if created user has matriculant role
            if(is_logged_in() && $next_step){
                $data['title'] = 'create user';

                $data['username'] = $this->input->post('username');
                $data['email'] = $this->input->post('email');
                $data['password'] = $this->input->post('password');
                $data['roles'] = $this->input->post('roles');
                
                $this->load->view('apps/template/header', $data);
                $this->load->view('apps/template/nav_menu');
                $this->load->view('apps/add_user_2',$data);
                $this->load->view('apps/template/footer');
            }
            //if created user has no matriculant role, then create it.
            else if(is_logged_in() && !$next_step){
                 $this->create($next_step);
            }
            else{
                $data['title'] = 'forbidden access';
                $this->load->view('apps/template/header', $data);          
                $this->load->view('apps/notaccessed');
                $this->load->view('apps/template/footer');
            }
	}                  
    }
    
    public function step2(){
        $this->load->helper('form');
	$this->load->library('form_validation');     
	     
        $this->load->library('session');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('hp', 'HP', 'trim|required');
        $this->form_validation->set_rules('nama_wali', 'Nama Orangtua/Wali', 'trim|required');
        $this->form_validation->set_rules('penghasilan_wali', 'Penghasilan Orangtua/Wali', 'trim|required');       
        $this->form_validation->set_rules('sekolah_asal', 'Sekolah Asal', 'required');
        $this->form_validation->set_error_delimiters("<div class='error-message'>", "</div>");
        
        //back to step 1 form if no valid
        if ($this->form_validation->run() === FALSE)
	{
            $this->step1(TRUE);
	}
	else
	{
            $this->create(TRUE);
        }
    }
    
    public function create($next_step = FALSE){       
        $this->load->helper(array('form','url'));
	$this->load->library('form_validation');     	     
                
        $this->users_model->create_user($next_step);                  

        $this->session->set_flashdata('success', 'SUCCESS creating new user!');

        redirect('users');      
  
    }
}

