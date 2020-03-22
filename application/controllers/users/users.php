<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {


	function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_user');
        // $this->load->model('admin/model_ticket');

        if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='2' && $this->session->userdata('akses')!='3')
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
		if ($this->session->userdata("position") == 'Kepala' || $this->session->userdata("position") == 'Admin') {
			//$where = $this->session->userdata("position");
			$data['ticket'] = $this->model_user->get_joindata();
			//print_r($this->model_user->get_listticket()->result());
			//die();

			$data['content'] = $this->load->view('users/index_ketua', $data, TRUE);
		}else{
			$where = $this->session->userdata("id_users");
			$data['ticket1'] = $this->model_user->getTicketUser($where);
			$data['content'] = $this->load->view('users/index', $data, TRUE); 
		}
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
				'DEMAGE_DETAILS' => $detail_kerusakan,
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

	public function addFeedback($ID_TICKET)
	{
		if(isset($_POST['submit']))
		{
			$id_ticket = $this->input->post('id_ticket');
			$status = '4';
			$score = $this->input->post('score');
			$comment = $this->input->post('comment');

			// $data = array(
			// 	'ID_TICKET' => $id_ticket,
			// 	'SCORE' => $score,
			// 	'COMENT' => $comment 
			// );

			$this->model_user->update_feedback($id_ticket, $status, $score, $comment);
			redirect('users/users/index', 'refresh');
		}
		else
		{
			$data['title'] = 'Halaman Menambahkan Feedback';
			$data['subtitle'] = 'Menambahkan Feedback dari Ticket yang Sudah dikerjakan';
			$where = array('ID_TICKET' => $ID_TICKET);
			$data['ticket'] = $this->model_user->edit_data($where,'TICKET')->result();
			$data['content'] = $this->load->view('users/feedback', $data, TRUE); 
			$this->load->view('template/main', $data);
		}
	}

}

/* End of file users.php */
/* Location: ./application/controllers/master/users.php */