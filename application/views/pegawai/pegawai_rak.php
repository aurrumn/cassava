<div class="">
    <div class="row col-md-9 page-title">
        <div class="title_left">
            <h3>Selamat Datang Pegawai,</h3>
        </div>
    </div>
    <div class="clearfix"></div>


    <!-- tabel rak jamur -->
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
            <strong><?php echo $this->session->flashdata('message'); ?></strong> 
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabel Rak Jamur<small> Menampilkan Semua Data Rak</small>
                    </h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    
                <a style="font-size:18px; color:green" href="<?php echo base_url(); ?>c_pendaftaran_rak" style="color:white" class="to_register"><button type="button" class="btn btn-success"><i class="fa fa-form">Daftarkan Rak</button></a>
                    <br>
                    <table style="text-align: center" id="tabel_rak" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr>
                                <th style="width: 7%; text-align: center">No</th>
                                <!--<th style="width: 10%;text-align: center">ID rak</th>-->
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Lokasi</th>
                                <th style="text-align: center">Tanggal Pembuatan</th>
                                <th style="text-align: center">Status Keaktifan</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_rak as $value) {
                                ?>
                                <tr>
                                    <td style="vertical-align: middle"><?php echo $no++ ?></td>
                                    <!--<td><?php echo $value['id_rak'] ?></td>-->
                                    <td style="vertical-align: middle"><?php echo $value['nama_rak'] ?></td>
                                    <td style="vertical-align: middle"><?php echo $value['lokasi'] ?></td>
                                    <td style="vertical-align: middle"><?php echo $value['tgl_rak'] ?></td>
                                    <td style="vertical-align: middle"><?php echo $value['status'] ?></td>
                                    <td style="vertical-align: middle">
                                        <?php if ($value['aksi'] == 1) { ?>
                                            <a href="#" onclick="go_edit_rak(<?php echo $value['id_rak'] ?>)"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_edit_data_rak"><i class="fa fa-edit"></i> Edit Data</button></a>
                                            <a class="btn btn-danger" style="color: white" href="<?php echo base_url() . "controller_pegawai/c_pegawai_rak/non_Aktifkanrak/" . $value['id_rak']; ?>"><i class="fa fa-power-off"></i> Non-Aktifkan</a>
                                            <br>
                                            <form role="form" method="post" id="registrationForm" action="<?php echo base_url() . "controller_pegawai/c_pegawai_jamur/tambah_jamur/" . $value['id_rak']; ?>" class="form-horizontal form-label-left">
                                                <div class="form-group">
                                                    <label class="control-label col-md-5 col-sm-5 col-xs-12" for="id_rak">Berat Jamur</label>
                                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                                        <input style="width: 130px" type="number" id="berat_jamur" name="berat_jamur" required="required" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <button style="width: 85%"  name="submit" type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                                <!--<div class="ln_solid"></div>-->
                                            </form>
                                        <?php } else {
                                            ?>
                                            <a class="btn btn-success" style="color: white" href="<?php echo base_url() . "controller_pegawai/c_pegawai_rak/aktifkanrak/" . $value['id_rak']; ?>"><i class="fa fa-power-off"></i> Aktifkan</a>
                                        <?php }
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
        <p class="pull-right">Sistem Informasi Spesifikasi Kualitas Jamur Tiram |
            <span class="lead"> <i class="fa fa-tree"></i> SI Jamur Tiram</span>
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




<!-- modal edit data rak -->

<script type="text/javascript">
    $(document).ready(function () {
        $("#modal_edit_data_rak").on("hidden.bs.modal", function () {
            $(this).find('form')[0].reset();
        });
    });
</script>

<script type="text/javascript">
    function go_edit_rak(id)
    {

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('controller_pegawai/c_pegawai_rak/ajax_get_data_rak/') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (data)
            {
                $('[name="id_rak"]').val(data.id_rak);
                $('[name="nama-rak"]').val(data.nama_rak);
                $('[name="lokasi"]').val(data.lokasi);
                $('[name="tgl-rak"]').val(data.tgl_rak);
                $('#modal_edit_data_rak').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data rak'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
</script>


<div id="modal_edit_data_rak" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">�</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <h4><small>Mohon isi data sesuai dengan ketentuan</small></h4><br>
                <form role="form" method="post" id="registrationForm" action="<?php echo base_url(); ?>controller_pegawai/c_pegawai_rak/edit_data_rak"  class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_rak">ID RAK
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nama-rak" name="id_rak" required="required" class="form-control col-md-7 col-xs-12" readonly>
                            <p style="color: tomato">Id rak tidak dapat dirubah</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama-rak">Nama Rak <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nama-rak" name="nama-rak" required="required" class="form-control col-md-7 col-xs-12" readonly>
                            <p style="color: tomato">Nama rak tidak dapat dirubah</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi">Lokasi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lokasi" name="lokasi" required="required" class="form-control col-md-7 col-xs-12">
                            <p style="color: tomato">lokasi rak minimal 5 huruf, maksimal 100 huruf termasuk spasi</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">tanggal <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">    
                            <input id="tgl-rak" name="tgl-rak" class="form-control col-md-7 col-xs-12"  required="required" type="text" name="tgl-rak">
                            <p style="color: tomato">minimal 11 digit, maksimal 13 digit</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button style="width: 200px" name="submit" type="submit" class="btn btn-success">Submit</button>                
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batalkan</button>
                        </div>
                    </div>  
                    <!--<div class="ln_solid"></div>-->
                </form>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
            </div>

        </div>
    </div>
</div>