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
// $this->db->where('tb_peminjaman.id_peminjaman', $id)
// 						  ->select('tb_peminjaman.*, ruang.ruang, gedung.gedung, mahasiswa.nama, kelas.nama_kelas, ruang.status')
// 						  ->join('mahasiswa', 'tb_peminjaman.nim=mahasiswa.nim')
// 						  ->join('kelas', 'mahasiswa.id_kelas=kelas.id_kelas')
// 						  ->join('ruang', 'tb_peminjaman.id_ruang=ruang.id_ruang')
// 						  ->join('gedung', 'ruang.id_gedung=gedung.id_gedung')
// 						  ->get('tb_peminjaman');


}

/* End of file model_Jenis_kerusakan.php */
/* Location: ./application/models/admin/model_Jenis_kerusakan.php */