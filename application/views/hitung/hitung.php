<div class="panel panel-primary">
<div class="panel-heading"><strong>Mengukur Konsistensi Kriteria</strong></div>
<div class="panel-body">
    <div class="panel panel-default">
    <div class="panel-heading"><strong>Matriks Perbandingan Kriteria</strong></div>
    <div class="panel-body">
    Pertama-tama menyusun hirarki dimana diawali dengan tujuan, kriteria dan alternatif-alternatif lokasi pada tingkat paling bawah. 
    Selanjutnya menetapkan perbandingan berpasangan antara kriteria-kriteria dalam bentuk matrik. 
    Nilai diagonal matrik untuk perbandingan suatu elemen dengan elemen itu sendiri diisi dengan bilangan (1) sedangkan isi nilai perbandingan antara (1) sampai dengan (9) kebalikannya, kemudian dijumlahkan perkolom. 
    Data matrik tersebut seperti terlihat pada tabel berikut. 
    </div>
    <table class="table table-bordered table-striped table-hover">
    <?php             
        //lihat fungsi AHP_get_total_kolom di my_helper.php
        $total = AHP_get_total_kolom($matriks);
        
        echo "<thead><tr><th></th>";     
        foreach($matriks as $key => $value){
            echo "<th>$key</th>";        
        }    
        echo "<tr></thead>";    
        foreach($matriks as $key => $value){
            echo "<tr><th>$key - $KRITERIA[$key]</th>";
            foreach($value as $k => $v){
                echo "<td>".round($v,3)."</td>";
            }        
            echo "</tr>";
        }    
        echo "<tfoot><tr><th>Total kolom</th>";
        foreach($total as $key => $value){
            echo "<td class='text-primary'>".round($total[$key],3)."</td>";        
        }
        echo "</tr></tfoot>";
    ?>
    </table>
    </div>
    
    <div class="panel panel-default">
    <div class="panel-heading"><strong>Matriks Bobot Prioritas Kriteria</strong></div>
    <div class="panel-body">
    Setelah terbentuk matrik perbandingan maka dilihat bobot prioritas untuk perbandingan  kriteria.  
    Dengan  cara  membagi  isi  matriks  perbandingan  dengan jumlah  kolom  yang  bersesuaian,  kemudian  menjumlahkan  perbaris  setelah  itu hasil penjumlahan dibagi dengan banyaknya kriteria sehingga ditemukan bobot prioritas seperti terlihat pada berikut.  
    </div>
    <table class="table table-bordered table-striped table-hover">
    <?php              
        //lihat fungsi AHP_normalize di my_helper.php  
        $normal = AHP_normalize($matriks, $total);         
        //lihat fungsi AHP_get_rata di my_helper.php           
        $rata = AHP_get_rata($normal);
    	
        echo "<thead><tr><th></th>";   
        $no=1;
        foreach($normal as $key => $value){
            echo "<th>$key</th>";
            $no++;      
        }      
    	echo "<th>Bobot Prioritas</th></tr></thead>";  
        $no=1;
        foreach($normal as $key => $value){
            echo "<tr>";
            echo "<th>$key</th>";
            foreach($value as $k => $v){
                echo "<td>".round($v,3)."</td>";
            }				             
            echo "<td class='text-primary'>".round($rata[$key],3)."</td>";
            echo "</tr>";
            $no++;
        }    
        echo "</tr>";	
    ?>
    </table>
    </div>
    
    <div class="panel panel-default">
    <div class="panel-heading"><strong>Matriks Konsistensi Kriteria</strong></div>
    <div class="panel-body">
    Untuk  mengetahui  konsisten  matriks  perbandingan dilakukan  perkalian  seluruh  isi  kolom  matriks  A  perbandingan  dengan  bobot prioritas  kriteria  A,  isi  kolom  B  matriks  perbandingan  dengan  bobot  prioritas kriteria  B  dan  seterusnya.  Kemudian  dijumlahkan  setiap  barisnya  dan  dibagi penjumlahan baris dengan bobot prioritas bersesuaian seperti terlihat pada tabel berikut. 
    </div>
    <table class="table table-bordered table-striped table-hover">
    <?php                        
        //lihat fungsi AHP_consistency_measure di my_helper.php     
        $cm = AHP_consistency_measure($matriks, $rata);
    	
        echo "<thead><tr><th></th>";   
        $no=1;
        foreach($normal as $key => $value){
            echo "<th>$key</th>";
            $no++;      
        }      
    	echo "<th>Bobot</th></tr></thead>";  
        $no=1;
        foreach($normal as $key => $value){
            echo "<tr>";
            echo "<th>$key</th>";
            foreach($value as $k => $v){
                echo "<td>".round($v,3)."</td>";
            }				             
    		echo "<td class='text-primary'>".round($cm[$key],3)."</td>";
            echo "</tr>";
            $no++;
        }    
        echo "</tr>";	
    ?>
    </table>    
    <div class="panel-body">
        Berikut tabel ratio index berdasarkan ordo matriks.    
    </div>
    <table class="table table-bordered">
        <tr>
        <th>Ordo matriks</th>
        <?php
            foreach($nRI as $key => $value){
                if(count($matriks)==$key)
                    echo "<td class='text-primary'>$key</td>";
                else
                    echo "<td>$key</td>";
            }
        ?>
        </tr>
        <tr>
        <th>Ratio index</th>
        <?php
            foreach($nRI as $key => $value){
                if(count($matriks)==$key)
                    echo "<td class='text-primary'>$value</td>";
                else
                    echo "<td>$value</td>";
            }
        ?>
        </tr>
    </table>
    <div class="panel-footer">
    <?php
        $CI = ((array_sum($cm)/count($cm))-count($cm))/(count($cm)-1);	
    	$RI = $nRI[count($matriks)];
    	$CR = $CI/$RI;
    	echo "<p>Consistency Index: ".round($CI, 3)."<br />";	
    	echo "Ratio Index: ".round($RI, 3)."<br />";
    	echo "Consistency Ratio: ".round($CR, 3);
    	if($CR>0.10){
    		echo " (Tidak konsisten)<br />";	
    	} else {
    		echo " (Konsisten)<br />";
    	}
    ?>
    </div>
    </div>
