<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Validation extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('users');
	}
    public function index($page = 'login'){
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'callback_password_check');
       // $this->form_validation->set_message('required', 'Your custom message here');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
   
        if ($this->form_validation->run() == FALSE)
        {
               $this->load->view('apps/header');
               $this->load->view('apps/login');
               $this->load->view('apps/footer');
               
        }
        else
        {
            $this->load->library('session');
            
            $user_session = array(
                //'session_id' => uniqid(),
                'username' => $this->input->post('username'),
                'login' => TRUE,
            );
            $this->session->set_userdata($user_session);
       
            $this->load->view('apps/header');
            $this->load->view('apps/home');
            $this->load->view('apps/footer');
        }
    }       
    
    public function password_check($str){
        $username_input = $this->input->post('username');
       $user = $this->users->get_password_by_username($username_input);
       
       if (!empty($user) && $str === $user->password)
        {             
                return TRUE;
        }

        
       $this->form_validation->set_message('password_check', "<div id = 'error_message'>Incorrect username or password!</div>");
        return FALSE;     
    }
    
}