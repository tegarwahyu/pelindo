<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_bobot_alternatif extends CI_Model {

	public function get_bobot_alternatif($id_criteria){
        $query = $this->db->query("SELECT * FROM DEMAGE_DETAILS_WEIGHT WHERE ID_CRITERIA='$id_criteria' ORDER BY KODE1, KODE2");
            
        return $query->result();
    }
                            
    public function ubah_bobot_alternatif($id_criteria, $kode1, $kode2, $score)
    {           
        $this->db->query("UPDATE DEMAGE_DETAILS_WEIGHT SET SCORE='$score' WHERE KODE1='$kode1' AND KODE2='$kode2' AND ID_CRITERIA='$id_criteria'");                        
        $this->db->query("UPDATE DEMAGE_DETAILS_WEIGHT SET SCORE=1/ $score WHERE KODE1='$kode2' AND KODE2='$kode1' AND ID_CRITERIA='$id_criteria'");                      
    }

	

}

/* End of file model_bobot_alternatif.php */
/* Location: ./application/models/admin/model_bobot_alternatif.php */