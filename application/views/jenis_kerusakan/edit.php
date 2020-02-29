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
                                        <option value="" selected>Select</option>
                                        <option value="1">ganti catrid printer</option>
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
	                                    <option value="" selected>Select PIC</option>
	                                    <option value="41">Admin</option>
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

              <!-- <br>

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
								              <th>Aksi</th>
								          </tr>
								      </thead>
								      <tbody>
								      	<td></td>
								      	<td></td>
								      	<td></td>
								      	<td></td>
								      	<td></td>
								      	<td></td>
								      </tbody>
								      
								  </table>
					            </div>
					        </ul>
					    </div>
					</div> -->
          </div>
      </div>
  </div>



</div>