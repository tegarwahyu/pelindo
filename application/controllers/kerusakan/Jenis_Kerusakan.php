<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_Kerusakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Model_detail_kerusakan');
		$this->load->model('admin/Model_jenis_kerusakan'); 
		$this->load->model('admin/Model_admin'); 
	}

	public function index()
	{
		$data['title'] = 'Halaman Jenis Kerusakan';
		$data['subtitle'] = 'Halaman Pengelolahan Jenis Kerusakan IT Helpdesk';
		$data['data3'] = $this->Model_admin->getdataUser();
		$data['data2'] = $this->Model_detail_kerusakan->getdataDetailKerusakan();
		$data['data'] = $this->Model_jenis_kerusakan->get_dataJenisKerusakan();
		$data['content'] = $this->load->view('Jenis_Kerusakan/index', $data ,TRUE); 
		$this->load->view('template/main', $data);
	}

	public function addJenisKerusakan()
	{
		if(isset($_POST['submit'])){
			$jenis_kerusakan = $this->input->post('jenis_kerusakan');
			$detail_kerusakan = $this->input->post('detail_kerusakan');
			$penanggungjawab = $this->input->post('penanggungjawab');
			$tingkat_kesulitan = $this->input->post('tingkat_kesulitan');
			$created_at = date("d-m-Y");
			$update_at = date("d-m-Y");

			$data = array(
				'TYPE_DEMAGE' => $jenis_kerusakan,
				'ID_DEMAGE_DETAILS' => $detail_kerusakan,
				'ID_USERS' => $penanggungjawab,
				'ID_PRIORITY' => $tingkat_kesulitan,
				'CREATED_AT' => $created_at,
				'UPDATED_AT' => $update_at

			);

			$this->Model_jenis_kerusakan->input_data($data,'TYPE_DEMAGE');
			$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data Berhasil Ditambahkan.
                </div>');
			redirect('kerusakan/jenis_kerusakan/index', 'refresh');

		}
		else{
			$data['title'] = 'Halaman Jenis Kerusakan';
			$data['subtitle'] = 'Halaman Pengelolahan Jenis Kerusakan IT Helpdesk';
			// $data['users'] = $this->Model_detail_kerusakan->get_dataDetailKerusakan();
			$data['content'] = $this->load->view('Jenis_Kerusakan/index', $data ,TRUE); 
			$this->load->view('template/main', $data);
		}
	}

	public function editJenisKerusakan($ID_TYPE_DEMAGES)
	{
		if(isset($_POST['submit'])){
			$id_jenis = $this->input->post('id_jenis');
			$jenis_kerusakan = $this->input->post('jenis_kerusakan');
			$detail_kerusakan = $this->input->post('detail_kerusakan');
			$penanggungjawab = $this->input->post('penanggungjawab');
			$tingkat_kesulitan = $this->input->post('tingkat_kesulitan');
			$update_at = date("d-m-Y");

			$this->Model_jenis_kerusakan->update_jenis($id_jenis,$jenis_kerusakan,$detail_kerusakan,$penanggungjawab,$tingkat_kesulitan,$update_at);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data Berhasil di Edit.
                </div>');
			}
			else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger">
                    Data Gagal di Edit.
                </div>');
			}
			
			redirect('kerusakan/jenis_kerusakan/index', 'refresh');
		}
		else
		{
			$data['title'] = 'Halaman Detail Kerusakan';
			$data['subtitle'] = 'Halaman Pengelolahan Detail Kerusakan IT Helpdesk';
			$where = array('ID_TYPE_DEMAGES' => $ID_TYPE_DEMAGES);
			$data['data'] = $this->Model_jenis_kerusakan->edit_data($where,'TYPE_DEMAGE')->result();
			$data['content'] = $this->load->view('Jenis_Kerusakan/edit', $data, TRUE); 
			$this->load->view('template/main', $data);
		}
	}

	public function deleteJenisKerusakan($id)
	{
		$where = array('ID_TYPE_DEMAGES' => $id);
		$this->Model_jenis_kerusakan->delete_data($where,'TYPE_DEMAGE');
		$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data berhasil dihapus.
                </div>');
		redirect('kerusakan/jenis_kerusakan/index', 'refresh');
	}

}

/* End of file Jenis_KerusakanController.php */
/* Location: ./application/controllers/master/Jenis_KerusakanController.php */