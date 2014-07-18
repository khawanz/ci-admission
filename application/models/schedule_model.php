<?php

class Schedule_Model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_schedule(){
        $query = $this->db->get('schedule');
        return $query->result_array();
    }
}
