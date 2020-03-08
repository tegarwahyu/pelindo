<!-- order-card start -->
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-blue order-card">
        <div class="card-block">
            <h6 class="m-b-20">Orders Received</h6>
            <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span>486</span></h2>
            <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-green order-card">
        <div class="card-block">
            <h6 class="m-b-20">Total Sales</h6>
            <h2 class="text-right"><i class="ti-tag f-left"></i><span>1641</span></h2>
            <p class="m-b-0">This Month<span class="f-right">213</span></p>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-yellow order-card">
        <div class="card-block">
            <h6 class="m-b-20">Revenue</h6>
            <h2 class="text-right"><i class="ti-reload f-left"></i><span>$42,562</span></h2>
            <p class="m-b-0">This Month<span class="f-right">$5,032</span></p>
        </div>
    </div>
</div>
<div class="col-md-6 col-xl-3">
    <div class="card bg-c-pink order-card">
        <div class="card-block">
            <h6 class="m-b-20">Total Profit</h6>
            <h2 class="text-right"><i class="ti-wallet f-left"></i><span>$9,562</span></h2>
            <p class="m-b-0">This Month<span class="f-right">$542</span></p>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <?php echo $this->session->flashdata('message');?>
    <a href="<?php echo base_url('/admin/admin/addUsers'); ?>" class="btn btn-success" role="button">Add Users</a>
    <br>
    <br>

    <div class="card">
        <div class="card-header">
            <h5>DataTable CSS</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li><i class="fa fa-chevron-left"></i></li>
                    <li><i class="fa fa-window-maximize full-card"></i></li>
                    <li><i class="fa fa-minus minimize-card"></i></li>
                    <li><i class="fa fa-refresh reload-card"></i></li>
                    <li><i class="fa fa-times close-card"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Id_users</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Division</th>
                            <th>Expertise</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php 
                        $no = 1;
                        foreach($users->result() as $u){ 
                            if($u->ROLE == 1)
                            {
                                $role = 'Superadmin';
                            }
                            elseif ($u->ROLE == 2) {
                                $role = 'Admin';
                            }
                            elseif ($u->ROLE == 3) {
                                $role = 'User';
                            }
                            else
                            {
                                $role = 'PIC';
                            }
                        ?>
                        <tbody>
                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td><?php echo $u->ID_USERS ?></td>
                            <td><?php echo $u->USERNAME ?></td>
                            <td><?php echo $u->PASSWORD ?></td>
                            <td><?php echo $u->NAME ?></td>
                            <td><?php echo $u->POSITION ?></td>
                            <td><?php echo $u->DIVISION ?></td>
                            <td><?php echo $u->EXPERTISE ?></td>
                            <td><?php echo $role ?></td>
                            <td><a href="<?php echo base_url ('/admin/admin/editUsers/'.$u->ID_USERS);?>" class="btn btn-success">Edit</a></button>
                            <a href="<?php echo base_url('/admin/admin/deleteUsers/'.$u->ID_USERS);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td>
                        </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
