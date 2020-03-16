<?php include "header.php"?>

    <!-- CAUSESS -->
    <div id="causes" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->

                <div class="col-md-8 col-md-offset-2">
                    <div class="footer">
                        <h3 class="footer-title"><p align="center">Form Pembayaran</p></h3>
                        <form class="footer-newsletter" method="post" action="<?= site_url("donatur/pembayaran/".$donatur['id_donatur'])?>" enctype="multipart/form-data">
                            <?php
                            $kampanye = $this->model_kampanye->get_one($donatur['id_kampanye'])->row_array();
                            $bank=$this->model_bank->get_one($donatur['id_bank'])->row_array();
                            ?>
<!--                            <label>Nama Kampanye</label>-->
<!--                            <input class="input" type="text" name="nama" placeholder="Nama" value="--><?//= $kampanye['nama_kampanye']?><!--" readonly required>-->
<!--                            <br>-->
<!--                            <br>-->
<!--                            <label>Tujuan Bank</label>-->
<!--                            <input class="input" type="text" name="nama" placeholder="Nama" value="--><?//= $bank['nama_bank']?><!--" readonly required>-->
<!--                            <br>-->
<!--                            <br>-->
<!--                            <label>Jumlah Transfer (Rp.)</label>-->
<!--                            <input class="input" type="text" name="nama" placeholder="Nama" value="--><?//= nominal($donatur['jum_transfer']+$donatur['id_donatur'])?><!--" readonly required>-->
<!--                            <br>-->
<!--                            <br>-->
                            <label>Tanggal Transfer*</label>
                            <input class="input" type="date" name="tgl_bayar" placeholder="" value="" required>
                            <br>
                            <br>
                            <label>Bank Pengirim*</label>
                            <input class="input" type="text" name="bank_asal" placeholder="" value="" required>
                            <br>
                            <br>
                            <label>No. Rekening Pengirim*</label>
                            <input class="input" type="text" name="no_rek_asal" placeholder="" value="" required>
                            <br>
                            <br>
                            <label>Bukti Transfer*</label>
                            <input type="file" name="bukti_transfer">
                            <br><br>
                            <input type="submit" class="primary-button" name = "submit" value="Upload">
                        </form>
                    </div>
                    <!-- /footer newsletter -->
                </div>
            </div>
        </div>
        <!-- section title -->

    </div>
    <!-- /row -->
    </div>
    <!-- /container -->
    </div>
    <!-- /CAUSESS -->

<?php
include("footer.php");
?>