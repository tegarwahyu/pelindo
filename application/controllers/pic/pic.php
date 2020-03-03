<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_admin');

        if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='4')
        {
        	$this->session->set_flashdata('message', '<div class="alert alert-danger">
                    Anda diharuskan untuk login terlebih dahulu
                </div>');
			redirect(base_url("login"));
		}
    }

	public function index()
	{
		$data['title'] = 'Halaman Dasboard PIC';
		$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk secara singkat';
		$data['users'] = $this->model_admin->get_listUsers();
		$data['content'] = $this->load->view('pic/index', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

}

/* End of file pic.php */
/* Location: ./application/controllers/pic.php */