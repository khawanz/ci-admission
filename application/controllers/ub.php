<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ub extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('ub_model');
    }
    public function fakultas(){
        $this->load->helper(array('url','admission_helper'));
        $this->load->library('session');             
        
        if(is_logged_in()){            
            $data['title'] = 'Fakultas';
          
            $faculties = $this->ub_model->get_faculties();
            $data['faculties'] = isset($faculties)?$faculties:null;
            
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/list_faculty', $data);
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
    
    public function departemen(){
        $this->load->helper(array('url','admission_helper'));
        $this->load->library('session');             
        
        if(is_logged_in()){            
            $data['title'] = 'Departemen';
          
            $deps = $this->ub_model->get_departements();
            $data['deps'] = isset($deps)?$deps:null;
            
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/list_departement', $data);
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
    
    public function add_departement(){
        $this->load->helper(array('form', 'url','admission_helper'));    
        $this->load->library(array('session','form_validation'));             
        
        if(is_logged_in()){            
            $data['title'] = 'Add Departemen';
          
            $deps = $this->ub_model->get_departements();
            $data['deps'] = isset($deps)?$deps:null;
            
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');
            $this->load->view('apps/add_departement', $data);
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
    
    public function create_departement(){
        $this->load->helper(array('form','url'));
	$this->load->library('form_validation');

	$this->form_validation->set_rules('kode_dep', 'Kode', 'required');
	$this->form_validation->set_rules('nama_dep', 'Nama Departemen', 'required');    
        $this->form_validation->set_error_delimiters("<div class='error-message'>", "</div>");

	if ($this->form_validation->run() === FALSE)
	{
		$this->add_departement();

	}
	else
	{
            $this->load->library('session');
            $this->ub_model->create_departement();
            $this->session->set_flashdata('success', 'SUCCESS creating new departement!');
            
            redirect(base_url().'ub/departemen');
	}
    }
    
    public function edit_departemen($id = null){       
        $this->load->helper(array('form', 'url','admission_helper'));       
        
        $this->load->library('form_validation');

        if(is_logged_in()){
            $dep = $this->ub_model->get_departement_by_id($id);
            
            $data['title'] = 'Edit Schedule';         
            $data['dep'] = $dep[0];
            
            $this->load->view('apps/template/header', $data);
            $this->load->view('apps/template/nav_menu');           
            $this->load->view('apps/edit_departement',$data);
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
 
    public function update_departement(){
        $this->load->helper(array('form','url'));
	$this->load->library('form_validation');	

	$this->form_validation->set_rules('kode_dep', 'Kode', 'required');
	$this->form_validation->set_rules('nama_dep', 'Nama', 'required');      
        $this->form_validation->set_error_delimiters("<div class='error-message'>", "</div>");
    
        $userbutton = $this->input->post('updateForm');
        if($userbutton == 'updateButton'){
            if ($this->form_validation->run() === FALSE)
            {
                    $this->edit_departemen();

            }
            else
            {
                $this->load->library('session');
                $this->ub_model->update_departement();
                $this->session->set_flashdata('success', 'Update Departement SUCCESS!');
                
                redirect(base_url().'ub/departemen');
            }
        }
        else if($userbutton == 'cancelButton'){
            redirect(base_url().'ub/departemen');
        }	
    }
    
    public function delete_departement($id = null){    
        $this->load->helper('url');     
        $this->load->library('session');
        
        $this->ub_model->delete_departement($id);

        $this->session->set_flashdata('success', 'Success delete!');

        redirect('schedule');
    }
}
    