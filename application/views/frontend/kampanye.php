<?php include "header.php"?>


	<!-- CAUSESS -->
	<div id="causes" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-8 col-md-offset-2">
					<div class="section-title text-center">
                        <br><br>
						<h2 class="title">Semua Panti Asuhan</h2>
<!--						<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>-->
					</div>
				</div>
                <!-- NUMBERS -->
                <div id="numbers" class="section">
                    <!-- container -->
                    <div class="container">
                        <!-- row -->
                        <div class="row">
                            <!-- number -->
                            <div class="col-md-6 col-sm-6">
                                <div class="number">
                                    <i class="fa fa-home"></i>
                                    <h3><?= $kampanye->num_rows()?></h3>
                                    <span>Panti Asuhan</span>
                                </div>
                            </div>
                            <!-- /number -->

                            <!-- number -->
                            <div class="col-md-6 col-sm-6">
                                <div class="number">
                                    <i class="fa fa-handshake-o"></i>
                                    <h3><?= $donatur->num_rows()?></h3>
                                    <span>Donatur</span>
                                </div>
                            </div>
                            <!-- /number -->
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /container -->
                </div>
                <!-- /NUMBERS -->

                <!-- section title -->
                <?php
                foreach ($kampanye->result() as $k){
                        ?>
                        <!-- causes -->
                    <div class="col-md-4" style="margin-top: 20px">

                        <div class="causes" style="height:430px;">
                            <div class="causes-img">
                                <a href="<?= site_url("welcome/detail/".$k->id_kampanye)?>">
                                    <img width = "360px" height = "239.77px" src="<?= base_url().$k->foto_kampanye?>" alt="">
                                </a>
                            </div>

                            <div class="causes-progress">
                                <div>
                                    <span class="causes-raised">Terkumpul: <strong>Rp. <?= nominal($k->dana_terkumpul)?></strong></span>
                                    <span class="causes-goal">Target: <strong>Rp. <?= nominal($k->target_donasi)?></strong></span>
                                </div>
                            </div>
                            <div class="causes-content">
                                <h3><a href="<?= site_url("welcome/detail/".$k->id_kampanye)?>"><?= $k->nama_kampanye?></a></h3>
                                <p style="font-weight:300; font-size: 15px; letter-spacing: 0.3px; color: #5f646b;"><?php echo substr($k->deskripsi,0,110)." ... <a href='".site_url("welcome/detail/".$k->id_kampanye)."'><b>Selengkapnya</b></a>"?></p>

                            </div>
                            <?php
                            $kategori = $this->model_kategori->get_one($k->id_kategori)->row_array();
                            ?>

                            <span class="causes-raised">Kategori: <strong><?= $kategori['nama_kategori']?></strong></span>

                            <br>
                            <?php
                            $awal = date_create();
                            $akhir = date_create($k->tgl_selesai);
                            $diff = date_diff($awal,$akhir);
                            ?>
                            <div>Sisa Hari: <?= $diff->days?></div>

                        </div>
                        <br>

                    </div>
                        <!-- /causes -->
                        <?php
                }
                ?>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /CAUSESS -->




	<!-- BLOG -->
<?php
    include "footer.php"
?>