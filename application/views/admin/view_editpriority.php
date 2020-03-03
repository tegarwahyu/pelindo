<div class="col-lg-12">
<div class="main-card mb-5 card">
  <div class="card-body">
    <h5 class="card-title">Edit Priority</h5>
    <?php foreach($priority as $u){ 
      ?>
      <form class="form-horizontal" action="<?php echo base_url('admin/admin/editPriority/'.$u->ID_PRIORITY); ?>" method="post">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="hidden" class="form-control" id="id_priority" name="id_priority" placeholder="Enter Priority" value="<?php echo $u->ID_PRIORITY ?>">
          </div>
          <label class="control-label col-sm-2" for="text">Name Priority :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="name_priority" name="name_priority" placeholder="Enter Priority" value="<?php echo $u->NAME_PRIORITY ?>">
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    <?php } ?>
  </div>
</div>
</div>