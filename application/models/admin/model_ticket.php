<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ticket extends CI_Model 
{
	private $tb1 = 'DEMAGE_DETAILS';
	private $tb2 = 'TYPE_DEMAGE';
	private $tb3 = 'USERS';
	private $tb4 = 'TICKET_DETAILS';

	public function get_userticket(){
    	$result = $this->db->query("SELECT * FROM TICKET_DETAILS JOIN USERS ON TICKET_DETAILS.ID_USERS = USERS.ID_USERS");
    	return $result;
  	}

  	public function get_demagecategory()
  	{
  		$result = $this->db->query("SELECT type_demage.id_type_demages, type_demage.type_demage, demage_details.demage_details FROM type_demage JOIN demage_details ON type_demage.id_demage_details = demage_details.id_demage_details");
    	return $result;
  	}
  	
  	public function get_demagecategory2()
  	{
  		$result = $this->db->select('TYPE_DEMAGE.*,DEMAGE_DETAILS.*')
    					   ->join('DEMAGE_DETAILS','TYPE_DEMAGE.ID_DEMAGE_DETAILS = DEMAGE_DETAILS.ID_DEMAGE_DETAILS')
    					   ->get('TYPE_DEMAGE');
    	return $result->result();

  	}

  	public function input_ticket($data,$table){
		$this->db->insert($table,$data);
	}

	public function input_detailticket($data,$table){
		$this->db->insert($table,$data);
	}

	public function get_listticket(){
    	$result = $this->db->query('SELECT * FROM TICKET ORDER BY ID_TICKET DESC');
    	return $result;
  	}

  	public function get_listticket1(){
    	$result = $this->db->query('SELECT TICKET.ID_TICKET, TICKET.ID_TICKET_DETAILS, TICKET.STATUS, TICKET.TOKEN, TICKET.UPDATED_AT, TICKET.CREATED_AT FROM TICKET ORDER BY ID_TICKET DESC');
    	return $result;
  	}

  	public function get_latsiddetailticket(){
    	$result = $this->db->query('SELECT MAX(ID_TICKET_DETAILS) as id_ticket_details FROM TICKET_DETAILS');
    	return $result->row()->ID_TICKET_DETAILS;
  	}

  	public function view_detailticket($where)
  	{
  		$result = $this->db->query("SELECT * FROM TICKET JOIN TICKET_DETAILS ON TICKET.ID_TICKET_DETAILS=TICKET_DETAILS.ID_TICKET_DETAILS WHERE TICKET_DETAILS.ID_TICKET_DETAILS = '$where'");
    	return $result;
  	}

}

/* End of file model_ticket.php */
/* Location: ./application/models/admin/model_ticket.php */