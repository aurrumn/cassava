<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>| THE CASSAVA | </title>

        <!-- Bootstrap core CSS -->

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
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
                        <h1 style="text-align: center"><i class="fa fa-leaf"></i> THE CASSAVA</h1>
                        <div class="x_title">

                        </div>
                        <br>

                        <!-- isi formulir -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h3>Data Supply Singkong <small>| menampilkan semua data singkong</small></h3>
                                        <a style="float: right" href="<?php echo base_url(); ?>">
                                            <br>Kembali Ke Halaman Login <i style="font-size: 22px" class="fa fa-sign-in"></i>
                                        </a>
                                    </div>
                                    <div class="x_content">
                                        <!-- tabel data singkong -->
                                        <table style="text-align: center" id="tabel_singkong" class="table table-striped responsive-utilities jambo_table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 7%; text-align: center">No</th>
                                                    <th style="text-align: center">ID Singkong</th>
                                                    <th style="text-align: center">Nama Petani</th>
                                                    <th style="text-align: center">Alamat Petani</th>
                                                    <th style="text-align: center">Berat Singkong</th>
                                                    <th style="text-align: center">Tanggal Masuk</th>
                                                    <th style="text-align: center">Petugas</th>
                                                    <th style="text-align: center">Status Singkong</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($singkong->result_array() as $value) {
                                                    ?>
                                                    <tr>
                                                        <td style="vertical-align: middle"><?php echo $no++ ?></td>
                                                        <td style="vertical-align: middle"><?php echo $value['id_singkong'] ?></td>
                                                        <td style="vertical-align: middle"><?php echo $value['nama_petani'] ?></td>
                                                        <td style="vertical-align: middle"><?php echo $value['alamat'] ?></td>
                                                        <td style="vertical-align: middle"><?php echo $value['berat'] ?></td>
                                                        <td style="vertical-align: middle"><?php echo $value['tanggal_masuk'] ?></td>
                                                        <td style="vertical-align: middle"><?php echo $value['nama'] ?></td>
                                                        <td style="vertical-align: middle">
                                                            <?php if ($value['status_singkong'] == 1) { ?>
                                                                <strong style="color: gold; font-size: 14px"><?php echo $value['keterangan']; ?></strong>
                                                            <?php } else if ($value['status_singkong'] == 2) { ?>
                                                                <strong style="color: blue; font-size: 14px"><?php echo $value['keterangan']; ?></strong>
                                                            <?php } else if ($value['status_singkong'] == 3) { ?>
                                                                <strong style="color: limegreen; font-size: 14px"><?php echo $value['keterangan']; ?></strong>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>  

                                        <div class="">
                                            <p class="pull-right">Lihat Seluruh Singkong |
                                                <span class="lead"> <i class="fa fa-leaf"></i> THE CASSAVA</span>
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

        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

        <!-- chart js -->
        <!--<script src="<?php echo base_url(); ?>assets/js/chartjs/chart.min.js"></script>-->

        <!-- bootstrap progress js -->
        <script src="<?php echo base_url(); ?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>

        <!-- icheck -->
        <script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>


        <!-- Datatables -->
        <script src="<?php echo base_url(); ?>assets/js/datatables/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/datatables/tools/js/dataTables.tableTools.js"></script>

        <script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#tabel_singkong').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
                    ],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "<?php echo base_url('assets2/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
                    }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>

        <!-- dataTabel untuk tabel Singkong -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('#tabelSingkong').DataTable({
                    "scrollX": true,
                    responsive: true
                });
            });
        </script>
        <script>
            NProgress.done();
        </script>
    </body>
</html>
