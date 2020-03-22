<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_ticket');

    }

	public function index()
	{
		$data['title'] = 'Halaman Dasboard Ticketing';
		$data['subtitle'] = 'Halaman untuk mengelola Ticketing';
		$data['ticket'] = $this->model_ticket->get_listticket();
		$data['ticket1'] = $this->model_ticket->get_listticket1();
		$data['content'] = $this->load->view('ticket/index', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function addTicket()
	{
		if(isset($_POST['submit'])){

			$subject = $this->input->post('subject');
			$id_users = $this->session->userdata('id_users');
			$id_type_demages = $this->input->post('id_type_demages');
			$description = $this->input->post('description');
			// $images = 'kosongan';
			$created_at = date("d-m-Y");

			$data1 = array(
				'ID_TYPE_DEMAGES' => $id_type_demages,
				'ID_USERS' => $id_users,
				'SUBJECT' => $subject,
				'DESCRIPTION' => $description,
				// 'IMAGE' => $images,
				'CREATED_AT' => $created_at
				
			);

			$this->model_ticket->input_detailticket($data1,'TICKET_DETAILS');

			$lastid = $this->model_ticket->get_latsiddetailticket();
			$token = 'TOKEN';
			$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
			$string = '';
			$panjang = 10;
			for ($i = 0; $i < $panjang; $i++) {
	  				$pos = rand(0, strlen($karakter)-1);
	  				$string .= $karakter{$pos};
			}
			$hasiltoken = $token.$string;
			// print_r($hasiltoken);
			// die();
			$id_ticket_details = $lastid;
			$created_at = date("d-m-Y");
			$status = '1';

			$data = array(
				'ID_TICKET_DETAILS' => $id_ticket_details,
				'TOKEN' => $hasiltoken, 
				'STATUS' => $status, 
				'CREATED_AT' => $created_at
			);

			$this->model_ticket->input_ticket($data,'TICKET');


			
			$this->session->set_flashdata('message', '<div class="alert alert-success">
                    Data Prioritas Berhasil Ditambahkan.
                </div>');
			redirect('ticket/ticket/index');

		}
		else{
			$data['title'] = 'Halaman Add Ticket';
			$data['subtitle'] = 'Halaman untuk menambahkan Ticket';
			$data['demage'] = $this->model_ticket->get_demagecategory()->result();
			// print_r($this->model_ticket->get_demagecategory()->result());
			// die();
			$data['lastid'] = $this->model_ticket->get_latsiddetailticket();
			//$data['demage'] = $this->model_admin->get_detaildemages();
			//print_r($this->model_admin->get_demagecategory()->result());
			$data['content'] = $this->load->view('ticket/form', $data, TRUE); 
			$this->load->view('template/main', $data);
		}
	}

	public function detailTicket($ID_TICKET_DETAILS)
	{
			$data['title'] = 'Halaman Detail Ticket';
			$data['subtitle'] = 'Halaman untuk melihat Detail Ticket';

			$where = $ID_TICKET_DETAILS;
			$data['detailticket'] = $this->model_ticket->view_detailticket($where)->result();
			// print_r($this->model_ticket->view_detailticket($where,'PRIORITY')->result());
			// die();
			$data['content'] = $this->load->view('ticket/lihat_detail', $data, TRUE); 
			$this->load->view('template/main', $data);
	}

	public function verifikasi_ticket($ID_TICKET)
	{
		// if(isset($_POST['submit']))
		// {
			$id_ticket = $ID_TICKET;
			$status = '2';
			$update_at = date("d-m-Y");

			$this->model_ticket->update_status($ID_TICKET,$status,$update_at);
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
			
			redirect('/users/users/index');
		// }
	}

}

/* End of file ticket.php */
/* Location: ./application/controllers/ticket/ticket.php */