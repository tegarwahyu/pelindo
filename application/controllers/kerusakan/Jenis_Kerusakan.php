<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_Kerusakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('admin/Model_detail_kerusakan');
	}

	public function index()
	{
		$data['title'] = 'Halaman Jenis Kerusakan';
		$data['subtitle'] = 'Halaman Pengelolahan Jenis Kerusakan IT Helpdesk';
		// $data['users'] = $this->Model_detail_kerusakan->get_dataDetailKerusakan();
		$data['content'] = $this->load->view('Jenis_Kerusakan/index', $data ,TRUE); 
		$this->load->view('template/main', $data);
	}

}

/* End of file Jenis_KerusakanController.php */
/* Location: ./application/controllers/master/Jenis_KerusakanController.php */