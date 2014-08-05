<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}
    
    public function index($page = 'login'){
         $this->load->helper(array('form', 'url','captcha'));

        $this->load->library('session');       
        
        $this->load->library('form_validation');
        
        $captchaWord = $this->session->userdata('captchaWord');
        
        if(is_logged_in()){
            redirect(base_url().'home');
        }    

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'callback_password_check');
       // $this->form_validation->set_message('required', 'Your custom message here');
        $this->form_validation->set_error_delimiters("<div class='error-message'>", "</div>");
        $this->form_validation->set_rules('captcha', 'captcha', 'callback_captcha_check['.$captchaWord.']');
        
        if($this->form_validation->run() == TRUE)
        {   
            $this->session->unset_userdata('captchaWord');
            $this->set_session();
            redirect(base_url().'home');
 
            
        } 
        else
        {
            $vals = array(
                'word'   => random_string('alnum', 6),
                'img_path'   => './captcha/',
                'img_url'    => base_url().'captcha/',
                'font' => './system/fonts/impact.ttf',          
                'img_width'  => '100',
                'img_height' => 50,
                'expiration' => 1800,
                "time" => time()
               );

               $data['cap'] = create_captcha($vals);

               $cap = array(
                'captcha_time'  => $vals['time'],
                'ip_address'    => $this->input->ip_address(),
                'word'   => $vals['word']
               );

            $query = $this->db->insert_string('captcha', $cap);
            $this->db->query($query);

            $this->session->set_userdata('captchaWord',$cap['word']);
            
            $data['title'] = 'Login';
            $this->load->view('apps/template/header', $data);               
            $this->load->view('apps/'.$page);
            $this->load->view('apps/template/footer');
               
        }
        
    }
       
    public function logout(){
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        
        $this->session->sess_destroy();              
        
        redirect(base_url().'login');
    }
    
    //validation for authentication user
    public function password_check($str){
        $username_input = $this->input->post('username');
        $user = $this->users_model->get_user_by_username($username_input);
       
        //if username and password match, then it will set session
       if (!empty($user) && md5($str) === $user->password)
        {              
            return TRUE;
        }
       
       $this->form_validation->set_message('password_check', "<div class = 'error_message'>Incorrect username or password!</div>");
        return FALSE;     
    }

    public function captcha_check($str, $captcha){
        if(strtoupper($str) == strtoupper($captcha)){
            return TRUE;
        }
        
        $this->form_validation->set_message('captcha_check', "<div class = 'error_message'>Incorrect captcha!</div>");
        return FALSE;
    }
    public function set_session(){
        $username_input = $this->input->post('username');
        
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
    }
}