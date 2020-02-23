<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Model_Pic_admin extends CI_Model
{
	public function get_dataPIC(){
    	$result = $this->db->query('SELECT * FROM PIC');
    	return $result;
  	}
	
}