</div>
</div>

<div class="panel panel-primary">
<div class="panel-heading"><strong>Matriks Perbandingan Alternatif</strong></div>
<div class="panel-body">
    <p>Selanjutnya setelah menemukan bobot prioritas kriteria, menetapkan nilai skala perbandingan lokasi berdasarkan masing-masing kriteria. 
    Nilai skala sesuai dengan   kebijakan   perusahaan.   
    Langkah   selanjutnya   membuat   matriks perbandingan  alternatif  lokasi  berdasarkan  kriteria.  
    Setelah  terbentuk  matriks perbandingan  lokasi  berdasarkan  kriteria  maka  dicari  bobot  prioritas  untuk perbandingan lokasi terhadap masing,masing kriteria.  
    Buat kriteria selanjutnya dengan cara yang sama.</p>  
    <?php foreach($KRITERIA as $kode=>$nama): ?>
    <div class="panel panel-default">
        <div class="panel-heading">Matriks Perbandingan Alternatif Berdasarkan <strong><?=$nama?></strong></div>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th></th>
                <?php 
                foreach($ALTERNATIF as $k => $v){
                    echo"<th>$k</th>";
                }
                ?>
            </tr>
            <?php 
            //lihat fungsi AHP_get_relalternatif di my_helper.php     
            $data = AHP_get_relalternatif($kode);
            
            foreach($data as $key => $value){
                echo"<tr><th>$key</th>";
                foreach($value as $k => $v){
                    echo"<td>".round($v, 3)."</td>";
                }
                echo"</tr>";
            }
            //lihat fungsi AHP_get_total_kolom di my_helper.php     
            $total = AHP_get_total_kolom($data);
            echo "<tfoot><tr><th>Total kolom</th>";
            foreach($total as $key => $value){
                echo "<td class='text-primary'>".round($total[$key],3)."</td>";        
            }
            echo "</tr></tfoot>";
            ?>
        </table>
        <div class="panel-body">Matrik bobot prioritas alternatif berdasarkan <strong><?=$nama?></strong>:</div>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th></th>
                <?php 
                foreach($ALTERNATIF as $k => $v){
                    echo"<th>$k</th>";
                }
                ?>
                <th>Bobot</th>
            </tr>
            <?php 
            //lihat fungsi AHP_normalize di my_helper.php     
            $data = AHP_normalize($data, $total);
            //lihat fungsi AHP_get_rata di my_helper.php     
            $ratax = AHP_get_rata($data);
            
            foreach($data as $key => $value){
                echo"<tr><th>$key</th>";
                foreach($value as $k => $v){
                    echo"<td>".round($v, 3)."</td>";
                }
                echo"<td class='text-primary'>".round($ratax[$key], 3)."</td></tr>";
            }
            ?>
        </table>
    </div>
    <?php endforeach;?>
