<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_kerusakanController extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Model_detail_kerusakan');
    }

	public function indexDetailKerusakan()
	{
		$data['title'] = 'Halaman PIC';
		$data['subtitle'] = 'Halaman Pengelolahan Detail Kerusakan IT Helpdesk';
		$data['users'] = $this->Model_detail_kerusakan->get_dataDetailKerusakan();
		$data['content'] = $this->load->view('admin/detail_kerusakan/index', $data ,TRUE); 
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
				'DEMAGE_DETAILS' => $detail_kerusakan,
				// 'PASSWORD' => $password,
				// 'NAME' => $name,
				// 'POSITION' => $position,
				// 'ROLE' => $role,
				'CREATED_AT' => date("d-m-Y"),
				'UPDATED_AT' => date("d-m-Y")
			);

			$this->Model_detail_kerusakan->input_data($data,'DEMAGE_DETAILS');
			redirect('admin', 'refresh');

		}
		else{
			$data['title'] = 'Halaman Add Users';
			$data['subtitle'] = 'input anda error';
			$data['content'] = $this->load->view('admin/view_addusers', $data, TRUE); 
			$this->load->view('template/main', $data);
		}
	}

	function editDetailKerusakan($ID_DEMAGE_DETAILS)
	{
		if(isset($_POST['submit']))
		{
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

			$where = array(
				'ID_DEMAGE_DETAILS' => $this->input->post('ID_DEMAGE_DETAILS')

			);

			$this->Model_detail_kerusakan->update_data($data, $where, 'DEMAGE_DETAILS')->result();
			redirect('Detail_kerusakanController/index', 'refresh');
		}
		
		else
		{
			$data['title'] = 'Halaman PIC';
			$data['subtitle'] = 'Halaman Pengelolahan Detail Kerusakan IT Helpdesk';
			// $data['user'] = $this->model_admin->edit_data($where,'USERS')->result();
			$where = array('ID_DEMAGE_DETAILS' => $ID_DEMAGE_DETAILS);
			$data['users'] = $this->Model_detail_kerusakan->update_data($where,'DEMAGE_DETAILS')->result();
			$data['content'] = $this->load->view('admin/detail_kerusakan/index', $data ,TRUE); 
			$this->load->view('template/main', $data);
		}

	}

	function deleteDetailKerusakan($id){
		$where = array('ID_DEMAGE_DETAILS' => $id);
		$this->Model_detail_kerusakan->delete_data($where,'DEMAGE_DETAILS');
		redirect('Detail_kerusakanController/index', 'refresh');
	}

}

/* End of file Detail_kerusakanController.php */
/* Location: ./application/controllers/master/Detail_kerusakanController.php */