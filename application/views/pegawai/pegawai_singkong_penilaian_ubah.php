<div class="">
    <div class="row col-md-9 page-title">
        <div class="title_left">
            <h3>Selamat Datang Pegawai,</h3>
        </div>
    </div>
    <div class="clearfix"></div>

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
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Formulir Ubah Data Penilaian Singkong<small> Mohon isi data dengan benar</small></h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form role="form" method="post" id="registrationForm" action="<?php echo base_url() ?>controller_pegawai/c_pegawai_singkong/simpan_edit_penilaian" class="form-horizontal form-label-left">
                        <p>Detail Data Penilaian Lama :</p>
                        <?php
                        $index = 1;
                        foreach ($data_lama->result_array()as $value) {
                            ?>
                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo $value['kriteria'] ?></label>
                                <label class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <p style="text-align: left" class="control-label col-md-2 col-sm-2 col-xs-12"> <?php echo $value['sub_kriteria'] ?> </p>
                                <label class="control-label col-md-1 col-sm-1 col-xs-12"> ID_Detail : </label>
                                <div class="col-md-1 col-sm-1 col-xs-12">
                                    <input name="<?php echo "detail_" . $index ?>" class="form-control col-md-7 col-xs-12" value="<?php echo $value["id_detail_periksa"]; ?>" required="required" readonly>
                                </div>
                            </div>
                            <?php
                            $index++;
                        }
                        ?>
                        <div class="ln_solid"></div>
                        <p>Penilaian Baru Data Singkong :</p>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Periksa  : </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="id_periksa" class="form-control col-md-2 col-xs-12" value="<?php echo $value["id_periksa"]; ?>" required="required" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="control-label col-md-12 col-sm-12 col-xs-12" style="color: tomato; text-align: center">______________________________________________________________________________________________</p>
                        </div>
                        <br>

                        <?php
                        $index = 1;
                        foreach ($kriteria->result_array()as $value) {
                            ?>
                            <div class="form-group">
                                <label  class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $value['kriteria'] ?></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">    
                                    <select name="<?php echo"nilai_kriteria_" . $index ?>" class="form-control" required>
                                        <option value=""> ----- pilih salah satu -----</option>
                                        <?php
                                        foreach ($sub_kriteria->result_array() as $key) {
                                            if ($key['id_kriteria'] == $value['id_kriteria']) {
                                                echo "<option value =" . $key['id_sub_kriteria'] . ">" . $key['sub_kriteria'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div> 
                            </div>
                            <?php
                            $index++;
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button style="width: 200px" name="submit" type="submit" class="btn btn-success">Submit</button>                
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