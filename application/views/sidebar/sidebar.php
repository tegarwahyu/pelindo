<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        
        <?php if($this->session->userdata('akses')=='2') { ?>  <!-- admin --> 
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="<?php echo base_url('/admin/admin'); ?>">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded">
                <a href="<?php echo base_url('/admin/admin/'); ?>">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Master</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded">
                <a href="<?php echo base_url('/admin/admin/priority'); ?>">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Prioritas</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded-hasmenu">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Kerusakan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="<?php echo base_url('kerusakan/Detail_Kerusakan')?>">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Detail Kerusakan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="<?php echo base_url('kerusakan/Jenis_Kerusakan')?>">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Jenis Kerusakan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <li class="pcoded">
                <a href="<?php echo base_url('users/users/addPelaporbyUser')?>">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Pelaporan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li> -->
            <li class="pcoded">
                <a href="<?php echo base_url('/ticket/ticket/index'); ?>">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Pelaporan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded">
                <a href="<?php echo base_url('/users/users/index'); ?>">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Persetujuan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
        </ul>
        <?php } elseif ($this->session->userdata('akses')=='3') { ?> <!-- pelapor -->
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
        <ul class="pcoded-item pcoded-left-item">
            <?php if($this->session->userdata("position") == 'ketua'){ ?>
            <li class="active">
                <a href="<?php echo base_url('/users/users/index'); ?>">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded">
                <a href="<?php echo base_url('/users/users/index'); ?>">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Pelaporan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <?php }else{ ?>
            <li class="active">
                <a href="<?php echo base_url('/ticket/ticket/index'); ?>">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded">
                <a href="<?php echo base_url('/ticket/ticket/index'); ?>">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Pelaporan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <?php } ?>
            
        </ul>
        <?php } elseif ($this->session->userdata('akses')=='4') { ?>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="<?php echo base_url('/admin/admin'); ?>">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded-hasmenu">
                <a href="#">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Kerusakan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="<?php echo base_url('kerusakan/Detail_Kerusakan')?>">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Detail Kerusakan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="<?php echo base_url('kerusakan/Jenis_Kerusakan')?>">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Jenis Kerusakan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded">
                <a href="<?php echo base_url('/ticket/ticket/index'); ?>">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Pelaporan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
        </ul>
        <?php } ?>
    </div>
</nav>