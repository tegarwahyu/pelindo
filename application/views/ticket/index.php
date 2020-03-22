
    <div class="col-md-12 col-lg-12">

        <a href="<?php echo base_url('/ticket/ticket/addTicket'); ?>" class="btn btn-success" role="button">Add Ticket</a>
        </button>
        <br>
        <br>
        <div class="mb-3 card">
            <div class="card-body">
                <h5 class="card-title">TABLE TICKET</h5>
                <div class="table-responsive">
                    <table class="mb-0 table">
                       <thead>
                            <tr>
                                <th>Number</th>
                                <th>PELAPOR</th>
                                <th>DESCRIPTION</th>
                                <!-- <th>SUBJECT</th> -->
                                <th>TOKEN</th>
                                <th>STATUS</th>
                                <th>CREATED_AT</th>
                                <!-- <th>UPDATED_AT</th> -->
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
                                <td><?php echo $u->NAME ?></td>
                                <td><?php echo $u->DESCRIPTION ?></td>
                                <!-- <td><?php echo $u->SUBJECT ?></td> -->
                                <td><?php echo $u->TOKEN ?></td>
                                <td><?php echo $status ?></td>
                                <td><?php echo $u->CREATED_AT ?></td>
                                <!-- <td><?php echo $u->UPDATED_AT ?></td> -->
                                <td><a href="<?php echo base_url ('/ticket/ticket/detailTicket/'.$u->ID_TICKET_DETAILS);?>" class="btn btn-success">LIHAT DETAIL</a></td>
                            </tr>
                        </tbody>

                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>