<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Jenis_kerusakan extends CI_Model {

	public function get_dataJenisKerusakan(){
    	$result = $this->db->query('SELECT * FROM DEMAGE_DETAILS');
    	return $result;
  	}

}

/* End of file model_Jenis_kerusakan.php */
/* Location: ./application/models/admin/model_Jenis_kerusakan.php */