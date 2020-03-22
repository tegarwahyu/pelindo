<div class="col-lg-12">
	<!-- <a href="addDetailKerusakan" class="mb-2 mr-2 btn-transition btn btn-outline-success" role="button">Tambah Detail Kerusakan</a> -->
    <!-- <br> -->
	<div class="main-card mb-6 card">
		<div class="card-body row">
		    <div class="col-md-6" style="border-right: 1px solid #ccc;">
			<h5 class="card-title" style="text-align: center;">Data Detail Kerusakan</h5>
		        <ul id="tree-view">
		            <div class="table-responsive">
		                <table class="mb-0 table" id="table_kerusakan_id">
					      <thead>
					          <tr>
					              <th>No</th>
					              <th>Detail Kerusakan</th>
					              <th>Created At</th>
					              <th>Update At</th>
					              <th>Aksi</th>
					          </tr>
					      </thead>
					      <?php 
		                    $no = 1;
		                    foreach($data->result() as $u){ 
		                    ?>
		                    <tbody>
		                    <tr>
		                        <th scope="row"><?php echo $no++ ?></th>
		                        <td><?php echo $u->DEMAGE_DETAILS ?></td>
		                        <td><?php echo $u->CREATED_AT ?></td>
		                        <td><?php echo $u->UPDATED_AT ?></td>

		                        <td><a href="<?php echo base_url('kerusakan/Detail_Kerusakan/editDetailKerusakan/'.$u->ID_DEMAGE_DETAILS);?>" class="btn btn-success">Edit</a></button>
                        		<a href="<?php echo base_url('kerusakan/Detail_Kerusakan/deleteDetailKerusakan/'.$u->ID_DEMAGE_DETAILS);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td>
		                    </tr>
		                    </tbody>
		                <?php } ?>
					  </table>
		            </div>
		        </ul>
		    </div>

		    <div class="col-md-6">
	            <div class="card-body"><h5 class="card-title" style="text-align: center;">Form Input Detail Kerusakan</h5>
	                <form class="form-horizontal" action="<?php echo base_url('kerusakan/detail_kerusakan/addDetailKerusakan'); ?>" method="post">
	                    <div class="form-row">
	                        <div class="col-md-12">
	                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Nama Detail Kerusakan</label><input name="detail_kerusakan" id="detail_kerusakan" placeholder="Nama Detail kerusakan" type="text" class="form-control" required=""></div>
	                        </div>
	                    </div>
	                   
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
