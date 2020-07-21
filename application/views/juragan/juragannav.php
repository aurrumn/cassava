<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a class="site_title"><i class="fa fa-leaf"></i><span>  THE CASSAVA</span></a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="<?php echo base_url(); ?>assets/images/bospic.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome Juragan,</span>
                <h2><?php echo $this->session->userdata('nama_user') ?></h2>
            </div>
        </div>
        <!-- /menu prile quick info -->

        <br><br><br><hr>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3>MENU Juragan ---------------------------</h3>
                <ul class="nav side-menu">
                    <li><a href="<?php echo base_url(); ?>controller_juragan/c_juragan_petani"><i class="fa fa-users"></i> Petani <span class="fa fa-chevron-right"></span></a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>controller_juragan/c_juragan_data_kriteria"><i class="fa fa-folder-open"></i> Data Kriteria <span class="fa fa-chevron-right"></span></a>
                        
                    </li>
                    <li><a><i class="fa fa-user"></i> Data Pegawai <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?php echo base_url();?>controller_juragan/c_juragan_pegawai">Lihat Data Pegawai</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>controller_juragan/c_juragan_pegawai_tambah">Tambah Data Pegawai</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-pagelines"></i> Data Singkong <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="<?php echo base_url(); ?>controller_juragan/c_juragan_core">Data Promethee</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo base_url(); ?>assets/images/bospic.png" alt=""><?php echo $this->session->userdata('nama_user') ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        <li>
                            <a href="<?php echo base_url(); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

</div>
<!-- /top navigation -->