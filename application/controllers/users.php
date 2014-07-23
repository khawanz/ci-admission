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
            $data['title'] = 'List User';
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
    
    public function step1(){
        $this->load->helper(array('form', 'url','admission_helper'));       
        $this->load->library(array('form_validation', 'session'));

        $x = 1;

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|md5');       
        $this->form_validation->set_rules('roles', 'Role', 'required');
        $this->form_validation->set_error_delimiters("<div class='error-message'>", "</div>");
        
        if ($this->form_validation->run() === FALSE)
	{
            $this->add();
            //redirect(base_url().'users/add'); not working!
	}
	else
	{
            $roles = $this->input->post('roles');
            $next_step = FALSE;
            foreach($roles as $role){
                if($role == 'matriculant'){
                    $next_step = TRUE;
                }
            }
            $this->load->library('form_validation');
            if(is_logged_in() && $next_step){
                $data['title'] = 'Add User';

                $roles = $this->users_model->get_roles();
                $data['roles'] = $roles;
                $this->load->view('apps/template/header', $data);
                $this->load->view('apps/template/nav_menu');
                $this->load->view('apps/add_user_2',$data);
                $this->load->view('apps/template/footer');
            }
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
    
    public function create($next_step){       
        $this->load->helper('form');
	$this->load->library('form_validation');     
	     
	
        $this->load->library('session');
        $this->users_model->create_user($next_step);

        $username = $this->input->post('username');
        $user = $this->users_model->get_user_by_username('khawanz');

        $roles = $this->input->post('roles');
        foreach($roles as $rid => $role_name){
            $this->users_model->update_users_roles($user->uid, $rid);
        }

        $this->session->set_flashdata('success', 'SUCCESS creating new user!');

        redirect('users');
  
    }
}

