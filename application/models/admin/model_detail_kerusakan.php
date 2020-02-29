<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_detail_kerusakan extends CI_Model {

	public function get_dataDetailKerusakan(){
    	$result = $this->db->query('SELECT * FROM DEMAGE_DETAILS');
    	return $result;
  	}

  	public function input_data($data,$table){
		return $this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete_detail($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getdataDetailKerusakan(){
    	$result = $this->db->query('SELECT * FROM DEMAGE_DETAILS');
    	return $result->result();
  	}
}