<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_data');
    }

	public function index()
	{
		$this->load->view('login/view_login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'USERNAME' => $username,
			'PASSWORD' => md5($password)
			);
		$cek = $this->m_data->cek_login("USERS",$where);
		//$cek = $this->m_data->cek_login("USERS", array('USERNAME' => $username), array('PASSWORD' => $password));
		if($cek > 0)
		{
			foreach($cek as $id)
			{
				// if($id->ROLE=='1')
				// {
				// 	//untuk superadmin
				// 	$data_session = array('nama' => $username, 'divisi' => $id->DIVISION, 'role' => $id->ROLE, 'status' => "login");
				// 	$this->session->set_userdata('akses','1');
				// 	$this->session->set_userdata($data_session);
				// 	$this->session->set_flashdata('message', '<div class="alert alert-success">Selamat datang, Anda berhasil login.</div>');
				// 	redirect(base_url("superadmin"));

				// }
				if ($id->ROLE=='2') 
				{
					//untuk admin
					$data_session = array('nama' => $username, 'divisi' => $id->DIVISION, 'role' => $id->ROLE, 'status' => "login");
					$this->session->set_userdata('akses','2');
					$this->session->set_userdata($data_session);
					$this->session->set_flashdata('message', '<div class="alert alert-success">Selamat datang, Anda berhasil login.</div>');
					redirect(base_url("admin/admin"));
				}

				elseif ($id->ROLE=='3') 
				{
					//untuk user pelapor
					$data_session = array('nama' => $username, 'divisi' => $id->DIVISION, 'role' => $id->ROLE, 'status' => "login");
					$this->session->set_userdata('akses','3');
					$this->session->set_userdata($data_session);
					$this->session->set_flashdata('message', '<div class="alert alert-success">Selamat datang, Anda berhasil login.</div>');
					redirect(base_url("users/users"));
				}

				elseif ($id->ROLE=='4') 
				{
					//untuk PIC
					$data_session = array('nama' => $username, 'divisi' => $id->DIVISION, 'role' => $id->ROLE, 'status' => "login");
					$this->session->set_userdata('akses','4');
					$this->session->set_userdata($data_session);
					$this->session->set_flashdata('message', '<div class="alert alert-success">Selamat datang, Anda berhasil login.</div>');
					redirect(base_url("pic/pic"));
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger">
                    <p>Anda Tidak Terdaftar</p>
                </div>');
				}
			} 
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger">
                    Salah Username atau Password. <br> Silahkan coba kembali
                </div>');
			redirect(base_url("login"));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}