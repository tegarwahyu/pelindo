<div class="col-lg-12">
	<!-- <a href="addDetailKerusakan" class="mb-2 mr-2 btn-transition btn btn-outline-success" role="button">Tambah Detail Kerusakan</a> -->
    <!-- <br> -->
	<div class="main-card mb-5 card">
		<div class="card-body row">
		    <div class="col-md-6" style="border-right: 1px solid #ccc;">
			<h5 class="card-title" style="text-align: center;">Data Detail Kerusakan</h5>
		        <ul id="tree-view">
		            <div class="table-responsive">
		                <table class="mb-0 table" id="table_pic_id">
					      <thead>
					          <tr>
					              <th>No</th>
					              <th>Detail Kerusakan</th>
					              <th>Aksi</th>
					              <!-- <th>Office</th>
					              <th>Start date</th> -->
					          </tr>
					      </thead>
					      <?php 
		                    $no = 1;
		                    foreach($users->result() as $u){ 
		                    ?>
		                    <tbody>
		                    <tr>
		                        <th scope="row"><?php echo $no++ ?></th>
		                        <td><?php echo $u->DEMAGE_DETAILS ?></td>
		                        <td><a href="<?php echo ('master/Detail_KerusakanController/editDetailKerusakan/'.$u->ID_DEMAGE_DETAILS);?>" class="btn btn-success">Edit</a></button>
                        		<a href="<?php echo ('master/Detail_KerusakanController/deleteDetailKerusakan/'.$u->ID_DEMAGE_DETAILS);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td>
		                    </tr>
		                    </tbody>
		                <?php } ?>
					  </table>
		            </div>
		        </ul>
		    </div>

		    <div class="col-md-6">
	            <div class="card-body"><h5 class="card-title" style="text-align: center;">Form Input Detail Kerusakan</h5>
	                <form class="form-horizontal" action="<?php echo base_url('master/Detail_KerusakanController/addDetailKerusakan'); ?>" method="post">
	                    <div class="form-row">
	                        <div class="col-md-12">
	                            <div class="position-relative form-group"><label for="exampleEmail11" class="">Nama Detail Kerusakan</label><input name="detail_kerusakan" id="detail_kerusakan" placeholder="Nama Detail kerusakan" type="text" class="form-control" required=""></div>
	                        </div>
	                        <!-- <div class="col-md-6">
	                            <div class="position-relative form-group"><label for="examplePassword11" class="">Password</label><input name="password" id="examplePassword11" placeholder="password placeholder" type="password" class="form-control"></div>
	                        </div> -->
	                    </div>
	                    <!-- <div class="position-relative form-group"><label for="exampleAddress" class="">Address</label><input name="address" id="exampleAddress" placeholder="1234 Main St" type="text" class="form-control"></div>
	                    <div class="position-relative form-group"><label for="exampleAddress2" class="">Address 2</label><input name="address2" id="exampleAddress2" placeholder="Apartment, studio, or floor" type="text" class="form-control">
	                    </div>
	                    <div class="form-row">
	                        <div class="col-md-6">
	                            <div class="position-relative form-group"><label for="exampleCity" class="">City</label><input name="city" id="exampleCity" type="text" class="form-control"></div>
	                        </div>
	                        <div class="col-md-4">
	                            <div class="position-relative form-group"><label for="exampleState" class="">State</label><input name="state" id="exampleState" type="text" class="form-control"></div>
	                        </div>
	                        <div class="col-md-2">
	                            <div class="position-relative form-group"><label for="exampleZip" class="">Zip</label><input name="zip" id="exampleZip" type="text" class="form-control"></div>
	                        </div>
	                    </div> -->
	                    <!-- <div class="position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Check me out</label></div> -->
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
			$('#table_pic_id').DataTable();
		// }

	})
</script>
