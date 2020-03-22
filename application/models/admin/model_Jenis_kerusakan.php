<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jenis_kerusakan extends CI_Model {

	private $tabel3 = 'TYPE_DEMAGE';
	private $tabel1 = 'USERS';
	private $tabel2 = 'DEMAGE_DETAILS';

	public function get_dataJenisKerusakan(){
    	// $result = $this->db->query('SELECT * FROM TYPE_DEMAGE');
    	$result = $this->db->select('TYPE_DEMAGE.*,USERS.ID_USERS,USERS.NAME')
    					   ->join('USERS','TYPE_DEMAGE.ID_USERS = USERS.ID_USERS')
    					   // ->join('DEMAGE_DETAILS','TYPE_DEMAGE.ID_DEMAGE_DETAILS = DEMAGE_DETAILS.ID_DEMAGE_DETAILS')
    					   ->get('TYPE_DEMAGE');
    	return $result->result();
  	}

  	public function input_data($data,$table){
		return $this->db->insert($table,$data);
	}

	public function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function edit_data($where,$table){		
		return $this->db->get_where($table,$where);	
	}

	public function update_jenis($id_jenis,$jenis_kerusakan,$detail_kerusakan,$penanggungjawab,$tingkat_kesulitan,$update_at)
	{
		$hasil=$this->db->query("UPDATE TYPE_DEMAGE SET TYPE_DEMAGE='$jenis_kerusakan',ID_DEMAGE_DETAILS='$detail_kerusakan',ID_USERS='$penanggungjawab',ID_PRIORITY='$tingkat_kesulitan',UPDATED_AT='$update_at' WHERE ID_DEMAGE_DETAILS='$id_jenis'");
        return $hasil;
	}


}

/* End of file model_Jenis_kerusakan.php */
/* Location: ./application/models/admin/model_Jenis_kerusakan.php */