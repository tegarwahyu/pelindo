<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model {

	public function get_listUsers(){
    	$result = $this->db->query('SELECT * FROM USERS ORDER BY ID_USERS DESC');
    	return $result;
  	}

  	public function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_data($where,$table){		
		return $this->db->get_where($table,$where);	
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}

/* End of file model_admin.php */
/* Location: ./application/models/admin/model_admin.php */