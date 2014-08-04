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
                'SELECT u.uid,username,password,email,created,r.rid,name as role_name FROM users u'
                . ' LEFT JOIN users_roles ur ON u.uid=ur.uid'
                . ' LEFT JOIN role r ON ur.rid=r.rid'
                . " Where u.username='".$username."'");
        $result = $query->result_array();

        $user = NULL;
        if($result){
            $user->uid = $result[0]['uid'];
            $user->username = $result[0]['username'];
            $user->email = $result[0]['email'];
            $user->password = $result[0]['password'];
            $user->roles = array();
            foreach($result as $data){
//                if(!empty($data['rid']) && !empty($data['name'])){
                    $user->roles[$data['rid']] = $data['role_name'];
//                }
                
             }
        }
        
        return $user;
    }
    
    public function get_user_by_uid($uid){
//        $this->db->select('*');
//        $this->db->from('users');
//        $this->db->join('users_roles', 'users_roles.uid=users.uid');
//        $this->db->join('role', 'role.rid=users_roles.rid');
//        $this->db->where('users.username', $username);
//        $query = $this->db->get();
        $query = $this->db->query(
                'SELECT u.uid,username,password,email,created,r.rid,name as role_name FROM users u'
                . ' LEFT JOIN users_roles ur ON u.uid=ur.uid'
                . ' LEFT JOIN role r ON ur.rid=r.rid'
                . " Where u.uid=".$uid);
        $result = $query->result_array();

        $user = NULL;
        if($result){
            $user->uid = $result[0]['uid'];
            $user->username = $result[0]['username'];
            $user->email = $result[0]['email'];
            $user->password = $result[0]['password'];
            $user->roles = array();
            foreach($result as $data){
//                if(!empty($data['rid']) && !empty($data['name'])){
                    $user->roles[$data['rid']] = $data['role_name'];
//                }
                
             }
        }
        
        return $user;
    }
    
    public function get_data_personal($uid){
        $query = $this->db->get_where('data_personal',array('uid' => $uid));
        return $query->result_array();
    }
    
    public function get_data_parent($uid){
         $query = $this->db->get_where('data_parent',array('uid' => $uid));
        return $query->result_array();
    }
    
    public function get_data_school($uid){
         $query = $this->db->get_where('data_school',array('uid' => $uid));
        return $query->result_array();
    }
    
    public function get_roles(){
        $query = $this->db->get('role');
        return $query->result_array();
    }
    
    //@step2 : TRUE if created user has 'matriculant' role
    public function create_user($step2 = FALSE){
        $this->load->library('session');
        
        $user_id = (int)$this->session->userdata('uid');   
        $username = $this->input->post('username');
        $roles = $this->input->post('roles');

        
        $data_user = array(
            'username' => $username,
            'password' => md5($this->input->post('password')),
            'email' => $this->input->post('email'),
            'created' => strtotime('now'),
        );
        $this->db->insert('users', $data_user);
        $user = $this->get_user_by_username($username);

        //update users_roles -> user get roles and it should be save in db
        foreach($roles as $rid => $role_name){
            $this->update_users_roles($user->uid, $rid);
        }       
               
        if($step2){        
            $data_sekolah = array(
		'uid' => (int)$user->uid,
		'ds_asal' => $this->input->post('sekolah_asal'),
		'ds_jurusan' => $this->input->post('jurusan'),
                'ds_tahunlulus' => $this->input->post('tahun_lulus'),
                'ds_alamat' => $this->input->post('alamat_sekolah'),
                'ds_kota' => $this->input->post('kota_sekolah'),
                'ds_kodepos' => $this->input->post('kodepos_sekolah'),  
                'changed_by' => $user_id,
                'changed' => strtotime('now'),
            );
            $this->db->insert('data_school', $data_sekolah);
            
            $wali1 = $this->input->post('status_wali1');
            $wali2 = $this->input->post('status_wali2');
            $data_orangtua = array(
                'uid' => (int)$user->uid,
                'do_status' => empty($wali2)? $wali1:$wali1,
                'do_name' => $this->input->post('nama_wali'),
                'do_education' => $this->input->post('pendidikan_wali'),
                'do_job' => $this->input->post('pekerjaan_wali'),
                'do_position' => $this->input->post('jabatan_wali'),
                'do_email' => $this->input->post('email_wali'),
                'do_office_telp' => $this->input->post('telp_kantor_wali'),
                'do_house_telp' => $this->input->post('telp_rumah_wali'),
                'do_hp' => $this->input->post('hp_wali'),
                'do_address' => $this->input->post('alamat_wali'),
                'do_city' => $this->input->post('kota_wali'),
                'do_zipcode' => $this->input->post('kodepos_wali'),
                'do_salary' => $this->input->post('penghasilan_wali'),            
                'changed_by' => $user_id,
                'changed' => strtotime('now'),  
            );
            $this->db->insert('data_parent', $data_orangtua);
            
            //date in mysql shold be 'y-m-d' eg.2014-12-31
            $birthdate = $this->input->post('tahun_lahir').'-'.$this->input->post('bulan_lahir').'-'.$this->input->post('tanggal_lahir');
            $data_pribadi = array(
                'uid' => (int)$user->uid,              
                'dp_name' => $this->input->post('nama'),
                'dp_nick' => $this->input->post('panggilan'),
                'dp_birthplace' => $this->input->post('tempat_lahir'),
                'dp_birthdate' => $birthdate,
                'dp_religion' => $this->input->post('agama'),
                'dp_sex' => $this->input->post('sex'),
                'dp_status' => $this->input->post('status'),
                'dp_blood' => '-',
                'dp_telp' => '-',
                'dp_hp' => $this->input->post('hp'),                      
                'changed_by' => $user_id,
                'changed' => strtotime('now'),  
            );
            $this->db->insert('data_personal', $data_pribadi);
        }
	
        
    }
    
    public function update_users_roles($uid, $rid){
        return $this->db->insert('users_roles', array('rid' => $rid, 'uid' => $uid));
    }   
   
}
