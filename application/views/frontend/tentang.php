<?php include "header.php"?>



    <div class="row">
    <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading">


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Ikut Donasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    if($this->session->userdata('id_pengguna')!=null){
                        ?>
                <div class="modal-body">

                    <form action="<?= site_url("donatur/donatur/".$kampanye['id_kampanye'])?>" method="POST">
                        <div class="form-group">
                            <label>Nama Bank</label>
                            <select class="form-control" name="id_bank" required>
                                <!--                        <option>--Pilih Kategori--</option>;-->
                                <?php
                                foreach ($bank->result() as $key) {
                                    echo "<option value='$key->id_bank'>$key->nama_bank</option>";
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="jum_transfer" class="form-control" required="">
                        </div>


                        <label>Sembunyikan Nama ? <input type="checkbox" name="sembunyi" value="Y" ></label>


                        <div class="modal-footer">
                            <button type="submit" name="submit" class="primary-button causes-donate">Donasi</button>
                        </div>
                    </form>
                </div>

            <?php
                        }
                        else{
                        ?>
                            <div class="modal-body">
                            <label>Anda Harus Login Terlebih Dahulu</label>
                                <br>
                                <a class = "primary-button causes-donate" href="<?= base_url()?>login">Login</a>
                            </div>
                        <?php
                        }
                ?>
            </div>
        </div>
    </div>




    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- MAIN -->
                <main id="main" class="col-md-9">
                    <p align="center" style="background: aquamarine;border-radius: 5px"><?php echo $this->session->flashdata('msg');?></p>
                    <!-- article -->
                    <div class="article causes-details">
                        <!-- article img -->
                        <div class="article-img">
                            <img width = "360px" height = "400px" src="<?= base_url().$kampanye['foto_kampanye']?>" alt="">
                        </div>
                        <!-- article img -->

                        <!-- causes progress -->
                        <div class="clearfix">
                            <div class="causes-progress">
                                <div>
                                    <span class="causes-raised">Terkumpul: <strong>Rp. <?= $kampanye['dana_terkumpul']?></strong></span>
                                    <span class="causes-goal">Target: <strong>Rp. <?= $kampanye['target_donasi']?></strong></span>
                                </div>
                            </div>
                            <button type="button" class="primary-button causes-donate" data-toggle="modal" data-target="#exampleModal">
                                Donasi
                            </button>
                        </div>
                        <!-- /causes progress -->

                        <!-- article content -->
                        <div class="article-content">
                            <!-- article title -->
                            <h2 class="article-title"><?= $kampanye['nama_kampanye']?></h2>
                            <!-- /article title -->

                            <!-- article meta -->
                            <ul class="article-meta">
                                <li><?= $kampanye['tgl_mulai']?></li>
                            </ul>
                            <!-- /article meta -->

                            <p><?= $kampanye['deskripsi']?></p>

                        </div>
                        <!-- /article content -->

                        <!-- article tags share -->
                        <div class="article-tags-share">
                            <!-- article tags -->
                            <ul class="tags">
                                <li>TAGS:</li>
                                <?php
                                foreach ($kategori->result() as $k){
                                    if($k->id_kategori == $kampanye['id_kategori']){
                                        ?>
                                        <li><a href="#"><?= $k->nama_kategori?></a></li>
                                        <?php
                                    }

                                }
                                ?>


                            </ul>
                            <!-- /article tags -->

                            <!-- article share -->

                            <!-- /article share -->
                        </div>
                        <!-- /article tags share -->

                        <!-- article reply form -->

                        <!-- /article reply form -->
                    </div>
                    <!-- /article -->
                </main>
                <!-- /MAIN -->

                <!-- ASIDE -->
                <aside id="aside" class="col-md-3">
                    <!-- posts widget -->
                    <div class="widget">
                        <br/>
                        <h3 class="widget-title">Donatur(<?= $listdonatur->num_rows()?>)</h3>
                    <?php
                    foreach ($listdonatur->result() as $key){
                        $pengguna = $this->model_pengguna->get_one($key->id_pengguna)->row_array();

                        ?>

                        <!-- single post -->
                        <div class="widget-post">
                            <a href="#">
                                <div class="widget-img">
                                    <img width="60px" height="60px" src="<?= base_url()?>assets/charity2/img/background-1.jpg" alt="">
                                    <?php
                                    if($key->tampil_nama == "Y"){
                                        ?>
                                        <br><a>By : <?= $pengguna['nama']?></a><br>
                                        <?php
                                    }else{
                                        ?>
                                        <br><a>By : Annonymous</a><br>
                                        <?php
                                    }
                                    ?>
                                    <a>Time : <?= $key->tgl_donasi?></a>
                                    <br>
                                    <a>Jumlah : <?= $key->jum_transfer+$key->id_donatur?></a>
                                </div>
                            </a>
                        </div>
                        <!-- /single post -->
                        <?php
                    }
                    ?>

                    </div>
                    <!-- /posts widget -->

                    <!-- causes widget -->
<!--                    <div class="widget">-->
<!--                        <h3 class="widget-title">Donatur</h3>-->

                        <!-- single causes -->
<!--                        <div class="widget-causes">-->
<!--                            <a href="#">-->
<!--                                <div class="widget-img">-->
<!--                                    <img src="./img/widget-1.jpg" alt="">-->
<!--                                </div>-->
<!--                                <div class="widget-content">-->
<!--                                    Possit nostro aeterno eu vis, ut cum quem reque-->
<!--                                    <div class="causes-progress">-->
<!--                                        <div class="causes-progress-bar">-->
<!--                                            <div style="width: 64%;"></div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div>-->
<!--                                <span class="causes-raised">Raised: <strong>52.000$</strong></span> --->
<!--                                <span class="causes-goal">Goal: <strong>90.000$</strong></span>-->
<!--                            </div>-->
<!--                        </div>-->
                        <!-- /single causes -->

                        <!-- single causes -->
<!--                        <div class="widget-causes">-->
<!--                            <a href="#">-->
<!--                                <div class="widget-img">-->
<!--                                    <img src="./img/widget-2.jpg" alt="">-->
<!--                                </div>-->
<!--                                <div class="widget-content">-->
<!--                                    Vix fuisset tibique facilisis cu. Justo accusata ius at-->
<!--                                    <div class="causes-progress">-->
<!--                                        <div class="causes-progress-bar">-->
<!--                                            <div style="width: 75%;"></div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div>-->
<!--                                <span class="causes-raised">Raised: <strong>52.000$</strong></span> --->
<!--                                <span class="causes-goal">Goal: <strong>90.000$</strong></span>-->
<!--                            </div>-->
<!--                        </div>-->
                        <!-- /single causes -->

                        <!-- single causes -->
<!--                        <div class="widget-causes">-->
<!--                            <a href="#">-->
<!--                                <div class="widget-img">-->
<!--                                    <img src="./img/widget-3.jpg" alt="">-->
<!--                                </div>-->
<!--                                <div class="widget-content">-->
<!--                                    Possit nostro aeterno eu vis, ut cum quem reque-->
<!--                                    <div class="causes-progress">-->
<!--                                        <div class="causes-progress-bar">-->
<!--                                            <div style="width: 53%;"></div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            <div>-->
<!--                                <span class="causes-raised">Raised: <strong>52.000$</strong></span> --->
<!--                                <span class="causes-goal">Goal: <strong>90.000$</strong></span>-->
<!--                            </div>-->
<!--                        </div>-->
                        <!-- /single causes -->
<!--                    </div>-->
                    <!-- causes widget -->
                </aside>
                <!-- /ASIDE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
	<!-- CTA -->
	<div id="cta" class="section">
		<!-- background section -->
		<div class="section-bg" style="background-image: url(<?= base_url()?>assets/charity2/img/background-1.jpg);" data-stellar-background-ratio="0.5"></div>
		<!-- /background section -->


	<!-- BLOG -->
<?php
    include "footer.php"
?>