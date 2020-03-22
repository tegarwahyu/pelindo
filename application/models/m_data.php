<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

	function cek_login($table,$where){		
		$query =  $this->db->get_where($table,$where);
		if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
	}	

	// public function cek_login($table,$field1, $field2){	
	//  	$this->db->select('USERS.*');
 //        $this->db->from('USERS');
 //        $this->db->where($field1);
 //        $this->db->where($field2);
 //        //$this->db->limit(1);
 //        $query = $this->db->get();
 //        if ($query->num_rows() == 0) {
 //            return FALSE;
 //        } else {
 //            return $query->result();
 //        }
	// 	//return $this->db->get_where($table,$where);
	// }

}

/* End of file m_data.php */
/* Location: ./application/models/m_data.php */