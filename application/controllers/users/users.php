<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_user');

        if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='3')
        {
        	$this->session->set_flashdata('message', '<div class="alert alert-danger">
                    Anda diharuskan untuk login terlebih dahulu
                </div>');
			redirect(base_url("login"));
		}
    }

    public function index()
	{
		$data['title'] = 'Halaman Dasboard Users';
		$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk secara singkat';
		// $data['users'] = $this->model_user->get_listUsers();
		$data['content'] = $this->load->view('users/index', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function addPelaporbyUser()
	{
		if(isset($_POST['submit'])){
			$detail_kerusakan = $this->input->post('detail_kerusakan');
			// $password = $this->input->post('password');
			// $name = $this->input->post('name');
			// $position = $this->input->post('position');
			// $role = $this->input->post('role');

			$data = array(
				'NAME_DEMAGE_DETAILS' => $detail_kerusakan,
				// 'PASSWORD' => $password,
				// 'NAME' => $name,
				// 'POSITION' => $position,
				// 'ROLE' => $role,
				'CREATED_AT' => date("d-m-Y"),
				'UPDATED_AT' => date("d-m-Y")
			);

			// $this->model_user->input_data($data,'DEMAGE_DETAILS');
			redirect('kerusakan/Detail_Kerusakan/index', 'refresh');

		}
		else{
			$data['title'] = 'Halaman Pelaporan';
			$data['subtitle'] = 'silahkan masukkan keluhan atau pun kebutuhan anda pada form berikut;';
			$data['content'] = $this->load->view('users/form', $data, TRUE); 
			$this->load->view('template/main', $data);
		}
	}

}

/* End of file users.php */
/* Location: ./application/controllers/master/users.php */