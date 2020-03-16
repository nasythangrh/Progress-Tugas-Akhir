<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Kategori
        </h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php site_url('kategori/edit/'.$record['id_kategori'])?>" method="post">
<!--                    <div class="form-group">-->
<!--                        <label>Id Kategori</label>-->
<!--                        <input type="number" name="id_kategori" class="form-control" required value="--><?php //echo $record['id_kategori']?><!--" readonly>-->
<!--                        -->
<!--                    </div>-->
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" required value="<?php echo $record['nama_kategori']?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Perbarui</button> |
                    <?php echo anchor('Kategori','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