</div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading"><strong>Hasil Akhir</strong></div>
    <div class="panel-body">    
        <div class="panel panel-default">
            <div class="panel-heading"><strong>EIGEN KRITERIA DAN ALTERNATIF</strong></div>
            <div class="panel-body">
                Setelah  menemukan  bobot  dari  masing-masing  kriteria terhadap  lokasi yang  sudah  ditentukan  oleh  pihak  perusahaan,  langkah  selanjutnya  adalah mengalikan bobot dari masing,masing kriteria dengan bobot dari masing-masing lokasi,  kemudian  hasil  perkalian  tersebut  dijumlahkan  perbaris.  
                Sehingga didapatkan total prioritas global seperti pada tabel berikut. 
            </div>
            <table class="table table-bordered table-striped table-hover">
                <?php		
                echo "<tr><th>Alternatif</th>";   		
                $no=1;	
                foreach($KRITERIA as $key => $value){
                    echo "<th>$key</th>";
                    $no++;      
                }      
            	echo "<th>Nilai</th><th>Rank</th>";
                echo "<tr><td>Vektor Eigen</td>";
                foreach($rata as $r){
                    echo "<td>".round($r, 3)."</td>";
                }
                echo "<td></td><td></td></tr>";            
                //lihat fungsi my_helper di my_helper.php     
                $eigen_alternatif = AHP_get_eigen_alternatif($KRITERIA);
                //lihat fungsi AHP_mmult di my_helper.php     
                $nilai = AHP_mmult($eigen_alternatif, $rata);           
                //lihat fungsi AHP_get_rank di my_helper.php                                                 
                $rank = AHP_get_rank($nilai);
                
                $hasil = array();                
                foreach($rank as $key => $value){
                    $hasil[] = "<b>$ALTERNATIF[$key]</b> mendapat rangking <b>$value</b> dengan nilai <b>".round($nilai[$key], 3)."</b>";

                    $this->db->query("UPDATE DEMAGE_DETAILS SET rank='$rank[$key]', total='$nilai[$key]' WHERE ID_DEMAGE_DETAILS='$key'");
                    echo "<tr>";
                    echo "<td>$key - ".$ALTERNATIF[$key]."</td>";
                    foreach($eigen_alternatif[$key] as $k => $v){
                        echo "<td>".round($v,3)."</td>";    
                    }    
                    echo "<td class='text-primary'>".round($nilai[$key], 3)."</td>";
                    echo "<td class='text-primary'>$rank[$key]</td>";        
                    echo "</tr>";
                    $no++;
                }    
                echo "</tr>";            
                ?>
             </table>        
             <div class="panel-body">
                <p>Berdasarkan hasil perhitungan diperoleh: <?php echo implode(', ', $hasil)?></p>                 
             </div>
        </div>
    </div>
</div>
