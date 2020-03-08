
    <div class="col-md-12 col-lg-12">

        <a href="<?php echo base_url('/ticket/ticket/addTicket'); ?>" class="btn btn-success" role="button">Add Ticket</a>
        </button>
        <br>
        <br>
        <div class="mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Ticket</h5>
                <div class="table-responsive">
                    <table class="mb-0 table">
                       <thead>
                            <tr>
                                <th>Number</th>
                                <th>ID_TICKET</th>
                                <th>ID_TICKET_DETAILS</th>
                                <th>TOKEN</th>
                                <th>STATUS</th>
                                <th>CREATED_AT</th>
                                <th>UPDATED_AT</th>
                                <th>DETAIL TICKET</th>
                            </tr>
                        </thead>
                        <?php 
                        $no = 1;
                        foreach($ticket1->result() as $u){ 
                            if($u->STATUS == 1)
                            {
                                $status = 'Menunggu Verifikasi';
                            }
                            elseif ($u->STATUS == 2) 
                            {
                                $status = 'Progress PIC';
                            }
                            elseif ($u->STATUS == 3) 
                            {
                                $status = 'Menunggu Feedback';
                            }
                            else {
                                $status = 'Selesai';
                            }
                            ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $u->ID_TICKET ?></td>
                                <td><?php echo $u->ID_TICKET_DETAILS ?></td>
                                <td><?php echo $u->TOKEN ?></td>
                                <td><?php echo $status ?></td>
                                <td><?php echo $u->CREATED_AT ?></td>
                                <td><?php echo $u->UPDATED_AT ?></td>
                                <td><a href="<?php echo base_url ('/ticket/ticket/detailTicket/'.$u->ID_TICKET_DETAILS);?>" class="btn btn-success">LIHAT DETAIL</a></td>
                            </tr>
                        </tbody>

                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="col-md-12 col-lg-12">
                    <!-- <a href="<?php echo base_url('/admin/admin/addTicket'); ?>" class="btn btn-success" role="button">Add Ticket</a> -->
                    <br>
                    <br>
                    <div class="mb-3 card">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Ticket</h5> -->
                            <div class="table-responsive">
                                <table class="mb-0 table">
                                   <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>ID_TICKET_DETAILS</th>
                                            <th>ID_TYPE_DEMAGES</th>
                                            <th>ID_USERS</th>
                                            <th>SUBJECT</th>
                                            <th>DESCRIPTION</th>
                                            <th>IMAGE</th>
                                            <th>CREATED_AT</th>
                                            <th>UPDATED_AT</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    $no = 1;
                                    foreach($data as $a){ 
                                        ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $a->ID_TICKET_DETAILS ?></td>
                                            <td><?php echo $a->ID_TYPE_DEMAGES ?></td>
                                            <td><?php echo $a->ID_USERS ?></td>
                                            <td><?php echo $a->SUBJECT ?></td>
                                            <td><?php echo $a->DESCRIPTION ?></td>
                                            <td><?php echo $a->IMAGE ?></td>
                                            <td><?php echo $a->CREATED_AT ?></td>
                                            <td><?php echo $a->UPDATED_AT ?></td>
                                        </tr>
                                    </tbody>

                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        
    </div>