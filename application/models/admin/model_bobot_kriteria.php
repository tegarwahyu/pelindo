<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_bobot_kriteria extends CI_Model {

	public function get_bobot_kriteria(){
    	$result = $this->db->query('SELECT * FROM CRITERIA_WEIGHT ORDER BY ID1, ID2');
    	return $result;
  	}

  	public function get_kriteria(){
    	$result = $this->db->query('SELECT * FROM CRITERIA ORDER BY ID_CRITERIA');
    	return $result;
  	}

    public function ubah_bobot_kriteria($ID1, $ID2, $nilai)
    {           
        $this->db->query("UPDATE CRITERIA_WEIGHT SET SCORE='$nilai' WHERE ID1='$ID1' AND ID2='$ID2'");  
        $this->db->query("UPDATE CRITERIA_WEIGHT SET SCORE=1/$nilai WHERE ID1='$ID2' AND ID2='$ID1'");                      
    }

}

/* End of file model_bobot_kriteria.php */
/* Location: ./application/models/admin/model_bobot_kriteria.php */