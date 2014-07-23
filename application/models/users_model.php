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
    
    public function get_roles(){
        $query = $this->db->get('role');
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
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('users_roles', 'users_roles.uid=users.uid');
        $this->db->join('role', 'role.rid=users_roles.rid');
        $this->db->where('users.username', $username);
        $query = $this->db->get();
//        $query = $this->db->query(
//                'SELECT * FROM users'
//                . ' JOIN users_roles ON users.uid=users_roles.uid'
//                . ' JOIN role ON users_roles.rid=role.rid'
//                . " Where users.username='".$username."'");
        $result = $query->result_array();

        $user = NULL;
        if($result){
            $user->uid = $result[0]['uid'];
            $user->username = $result[0]['username'];
            $user->email = $result[0]['email'];
            $user->password = $result[0]['password'];
            $user->roles = array();
            foreach($result as $data){
                $user->roles[$data['rid']] = $data['name'];
             }
        }
        
        return $user;
    }
    
    public function create_user(){
        $this->load->library('session');
        
        //$user_id = $this->session->userdata('uid');   
        $username = $this->input->post('username');

        $data_user = array(
		'username' => $username,
		'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
		'created' => strtotime('now'),
        );
        $this->db->insert('users', $data_user);
              
        
//        
//	$data_sekolah = array(
//		'sc_gelombang' => $this->input->post('gelombang'),
//		'sc_date' => $tanggal,
//		'sc_starttime' => $this->input->post('time1'),
//                'sc_endtime' => $this->input->post('time2'),
//                'sc_place' => $this->input->post('tempat'),
//                'sc_address' => $this->input->post('alamat'),
//                'sc_city' => $this->input->post('kota'),
//                'sc_capacity' => $this->input->post('kapasitas'),
//                'sc_doc_deadline' => $this->input->post('dokumen'),
//                'sc_pay_deadline' => $this->input->post('konfirmasi'),
//                'sc_status' => $this->input->post('status'),
//                'added_by' => $user_id,               
//                'updated_by' => $user_id,
//                'created' => strtotime('now'),
//                'changed' => strtotime('now'),
//	);
//	$this->db->insert('users', $data_sekolah);
//        
//        $data_orangtua = array(
//		'sc_gelombang' => $this->input->post('gelombang'),
//		'sc_date' => $tanggal,
//		'sc_starttime' => $this->input->post('time1'),
//                'sc_endtime' => $this->input->post('time2'),
//                'sc_place' => $this->input->post('tempat'),
//                'sc_address' => $this->input->post('alamat'),
//                'sc_city' => $this->input->post('kota'),
//                'sc_capacity' => $this->input->post('kapasitas'),
//                'sc_doc_deadline' => $this->input->post('dokumen'),
//                'sc_pay_deadline' => $this->input->post('konfirmasi'),
//                'sc_status' => $this->input->post('status'),
//                'added_by' => $user_id,               
//                'updated_by' => $user_id,
//                'created' => strtotime('now'),
//                'changed' => strtotime('now'),
//	);
//	$this->db->insert('users', $data_orangtua);
    }
    
    public function update_users_roles($uid, $rid){
        return $this->db->insert('users_roles', array('rid' => $rid, 'uid' => $uid));
    }
}
