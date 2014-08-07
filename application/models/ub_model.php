<?php

class Ub_Model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_faculty(){
        $query = $this->db->get('faculty');
        return $query->result_array();
    }
    
     public function get_departement(){
        $query = $this->db->get('departement');
        return $query->result_array();
    }
}