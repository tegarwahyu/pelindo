<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_admin');

        if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='2')
        {
        	$this->session->set_flashdata('message', '<div class="alert alert-danger">
                    Anda diharuskan untuk login terlebih dahulu
                </div>');
			redirect(base_url("login"));
		}
    }

	public function index()
	{
		$data['title'] = 'Halaman Dasboard';
		$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk secara singkat';
		$data['users'] = $this->model_admin->get_listUsers();
		$data['content'] = $this->load->view('admin/view_admin', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function priority()
	{
		$data['title'] = 'Halaman Dasboard Prioritas';
		$data['subtitle'] = 'Halaman untuk mengelola Prioritas kerusakan';
		$data['priority'] = $this->model_admin->get_listPriority();
		$data['content'] = $this->load->view('admin/view_priority', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function listUsers()
	{
		$data['title'] = 'Halaman Tabel Users';
		$data['subtitle'] = 'Halaman untuk menambahkan users IT Helpdesk secara singkat';
		$data['users'] = $this->model_admin->get_listUsers();
		$data['content'] = $this->load->view('admin/view_users', $data, TRUE); 
		$this->load->view('template/main', $data); 
	}

	public function addUsers()
	{
		if(isset($_POST['submit'])){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$name = $this->input->post('name');
			$created_at = date("d-m-Y");
			$position = $this->input->post('position');
			$role = $this->input->post('role');
			$division = $this->input->post('division');
			$expertise = $this->input->post('expertise');

			$data = array(
				'USERNAME' => $username,
				'PASSWORD' => md5($password),
				'NAME' => $name,
				'POSITION' => $position,
				'CREATED_AT' => $created_at,
				'ROLE' => $role,
				'DIVISION' => $division,
				'EXPERTISE' => $expertise
				
			);

			$this->model_admin->input_data($data,'USERS');
			$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data Berhasil Ditambahkan.
                </div>');
			redirect('admin/admin');

		}
		else{
			$data['title'] = 'Halaman Add Users';
			$data['subtitle'] = 'Halaman untuk menambahkan users IT Helpdesk secara singkat';
			$data['content'] = $this->load->view('admin/view_addusers', $data, TRUE); 
			$this->load->view('template/main', $data);
		}
	}

	public function editUsers($ID_USERS)
	{
		if(isset($_POST['submit']))
		{
			$id = $this->input->post('id_users');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$name = $this->input->post('name');
			$position = $this->input->post('position');
			$updated_at = date("d-m-Y");
			$role = $this->input->post('role');
			$division = $this->input->post('division');
			$expertise = $this->input->post('expertise');

			$data = array(
				'USERNAME' => $username,
				'PASSWORD' => $password,
				'NAME' => $name,
				'POSITION' => $position,
				'UPDATED_AT' => $updated_at,
				'ROLE' => $role, 
				'DIVISION' => $division, 
				'EXPERTISE' => $expertise
			);

			$where = array(
				'ID_USERS' => $id

			);

			$this->model_admin->update_data($data, $where, 'USERS');
			$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data Berhasil di Edit.
                </div>');
			redirect('admin/admin');
		}
		else
		{
			$data['title'] = 'Halaman Edit Users';
			$data['subtitle'] = 'Halaman untuk mengedit users IT Helpdesk secara singkat';
			$where = array('ID_USERS' => $ID_USERS);
			$data['user'] = $this->model_admin->edit_data($where,'USERS')->result();
			$data['content'] = $this->load->view('admin/view_editusers', $data, TRUE); 
			$this->load->view('template/main', $data);
		}

	}

	public function deleteUsers($id){
		$where = array('ID_USERS' => $id);
		$this->model_admin->delete_data($where,'USERS');
		$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data berhasil dihapus.
                </div>');
		redirect('admin/admin');
	}

	public function addPriority()
	{
		if(isset($_POST['submit'])){
			$name_priority = $this->input->post('name_priority');
			$created_at = date("d-m-Y");
			$updated_at = date("d-m-Y");

			$data = array(
				'NAME_PRIORITY' => $name_priority,
				'CREATED_AT' => $created_at,
				'UPDATED_AT' => $update_data
				
			);

			$this->model_admin->input_priority($data,'PRIORITY');
			$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data Prioritas Berhasil Ditambahkan.
                </div>');
			redirect('admin/admin/priority');

		}
		else{
			$data['title'] = 'Halaman Add Priority';
			$data['subtitle'] = 'Halaman untuk menambahkan Prioritas secara singkat';
			$data['content'] = $this->load->view('admin/view_addpriority', $data, TRUE); 
			$this->load->view('template/main', $data);
		}
	}

	public function editPriority($ID_PRIORITY)
	{
		if(isset($_POST['submit']))
		{
			$name_priority = $this->input->post('name_priority');
			$updated_at = date("d-m-Y");

			$data = array(
				'NAME_PRIORITY' => $name_priority,
				'UPDATED_AT' => $updated_at
			);

			$where = array(
				'ID_PRIORITY' => $ID_PRIORITY

			);

			$this->model_admin->update_priority($data, $where, 'PRIORITY')->result();
			$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data Berhasil di Edit.
                </div>');
			redirect('admin/admin/priority');
		}
		else
		{
			$data['title'] = 'Halaman Edit Priority';
			$data['subtitle'] = 'Halaman untuk mengedit Prioritas Kerusakan';

			$where = array('ID_PRIORITY' => $ID_PRIORITY);
			$data['priority'] = $this->model_admin->edit_priority($where,'PRIORITY')->result();
			$data['content'] = $this->load->view('admin/view_editpriority', $data, TRUE); 
			$this->load->view('template/main', $data);
		}
	}	

	public function deletePriority($id)
	{
		$where = array('ID_PRIORITY' => $id);
		$this->model_admin->delete_priority($where,'PRIORITY');
		$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data berhasil dihapus.
                </div>');
		redirect('admin/admin/priority');
	}

}