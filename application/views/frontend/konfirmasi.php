<?php include "header.php"?>
		<!-- HOME OWL -->
		<div id="home-owl" class="owl-carousel owl-theme">
			<!-- home item -->

			<!-- /home item -->

			<!-- home item -->

			<!-- /home item -->
		</div>

	<!-- /HEADER -->

	<!-- NUMBERS -->
	
	<!-- /NUMBERS -->

	<!-- CAUSESS -->
	<div id="causes" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-8 col-md-offset-2">
					<div class="section-title text-center">
                        <?php echo "<p style='color: whitesmoke;background-color: red;font-size:x-large'>".$this->session->flashdata('msg')."</p>";?>
                        <br>
						<h2 class="title">Belum Unggah Bukti Transfer</h2>
						<p class="sub-title"></p>
						<div class="col-md-12 col-sm-6">
							<div class="number">
								<i class="fa fa-handshake-o"></i>
								<h3><?= $donatur->num_rows()?></h3>
								<span>Transaksi</span>
							</div>
						</div>
				</div>
					</div>
				</div>
				<!-- section title -->
                <?php
                $content = 0;
                foreach ($donatur->result() as $k){

                        ?>
                        <!-- causes -->

                        <div class="col-md-4" style="margin-top: 20px">

                            <div class="causes" style="height:250px;">
                                <div class="causes-img">
                                    <a href="<?= site_url("welcome/detail/".$k->id_kampanye)?>">
                                        <img width = "360px" height = "239.77px" src="<?= base_url().$k->foto_kampanye?>" alt="">
                                    </a>
                                </div>

                                <div class="causes-progress">
                                    <div>
                                        <span class="causes-raised">Jumlah Transfer Anda: <strong>Rp. <?= nominal($k->jum_transfer+$k->id_donatur)?></strong></span>
                                        <?php
                                        if($k->keterangan == "upload"){
                                            ?>
                                            <span class="causes-goal"><strong><?= $k->status_donasi?> Konfirmasi</strong></span>

                                            <?php
                                        }
                                        else{
                                            ?>
                                            <span class="causes-goal"><strong><?= $k->status_donasi?> Pembayaran</strong></span>

                                            <?php
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>

                            <a href="<?= site_url("welcome/lengkapi/".$k->id_donatur)?>" class="primary-button causes-donate">Lanjut</a>

                        </div>
                        <!-- /causes -->
                        <?php

                    $content++;
                }
                ?>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /CAUSESS -->

	<!-- CTA -->

	<!-- /CTA -->



	<!-- BLOG -->
<?php
    include "footer.php"
?>