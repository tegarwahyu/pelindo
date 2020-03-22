
    <div class="col-md-12 col-lg-12">
        <?php echo $this->session->flashdata('message');?> 
    	<a href="<?php echo base_url('/alternatif/alternatif/tambah_alternatif'); ?>" class="btn btn-success" role="button">Add Kerusakan</a>
    	<br>
    	<br>
        <div class="mb-3 card">
        	<div class="card-body">
        		<h5 class="card-title">Ticket</h5>
    			<div class="table-responsive">
	                <table class="mb-0 table">
	                   <thead>
                            <tr>
                                <th>Number</th>
                                <th>ID</th>
                                <th>Kerusakan</th>
                                <th>Created_At</th>
                                <th>Updated_At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php 
                        $no = 1;
                        foreach($alternatif as $u){ 
                            ?>
                        <tbody>
                        	<tr>
                                <td><?php echo $no++ ?></td>
                        		<td><?php echo $u->ID_DEMAGE_DETAILS ?></td>
                                <td><?php echo $u->DEMAGE_DETAILS ?></td>
                                <td><?php echo $u->CREATED_AT ?></td>
                                <td><?php echo $u->UPDATED_AT ?></td>
                                <td><a href="<?php echo base_url ('/alternatif/alternatif/delete_alternatif/'.$u->ID_DEMAGE_DETAILS);?>" class="btn btn-success">Edit</a></button>
                                <a href="<?php echo base_url('/alternatif/alternatif/delete_alternatif/'.$u->ID_DEMAGE_DETAILS);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td>
                        	</tr>
                        </tbody>

                        <?php } ?>
	                </table>
	            </div>
    		</div>
    	</div>
    </div>