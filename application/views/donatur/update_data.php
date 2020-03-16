<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Donatur
        </h2>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php site_url('donatur/edit/'.$record['id_donatur'])?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Panti Asuhan</label>
                        <select class="form-control" name="id_kampanye" required readonly>
                            <?php
                            foreach ($record_kampanye->result() as $key) {
                                if ($record['id_kampanye'] === $key->id_kampanye){
                                    echo "<option value='$key->id_kampanye' selected>$key->nama_kampanye</option>";
                                }
                                else{
                                    echo "<option value='$key->id_kampanye'>$key->nama_kampanye</option>";
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Donatur</label>
                        <select class="form-control" name="id_pengguna" required readonly>
                            <?php
                            foreach ($pengguna->result() as $key) {
                                if ($record['id_pengguna'] === $key->id_pengguna){
                                    echo "<option value='$key->id_pengguna' selected>$key->nama</option>";
                                }
                                else{
                                    echo "<option value='$key->id_pengguna'>$key->nama</option>";
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tujuan Bank</label>
                        <select class="form-control" name="id_bank" required readonly>
                            <?php
                            foreach ($bank->result() as $key) {
                                if ($record['id_bank'] === $key->id_bank){
                                    echo "<option value='$key->id_bank' selected>$key->nama_bank</option>";
                                }
                                else{
                                    echo "<option value='$key->id_bank'>$key->nama_bank</option>";
                                }
                            } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl_donasi" class="form-control" required value="<?php echo $record['tgl_donasi']?>" readonly>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <label>Jam</label>-->
<!--                        <input type="time" name="jam" class="form-control" required value="--><?php //echo $record['jam']?><!--" readonly>-->
<!--                    </div>-->
                    <div class="form-group">
                        <label>Jumlah Transfer</label>
                        <input type="number" name="jum_transfer" class="form-control" required value="<?php echo $record['jum_transfer']?>" readonly>
                    </div>
                    <table>
                        <div class="form-group">
                            <tr>
                                <td><label>Bukti Transfer</label></td>
<!--                                <td><label>Ganti Foto</label></td>-->
                            </tr>
                            <tr>
                                <td>
                                    <img style='width: 200px;' alt="tidak ada foto" src = "<?php echo base_url().$record['bukti_transfer']?>">
                                </td>
                                <td>
<!--                                    <input type="file" class="form-control" name="bukti_transfer">-->
                                </td>
                            </tr>
                        </div>
                    </table>
                    <div class="form-group">
                        <label>Status Donasi </label>
                        <select class="form-control" name="status_donasi" required>
                            <?php
                                if ($record['status_donasi'] === "Menunggu"){
                                    ?>
                                    <option value='Menunggu' selected>Menunggu</option>
                                    <option value='Diterima'>Diterima</option>
                                    <?php
                                }
                                else if($record['status_donasi'] === "Diterima"){
                                    ?>
                                    <option value='Menunggu' >Menunggu</option>
                                    <option value='Diterima'selected>Diterima</option>
                                    <?php
                                }
                                else{
                                    ?>
                                    <option value='Menunggu' >Menunggu</option>
                                    <option value='Diterima'>Diterima</option>
                                    <?php
                                }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="<?php echo $record['keterangan']?>">
                    </div>

                <button type="submit" name="submit" class="btn btn-primary btn-sm">Perbarui</button> |
                <?php echo anchor('Donatur','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
