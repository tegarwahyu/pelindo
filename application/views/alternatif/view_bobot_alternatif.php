<div class="col-md-12 col-lg-12">
<div class="panel panel-default">
    <div class="panel-heading">
    <form class="form-inline">        
        <div class="form-group">
            <select class="form-control" name="id_criteria" onchange="this.form.submit()">
            <option value="">Pilih kriteria</option>
            <?php echo get_kriteria_option($_GET['id_criteria'])?>
            </select>
        </div>
    </form>
</div>
<div class="panel-body">
<?php echo print_error()?>
<form class="form-inline" method="post">
    <div class="form-group">
        <select class="form-control" name="kode1">
        <?php echo get_alternatif_option($_POST['kode1'])?>
        </select>
    </div>
    <div class="form-group">
        <select class="form-control" name="score">
        <?php echo get_nilai_option($_POST['score'])?>
        </select>
    </div>
    <div class="form-group">
        <select class="form-control" name="kode2">
        <?php echo get_alternatif_option($_POST['kode2'])?>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
    </div>
</form>
</div>
<?php 
$data = array();
foreach($rows as $row){
    $data[$row->KODE1][$row->KODE2] = $row->SCORE;
}
if($data):?>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr class="text-primary">
            <th>Kode</th>
            <?php 
            foreach($data as $key=>$value){
                echo "<th>$key</th>";
            }         
            ?>
        </tr>
    </thead>
    <?php
    
    $no=1;
    
    foreach($data as $key => $value):?>
    <tr>
        <th class="text-primary"><?php echo $key?></th>
        <?php  
        foreach($value as $dt){
            echo "<td>".round($dt, 3)."</td>";               
        }    
        ?>
    </tr>
    <?php endforeach?>
    </table>
<?php endif?>
</div>
</div>