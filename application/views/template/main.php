<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pelindo</title>
    
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Pelindo" />
      <meta name="keywords" content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes">
      <!-- Favicon icon -->
      <link rel="icon" href="<?php echo base_url('assets/template/assets/images/favicon.ico')?>" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/template/assets/css/bootstrap/css/bootstrap.min.css')?>">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/template/assets/icon/themify-icons/themify-icons.css')?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/template/assets/icon/font-awesome/css/font-awesome.min.css')?>">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/template/assets/icon/icofont/css/icofont.css')?>">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/template/assets/css/style.css')?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/template/assets/css/jquery.mCustomScrollbar.css')?>">
  </head>

  <body>
      
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <!-- menu header -->
            <?php $this->load->view('header/header'); ?> 

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    
                    <!-- menu sideba -->
                    <?php $this->load->view('sidebar/sidebar'); ?> 

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                      <div class="row">
                                            <?php 
                                                if(!empty($content)){
                                                echo $content;
                                            }
                                            ?>

                                        </div>
                                    </div>

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="<?php echo base_url('assets/template/assets/js/jquery/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/assets/js/jquery-ui/jquery-ui.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/assets/js/popper.js/popper.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/assets/js/bootstrap/js/bootstrap.min.js')?>"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo base_url('assets/template/assets/js/jquery-slimscroll/jquery.slimscroll.js')?>"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?php echo base_url('assets/template/assets/js/modernizr/modernizr.js')?>"></script>
<!-- am chart -->
<script src="<?php echo base_url('assets/template/assets/pages/widget/amchart/amcharts.min.js')?>"></script>
<script src="<?php echo base_url('assets/template/assets/pages/widget/amchart/serial.min.js')?>"></script>
<!-- Chart js -->
<script type="text/javascript" src="<?php echo base_url('assets/template/assets/js/chart.js/Chart.js')?>"></script>
<!-- Todo js -->
<script type="text/javascript " src="<?php echo base_url('assets/template/assets/pages/todo/todo.js')?>"></script>
<!-- Custom js -->
<script type="text/javascript" src="<?php echo base_url('assets/template/assets/pages/dashboard/custom-dashboard.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/template/assets/js/script.js')?>"></script>
<script type="text/javascript " src="<?php echo base_url('assets/template/assets/js/SmoothScroll.js')?>"></script>
<script src="<?php echo base_url('assets/template/assets/js/pcoded.min.js')?>"></script>
<script src="<?php echo base_url('assets/template/assets/js/vartical-demo.js')?>"></script>
<script src="<?php echo base_url('assets/template/assets/js/jquery.mCustomScrollbar.concat.min.js')?>"></script>
</html>
