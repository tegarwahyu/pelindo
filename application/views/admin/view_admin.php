
<div class="col-lg-11">
    <?php echo $this->session->flashdata('message');?>
    <a href="../admin/admin/addUsers" class="btn btn-success" role="button">Add Users</a>
    <br>
    <br>
                                <div class="main-card mb-5 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Users</h5>
                                        <div class="table-responsive">
                                            <table class="mb-0 table">
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
                                                    <td><a href="<?php echo ('../admin/admin/editUsers/'.$u->ID_USERS);?>" class="btn btn-success">Edit</a></button>
                                                    <a href="<?php echo ('../admin/admin/deleteUsers/'.$u->ID_USERS);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                                </tbody>
                                            <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>