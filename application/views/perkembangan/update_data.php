<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Perkembangan
        </h2>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default"><form action="<?php site_url('perkembangan/edit/'.$record['id_perkembangan'])?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Panti Asuhan</label>
                    <select class="form-control" name="id_kampanye" required>
                        <?php
                        foreach ($kampanye->result() as $key) {
                            if ($record['id_kampanye'] == $key->id_kampanye){
                                echo "<option value='$key->id_kampanye' selected>$key->nama_kampanye</option>";
                            }
                            else{
                                echo "<option value='$key->id_kampanye'>$key->nama_kampanye</option>";
                            }
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" required value="<?php echo $record['judul']?>">
                </div>
                <table>
                    <div class="form-group">
                        <tr>
                            <td><label>Foto Perkembangan</label></td>
                            <td><label style="padding-left: 18px">Ganti Foto</label></td>
                        </tr>
                        <h6 style="margin: 0 0; color: #f43228">max upload file 1.5 MB</h6>
                        <tr>
                            <td>
                                <img style='width: 200px;' alt="tidak ada gambar" src = "<?php echo base_url().$record['foto_perk']?>">
                            </td>
                            <td>
                                <input type="file" class="form-control" name="foto_perk">
                            </td>
                        </tr>
                    </div>
                </table>
<!--                <div class="form-group">-->
<!--                    <label>Tanggal</label>-->
<!--                    <input type="text" name="tgl_posting" class="form-control" required readonly value="--><?php //echo shortdate_indo($record['tgl_posting'])?><!--">-->
<!--                </div>-->
                <div class="form-group">
                    <label>Isi</label>
                    <input type="text" name="isi" class="form-control" required value="<?php echo $record['isi']?>">
                </div>


                <button type="submit" name="submit" class="btn btn-primary btn-sm">Perbarui</button> |
                <?php echo anchor('Perkembangan','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
            </form>
            <div class="panel-body">

            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
