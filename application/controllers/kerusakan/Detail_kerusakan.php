<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_kerusakan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Model_detail_kerusakan');
    }

	public function index()
	{
		$data['title'] = 'Halaman Detail Kerusakan';
		$data['subtitle'] = 'Halaman Pengelolahan Detail Kerusakan IT Helpdesk';
		$data['data'] = $this->Model_detail_kerusakan->get_dataDetailKerusakan();
		$data['content'] = $this->load->view('detail_kerusakan/index', $data ,TRUE); 
		$this->load->view('template/main', $data);
	}
	
	function addDetailKerusakan()
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

			$this->Model_detail_kerusakan->input_data($data,'DEMAGE_DETAILS');
			redirect('kerusakan/Detail_Kerusakan/index', 'refresh');

		}
		else{
			$data['title'] = 'Halaman Add Users';
			$data['subtitle'] = 'input anda error';
			$data['content'] = $this->load->view('detail_kerusakan/index', $data, TRUE); 
			$this->load->view('template/main', $data);
		}
	}

	function editDetailKerusakan($ID_DEMAGE_DETAILS)
	{
		if(isset($_POST['submit']))
		{
			$id = $this->input->post('id_detail');
			$detail_kerusakan = $this->input->post('detail_kerusakan');
			// $password = $this->input->post('password');
			// $name = $this->input->post('name');
			// $position = $this->input->post('position');
			// $role = $this->input->post('role');

			$data = array(
				'ID_DEMAGE_DETAILS' => $id,
				'NAME_DEMAGE_DETAILS' => $detail_kerusakan,
				// 'PASSWORD' => $password,
				// 'NAME' => $name,
				// 'POSITION' => $position,
				// 'ROLE' => $role,
				'UPDATED_AT' => date("d-m-Y")
			);

			$where = array(
				'ID_DEMAGE_DETAILS' => $id
			);

			$this->Model_detail_kerusakan->update_data($data, $where, 'DEMAGE_DETAILS');
			$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data Berhasil di Edit.
                </div>');
			redirect('detail_kerusakan/index','refresh');
		}
		else
		{
			$data['title'] = 'Halaman Detail Kerusakan';
			$data['subtitle'] = 'Halaman Pengelolahan Detail Kerusakan IT Helpdesk';
			$where = array('ID_DEMAGE_DETAILS' => $ID_DEMAGE_DETAILS);
			$data['data'] = $this->Model_detail_kerusakan->update_data($where,'DEMAGE_DETAILS')->result();
			$data['content'] = $this->load->view('admin/edit', $data, TRUE); 
			$this->load->view('template/main', $data);
		}

	}

	function deleteDetailKerusakan($id){
		$where = array('ID_DEMAGE_DETAILS' => $id);
		$this->Model_detail_kerusakan->delete_detail($where,'DEMAGE_DETAILS');
		$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data berhasil dihapus.
                </div>');
		redirect('kerusakan/Detail_Kerusakan/index', 'refresh');
	}

}

/* End of file Detail_kerusakanController.php */
/* Location: ./application/controllers/master/Detail_kerusakanController.php */