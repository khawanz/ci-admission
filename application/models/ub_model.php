<?php

class Ub_Model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_faculties(){
        $query = $this->db->get('faculty');
        return $query->result_array();
    }
    
     public function get_departements(){
        $query = $this->db->get('departement');
        return $query->result_array();
    }
    
    public function get_departement_by_id($id){
        $query = $this->db->get_where('departement', array('dep_id' => $id));
        return $query->result_array();
    }
    public function create_departement(){           

	$data = array(
		'dep_code' => $this->input->post('kode_dep'),
		'dep_name' => $this->input->post('nama_dep'),
		'f_id' => NULL,                              
	);

	return $this->db->insert('departement', $data);
    }
    public function update_departement(){           

        $dep_id = $this->input->post('id');
	$data = array(  
            'dep_code' => $this->input->post('kode_dep'),
            'dep_name' => $this->input->post('nama_dep'),
            'f_id' => NULL,                              
	);

	$this->db->where('dep_id', $dep_id);
        $this->db->update('departement', $data);
    }
}