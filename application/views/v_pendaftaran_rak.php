<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>| SI Jamur Tiram | </title>

        <!-- Bootstrap core CSS -->

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">

         <!--Custom styling plus plugins--> 
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/icheck/flat/green.css" rel="stylesheet">


        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

    <!--- <?php echo base_url(); ?>assets/ -->
        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>
    <body class="nav-md" style="background-color: whitesmoke">

        <div class="container body">

            <div class="main_container">

                <div class="col-md-12" style="padding-left: 25px; padding-right: 25px">
                    <div class="col-middle" role="main">
                        <h1 style="text-align: center"><i class="fa fa-tree"></i> SI Jamur Tiram</h1>
                        <div class="x_title">

                        </div>
                        <br>

                        <!-- isi formulir -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h3>Formulir Pendaftaran <small>| mohon isi semua data</small></h3>
                                        <a style="float: right" href="<?php echo base_url(); ?>controller_pegawai/c_pegawai_rak">
                                            <br>Kembali Ke Halaman Rak Jamur <i style="font-size: 22px" class="fa fa-sign-in"></i>
                                        </a>
                                    </div>
                                    <div class="x_content">

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
                                        <br />
                                        <form role="form" method="post" id="registrationForm" action="<?php echo base_url(); ?>c_pendaftaran_rak/daftar"  class="form-horizontal form-label-left">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama-rak">Nama Rak <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="nama-rak" name="nama-rak" required="required" class="form-control col-md-7 col-xs-12">
                                                    <p style="color: tomato">nama rak minimal 5 - 30 karakter alphanumeric kobinasi tandabaca, termasuk spasi</p>
                                                    <p style="color: tomato">tanda baca yang bisa digunakan adalah . - ( )</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Lokasi <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="lokasi" name="lokasi" required="required" class="form-control col-md-7 col-xs-12">
                                                    <p style="color: tomato">lokasi rak minimal 5 huruf, maksimal 70 huruf termasuk spasi</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                   <!--  <a href="<?php echo base_url() ?>c_pendaftaran_rak/batalDaftar"><button class="btn btn-danger">Cancel</button></a> -->
                                                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>  
                                            <div class="ln_solid"></div>
                                        </form>
                                        <div class="">
                                            <p class="pull-right">Daftarkan rak jamur baru pada |
                                                <span class="lead"> <i class="fa fa-tree"></i> SI Jamur Tiram</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>-->

        <!-- chart js -->
        <!--<script src="<?php echo base_url(); ?>assets/js/chartjs/chart.min.js"></script>-->

        <!-- bootstrap progress js -->
        <!--<script src="<?php echo base_url(); ?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>-->
        <!--<script src="<?php echo base_url(); ?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>-->

        <!-- icheck -->
        <!--<script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>-->

        <!--<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>-->

        <!-- form validation 
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/parsley/parsley.min.js"></script>
        -->
        
        <!-- daterangepicker -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datepicker/daterangepicker.js"></script>

        <script type="text/javascript">

            // script for daterange picker
            $(document).ready(function () {
                $('#tglLahir').daterangepicker({
                    singleDatePicker: true,
                    calender_style: "picker_3",
                    autoclose: true
                }, function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                });
            });
            // ends here

            // script for form validation using data parsley
            // $(document).ready(function () {
            //     $.listen('parsley:field:validate', function () {
            //         validateFront();
            //     });
            //     $('#registrationForm .btn').on('click', function () {
            //         $('#registrationForm').parsley().validate();
            //         validateFront();
            //     });
            //     var validateFront = function () {
            //         if (true === $('#registrationForm').parsley().isValid()) {
            //             $('.bs-callout-info').removeClass('hidden');
            //             $('.bs-callout-warning').addClass('hidden');
            //         } else {
            //             $('.bs-callout-info').addClass('hidden');
            //             $('.bs-callout-warning').removeClass('hidden');
            //         }
            //     };
            // });
            // try {
            //     hljs.initHighlightingOnLoad();
            // } catch (err) {
            // }
            // ends here -----------------------------------
        </script>
    </body>
</html>
