<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //memanggil semua model yang diperlukan untuk perhitungan
        $this->load->model('admin/model_bobot_kriteria'); 
        $this->load->model('admin/model_bobot_alternatif'); 
        $this->load->model('admin/model_kriteria');     
        $this->load->model('admin/model_alternatif');             
    }

	public function index()
	{
		$data['title'] = 'Perhitungan AHP';
		$data['subtitle'] = 'Halaman untuk menambahkan users IT Helpdesk secara singkat';
        //memanggil matriks awal perbandingan kriteria        
        $data['matriks'] = $this->get_matriks($this->model_bobot_kriteria->get_bobot_kriteria()->result());
        //memanggil semua data kriteria
        $data['KRITERIA'] = $this->get_kriteria($this->model_kriteria->tampil_kriteria()->result());
        //tabel nilai ratio index
        $data['nRI'] = array (
        	1=>0,
        	2=>0,
        	3=>0.58,
        	4=>0.9,
        	5=>1.12,
        	6=>1.24,
        	7=>1.32,
        	8=>1.41,
        	9=>1.46,
        	10=>1.49
        );    
        //memanggil semua data alternatif
        $data['ALTERNATIF'] = $this->get_alternatif($this->model_alternatif->tampil_alternatif()->result());
        //memanggail view  hitung.php
        $data['content'] = $this->load->view('hitung/hitung', $data, TRUE); 
		$this->load->view('template/main', $data);
	}

	public function get_matriks($rows){
        $arr = array();
        foreach($rows as $row){    
            $arr[$row->ID1][$row->ID2] = $row->SCORE;
        }
        return $arr;
    }
    /**
     * konversi data kriteria di database menjadi matriks array php 
     */        
    public function get_kriteria($rows){
        $arr = array();
        foreach($rows as $row){
            $arr[$row->ID_CRITERIA] = $row->NAME_CRITERIA;
        }
        return $arr;
    }    
    /**
     * konversi data alternatif di database menjadi matriks array php 
     */        
    public function get_alternatif($rows){
        $arr = array();
        foreach($rows as $row){
            $arr[$row->ID_DEMAGE_DETAILS] = $row->DEMAGE_DETAILS;
        }
        return $arr;
    }

}

/* End of file perhitungan.php */
/* Location: ./application/controllers/perhitungan/perhitungan.php */