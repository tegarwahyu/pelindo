<div class="col-lg-12">
  <div class="tab-content">
      <div class="tab-pane tabs-animation fade active show" id="tab-content-0" role="tabpanel">
          <div class="main-card mb-3 card">
              <div class="card-body"><h5 class="card-title" style="text-align: center;">Form Setting Jenis Kerusakan</h5>
                  <form class="" action="<?php echo base_url('kerusakan/jenis_kerusakan/addJenisKerusakan')?>" method="POST">
                      <div class="form-row">
                          <div class="col-md-6">
                              <div class="position-relative form-group"><label for="exampleEmail11" class="">Jenis Kerusakan</label><input name="jenis_kerusakan" type="text" class="form-control" placeholder="nama jenis kerusakan"></div>
                          </div>
                          <div class="col-md-6">
                              <div class="position-relative form-group"><label for="examplePassword11" class="">Detail Kerusakan</label>
	                            <div class="col-sm-10">
	                            	<select type="select" name="detail_kerusakan" class="custom-select">
                                        <option value="" selected disabled="">Select</option>
                              			<?php for($i=0;$i < count($data2); $i++) { ?>
                                        <option value="<?php echo($data2[$i]->ID_DEMAGE_DETAILS); ?>"><?php echo($data2[$i]->DEMAGE_DETAILS); ?></option>
                                    	<?php } ?>
                                    </select>
	                            </div>
	                          </div>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="col-md-6">
	                      	<div class="position-relative form-group">
	                          <label for="examplePassword11" class="">Select Penanggung Jawab</label>
		                        <div class="col-sm-10" style="margin-left: -15px;}">
		                        	<select type="select" name="penanggungjawab" class="custom-select">
	                                    <option value="" selected disabled="">Select PIC</option>
		                        		<?php for($i=0;$i < count($data3); $i++) { ?>
	                                    <option value="<?php echo($data3[$i]->ID_USERS); ?>"><?php echo($data3[$i]->NAME); ?></option>
	                                <?php } ?>
	                                </select>
		                        </div>
	                      	</div>
	                  	  </div>
                          <div class="col-md-6">
	                      	<div class="position-relative form-group">
	                          <label for="examplePassword11" class="">Tingkat Kesulitan</label>
		                        <div class="col-sm-10" style="margin-left: -15px;}">
		                        	<select type="select" name="tingkat_kesulitan" class="custom-select">
	                                    <option value="" selected>Select Tingkat kesulitan</option>
	                                    <option value="1">Sangat Mudah</option>
	                                    <option value="3">Mudah</option>
	                                    <option value="5">Sedang</option>
	                                    <option value="7">Sulit</option>
	                                    <option value="9">Sangat Sulit</option>
	                                    <!-- <option value="">Tidak Bisa Diperbaiki</option> -->
	                                </select>
		                        </div>
	                      	</div>
	                  	  </div>
                      </div>
                      <button type="submit" name="submit" class="btn btn-success">Submit</button>
                  </form>
              </div>

              <br>

			      <div class="card-body row">
					    <div class="col-md-12">
						<h5 class="card-title" style="text-align: center;">Data Detail Kerusakan</h5>
					        <ul id="tree-view">
					            <div class="table-responsive">
					                <table class="mb-0 table" id="table_kerusakan_id">
								      <thead>
								          <tr>
								              <th>No</th>
								              <th>Jenis Kerusakan</th>
								              <th>Detail Kerusakan</th>
								              <th>Penanggung Jawab</th>
								              <th>Tingkat Kesulitan</th>
								              <th>Created At</th>
								              <th>Updated At</th>
								              <th>Aksi</th>
								          </tr>
								      </thead>
								       <?php 
					                    $no = 1;
					                    foreach($data as $u){ 
					                    ?>
					                    <tbody>
					                    <tr>
					                        <th scope="row"><?php echo $no++ ?></th>
					                        <td><?php echo $u->TYPE_DEMAGE ?></td>
					                        <td><?php echo $u->ID_DEMAGE_DETAILS ?></td>
					                        <td><?php echo $u->NAME ?></td>
					                        <td><?php echo $u->ID_PRIORITY ?></td>
					                        <td><?php echo $u->CREATED_AT ?></td>
					                        <td><?php echo $u->UPDATED_AT ?></td>
					                        <td><a href="<?php echo base_url('kerusakan/Jenis_Kerusakan/editJenisKerusakan/'.$u->ID_TYPE_DEMAGES);?>" class="btn btn-success">Edit</a></button>
			                        		<a href="<?php echo base_url('kerusakan/Jenis_Kerusakan/deleteJenisKerusakan/'.$u->ID_TYPE_DEMAGES);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a>
			                        		</td>
					                    </tr>
					                    </tbody>
					                <?php } ?>
								      <!-- <tbody>
								      	<td></td>
								      	<td></td>
								      	<td></td>
								      	<td></td>
								      	<td></td>
								      	<td></td>
								      </tbody> -->
								      
								  </table>
					            </div>
					        </ul>
					    </div>
					</div>
          </div>
      </div>
  </div>

<script type="text/javascript">
	$(document).ready(function(){

            $('#table_kerusakan_id').DataTable();

      });
</script>

</div>