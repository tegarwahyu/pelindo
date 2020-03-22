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

			$data = array(
				'DEMAGE_DETAILS' => $detail_kerusakan,
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
			$id_detail_kerusakan = $this->input->post('id_detail_kerusakan');
			$detail_kerusakan = $this->input->post('detail_kerusakan');
			$update_at = date("d-m-Y");

			$this->Model_detail_kerusakan->update_detail($id_detail_kerusakan,$detail_kerusakan,$update_at);
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
			
			redirect('kerusakan/Detail_Kerusakan/index', 'refresh');
		}
		else
		{
			$data['title'] = 'Halaman Detail Kerusakan';
			$data['subtitle'] = 'Halaman Pengelolahan Detail Kerusakan IT Helpdesk';
			$where = array('ID_DEMAGE_DETAILS' => $ID_DEMAGE_DETAILS);
			$data['data'] = $this->Model_detail_kerusakan->edit_data($where,'DEMAGE_DETAILS')->result();
			$data['content'] = $this->load->view('detail_kerusakan/edit', $data, TRUE); 
			$this->load->view('template/main', $data);

			// $where = array('ID_USERS' => $ID_USERS);
			// $data['user'] = $this->model_admin->edit_data($where,'USERS')->result();
			// $data['content'] = $this->load->view('admin/view_editusers', $data, TRUE); 
			// $this->load->view('template/main', $data);
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