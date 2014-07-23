<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Validation extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}
        
    public function index($page = 'login'){
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'callback_password_check');
       // $this->form_validation->set_message('required', 'Your custom message here');
        $this->form_validation->set_error_delimiters("<div class='error-message'>", "</div>");

        if ($this->form_validation->run() == FALSE)
        {
                $data['title'] = 'Login';
                $this->load->view('apps/template/header', $data);
                $this->load->view('apps/template/nav_menu');
                $this->load->view('apps/'.$page);
                $this->load->view('apps/template/footer');
               
        }
        else
        {
            $this->load->helper(array('form', 'url'));                    
                  
            redirect(base_url().'home');
        }
    }       
    
    //validation for authentication user
    public function password_check($str){
        $username_input = $this->input->post('username');
        $user = $this->users_model->get_user_by_username($username_input);
       
        //if username and password match, then it will set session
       if (!empty($user) && md5($str) === $user->password)
        {   
            $this->load->library('session');
            $user = $this->users_model->get_user_by_username($username_input);
            
            $user_session = array(
                'session_id' => $this->session->userdata('session_id'),
                'username' => $this->input->post('username'),
                'uid' => $user->uid,
                'roles' => $user->roles,
                'login' => TRUE,
            );
            $this->session->set_userdata($user_session);
            return TRUE;
        }
       
       $this->form_validation->set_message('password_check', "<div class = 'error_message'>Incorrect username or password!</div>");
        return FALSE;     
    }
    
}