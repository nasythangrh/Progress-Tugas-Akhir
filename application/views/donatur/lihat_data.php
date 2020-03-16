<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">Data Master</li>
        <li class="active">Donatur</li>
    </ol>

    <div class="col-md-12">
        <h2 class="page-header">
            Donatur
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
<!--                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
<!--                    Tambah Donatur-->
<!--                </button>-->

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Donatur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="donatur/post" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Nama Panti Asuhan</label>
                                        <select class="form-control" name="id_kampanye" required>
                                            <?php
                                            foreach ($record_kampanye->result() as $key) {
                                                echo "<option value='$key->id_kampanye'>$key->nama_kampanye</option>";
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <select class="form-control" name="id_pengguna" required>
                                            <?php
                                            foreach ($record_pengguna->result() as $key) {
                                                if ($key->level === 'Donatur') {
                                                    echo "<option value='$key->id_pengguna'>$key->nama</option>";
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Bank Donatur</label>
                                        <input type="text" name="bank_asal" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>No Rek</label>
                                        <input type="text" name="no_rek_asal" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Bank Tujuan</label>
                                        <select class="form-control" name="id_bank" required>
                                            <?php
                                            foreach ($record_bank->result() as $key) {
                                                echo "<option value='$key->id_bank'>$key->nama_bank</option>";
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tgl Donasi</label>
                                        <input type="date" class="form-control" name="tgl_donasi" required>
                                    </div>

<!--                                    <div class="form-group">-->
<!--                                        <label>Jam</label>-->
<!--                                        <input type="time" name="jam" class="form-control" required>-->
<!--                                    </div>-->

                                    <div class="form-group">
                                        <label>Jum Transfer</label>
                                        <input type="number" name="jum_transfer" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Bukti Transfer</label>
                                        <input type="file" name="bukti_transfer" class="form-control" required>

                                    </div>

                                    <div class="form-group">
                                        <label>Status Donasi </label>
                                        <select class="form-control" name="status_donasi" required>
                                            <option value='Menunggu'>Menunggu</option>
                                            <option value='Diterima'>Diterima</option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Ket</label>
                                        <input type="text" name="keterangan" class="form-control">
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal
                                        </button>
                                        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <!--   <th></th> -->
                            <th>No</th>

                            <th>Nama Panti Asuhan</th>
                            <th>Nama</th>
                            <th>Bank Pengirim</th>
                            <th>No Rek</th>
                            <th>Bank Tujuan</th>
                            <th>Tgl Donasi</th>
                            <th>Tgl Transfer</th>
                            <th>Jum Transfer</th>
                            <th>Bukti Transfer</th>
                            <th>Status</th>
                            <th>Ket</th>

<!--                            <th>Aksi</th>-->

                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
                        foreach ($record->result() as $r) { ?>
                            <tr class="gradeU">
                                <?php

                                $kampanye = $this->model_kampanye->get_one($r->id_kampanye)->row_array();
                                $bank = $this->model_bank->get_one($r->id_bank)->row_array();
                                $pengguna = $this->model_pengguna->get_one($r->id_pengguna)->row_array();

                                ?>
                                <td><?php echo $no ?></td>

                                <td><?php echo $kampanye['nama_kampanye'] ?></td>
                                <td><?php echo $pengguna['nama'] ?></td>
                                <td><?php echo $r->bank_asal ?></td>
                                <td><?php echo $r->no_rek_asal ?></td>
                                <td><?php echo $bank['nama_bank'] ?></td>
                                <td><?php echo date_indo($r->tgl_donasi) ?></td>
                                <td><?php echo date_indo($r->tgl_bayar) ?></td>
                                <!--<td>--><?php //echo $r->jam ?><!--</td>-->
                                <td>Rp. <?php echo $r->jum_transfer+$r->id_donatur ?></td>
                                <td><img alt="tidak terseida" style="width: 80px"
                                         src="<?= base_url() . $r->bukti_transfer ?>"></td>
                                <td><?php
                                    echo $r->status_donasi;
                                    if ($r->status_donasi == "Menunggu") {
                                        ?>
                                        <a title="Terima" class="btn btn-success"
                                           href="<?php echo site_url('Donatur/disposisi/' . $r->id_donatur); ?>"><span
                                                    class="glyphicon glyphicon-ok"></span></a>
<!--                                        <a title="Tolak" class="btn btn-danger"-->
<!--                                           href="--><?php //echo site_url('Donatur/edit/' . $r->id_donatur); ?>
<!--                                        "><span class="glyphicon glyphicon-remove"></span></a>-->
                                        <?php
                                    }
                                    ?>

                                </td>
                                <td><?php echo $r->keterangan ?></td>
<!--                                <td class="center">-->

<!--                                    <a title="Edit" class="btn btn-default"-->
                                    <!--href="-->
                                        <?php //echo site_url('Donatur/edit/' . $r->id_donatur); ?>
<!--                                    "><span class="glyphicon glyphicon-pencil"></span>-->-->
                                    <!--</a>-->

                                    <!--<a title="Hapus" class="btn btn-default" -->
                                    <!--href="-->
                                       <?php //echo site_url('Donatur/delete/'.$r->id_donatur);?>
                                    <!--"-->
                                    <!--onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                    <span class="glyphicon glyphicon-remove"></span>-->
                                    <!--</a>-->
<!--                                </td>-->
                            </tr>
                            <?php $no++;
                        } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->


<!-- Button trigger modal -->

