<?php

class Users_Model extends CI_Model{
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
    
    public function get_user_by_username($username){
//        $this->db->select('*');
//        $this->db->from('users');
//        $this->db->join('users_roles', 'users_roles.uid=users.uid');
//        $this->db->join('role', 'role.rid=users_roles.rid');
//        $this->db->where('users.username', $username);
//        $query = $this->db->get();
        $query = $this->db->query(
                'SELECT * FROM users'
                . ' JOIN users_roles ON users.uid=users_roles.uid'
                . ' JOIN role ON users_roles.rid=role.rid'
                . " Where users.username='".$username."'");
        $result = $query->result_array();

        $user = NULL;
        if($result){
            $user->uid = $result[0]['uid'];
            $user->username = $result[0]['username'];
            $user->password = $result[0]['password'];
            $user->roles = array();
            foreach($result as $data){
                $user->roles[$data['rid']] = $data['name'];
             }
        }
        
        return $user;
    }
    
    
}
