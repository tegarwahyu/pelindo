<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_skala extends CI_Model {

	public function get_skala(){
    	$result = $this->db->query('SELECT * FROM SCALE ORDER BY ID_SCALE ASC');
    	return $result;
  	}
	

}

/* End of file model_skala.php */
/* Location: ./application/models/admin/model_skala.php */