<?php include "header.php"?>
		<!-- HOME OWL -->
		<div id="home-owl" class="owl-carousel owl-theme">
			<!-- home item -->
			<div class="home-item">
				<!-- section background -->
				<div class="section-bg" style="background-image: url(<?= base_url()?>assets/images/foto/hanyaini.jpg); "></div>
				<!-- /section background -->
				<!-- home content -->
				<div class="home">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div class="home-content">
									<h1>Mari Berdonasi</h1>
									<p class="lead">Assalamu'alaikum wr.wb.</p>
<!--									<a href="#" class="primary-button">View Causes</a>-->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /home content -->
			</div>
			<!-- /home item -->

			<!-- home item -->
			<div class="home-item">
				<!-- Background Image -->
				<div class="section-bg" style="background-image: url(<?= base_url()?>assets/images/foto/bg.jpg); "></div>
				<!-- /Background Image -->

				<!-- home content -->
				<div class="home">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div class="home-content">
									<h1>Jadilah Donatur</h1>
									<p class="lead">Mari Saling berbagi, Berbagi itu Indah</p>
									<a href="#" class="primary-button">Bergabung dengan kami sekarang!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /home content -->
			</div>
			<!-- /home item -->
		</div>
		<!-- /HOME OWL -->
	</header>
	<!-- /HEADER -->

	<!-- ABOUT -->
	<div id="about" class="section" style="padding-top:50px; padding-bottom:50px">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- about content -->
				<div class="col-md-5">
					<div class="section-title">
						<h2 class="title"> Selamat datang di SIG Panti Asuhan untuk Pemerataan Donasi Kabupaten Malang</h2>
						<p class="sub-title">Ingin berbuat kebaikan? Bersama Dinas Sosial Kabupaten Malang, anda bisa membuat perubahan untuk kehidupan mereka.</p>
					</div>
					<div class="about-content">
						<p style="font-weight:normal"></p>

                        <!--						<a href="#" class="primary-button">Read More</a>-->
					</div>
				</div>
				<!-- /about content -->

				<!-- about video -->
				<div class="col-md-offset-1 col-md-6">
					<a href="#" class="causes-img">
<!--							<i class="play-icon fa fa-play"></i>-->
							<img width = "570px" height = "350px" src="<?= base_url()?>assets/images/foto/hanyainiloh.png" alt="">
						</a>
				</div>
				<!-- /about video -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /ABOUT -->

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

	<!-- CAUSESS -->
	<div id="causes" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-8 col-md-offset-2">
					<div class="section-title text-center">
						<h2 style="font-weight:normal" class="title">Yuk Donasi!</h2>
						<p style="font-weight:normal" class="sub-title"> Pilih Panti Asuhan yang ingin Anda bantu.</p>
					</div>
				</div>
				<!-- section title -->
                <?php
                $content = 0;
                foreach ($kampanye->result() as $k){
                    if ($content <6){
                        ?>
                        <!-- causes -->

                        <div class="col-md-4" style="margin-top: 20px">

                            <div class="causes" style="height:430px">
                                <div class="causes-img">
                                    <a href="<?= site_url("welcome/detail/".$k->id_kampanye)?>">
                                        <img width = "360px" height = "239.77px" src="<?= base_url().$k->foto_kampanye?>" alt="">
                                    </a>
                                </div>

                                <div class="causes-progress">
                                    <div>
                                        <span class="causes-raised" style="font-weight:normal">Terkumpul: <strong>Rp. <?= nominal($k->dana_terkumpul) ?></strong></span>
                                        <span class="causes-goal" style="font-weight:normal">Target: <strong>Rp. <?= nominal($k->target_donasi)?></strong></span>
                                    </div>
                                </div>
                                <div class="causes-content">
                                    <h3><a href="<?= site_url("welcome/detail/".$k->id_kampanye)?>"><?= $k->nama_kampanye?></a></h3>
                                    <p style="font-weight:300; font-size: 15px; letter-spacing: 0.3px; color: #23262a;"><?php echo substr($k->deskripsi,0,110)." ... <a href='".site_url("welcome/detail/".$k->id_kampanye)."'><b>Selengkapnya</b></a>"?></p>

                                </div>
                                <?php
                                $kategori = $this->model_kategori->get_one($k->id_kategori)->row_array();
                                ?>
                                <span class="causes-raised" style="font-weight:normal">Kategori : <strong><?= $kategori['nama_kategori']?></strong></span>
                                <br>

                                <?php
                                $awal = date_create();
                                $akhir = date_create($k->tgl_selesai);
                                $diff = date_diff($awal,$akhir);
                                ?>
                                <div><span style="font-weight:normal">Sisa Hari: <strong><?= $diff->days?></strong></span></div>

                            </div>
                            <br>

                        </div>
                        <!-- /causes -->
                        <?php
                    }
                    $content++;
                }
                ?>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /CAUSESS -->

	<!-- TESTIMONIAL -->
	<div id="testimonial" class="section">
		<!-- background section -->
		<div class="section-bg" style="background-image: url(<?= base_url()?>assets/images/foto/kantor.jpg); " data-stellar-background-ratio="1"></div>
		<!-- /background section -->

		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- Testimonial owl -->
				<div class="col-md-12">
					<div id="testimonial-owl" class="owl-carousel owl-theme">
                        <!-- testimonial -->
                        <div class="testimonial">
                            <div class="testimonial-meta">
                                <div class="testimonial-img">
                                    <img width="70px" height="70px" src="<?= base_url()?>assets/images/foto/anon.jpg" alt="">
                                </div>
                                <h3>A</h3>
                                <span>Mahasiswa</span>
                            </div>
                            <div class="testimonial-quote">
                                <blockquote>
                                    <p>Berbagi adalah sumber kesenangan yang sering dilupakan oleh banyak orang</p>
                                </blockquote>
                            </div>
                        </div>
                        <!-- /testimonial -->
						<!-- testimonial -->
						<div class="testimonial">
							<div class="testimonial-meta">
								<div class="testimonial-img">
									<img width="70px" height="70px" src="<?= base_url()?>assets/images/foto/anon.jpg" alt="">
								</div>
								<h3>B</h3>
								<span>Programmer</span>
							</div>
							<div class="testimonial-quote">
								<blockquote>
									<p>Tetaplah saling membantu walau kamu dalam kekurangan</p>
								</blockquote>
							</div>
						</div>
						<!-- /testimonial -->
						<!-- testimonial -->
						<div class="testimonial">
							<div class="testimonial-meta">
								<div class="testimonial-img">
                                    <img width="70px" height="70px" src="<?= base_url()?>assets/images/foto/anon.jpg" alt="">
								</div>
								<h3>C</h3>
								<span>PNS</span>
							</div>
							<div class="testimonial-quote">
								<blockquote>
									<p>Jangan lupa berdonasi ya!</p>
								</blockquote>
							</div>
						</div>
						<!-- /testimonial -->
						<!-- testimonial -->
						<div class="testimonial">
							<div class="testimonial-meta">
								<div class="testimonial-img">
                                    <img width="70px" height="70px" src="<?= base_url()?>assets/images/foto/anon.jpg" alt="">
								</div>
								<h3>D</h3>
								<span>Content Destructor</span>
							</div>
							<div class="testimonial-quote">
								<blockquote>
									<p>Serunya berdonasi</p>
								</blockquote>
							</div>
						</div>
						<!-- /testimonial -->
					</div>
				</div>
				<!-- /Testimonial owl -->
			</div>
			<!-- /Row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /TESTIMONIAL -->

	<!-- BLOG -->
<?php
    include "footer.php"
?>