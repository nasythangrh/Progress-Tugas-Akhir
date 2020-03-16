<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Pengguna
        </h2>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">

               <form action="<?php site_url('pengguna/edit/'.$record['id_pengguna'])?>" method="post">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required value="<?php echo $record['nama']?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required readonly value="<?php echo $record['email']?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" required readonly value="<?php echo $record['pass']?>">
                    </div>
                   <div class="form-group">
                       <label>No Handphone</label>
                       <input type="number" name="no_hp" class="form-control" required readonly value="<?php echo $record['no_hp']?>">
                   </div>
<!--                   <div class="form-group">-->
<!--                       <label>Level </label>-->
<!--                       <select class="form-control" name="level" required>-->
<!--                           <option value='Admin'>Admin</option>-->
<!--                           <option value='Donatur'>Donatur</option>-->
<!---->
<!--                       </select>-->
<!--                   </div>-->

                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Perbarui</button> |
                    <?php echo anchor('Pengguna','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
               </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->
