<div class="col-lg-12">
<div class="main-card mb-5 card">
  <div class="card-body">
    <h5 class="card-title">Users</h5>
    <?php foreach($user as $u){ 
      $skelas = $u->ROLE;
      ?>
      <form class="form-horizontal" action="<?php echo base_url('admin/admin/editUsers/'.$u->ID_USERS); ?>" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="id_users" value="<?php echo $u->ID_USERS ?>">
          <label class="control-label col-sm-2" for="text">Username :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?php echo $u->USERNAME ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Password :</label>
          <div class="col-sm-12">
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" value="<?php echo $u->PASSWORD ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Name :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo $u->NAME ?>"> 
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Position :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="position" name="position" placeholder="Enter position" value="<?php echo $u->POSITION ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Role :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="role" name="role" placeholder="Enter role" value="<?php echo $u->ROLE ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Division :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="division" name="division" placeholder="Enter division" value="<?php echo $u->DIVISION ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Expertise :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="expertise" name="expertise" placeholder="Enter expertise" value="<?php echo $u->EXPERTISE ?>">
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