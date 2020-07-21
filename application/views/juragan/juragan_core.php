<div class="">
    <div class="row col-md-9 page-title">
        <div class="title_left">
            <h3>Selamat Datang Juragan,</h3>
        </div>
    </div>
    <div class="clearfix"></div>


    <!-- tabel petani singkong -->
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
    if ($this->session->flashdata('message_gagal') != null) {
        ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong><?php echo $this->session->flashdata('message_gagal'); ?></strong> 
        </div>
    <?php } ?>
    <div class="row">
        
        <!--------------- SEPARATOR --------------->
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabel Data Singkong<small> Menampilkan Semua Promethee Singkong</small></h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <table style="text-align: center" id="tabel_singkong" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr>
                                <th style="width: 7%; text-align: center">ID</th>
                                <th style="text-align: center">Petani</th>
                                <th style="text-align: center">Tanggal <br> Masuk Singkong</th>
                                <th style="text-align: center">Tanggal <br> Penilaian</th>
                                <th style="text-align: center">Tanggal <br> Promethee</th>
                                <th style="text-align: center">Leaving <br> Flow</th>
                                <th style="text-align: center">Entering <br> Flow</th>
                                <th style="text-align: center">Nilai <br> Promethee</th>
                                <th style="text-align: center">Petugas</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($promethee->result_array() as $value) {
                                ?>
                                <tr>
                                    <!--<td style="vertical-align: middle"><?php echo $no++ ?></td>-->
                                    <td style="vertical-align: middle"><?php echo $value['id_promethee'] ?></td>
                                    <td style="vertical-align: middle"><?php echo $value['petani'] ?></td>
                                    <td style="vertical-align: middle"><?php echo $value['tanggal_masuk'] ?></td>
                                    <td style="vertical-align: middle"><?php echo $value['tanggal_penilaian'] ?></td>
                                    <td style="vertical-align: middle"><?php echo $value['tanggal_promethee'] ?></td>
                                    <td style="vertical-align: middle"><?php echo $value['leaving_flow'] ?></td>
                                    <td style="vertical-align: middle"><?php echo $value['entering_flow'] ?></td>
                                    <td style="vertical-align: middle"><?php echo $value['nilai_promethee'] ?></td>
                                    <td style="vertical-align: middle"><?php echo $value['petugas'] ?></td>
                                    <td style="vertical-align: middle">
                                        <a href="<?php echo base_url() . "controller_juragan/c_juragan_core/lihat_detail_promethee/" . $value['id_promethee']; ?>" ><button type="button" class="btn btn-default"><i class="fa fa-eye"></i> | Lihat Detail Data Promethee</button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="">
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
        <p class="pull-right">Sistem Informasi Kualitas Singkong Unggul untuk Pembuatan MOCAF |
            <span class="lead"> <i class="fa fa-leaf"></i> The Cassava</span>
        </p>
    </div>
    <div class="clearfix"></div>
</footer>

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
