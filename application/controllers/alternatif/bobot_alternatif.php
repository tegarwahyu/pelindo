<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bobot_alternatif extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_alternatif');
        $this->load->model('admin/model_bobot_alternatif');
        $this->load->helper('my');

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
		$this->load->helper('form');
		$this->form_validation->set_rules( 'kode1', 'Alternatif 1', 'required|callback_cek' );
        $this->form_validation->set_rules( 'score', 'Score', 'required' );
        $this->form_validation->set_rules( 'kode2', 'Alternatif 2', 'required' );
                
        if ($this->form_validation->run()==TRUE)
        {
            $this->model_bobot_alternatif->ubah_bobot_alternatif($this->input->get('id_criteria'), $this->input->post('kode1'),$this->input->post('kode2'), $this->input->post('score'));
        } 

        $data['rows'] = $this->model_bobot_alternatif->get_bobot_alternatif($this->input->get('id_criteria'));                                    
        $data['title'] = 'Nilai Bobot Alternatif';
        $data['content'] = $this->load->view('alternatif/view_bobot_alternatif', $data, TRUE); 
 		$this->load->view('template/main', $data);
	}

	public function cek()
    {        
        if($this->input->post('kode1')==$this->input->post('kode2') && $this->input->post('score')!=1)
        {
            $this->form_validation->set_message('cek', 'Alternatif sama harus bernilai 1');
            return false;
        } 
        return true;
    }

}

/* End of file bobot_alternatif.php */
/* Location: ./application/controllers/alternatif/bobot_alternatif.php */