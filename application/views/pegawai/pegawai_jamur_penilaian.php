<div class="">
    <div class="row col-md-9 page-title">
        <div class="title_left">
            <h3>Selamat Datang Pegawai,</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <!-- looping untuk menampilkan data -->
    <?php
    $id_jamur;
    $id_rak;
    $berat;
    $nama_rak;
    $tanggal_masuk;
    foreach ($detail_jamur->result_array() AS $rowt) {
        $id_jamur = $rowt['id_jamur'];
        $id_rak = $rowt['id_rak'];
        $berat = $rowt['berat'];
        $tanggal_masuk = $rowt['tanggal_masuk'];
        $nama_rak = $rowt['nama_rak'];
    }
    ?>

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
                    <h2>Formulir Penilaian Data Jamur<small> Mohon isi data dengan benar</small></h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form role="form" method="post" id="registrationForm" action="<?php echo base_url() ?>controller_pegawai/c_pegawai_jamur/simpan_penilaian"  class="form-horizontal form-label-left">
                        <p>Detail Data Jamur :</p>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_jamur">ID Jamur
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="id_jamur" name="id_jamur" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $id_jamur ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_rak_old">ID Rak
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="id_rak_old" name="id_rak_old" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $id_rak ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_rak">Nama Rak
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nama_rak" name="nama_rak" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nama_rak; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_rak">Tanggal Masuk
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="tanggal_masuk" name="tanggal_masuk" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $tanggal_masuk; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_rak">Berat jamur <p><small>dalam kilogram</small></p>
                            </label>                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="berat" name="berat" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $berat; ?>" readonly>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <p>Penilaian Data Jamur :</p>
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
                                                echo "<option value =" . $key['id_subkriteria'] . ">" . $key['sub_kriteria'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <?php $index++;
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
        <p class="pull-right">Sistem Informasi Spesifikasi Kualitas Jamur Tiram |
            <span class="lead"> <i class="fa fa-tree"></i> SI Jamur Tiram</span>
        </p>
    </div>
    <div class="clearfix"></div>
</footer>