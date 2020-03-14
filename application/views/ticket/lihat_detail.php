
    <div class="col-md-12 col-lg-12">
    	<a href="<?php echo base_url('/ticket/ticket/index'); ?>" class="btn btn-danger" role="button">Back</a>
    	<br>
    	<br>
        <div class="mb-3 card">
        	<div class="card-body">
        		<h5 class="card-title">TABLE DETAIL TICKET</h5>
    			<div class="table-responsive">
	                <table class="mb-0 table">
	                   <thead>
                            <tr>
                                <th>Number</th>
                                <!-- <th>ID_TICKET_DETAILS</th> -->
                                <!-- <th>ID_TYPE_DEMAGES</th> -->
                                <th>ID_USERS</th>
                                <th>SUBJECT</th>
                                <th>DESCRIPTION</th>
                                <th>IMAGE</th>
                                <th>CREATED_AT</th>
                                <th>UPDATED_AT</th>
                            </tr>
                        </thead>
                        <?php 
                        $no = 1;
                        foreach($detailticket as $u){ 
                            ?>
                        <tbody>
                        	<tr>
                                <td><?php echo $no++ ?></td>
                        		<!-- <td><?php echo $u->ID_TICKET_DETAILS ?></td> -->
                                <!-- <td><?php echo $u->ID_TYPE_DEMAGES ?></td> -->
                                <td><?php echo $u->NAME ?></td>
                                <td><?php echo $u->SUBJECT ?></td>
                                <td><?php echo $u->DESCRIPTION ?></td>
                                <td><?php echo $u->IMAGE ?></td>
                                <td><?php echo $u->CREATED_AT ?></td>
                                <td><?php echo $u->UPDATED_AT ?></td>
                        	</tr>
                        </tbody>

                        <?php } ?>
	                </table>
	            </div>
    		</div>
    	</div>
    </div>