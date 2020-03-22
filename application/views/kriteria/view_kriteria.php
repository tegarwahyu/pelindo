
    <div class="col-md-12 col-lg-12">
        <?php echo $this->session->flashdata('message');?> 
    	<a href="<?php echo base_url('/kriteria/kriteria/tambah_kriteria'); ?>" class="btn btn-success" role="button">Add Kriteria</a>
    	<br>
    	<br>
        <div class="mb-3 card">
        	<div class="card-body">
        		<h5 class="card-title">Kriteria</h5>
    			<div class="table-responsive">
	                <table class="mb-0 table">
	                   <thead>
                            <tr>
                                <th>Number</th>
                                <th>Kriteria</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php 
                        $no = 1;
                        foreach($kriteria as $u){ 
                            ?>
                        <tbody>
                        	<tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $u->NAME_CRITERIA ?></td>
                                <td><a href="<?php echo base_url ('/admin/admin/editUsers/'.$u->ID_CRITERIA);?>" class="btn btn-success">Edit</a></button>
                                <a href="<?php echo base_url('/kriteria/kriteria/delete_kriteria/'.$u->ID_CRITERIA);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td>
                        	</tr>
                        </tbody>

                        <?php } ?>
	                </table>
	            </div>
    		</div>
    	</div>
    </div>