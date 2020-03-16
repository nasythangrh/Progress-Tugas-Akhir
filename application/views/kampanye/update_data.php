<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Panti Asuhan
        </h2>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php site_url('kampanye/edit/'.$record['id_kampanye'])?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Panti Asuhan</label>
                        <select class="form-control" name="id_kategori" required>
                            <?php
                            foreach ($kategori->result() as $key) {
                                if ($record['id_kategori'] == $key->id_kategori){
                                    echo "<option value='$key->id_kategori' selected>$key->nama_kategori</option>";
                                }
                                else{
                                    //hilangkan opsi id kategori 1
                                    if($key->id_kategori == 1){
                                        continue;
                                    }
                                    //
                                    echo "<option value='$key->id_kategori'>$key->nama_kategori</option>";
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Panti Asuhan</label>
                        <input type="text" name="nama_kampanye" class="form-control" required value="<?php echo $record['nama_kampanye']?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="tgl_mulai" class="form-control" required value="<?php echo $record['tgl_mulai']?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="tgl_selesai" class="form-control" required value="<?php echo $record['tgl_selesai']?>">
                    </div>
                    <!-- <table>
                        <div class="form-group">
                            <tr>
                                <td><label>Foto Kampanye*</label></td>
                                <td><label style="padding-left: 18px">Ganti Foto</label></td>
                            </tr>
                            <h6 style="margin: 0 0; color: #f43228">max upload file 1.5 MB</h6>
                            <tr>
                                <td>
                                    <img style='width: 200px;' alt="tidak ada foto" src = "<?php echo base_url().$record['foto_kampanye']?>">
                                </td>
                                <td>
                                    <input type="file" class="form-control" name="foto_kampanye">
                                </td>
                            </tr>
                        </div> -->
                    </table>
                    <div class="form-group">
                        <label style="margin-top: 5px">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" required value="<?php echo $record['lokasi']?>">
                    </div>
                    <div class="form-group">
                        <label>Dana Terkumpul (Rp)</label>
                        <input type="number" min="0" name="dana_terkumpul" class="form-control" required value="<?php echo $record['dana_terkumpul']?>">
                    </div>
                    <div class="form-group">
                        <label>Target Dana (Rp)</label>
                        <input type="number" min="500000" name="target_donasi" class="form-control" required value="<?php echo $record['target_donasi']?>">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" required value="<?php echo $record['deskripsi']?>" >
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Perbarui</button> |
                    <?php echo anchor('Kampanye','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>

            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
