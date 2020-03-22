<div class="col-lg-11">
    <?php echo $this->session->flashdata('message');?>
    <br>
    <!-- <?php print_r($ticket);?> --> <!-- belum bisa manmpilkan data ticket(harus relasi) -->
    <br>
                                <div class="main-card mb-5 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Data Laporan</h5>
                                        <div class="table-responsive">
                                            <table class="mb-0 table">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Pelapor</th>
                                                    <th>SUBJECT</th>
                                                    <th>TOKEN</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>STATUS</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                 <?php 
                                                    $no = 1;
                                                    foreach($ticket->result() as $u){ 
                                                        if($u->STATUS == '1')
                                                        {
                                                            $STATUS =  'Menunggu Verifikasi';
                                                        }
                                                        if ($u->STATUS == '2') {
                                                            $STATUS =  'Dalam Pengerjaan';
                                                        }
                                                        ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $u->NAME ?></td>
                                                            <td><?php echo $u->SUBJECT ?></td>
                                                            <td><?php echo $u->TOKEN ?></td>
                                                            <td><?php echo $u->DESCRIPTION ?></td>
                                                            <td><?php echo $STATUS ?></td>
                                                            <?php if($u->STATUS != '1'){?>
                                                            <td>No Action</td>
                                                            <?php }?>
                                                            <?php if($u->STATUS == '1'){ ?>
                                                            <td><a href="<?php echo base_url ('/ticket/ticket/verifikasi_ticket/'.$u->ID_TICKET);?>" class="btn btn-success">VERIFIKASI</a></td> 
                                                            <?php }?>
                                                        </tr>
                                                    </tbody>

                                                    <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>