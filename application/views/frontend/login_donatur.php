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
                            <h3 class="footer-title"><p align="center">Silahkan masuk</p></h3>
                            <p align="center"><?php echo $this->session->flashdata('msg');?></p>
                            <form class="footer-newsletter" method="post" action="<?= base_url()?>auth/login_donatur">
                                <input class="input" type="tel" pattern="[0-9]{1-12}" name="no_hp" placeholder="Nomor Handphone">
                                <br>
                                <br>
                                <input class="input" type="password" name = "password" placeholder="Password">
                                <input type="submit" class="primary-button" name = "submit" value="Login">
                                <br>
                                <p align="center">Belum punya akun? <a href="<?= base_url()?>daftar">Daftar</a> sekarang.</p>
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