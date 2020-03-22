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

	public function edit_data($where,$table){		
		return $this->db->get_where($table,$where);	
	}

	public function update_detail($id_detail_kerusakan, $detail_kerusakan, $update_at)
	{
		$hasil=$this->db->query("UPDATE DEMAGE_DETAILS SET DEMAGE_DETAILS='$detail_kerusakan',UPDATED_AT='$update_at' WHERE ID_DEMAGE_DETAILS='$id_detail_kerusakan'");
        return $hasil;
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