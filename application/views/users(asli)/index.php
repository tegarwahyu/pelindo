<div class="col-lg-11">
    <?php echo $this->session->flashdata('message');?>
    <a href="<?php echo base_url('/admin/admin/addUsers'); ?>" class="btn btn-success" role="button">Add Users</a>
    <br>
    <br>
                                <div class="main-card mb-5 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Data Laporan</h5>
                                        <div class="table-responsive">
                                            <table class="mb-0 table">
                                                <thead>
                                                <tr>
                                                    <th>Kerusakan</th>
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
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>