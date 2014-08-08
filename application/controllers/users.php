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
            $users = $this->users_model->get_users();
            $data['title'] = 'User List';           
            
            $user_list = array();
            $i = 0;
            foreach($users as $user){
                $user_list[$i]['uid'] = $user['uid'];
                $user_list[$i]['username'] = $user['username'];
                $user_list[$i]['status'] = ($user['status'])? 'Aktif':'Tidak Aktif';
                
                $userload = $this->users_model->get_user_by_username($user['username']);
                if(count($userload->roles)){
                    $roles = '';
                    foreach($userload->roles as $us){
                        if($us != 'authenticated user'){
                            $roles .= '- '.$us;
                            $roles .= '<br/>';
                        }                       
                    }
                }
                $user_list[$i]['roles'] = $roles;       
                $i++;
            }
            
            $data['users'] = $user_list;
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
    
    public function edit($uid = null){
        $this->load->helper(array('form', 'url','admission_helper'));       
        
        $this->load->library('form_validation');
        
         if(is_logged_in()){
            $data['title'] = 'Edit User'; 
            
            $user = $this->users_model->get_user_by_uid($uid);
            $data['user'] = $user;
            
            $roles = $this->users_model->get_roles();
            $data['roles'] = $roles;
            
            $data_personal = $this->users_model->get_data_personal($uid);
            $data['data_personal'] = isset($data_personal[0])? $data_personal[0]:null;
            
            $data_parent = $this->users_model->get_data_parent($uid);
            $data['data_parent'] = isset($data_parent[0])? $data_parent[0]:null;
            
            $data_school = $this->users_model->get_data_school($uid);
            $data['data_school'] = isset($data_school[0])? $data_school[0]:null;

            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');           
            $this->load->view('apps/edit_user',$data);
            $this->load->view('apps/template/footer');
        }
        else{
            $data['title'] = 'forbidden access';
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/notaccessed');
            $this->load->view('apps/template/footer');
        }  
    }
    
    public function update(){
        $this->load->helper(array('form','url'));
	$this->load->library(array('form_validation','session'));
        
         $uid = $this->input->post('uid');

	$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim||matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|');       
        $this->form_validation->set_rules('roles', 'Role', 'required');
        $this->form_validation->set_error_delimiters("<div class='error-message'>", "</div>");
    
        $userbutton = $this->input->post('updateForm');
        if($userbutton == 'updateButton'){
            if ($this->form_validation->run() === FALSE)
            {
                    $this->edit($uid);

            }
            else
            {
                
                $roles = $this->users_model->get_roles_by_uid($uid);
                $matriculant_role = FALSE;
                if(in_array('matriculant', $roles)){
                    $matriculant_role = TRUE;
                }
                $this->load->library('session');
                $this->users_model->update_user($matriculant_role);
                $this->session->set_flashdata('success', 'Update user SUCCESS!');
                
                redirect('users');
            }
        }
        else if($userbutton == 'cancelButton'){
            redirect('users');
        }	
    }
    
     public function delete($uid = null){    
        $this->load->helper('url');     
        $this->load->library('session');
        
        $this->users_model->delete_user($uid);

        $this->session->set_flashdata('success', 'Success delete!');

        redirect('users');
    }
    
    public function profile($uid = null){
        $this->load->helper(array('url','admission_helper'));       
        $this->load->library('session');

         $this->load->library('form_validation');
        if(is_logged_in()){
            $data['title'] = 'Profile';
            $user = $this->users_model->get_user_by_uid($uid);
            $personal = $this->users_model->get_data_personal($uid);
            $parent = $this->users_model->get_data_parent($uid);
            $school = $this->users_model->get_data_school($uid);
            
            $data['user'] = $user;
            $data['personal'] = isset($personal)? json_encode($personal[0]):null;
            $data['parent'] = isset($parent)?$parent[0]:null;
            $data['school'] = isset($school)?$school[0]:null;
            
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/profile',$data);
            $this->load->view('apps/template/footer');
        }
        else{
            $data['title'] = 'forbidden access';
            $this->load->view('apps/template/header', $data);          
            $this->load->view('apps/notaccessed');
            $this->load->view('apps/template/footer');
        }
    }
}

