<div class="col-lg-12">
    <?php echo print_error()?>
<div class="main-card mb-5 card">
  <div class="card-body">
    <h5 class="card-title">Add Alternatif</h5>
      <form class="form-horizontal" action="<?php echo base_url('alternatif/alternatif/tambah_alternatif'); ?>" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">ID Alternatif :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="id_demage_details" name="id_demage_details" placeholder="Enter Criteria" required="" value="<?php set_value('id_criteria')?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Name Alternatif :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="demage_details" name="demage_details" placeholder="Enter Criteria" required="" value="<?php set_value('demage_details')?>">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
  </div>
</div>
</div>