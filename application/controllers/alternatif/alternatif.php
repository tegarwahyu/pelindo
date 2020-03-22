<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {

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
		$data['title'] = 'Halaman Pengelolaan Alternatif AHP';
		$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk dengan AHP';
		$data['alternatif'] = $this->model_alternatif->get_alternatif()->result();
		$data['content'] = $this->load->view('alternatif/view_alternatif', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function tambah_alternatif() 
    {      
    	if(isset($_POST['submit'])){

        	$this->form_validation->set_rules( 'kode', 'Kode', 'required|is_unique[tb_kriteria.kode_kriteria]' );
        	$this->form_validation->set_rules( 'nama', 'Nama', 'required' );

        	$id_demage_details = $this->input->post('id_demage_details');
			$demage_details = $this->input->post('demage_details');

			$data = array(
				'ID_DEMAGE_DETAILS' => $id_demage_details,
				'DEMAGE_DETAILS' => $demage_details,
				'CREATED_AT' => date("d-m-Y")
			);


	            
	        $rows = $this->model_kriteria->tampil_kriteria()->result();
	        $this->model_alternatif->tambah_alternatif($data, $rows);
	        redirect('alternatif/alternatif/');
	    }
	    else 
	    {
	     	$data['title'] = 'Halaman Menambah Alternatif AHP';
			$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk dengan AHP';
			$data['content'] = $this->load->view('alternatif/view_add_alternatif', $data, TRUE); 
			$this->load->view('template/main', $data);
	    }                     
    }

	public function delete_alternatif($ID)
	{
		$this->model_alternatif->delete_alternatif($ID);
		$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data berhasil dihapus.
                </div>');
		redirect('alternatif/alternatif');
	}

}

/* End of file alternatif.php */
/* Location: ./application/controllers/alternatif/alternatif.php */