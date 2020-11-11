<div class="">
    <div class="row col-md-9 page-title">
        <div class="title_left">
            <h3>Selamat Datang Owner,</h3>
        </div>
    </div>
   


    <!-- tabel rak jamur  -->
    <?php
    if ($this->session->flashdata('message') != null) {
        ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong><?php echo $this->session->flashdata('message'); ?></strong> 
        </div>
    <?php } ?>  
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabel Rak Jamur</h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table style="text-align: center" id="tabel_rak" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr>
                                <th style="width: 7%; text-align: center">No</th>
                                <!--<th style="width: 10%;text-align: center">ID rak</th>-->
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Lokasi</th>
                                <th style="text-align: center">Tanggal</th>
                                <th style="text-align: center">Status Keaktifan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_rak as $value) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <!--<td><?php echo $value['id_rak'] ?></td>-->
                                    <td><?php echo $value['nama_rak'] ?></td>
                                    <td><?php echo $value['lokasi'] ?></td>
                                    <td><?php echo $value['tgl_rak'] ?></td>
                                    <td>
                                        <?php if ($value['status'] == 'aktif') { ?>
                                            <strong style="color: limegreen; font-size: 18px">
                                                <?php echo $value['status']; ?></strong>
                                        <?php } else {
                                            ?>
                                            <strong style="color: red" >
                                                <?php echo $value['status']; ?> </strong> 
                                            <?php
                                        }
                                        ?>
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
        <p class="pull-right">Sistem Informasi Spesifikasi Kualitas Jamur Tiram |
            <span class="lead"> <i class="fa fa-tree"></i> SI Jamur Tiram </span>
        </p>
    </div>
    <div class="clearfix"></div>
</footer>

<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/js/datatables/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/tools/js/dataTables.tableTools.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tabelRak').DataTable({
            "scrollX": true,
            responsive: true
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('input.tableflat').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    var asInitVals = new Array();
    $(document).ready(function () {
        var oTable = $('#tabel_rak').dataTable({
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