<div class="">
    <div class="row col-md-9 page-title">
        <div class="title_left">
            <h3>Selamat Datang Juragan,</h3>
        </div>
    </div>
    <div class="clearfix"></div>


    <?php
    if ($this->session->flashdata('message') != null) {
        ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong><?php echo $this->session->flashdata('message'); ?></strong> 
        </div>
    <?php } ?>  

    <?php
    if ($this->session->flashdata('message_error') != null) {
        ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong><?php echo $this->session->flashdata('message_error'); ?></strong> 
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
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Formulir Tambah Data Pegawai<small> Mohon isi data dengan benar</small></h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                   
                    <form role="form" method="post" id="registrationForm" action="<?php echo base_url(); ?>controller_juragan/c_juragan_pegawai_tambah/tambah_pegawai"  class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nama-petani" name="username" required="required" class="form-control col-md-7 col-xs-12">
                                <p style="color: tomato">Username bukan nama asli, 5-8 karakter </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Asli<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="alamat" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                                <p style="color: tomato">Nama lengkap, 3 -  30 karakter</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                <input id="telepon-kontak" name="alamat" class="form-control col-md-7 col-xs-12"  required="required" type="text" name="Alamat">
                                <p style="color: tomato">Alamat pegawai, 10 - 30 karakter</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="1" checked> &nbsp; Pria &nbsp;
                                    </label>
                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="2"> Wanita
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Telephone <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                <input id="telepon-kontak" name="telephone" class="form-control col-md-7 col-xs-12"  required="required" type="text" name="telephone">
                                <p style="color: tomato">minimal 11 digit, maksimal 13 digit</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button style="width: 200px" name="submit" type="submit" class="btn btn-success">Submit</button>
                                 <a href="<?php echo base_url(); ?>controller_juragan/c_juragan_pegawai_tambah"><i class="fa fa-refresh"></i> Batalkan Pedaftaran</a>
                            </div>
                        </div> 
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