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
                        <h3 class="footer-title"><p align="center">Daftar akun</p></h3>
                        <form class="footer-newsletter" method="post" action="<?= base_url()?>auth/register_donatur">
                            <input class="input" type="text" name="nama" placeholder="Nama Lengkap" required>
                            <br>
                            <br>
                            <input class="input" type="tel" pattern="[0-9]{1-12}" name="no_hp" placeholder="Nomor Handphone" required>
                            <br>
                            <br>
                            <input class="input" type="email" name="email" placeholder="Email" required>
                            <br>
                            <br>
                            <input class="input" type="password" name="password" placeholder="Password" required>
                            <br>
                            <input type="submit" class="primary-button" name = "submit" value="Daftar" required>
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