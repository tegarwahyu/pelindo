<div class="col-lg-12">
  <div class="tab-content">
      <div class="tab-pane tabs-animation fade active show" id="tab-content-0" role="tabpanel">
          <div class="main-card mb-3 card">
              <div class="card-body"><h5 class="card-title" style="text-align: center;">Form Setting Jenis Kerusakan</h5>
              	<?php foreach($data as $a) {?>
                  <form class="" action="<?php echo base_url('kerusakan/jenis_kerusakan/editJenisKerusakan/'.$a->ID_TYPE_DEMAGES)?>" method="POST">
                  	<input type="text" name="id_jenis" value="<?php echo($a->ID_TYPE_DEMAGES); ?>" hidden>
                <?php } ?>
                      <div class="form-row">
                          <div class="col-md-6">
                              <div class="position-relative form-group"><label for="exampleEmail11" class="">Jenis Kerusakan</label><input name="jenis_kerusakan" type="text" class="form-control" placeholder="<?php echo($a->TYPE_DEMAGE); ?>"></div>
                          </div>
                          <div class="col-md-6">
                              <div class="position-relative form-group"><label for="examplePassword11" class="">Detail Kerusakan</label>
	                            <div class="col-sm-10">
	                            	<select type="select" name="detail_kerusakan" class="custom-select">
                                        <option value="" selected disabled=""><?php echo($a->ID_DEMAGE_DETAILS); ?></option>
                                        <!-- <option value="1">ganti catrid printer</option> -->
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
	                                    <option value="" selected disabled=""><?php echo($a->ID_USERS); ?></option>
	                                    <!-- <option value="41">Admin</option> -->
	                                </select>
		                        </div>
	                      	</div>
	                  	  </div>
                          <div class="col-md-6">
	                      	<div class="position-relative form-group">
	                          <label for="examplePassword11" class="">Tingkat Kesulitan</label>
		                        <div class="col-sm-10" style="margin-left: -15px;}">
		                        	<select type="select" name="tingkat_kesulitan" class="custom-select">
	                                    <option value="" selected disabled=""><?php echo($a->ID_PRIORITY); ?></option>
	                                    <option value="1">Sangat Mudah</option>
	                                    <option value="3">Mudah</option>
	                                    <option value="5">Sedang</option>
	                                    <option value="7">Sulit</option>
	                                    <option value="9">Sangat Sulit</option>
	                                </select>
		                        </div>
	                      	</div>
	                  	  </div>
                      </div>
                      <button type="submit" name="submit" class="btn btn-success">Submit</button>
                  </form>
              </div>

          </div>
      </div>
  </div>



</div>