<?php include "header.php" ?>

    <div class="row">
    <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading" style="background-color: #fff">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Ikut Donasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                if ($this->session->userdata('id_pengguna') != null) {
                    ?>
                    <div class="modal-body">

                        <form action="<?= site_url("donatur/donatur/" . $kampanye['id_kampanye']) ?>" method="POST">
                            <div class="form-group">
                                <select class="form-control" name="id_bank" required>
                                    <?php
                                    foreach ($bank->result() as $key) {
//                                    hilangkan opsi id bank 1 krn no ini dipake utk default (ga ada nama banknya)
                                        if($key->id_bank == 1){
                                          continue;
                                        }
                                        //
                                    echo "<option value='$key->id_bank'>$key->nama_bank</option>";
                                    } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Jumlah Donasi</label>
                                <input type="number" min="10000" name="jum_transfer" class="form-control" required="">
                            </div>

                            <label>Sembunyikan Nama? <input type="checkbox" name="sembunyi" value="Y"></label>

                            <div class="modal-footer">
                                <button type="submit" name="submit" class="primary-button causes-donate">Donasi
                                    Sekarang
                                </button>
                            </div>
                        </form>
                    </div>

                    <?php
                } else {
                    ?>
                    <div class="modal-body">
                        <label>Anda harus login terlebih dahulu!</label>
                        <br>
                        <a class="primary-button causes-donate" href="<?= base_url() ?>login">Login</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>


    <div class="section" style="background-color: #fff">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- MAIN -->
                <main id="main" class="col-md-8">
                    <p align="center"
                       style="background: lawngreen;border-radius: 5px;font-weight: 600;"><?php echo $this->session->flashdata('msg'); ?></p>
                    <!-- article -->
                    <div class="article causes-details">
                        <!-- article img -->
                        <div class="article-img">
                            <img width="360px" height="400px" src="<?= base_url() . $kampanye['foto_kampanye'] ?>"
                                 alt="">
                        </div>
                        <!-- article img -->

                        <!-- causes progress -->
                        <div class="clearfix">
                            <div class="causes-progress">
                                <div>
                                    <span class="causes-raised">Terkumpul: <strong>Rp. <?= nominal($kampanye['dana_terkumpul']) ?></strong></span>
                                    <span class="causes-goal">Target: <strong>Rp. <?= nominal($kampanye['target_donasi']) ?></strong></span>
                                </div>
                            </div>
                            <button type="button" class="primary-button causes-donate" data-toggle="modal"
                                    data-target="#exampleModal">
                                Donasi
                            </button>
                        </div>
                        <!-- /causes progress -->

                        <!-- article content -->
                        <div class="container" style="padding-right: 310px">
                            <div class="article-content">

                                <!-- article title -->
                                <h2 class="article-title"><?= $kampanye['nama_kampanye'] ?></h2>
                                <!-- /article title -->

                                <!-- article meta -->
                                <!--                                <ul class="article-meta">-->
                                <!--                                    <li>-->
                                <? //= $kampanye['tgl_mulai'] ?><!--</li>-->
                                <!--                                </ul>-->
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#deskripsi">Deskripsi</a></li>
                                <li><a data-toggle="tab" href="#menu1">Perkembangan</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="deskripsi" class="tab-pane fade in active">
                                    <div class="article-content"
                                         style="font-weight:300; font-size: 15px; letter-spacing: 0.3px; color: #5f646b;">
                                        <!-- /article meta -->

                                        <p style="color: #23262a;"><?= $kampanye['deskripsi'] ?></p>

                                    </div>
                                    <!-- /article content -->
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div class="article-content">
                                        <div id="number" class="section">
                                            <?php
                                            foreach ($perkembangan as $p) {
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="number">
                                                            <h2 class="article-title"><?= $p['judul'] ?></h2>
                                                            <p><?= date_indo($p['tgl_posting']) ?></p>
                                                            <img width="400px" height="250px"
                                                                 src="<?= base_url() . $p['foto_perk'] ?>" alt="foto">
                                                            <br>
                                                            <div class="article-content"
                                                                 style="font-weight:300; font-size: 15px; letter-spacing: 0.3px; color: #5f646b;">
                                                                <p><?= $p['isi'] ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /article -->
                </main>
                <!-- /MAIN -->

                <!-- ASIDE -->
                <aside id="aside" class="col-md-4">
                    <!-- posts widget -->
                    <div class="widget">
                        <br/>
                        <h3 class="widget-title">Donatur(<?= $listdonatur->num_rows() ?>)</h3>
                        <!--ini untuk yg disamping-->
                        <table class="table ">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($listdonatur->result() as $key) {
                                $pengguna = $this->model_pengguna->get_one($key->id_pengguna)->row_array();
                                ?>

                                <tr>
                                    <td><?=$no?></td>
                                    <td><?php
                                        if ($key->tampil_nama == "Y") {
                                            ?>
                                            <?= $pengguna['nama'] ?>
                                            <?php
                                        } else {
                                            ?>
                                            Hamba Allah
                                            <?php
                                        }
                                        ?></td>
                                    <td>Rp. <?= nominal($key->jum_transfer + $key->id_donatur) ?></td>
                                    <td><?=date_indo($key->tgl_donasi)?></td>
                                    </td>
                                </tr>

                                <?php
                                $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
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
    <div id="cta" class="section" style="padding: 0">
    <!-- background section -->
    <div class="section-bg" style="background-image: url(<?= base_url() ?>assets/charity2/img/background-1.jpg);"
         data-stellar-background-ratio="0.5"></div>
    <!-- /background section -->
<?php
include "footer.php"
?>