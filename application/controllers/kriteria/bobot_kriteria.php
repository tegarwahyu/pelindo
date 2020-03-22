<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bobot_kriteria extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_kriteria');
        $this->load->model('admin/model_bobot_kriteria');
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

		    $this->load->helper('my');
        
        $this->form_validation->set_rules( 'ID1', 'Kriteria 1', 'required|callback_cek' );
        $this->form_validation->set_rules( 'nilai', 'Nilai', 'required' );
        $this->form_validation->set_rules( 'ID2', 'Kriteria 2', 'required' );
                
        if ($this->form_validation->run()==TRUE)
        {
            $this->model_bobot_kriteria->ubah_bobot_kriteria($this->input->post('ID1'),$this->input->post('ID2'), $this->input->post('nilai'));
        } 
        $data['rows'] = $this->model_bobot_kriteria->get_bobot_kriteria()->result();
        //$data['bobot'] = $this->model_bobot_kriteria->get_bobot_kriteria()->result();                                 
        $data['title'] = 'Nilai Bobot Kriteria';
        $data['content'] = $this->load->view('kriteria/view_bobot_kriteria', $data, TRUE); 
 		     $this->load->view('template/main', $data);

        //load_view('kriteria/view_bobot_kriteria', $data);

		// $this->load->helper('form');

		// $this->form_validation->set_rules( 'ID1', 'Kriteria 1', 'required|callback_cek' );
  //       $this->form_validation->set_rules( 'nilai', 'Nilai', 'required' );
  //       $this->form_validation->set_rules( 'ID2', 'Kriteria 2', 'required' );

  //       if ($this->form_validation->run()==TRUE)
  //       {
  //           $this->model_bobot_kriteria->ubah_bobot_kriteria($this->input->post('ID1'),$this->input->post('ID2'), $this->input->post('score'));
  //       } 
  //       $data['rows'] = $this->model_bobot_kriteria->get_bobot_kriteria()->result();
  //       $data['title'] = 'Nilai Bobot Kriteria';
  //       $data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk dengan AHP';
  //       $data['content'] = $this->load->view('kriteria/view_bobot_kriteria', $data, TRUE); 
  //       $this->load->view('template/main', $data);
	}

  public function cek()
    {        
        if($this->input->post('ID1')==$this->input->post('ID2') && $this->input->post('nilai')!=1)
        {
            $this->form_validation->set_message('cek', 'Kriteria sama harus bernilai 1');
            return false;
        } 
        return true;
    }


}

/* End of file bobot_kriteria.php */
/* Location: ./application/controllers/kriteria/bobot_kriteria.php */