<div class="">
    <div class="row col-md-9 page-title">
        <div class="title_left">
            <h3>Selamat Datang Pegawai,</h3>
        </div>
    </div>
    <div class="clearfix"></div>


    <!-- Data Diri-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Diri Pegawai 
                        <small>Menampilkan Data Diri 
                            <strong> <?php
                                foreach ($data_diri->result_array() AS $rowt) {
                                    $nama_user = $rowt['nama'];
                                } echo $nama_user;
                                ?> </strong>
                        </small></h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                        <div class="profile_img">

                            <!-- end of image cropping -->
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <div class="avatar-view" title="Change the avatar">
                                    <img src="<?php echo base_url(); ?>assets/images/maleemp.png" alt="Avatar">
                                </div>
                                <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                            </div>
                            <!-- end of image cropping -->

                        </div>

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                        <?php
                        $id_user;
                        $username;
                        $nama;
                        $alamat;
                        $telephone;
                        $mulai_kerja;
                        foreach ($data_diri->result_array() AS $rowt) {
                            $id_user = $rowt['id_user'];
                            $username = $rowt['username'];
                            $nama = $rowt['nama'];
                            $alamat = $rowt['alamat'];
                            $telephone = $rowt['telephone'];
                            $mulai_kerja = $rowt['mulai_kerja'];
                        }
                        ?> 
                        <div class="profile_title">
                            <div class="col-md-6">
                                <h2>Data Diri Pegawai</h2>
                            </div>
                        </div>
                        <div class="x_content">
                            <div class="form-group">
                                <h4 style="text-align: right"class="control-label col-md-3 col-sm-2 col-xs-12">   ID USER  : </h4>
                                <div class="col-md-9 col-sm-10 col-xs-12">
                                    <h4 class="col-md-7 col-xs-12" ><?php echo $id_user; ?></h4>
                                </div>
                            </div> 
                            <div class="form-group">
                                <h4 style="text-align: right"class="control-label col-md-3 col-sm-2 col-xs-12">   USERNAME  : </h4>
                                <div class="col-md-9 col-sm-10 col-xs-12">
                                    <h4 class="col-md-7 col-xs-12" ><?php echo $username; ?></h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <h4 style="text-align: right"class="control-label col-md-3 col-sm-2 col-xs-12">   NAMA ASLI  : </h4>
                                <div class="col-md-9 col-sm-10 col-xs-12">
                                    <h4 class="col-md-7 col-xs-12" ><?php echo $nama; ?></h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <h4 style="text-align: right"class="control-label col-md-3 col-sm-2 col-xs-12">   ALAMAT  : </h4>
                                <div class="col-md-9 col-sm-10 col-xs-12">
                                    <h4 class="col-md-7 col-xs-12" ><?php echo $alamat; ?></h4>
                                </div>
                            </div> 
                            <div class="form-group">
                                <h4 style="text-align: right"class="control-label col-md-3 col-sm-2 col-xs-12">   TELEPHONE  : </h4>
                                <div class="col-md-9 col-sm-10 col-xs-12">
                                    <h4 class="col-md-7 col-xs-12" ><?php echo $telephone; ?></h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <h4 style="text-align: right"class="control-label col-md-3 col-sm-2 col-xs-12">MULAI KERJA  : </h4>
                                <div class="col-md-9 col-sm-10 col-xs-12">
                                    <h4 class="col-md-7 col-xs-12" ><?php echo $mulai_kerja; ?></h4>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- edit data pegawai -->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Edit Data Diri Pegawai
                        <small> Edit Data Diri 
                            <strong> <?php
                                foreach ($data_diri->result_array() AS $rowt) {
                                    $nama_user = $rowt['nama'];
                                } echo $nama_user;
                                ?> </strong>
                        </small></h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <?php
                if ($this->session->flashdata('message_yey') != null) {
                    ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        </button>
                        <strong> <?php echo $this->session->flashdata('message_yey'); ?></strong>
                    </div>
                <?php } ?> 
                <?php
                    if ($this->session->flashdata('message') != null) {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </button>
                            <strong> <?php echo $this->session->flashdata('message'); ?></strong>
                        </div>
                    <?php } ?> 
                    <?php
                    if (validation_errors() != null) {
                        ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <h4><strong>MESSAGE ERROR : </strong> </h4>
                            <div class="ln_solid"></div>
                            <?php echo validation_errors(); ?>
                        </div>
                        <?php
                    }
                    ?>
                <div class="x_content">
                    <form role="form" method="post" id="registrationForm" action="<?php echo base_url() . "controller_pegawai/c_pegawai_data_diri/edit_data_diri/" . $id_user ?>"  class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Verifikasi User<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" name="old_password" required="required" class="form-control col-md-7 col-xs-12">
                                <p style="color: gray">Masukan password lama untuk verifkasi perubahan data user (DEF:123) </p>
                            </div>
                        </div>
                        <p style="color: tomato; font-size: 13px; text-align: center">PERINGATAN : <br>
                            Edit data pegawai akan merubah data username, password, alamat, dan telepon.
                            Jika data tidak ingin berubah maka inputkan data lama</p>
                        <hr>

                        <div class="form-group">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Username <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                <input id="telepon-kontak" name="username" class="form-control col-md-7 col-xs-12"  required="required" type="text">
                                <p style="color: tomato">Username 5 - 10 karakter</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                <input id="telepon-kontak" name="alamat" class="form-control col-md-7 col-xs-12"  required="required" type="text">
                                <p style="color: tomato">Alamat pegawai, 10 - 30 karakter</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Telephone <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                <input id="telepon-kontak" name="telephone" class="form-control col-md-7 col-xs-12"  required="required" type="text">
                                <p style="color: tomato">minimal 11 digit, maksimal 13 digit</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Password Baru <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                <input id="telepon-kontak" name="new_password" class="form-control col-md-7 col-xs-12"  required="required" type="password">
                                <p style="color: tomato">5 - 10 karakter</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Ketik Ulang Password Baru <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                <input id="telepon-kontak" name="re_type" class="form-control col-md-7 col-xs-12"  required="required" type="password">
                                <p style="color: tomato">5 - 10 karakter</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button style="width: 200px" name="submit" type="submit" class="btn btn-success">Submit</button>                
                            </div>
                        </div> 

                        <div class="ln_solid"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="">
        <p class="pull-right">Sistem Informasi Kualitas Singkong Unggul untuk Pembuatan MOCAF |
            <span class="lead"> <i class="fa fa-leaf"></i> The Cassava</span>
        </p>
    </div>
    <div class="clearfix"></div>
</footer>

