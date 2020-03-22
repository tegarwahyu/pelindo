<!-- order-card start -->
<div class="col-md-12 col-lg-12">
    <div class="card">
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
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

<script>
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Grafik Pelaporan"
            },
            axisY: {
                title: "Jumlah Ticket/Pelaporan",
                includeZero: true
            },
            data: [{        
                type: "column",  
                showInLegend: true, 
                legendMarkerColor: "grey",
                legendText: "Ticket Status",
                dataPoints: [      
                    { y:  <?php foreach($simpan1 as $a) echo $a->JUMLAH; ?> , label: "Menunggu Verifikasi Ketua Div" },
                    { y:  <?php foreach($simpan2 as $a) echo $a->JUMLAH; ?> , label: "Progress PIC" },
                    { y:  <?php foreach($simpan3 as $a) if(empty($a->JUMLAH)) echo 0; else echo $a->JUMLAH;  ?> , label: "Menunggu Feedback User" },
                     { y:  <?php foreach($simpan4 as $a) if(empty($a->JUMLAH)) echo 0; else echo $a->JUMLAH;  ?> , label: "Selesai" } 
                ]
            }]
        });
        chart.render();
    }
</script>


