<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>|  THE CASSAVA | </title>

        <!-- Bootstrap core CSS -->

        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url() ?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/css/icheck/flat/green.css" rel="stylesheet">


        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>
    <style type="text/css">
        body{
            margin: 0;
            padding: 0;
            background-image:url('<?php echo base_url(); ?>assets/images/loginbcrev.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
    <body>

        <div class="">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div class="col-md-8 text"></div>
            <div class="col-md-4">
                <div id="wrapper">
                    <div id="login" class="animate form" style="background-color:rgba(0,0,0,0.8);height:700px; padding:18px" >
                        <section class="login_content">
                            <form role="form" method="post" style="color:white" action="<?php echo base_url(); ?>c_login/masuksistem">
                                <br>
                                <h1 style="font-size:40px"><i class="fa fa-leaf" style="font-size:30px;"></i><br><br>
                                    THE CASSAVA
                                </h1>
                                <h4>--- Login Form ---</h4>

                                <div>
                                    <input name="username" type="text" class="form-control" placeholder="username" >
                                </div>

                                <div>
                                    <input name="password" type="password" class="form-control" placeholder="password" >
                                </div><!--
                                -->
                                <div>
                                    <button class="btn btn-warning" type="submit">
                                        <i class="fa fa-sign-in"></i>    | MASUK SISTEM
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                                <div class="separator">

                                    <p style="font-size:14px" class="change_link">Petani Singkong Baru ? 
                                        <a style="font-size:18px; color:white" href="<?php echo base_url(); ?>c_pendaftaran_petani" style="color:white" class="to_register">Daftarkan Petani</a>
                                    </p>
                                    <p style="font-size:13px" class="change_link">Kabar Singkong Anda? 
                                        <a style="font-size:16px; color:white" href="<?php echo base_url(); ?>c_lihat_singkong" style="color:white" class="to_register">Lihat Data Singkong</a>
                                    </p>
                                    <div class="clearfix"></div>
                                    <div>
                                        <h1><i class="fa fa-thumbs-o-up" style="font-size: 26px;"></i> SELAMAT DATANG</h1>
                                        <p>©2018 Hak Cipta Dilindungi</p>
                                        <br>
                                        <?php
                                        if ($this->session->flashdata('message') != null) {
                                            ?>
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <strong>MESSAGE : </strong> <?php echo $this->session->flashdata('message'); ?>
                                            </div>
                                        <?php } ?>  
                                    </div>
                                </div>
                            </form>
                            <!-- form -->
                            <?php
                            if ($this->session->flashdata('message_daftar') != null) {
                                ?>
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                    <strong>BERHASIL | </strong> <?php echo $this->session->flashdata('message_daftar'); ?>
                                </div>
                            <?php } ?>  
                        </section>
                        <!-- content -->
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>