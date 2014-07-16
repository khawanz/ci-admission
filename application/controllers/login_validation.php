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

        $this->form_validation->set_rules('username', 'Username', 'callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'required');
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
               $this->load->view('apps/header');
               $this->load->view('apps/home');
               $this->load->view('apps/footer');
        }
    }       
    
    public function username_check($str){
       $users = $this->users->get_users();
       foreach($users as $user){
           if ($str === $user['username'] && filter_input(INPUT_POST, 'password') === $user['password'])
            {             
                    return TRUE;
            }
       }
        
       $this->form_validation->set_message('username_check', "<div id = 'error_message'>Username or password incorrect!</div>");
        return FALSE;     
    }
    
}