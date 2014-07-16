<?php

class Users extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_users(){
        $query = $this->db->get('users');
        return $query->result_array();
    }
    
    public function get_user_by_roleid($rid){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('role', 'role.uid=users.uid');
        $this->db->where("role.rid=$rid");
        
        $query = $this->db->get();
        return $query->row();
    }
}
