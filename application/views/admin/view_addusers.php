<div class="col-lg-11">
<div class="main-card mb-5 card">
  <div class="card-body">
    <h5 class="card-title">Users</h5>
      <form class="form-horizontal" action="<?php echo base_url('admin/admin/addUsers'); ?>" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Username :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required="">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Password :</label>
          <div class="col-sm-12">
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required="">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Name :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required="">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Position :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="position" name="position" placeholder="Enter position" required="">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Role :</label>
          <div class="col-sm-12">
            <select id="role" name="role" class="form-control" required="">
              <option value="1">Superadmin</option>
              <option value="2">Admin</option>
              <option value="3">User</option>
              <option value="4">Person In Charge (PIC)</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Division :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="division" name="division" placeholder="Enter division" required="">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="text">Expertise :</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" id="expertise" name="expertise" placeholder="Enter expertise">
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