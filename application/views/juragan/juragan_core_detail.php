<div class="">
    <div class="row col-md-9 page-title">
        <div class="title_left">
            <h3>Selamat Datang Juragan,</h3>
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
                    <h2>Detail Data Singkong & Penilaian Promethee <small> | Menampilkan detail data singkong lengkap dengan data penilaian singkong dan penilaian Promethee</small></h2>
                    <ul class="nav navbar-right">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br><br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <p style="font-size: 22px"><i class="fa fa-leaf"> | Detail Data Singkong </i></p>
                            <div class="ln_solid" style="width: 50%"></div>

                            <!-- detail singkong -->
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - ID Singkong </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $id_singkong ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Berat Singkong  </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $berat ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Tanggal Masuk  </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $tanggal_masuk ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Status Singkong  </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $status ?>
                                </div>
                            </div>
                            .
                            <!-- detail petani -->
                            <p style="font-size: 22px"><i class="fa fa-user"> | Detail Data Petani </i></p>
                            <div class="ln_solid" style="width: 50%"></div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Nama Petani  </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $petani ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Alamat Petani  </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $alamat_petani ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Telepon Petani  </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $telepon_petani ?>
                                </div>
                            </div>
                            .<!-- detail petugas -->
                            <p style="font-size: 22px"><i class="fa fa-gavel"> | Detail Data Petugas </i></p>
                            <div class="ln_solid" style="width: 50%"></div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Petugas  </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $petugas ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Kontak Petugas  </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $telepon_petugas ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <!-- detail penilaian -->
                            <p style="font-size: 22px"><i class="fa fa-check-square-o"> | Detail Kriteria Singkong :</i></p>
                            <div class="ln_solid" style="width: 50%"></div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - ID Penilaian  </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $id_periksa; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Tanggal Penilaian  </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $tanggal_periksa; ?>
                                </div>
                            </div>
                            <?php
                            $index = 1;
                            foreach ($nama_kriteria->result_array()as $value) {
                                ?>
                                <div class="form-group">
                                    <label style="font-size: 16px"  class="control-label col-md-4 col-sm-4 col-xs-12"><?php echo $value['kriteria'] ?></label>
                                    <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <?php
                                        foreach ($detail_penilaian->result_array() as $key) {
                                            if ($key['id_kriteria'] == $value['id_kriteria']) {
                                                ?>
                                                <p style="font-size: 16px" ><?php echo $key['sub_kriteria'] ?>
                                                    <?php
                                                }
                                            }
                                            ?>
                                    </div>
                                </div>
                                <?php
                                $index++;
                            }
                            ?>
                           .
                            <!-- detail Promethee -->
                            <p style="font-size: 22px"><i class="fa fa-lightbulb-o"> | Detail Penghitungan Promethee :</i></p>
                            <div class="ln_solid" style="width: 50%"></div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - ID Promethee  </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $id_promethee; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Tanggal Penghitungan  </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $tanggal_promethee; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Leaving Flow </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $leaving_flow; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Entering Flow </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $entering_flow; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Nilai Promethee </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $nilai_promethee; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Petugas </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $petugas_promethee; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Alamat Petugas </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $alamat_petugas_promethee; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px" class="control-label col-md-4 col-sm-4 col-xs-12"> - Telepon Petugas </label>
                                <label style="font-size: 16px" class="control-label col-md-1 col-sm-1 col-xs-12"> : </label>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <p style="font-size: 16px" ><?php echo $telepon_petugas_promethee; ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
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