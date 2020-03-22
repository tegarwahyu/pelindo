<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kriteria extends CI_Model {

    protected $table = 'CRITERIA';
    protected $kode = 'ID_CRITERIA';

	public function tampil( $search='')
    {                
        $this->db->like( $this->kode, $search );
        $this->db->or_like( 'nama_kriteria', $search );
        $this->db->order_by( $this->kode );
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function tampil_kriteria()
    {
        $query = $this->db->query('SELECT * FROM CRITERIA ORDER BY ID_CRITERIA ASC');
        return $query;
    }

	public function get_kriteria(){
    	$result = $this->db->query('SELECT * FROM CRITERIA ORDER BY ID_CRITERIA ASC');
    	return $result;
  	}


    public function tambah_kriteria($data, $rows)
    {
        $this->db->insert('CRITERIA', $data);        
        $this->db->query("INSERT INTO CRITERIA_WEIGHT(ID1, ID2, SCORE) 
            SELECT '$data[ID_CRITERIA]', ID_CRITERIA, 1 FROM CRITERIA");
        $this->db->query("INSERT INTO CRITERIA_WEIGHT(ID1, ID2, SCORE)
            SELECT ID_CRITERIA, '$data[ID_CRITERIA]', 1 FROM CRITERIA WHERE ID_CRITERIA<>'$data[ID_CRITERIA]'");
                
              
        foreach($rows as $row){
            $this->db->query("INSERT INTO DEMAGE_DETAILS_WEIGHT(KODE1, KODE2, ID_CRITERIA, SCORE) 
                SELECT '$row->ID_DEMAGE_DETAILS', ID_DEMAGE_DETAILS, '$data[ID_CRITERIA]', 1 FROM DEMAGE_DETAILS"); 
        }
    }

    public function delete_kriteria($ID){
        //$this->db->where($where);
        //$this->db->delete($table);

        $this->db->delete($this->table, array($this->kode=> $ID));
        $this->db->delete('DEMAGE_DETAILS_WEIGHT', array($this->kode=> $ID));
        $this->db->delete('CRITERIA_WEIGHT', array('ID1'=> $ID));
        $this->db->delete('CRITERIA_WEIGHT', array('ID2'=> $ID));
    }

	

}

/* End of file model_kriteria.php */
/* Location: ./application/models/admin/model_kriteria.php */