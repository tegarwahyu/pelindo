<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_admin');
        $this->load->model('admin/model_pic_admin');

        if($this->session->userdata('status') != "login" || $this->session->userdata('akses')!='4')
        {
        	$this->session->set_flashdata('message', '<div class="alert alert-danger">
                    Anda diharuskan untuk login terlebih dahulu
                </div>');
			redirect(base_url("login"));
		}
    }
    public function dasboard()
    {
    	//menambahkan session untuk masing2 expertise PIC
    	$session = $this->session->userdata('expertise');
    	if ($session == 'hardware') 
    	{
    		$data['title'] = 'Halaman Dasboard PIC'.$session;
			$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk secara singkat';
			$data['ticket'] = $this->model_pic_admin->get_alltickethardware()->result();
			$data['content'] = $this->load->view('pic/dasboard', $data, TRUE); 
			$this->load->view('template/main', $data);
    	}
    	elseif ($session == 'software') 
    	{
    		$data['title'] = 'Halaman Dasboard PIC'.$session;
			$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk secara singkat';
			$data['ticket'] = $this->model_pic_admin->get_allticketsoftware()->result();
			$data['content'] = $this->load->view('pic/dasboard', $data, TRUE); 
			$this->load->view('template/main', $data);
    	}
    	else{
    		$data['title'] = 'Halaman Dasboard PIC'.$session;
			$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk secara singkat';
			$data['ticket'] = $this->model_pic_admin->get_allticket()->result();
			$data['content'] = $this->load->view('pic/dasboard', $data, TRUE); 
			$this->load->view('template/main', $data);
    	}
    	
    }

	public function index()
	{
		$session = $this->session->userdata('expertise');
    	if ($session == 'hardware') 
    	{
    		$data['title'] = 'Halaman Dasboard PIC'.$session;
			$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk secara singkat';
			$data['ticket'] = $this->model_pic_admin->get_alltickethardwarestatus2()->result();
			$data['content'] = $this->load->view('pic/index', $data, TRUE); 
			$this->load->view('template/main', $data);
    	}
    	elseif ($session == 'software') 
    	{
    		$data['title'] = 'Halaman Dasboard PIC'.$session;
			$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk secara singkat';
			$data['ticket'] = $this->model_pic_admin->get_allticketsoftwarestatus2()->result();
			$data['content'] = $this->load->view('pic/index', $data, TRUE); 
			$this->load->view('template/main', $data);
    	}
    	else{
    		$data['title'] = 'Halaman Dasboard PIC'.$session;
			$data['subtitle'] = 'Halaman untuk mengelola IT Helpdesk secara singkat';
			$data['ticket'] = $this->model_pic_admin->get_allticketstatus2()->result();
			$data['content'] = $this->load->view('pic/index', $data, TRUE); 
			$this->load->view('template/main', $data);
    	}
	}

	public function ticket_selesai($ID_TICKET)
	{
		$id_ticket = $ID_TICKET;
		$status = '3';
		$update_at = date("d-m-Y");

		$this->model_pic_admin->update_status($ID_TICKET,$status,$update_at);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-success">
                Data Berhasil di Verifikasi.
            </div>');
			
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger">
                Maaf Verifikasi Gagal, Silahkan Coba Kembali.
            </div>');
		}
		
		redirect('/pic/pic/dasboard');
	}

}

/* End of file pic.php */
/* Location: ./application/controllers/pic.php */