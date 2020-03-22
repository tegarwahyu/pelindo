<?php
function kode_oto($field, $table, $prefix, $length){
    $CI =& get_instance();
    $query = $CI->db->query("SELECT $field AS kode FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");    
    $row = $query->row_object();    
    
    if($row){
        return $prefix . substr( str_repeat('0', $length) . (substr($row->kode, - $length) + 1), - $length );
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}
/**
 * menghitung total kolom matriks
 */
function AHP_get_total_kolom($matriks = array()){
    $total = array();        
    foreach($matriks as $key => $val){        
        foreach($val as $k => $v){
            if(!isset($total[$k]))
                $total[$k] = 0;
            $total[$k]+=$v;
        }
    }  
    return $total;
} 
/**
 * menormalisasikan matriks
 * membagi setiap elemen matriks dengan total kolom
 */
function AHP_normalize($matriks = array(), $total = array()){
          
    foreach($matriks as $key => $value){
        foreach($value as $k => $v){
            $matriks[$key][$k] = $matriks[$key][$k]/$total[$k];
        }
    }     
    return $matriks;       
}
/**
 * mencari bobot prioritas
 * menghitung rata-rata setiap barus
 */
function AHP_get_rata($normal){
    $rata = array();
    foreach($normal as $key => $value){
        $rata[$key] = array_sum($value)/count($value); 
    } 
    return $rata;   
}
/**
 * menghitung consistency measure
 */
function AHP_consistency_measure($matriks, $rata){
    //lihat fungsi AHP_mmult di my_helper.php
    $matriks = AHP_mmult($matriks, $rata);    
    foreach($matriks as $key => $value){
        $data[$key]=$value/$rata[$key];        
    }
    return $data;
}
/**
 * mengalikan matriks dengan rata (bobot prioritas))
 */
function AHP_mmult($matriks = array(), $rata = array()){
	$data = array();
    
    $rata = array_values($rata);
    
	foreach($matriks as $key => $value){
        $no=0;
        $data[$key] = 0;
		foreach($value as $k => $v){
			$data[$key]+=$v*$rata[$no];       
            $no++;  
		}				
	}  
    
	return $data;
}
/**
 * mebuat perbandingan alternatif menjadi matriks berdasarkan kriteria tertentu
 */
function AHP_get_relalternatif($kode){
    $CI =&get_instance();
    $rows = $CI->model_bobot_alternatif->get_bobot_alternatif($kode);
    $data = array();
    foreach($rows as $row){
        $data[$row->KODE1][$row->KODE2] = $row->SCORE;
    }
    
    return $data;
}
/**
 * mencari bobot priotitas masing masing matriks perbandingan alternatif pada semua kriteria
 */
function AHP_get_eigen_alternatif($kriteria=array()){
    $data = array();
    foreach($kriteria as $key => $value){
        $kode_kriteria = $key;
        //lihat fungsi AHP_get_relalternatif di my_helper.php
        $matriks = AHP_get_relalternatif($kode_kriteria);
        //lihat fungsi AHP_get_total_kolom di my_helper.php
        $total = AHP_get_total_kolom($matriks);
        //lihat fungsi AHP_normalize di my_helper.php
        $normal = AHP_normalize($matriks, $total);
        //lihat fungsi AHP_get_rata di my_helper.php
        $rata = AHP_get_rata($normal);
        $data[$kode_kriteria] = $rata;                
    }
    $new = array();
    foreach($data as $key => $value){
        foreach($value as $k => $v){
            $new[$k][$key] = $v;
        }
    }
    return $new;
}
/**
 * mendapatkan ranking berdasarkan total
 */
function AHP_get_rank($array){
    $data = $array;
    arsort($data);
    $no=1;
    $new = array();
    foreach($data as $key => $value){
        $new[$key] = $no++;
    }
    return $new;
}
/**
 * memanggil view sekaligus header dan footer
 */
function load_view($view, $data = array())
{
    $CI =&get_instance();
    $CI->load->view('template/main', $data);
    $CI->load->view($view, $data);
    //$CI->load->view('sidebar/sidebar', $data);
   
        
}
/**
 * memanggil view sekaligus header dan footer untuk cetak
 */
function load_view_cetak($view, $data = array())
{
    $CI =&get_instance();
    $CI->load->view('header_cetak', $data);
    $CI->load->view($view, $data);
    $CI->load->view('footer_cetak', $data);    
}
/**
 * menampilkan pesan
 */
function load_message($message = '', $type = 'danger')
{
    if($type=='danger') 
    {
        $data['title'] = 'Error';
    }
    else 
    {
        $data['title'] = 'Success';
    }
    
    $data['class'] = $type;
    $data['message'] = $message;
    
    load_view('message', $data);
    
}
/**
 * menampilkan combobox untuk kriteria
 */
function get_kriteria_option($selected = ''){
    $CI =& get_instance();    
    $CI->load->model('admin/model_kriteria');
    $rows = $CI->model_kriteria->get_kriteria()->result();
    
    $a = '';
    foreach($rows as $row){
        if($selected==$row->ID_CRITERIA)
            $a.="<option value='$row->ID_CRITERIA' selected>[$row->ID_CRITERIA] $row->NAME_CRITERIA</option>";
        else
            $a.= "<option value='$row->ID_CRITERIA'>[$row->ID_CRITERIA] $row->NAME_CRITERIA</option>";
    }
    return $a;
}
/**
 * menampilkan combobox untuk alternatif
 */
function get_alternatif_option($selected = ''){
    $CI =& get_instance();    
    $CI->load->model('admin/model_alternatif');
    $rows = $CI->model_alternatif->get_alternatif()->result();
    
    $a = '';
    foreach($rows as $row){
        if($selected==$row->ID_DEMAGE_DETAILS)
            $a.="<option value='$row->ID_DEMAGE_DETAILS' selected>[$row->ID_DEMAGE_DETAILS] $row->DEMAGE_DETAILS</option>";
        else
            $a.= "<option value='$row->ID_DEMAGE_DETAILS'>[$row->ID_DEMAGE_DETAILS] $row->DEMAGE_DETAILS</option>";
    }
    return $a;
}
/**
 * menampilkan nilai perbandingan untuk matriks ke dalam combobox
 */
function get_nilai_option($selected = ''){
    $nilai = array(
        '1' => 'Sama penting dengan',
        '2' => 'Mendekati sedikit lebih penting dari',
        '3' => 'Sedikit lebih penting dari',
        '4' => 'Mendekati lebih penting dari',
        '5' => 'Lebih penting dari',
        '6' => 'Mendekati sangat penting dari',
        '7' => 'Sangat penting dari',
        '8' => 'Mendekati mutlak dari',
        '9' => 'Mutlak sangat penting dari',
    );
    foreach($nilai as $key => $value){
        if($selected==$key)
            $a.="<option value='$key' selected>$key - $value</option>";
        else
            $a.= "<option value='$key'>$key - $value</option>";
    }
    return $a;
}
/**
 * menampilkan error pada form
 */
function print_error(){
    return validation_errors('<div class="alert alert-danger" alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>');
}