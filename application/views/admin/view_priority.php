<div class="col-lg-12">
    <?php echo $this->session->flashdata('message');?>
    <a href="<?php echo base_url('/admin/admin/addPriority'); ?>" class="btn btn-success" role="button">Add Priority</a>
    <br>
    <br>
                                <div class="main-card mb-5 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Table Priority</h5>
                                        <div class="table-responsive">
                                            <table class="mb-0 table" id="table" class="display">
                                                <thead>
                                                <tr>
                                                    <th>Number</th>
                                                    <th>Id_Priority</th>
                                                    <th >Priority</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <?php 
                                                $no = 1;
                                                foreach($priority->result() as $u){ 
                                                    
                                                ?>
                                                <tbody>
                                                <tr>
                                                    <th scope="row"><?php echo $no++ ?></th>
                                                    <td><?php echo $u->ID_PRIORITY ?></td>
                                                    <td><?php echo $u->NAME_PRIORITY ?></td>
                                                    <td><?php echo $u->CREATED_AT ?></td>
                                                    <td><?php echo $u->UPDATED_AT ?></td>
                                                    <td><a href="<?php echo base_url ('/admin/admin/editPriority/'.$u->ID_PRIORITY);?>" class="btn btn-success">Edit</a></button>
                                                    <a href="<?php echo base_url ('/admin/admin/deletePriority/'.$u->ID_PRIORITY);?>" onclick="return confirm('Ingin menghapus data?');" class="btn btn-danger">Delete</a></td>
                                               
                                                </tr>
                                                </tbody>
                                            <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>