<div class="col-lg-12">
	<!-- <a href="addDetailKerusakan" class="mb-2 mr-2 btn-transition btn btn-outline-success" role="button">Tambah Detail Kerusakan</a> -->
    <!-- <br> -->
	<div class="main-card mb-5 card">
		<div class="card-body row">

		    <div class="col-md-12">
	            <div class="card-body"><h5 class="card-title" style="text-align: center;">Form Edit Detail Kerusakan</h5>
	                <?php foreach($data as $a){?>
	                <form class="form-horizontal" action="<?php echo base_url('kerusakan/Detail_Kerusakan/editDetailKerusakan/'.$a->ID_DEMAGE_DETAILS);?>" method="post">
	                	<input type="text" name="id_detail_kerusakan" value="<?php echo($a->ID_DEMAGE_DETAILS);?>" hidden>
	                    <div class="form-row">
	                        <div class="col-md-12">
	                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Nama Detail Kerusakan</label><input name="detail_kerusakan" id="detail_kerusakan" placeholder="<?php echo($a->DEMAGE_DETAILS);?>" type="text" class="form-control" required=""></div>
	                        </div>
	                    </div>
	                <?php } ?>
	                   
	                    <button type="submit" name="submit" class="mt-2 btn btn-success">Simpan</button>
	                </form>
	            </div>		 
		    </div>
		</div>
	</div>
</div>

<script type="text/javascript">
	(function($){

		// if (typeof DataTable !== 'undefined') {
			$('#table_kerusakan_id').DataTable();
		// }

	})
</script>
