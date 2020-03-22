<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_alternatif extends CI_Model {

	protected $table = 'DEMAGE_DETAILS';
    protected $kode = 'ID_DEMAGE_DETAILS';

	public function tampil_alternatif()
	{
		$query = $this->db->query('SELECT * FROM DEMAGE_DETAILS ORDER BY ID_DEMAGE_DETAILS ASC');
        return $query;
	}

	public function get_alternatif(){
    	$result = $this->db->query('SELECT * FROM DEMAGE_DETAILS ORDER BY ID_DEMAGE_DETAILS ASC');
    	return $result;
  	}

	public function delete_alternatif($ID)
    {
        $this->db->delete($this->table, array($this->kode=> $ID));
        $this->db->delete('DEMAGE_DETAILS_WEIGHT', array('KODE1'=> $ID));
        $this->db->delete('DEMAGE_DETAILS_WEIGHT', array('KODE2'=> $ID));
    }

	public function tambah_alternatif($data, $rows)
    {
        $this->db->insert('DEMAGE_DETAILS', $data);        
        foreach($rows as $row){
            $this->db->query("INSERT INTO DEMAGE_DETAILS_WEIGHT(KODE1, KODE2, ID_CRITERIA, SCORE) 
                SELECT '$data[ID_DEMAGE_DETAILS]', ID_DEMAGE_DETAILS, '$row->ID_CRITERIA', 1 FROM DEMAGE_DETAILS");    
            $this->db->query("INSERT INTO DEMAGE_DETAILS_WEIGHT(KODE1, KODE2, ID_CRITERIA, SCORE) 
                SELECT ID_DEMAGE_DETAILS, '$data[ID_DEMAGE_DETAILS]', '$row->ID_CRITERIA', 1 FROM DEMAGE_DETAILS WHERE ID_DEMAGE_DETAILS<>'$data[ID_DEMAGE_DETAILS]'");
        }           
    }


	

}

/* End of file model_alternatif.php */
/* Location: ./application/models/admin/model_alternatif.php */