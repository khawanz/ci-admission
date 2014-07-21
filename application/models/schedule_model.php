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
    
    public function create_schedule(){
        $this->load->helper('url');
        $this->load->library('session');
        
        $user_id = $this->session->userdata('uid');

	$data = array(
		'sc_gelombang' => $this->input->post('gelombang'),
		'sc_date' => $this->input->post('tanggal'),
		'sc_starttime' => $this->input->post('time1'),
                'sc_endtime' => $this->input->post('time2'),
                'sc_place' => $this->input->post('tempat'),
                'sc_address' => $this->input->post('alamat'),
                'sc_city' => $this->input->post('kota'),
                'sc_capacity' => $this->input->post('kapasitas'),
                'sc_doc_deadline' => $this->input->post('dokumen'),
                'sc_pay_deadline' => $this->input->post('konfirmasi'),
                'sc_status' => $this->input->post('status'),
                'added_by' => $user_id,               
                'updated_by' => $user_id,
                'created' => strtotime('now'),
                'changed' => strtotime('now'),
	);

	return $this->db->insert('schedule', $data);
    }
}
