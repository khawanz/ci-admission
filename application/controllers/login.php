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
        
        $vals = array(
            'word'   => random_string('alnum', 6),
            'img_path'   => './captcha/',
            'img_url'    => base_url().'captcha/',
            'font' => './system/fonts/impact.ttf',          
            'img_width'  => '100',
            'img_height' => 30,
            'expiration' => 7200,
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
        
        if(is_logged_in()){
            redirect(base_url().'home');
        }    

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'callback_password_check');
       // $this->form_validation->set_message('required', 'Your custom message here');
        $this->form_validation->set_error_delimiters("<div class='error-message'>", "</div>");

        if ($this->form_validation->run() == FALSE)
        {
                $data['title'] = 'Login';
                $this->load->view('apps/template/header', $data);               
                $this->load->view('apps/'.$page);
                $this->load->view('apps/template/footer');
               
        }
        else
        {                               
            redirect(base_url().'home');
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

    public function set_captcha(){
        $vals = array(
            'word'   => 'Random word',
            'img_path'   => '../../assets/images/captcha/',
            'img_url'    => base_url().'images/captcha/',
            'font' => '../../system/fonts/texb.ttf',
            'img_width'  => '150',
            'img_height' => 30,
            'expiration' => 7200,
            "time" => time()
           );

           $data['cap'] = create_captcha($vals);

           $data = array(
            'captcha_time'  => $vals['time'],
            'ip_address'    => $this->input->ip_address(),
            'word'   => $vals['word']
           );
           
        $query = $this->db->insert_string('captcha', $data);
        $this->db->query($query);
    }
}