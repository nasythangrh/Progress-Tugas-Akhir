<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Bank
        </h2>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">

               <form action="<?php site_url('bank/edit/'.$record['id_bank'])?>" method="post">
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <input type="text" name="nama_bank" class="form-control" required value="<?php echo $record['nama_bank']?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Rekening</label>
                        <input type="text" name="nama_rek" class="form-control" required value="<?php echo $record['nama_rek']?>">
                    </div>
                    <div class="form-group">
                        <label>No Rekening</label>
                        <input type="text" name="no_rek" class="form-control" required value="<?php echo $record['no_rek']?>">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Perbarui</button> |
                    <?php echo anchor('Bank','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
               </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
