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

    <!-- looping untuk menampilkan data -->
    <?php
    $id_singkong;
    $id_petani;
    $berat;
    $nama_petani;
    $tanggal_masuk;
    foreach ($detail_singkong->result_array() AS $rowt) {
        $id_singkong = $rowt['id_singkong'];
        $id_petani = $rowt['id_petani'];
        $berat = $rowt['berat'];
        $tanggal_masuk = $rowt['tanggal_masuk'];
        $nama_petani = $rowt['nama_petani'];
    }
    ?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Formulir Edit Data Singkong<small> Mohon isi data dengan benar</small></h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form role="form" method="post" id="registrationForm" action="<?php echo base_url(); ?>controller_pegawai/c_pegawai_singkong/simpan_perubahan_data_singkong"  class="form-horizontal form-label-left">
                        <p>Detail Data Singkong :</p>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_singkong">ID Singkong
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="id_singkong" name="id_singkong" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $id_singkong ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_petani_old">ID Petani
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="id_petani_old" name="id_petani_old" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $id_petani ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_petani">Nama Petani
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nama_petani" name="nama_petani" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nama_petani; ?>" readonly>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <p>Update Data Singkong :</p>
                        <div class="form-group">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Nama Petani</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                <select name="id_petani_new" class="form-control">
                                    <option value="0"> ----- pilih nama petani -----</option>
                                    <?php
                                    foreach ($list_petani->result_array() as $key) {
                                        echo "<option value =" . $key['id_petani'] . ">" . $key['nama_petani'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <p style="color: tomato">jika tidak ada perubahan pada nama petani, makadata lama akan diinputkan kembali</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">Berat Singkong <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                <input id="berat" name="berat" class="form-control col-md-7 col-xs-12" value="<?php echo $berat; ?>" required="required" type="number">
                                <p style="color: tomato">1 - 4 digit</p>
                            </div>
                        </div>

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