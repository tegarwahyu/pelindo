<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_skala');
        $this->load->model('admin/model_kriteria');
        $this->load->model('admin/model_alternatif');

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
		$data['title'] = 'Halaman Pengelolaan AHP';
		$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk dengan AHP';
		$data['skala'] = $this->model_skala->get_skala()->result();
		$data['kriteria'] = $this->model_kriteria->get_kriteria()->result();
		$data['alternatif'] = $this->model_alternatif->get_alternatif()->result();
		$data['content'] = $this->load->view('kriteria/view_ahp', $data, TRUE); 
		$this->load->view('template/main', $data);
	}


	public function data_kriteria()
	{
		$data['title'] = 'Halaman Pengelolaan Kriteria AHP';
		$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk dengan AHP';
		$data['kriteria'] = $this->model_kriteria->get_kriteria()->result();
		$data['content'] = $this->load->view('kriteria/view_kriteria', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function tambah_kriteria()
	{
		if(isset($_POST['submit'])){

			
	        $this->form_validation->set_rules( 'kode', 'Kode', 'required|is_unique[tb_kriteria.kode_kriteria]' );
        	$this->form_validation->set_rules( 'nama', 'Nama', 'required' );

        	$id_criteria = $this->input->post('id_criteria');
			$name_criteria = $this->input->post('name_criteria');

			$data = array(
				'ID_CRITERIA' => $id_criteria,
				'NAME_CRITERIA' => $name_criteria
			);

			$rows = $this->model_alternatif->tampil_alternatif()->result(); 
            $this->model_kriteria->tambah_kriteria($data, $rows);

			//$this->model_admin->input_criteria($data,'CRITERIA');
			$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data Prioritas Berhasil Ditambahkan.
                </div>');
			redirect('kriteria/kriteria/data_kriteria');

		}
		else{
			$data['title'] = 'Halaman Menambah Kriteria AHP';
			$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk dengan AHP';
			$data['content'] = $this->load->view('kriteria/view_add_kriteria', $data, TRUE); 
			$this->load->view('template/main', $data);
		}
	}

	public function delete_kriteria($ID)
	{
		$this->model_kriteria->delete_kriteria($ID);
		$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data berhasil dihapus.
                </div>');
		redirect('kriteria/kriteria/data_kriteria');
	}



}

/* End of file kriteria.php */
/* Location: ./application/controllers/kriteria/kriteria.php */