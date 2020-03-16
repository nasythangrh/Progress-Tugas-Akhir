<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">Data Master</li>
        <li class="active">Urgensi Donasi</li>
    </ol>

    <div class="col-md-12">
        <h2 class="page-header">
            Urgensi Donasi
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Urgensi Donasi
                </button>
                <a style="float:right; width:70px" title="Cetak" class="btn btn-success"
                   href="<?php echo site_url('Kampanye/laporan'); ?>"><span
                            class="glyphicon glyphicon-print"></span></a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Urgensi Donasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="kampanye/post" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <select class="form-control" name="id_kategori" required>
                                            <!--                        <option>--Pilih Kategori--</option>;-->
                                            <?php
                                            foreach ($kategori->result() as $key) {
                                                echo "<option value='$key->id_kategori'>$key->nama_kategori</option>";
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Panti Asuhan</label>
                                        <input type="text" name="nama_kampanye" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" name="tgl_mulai" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" name="tgl_selesai" class="form-control" required>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label style="margin-bottom: 0px">Foto Kondisi*</label>
                                        <h6 style="margin: 0 0; color: #f43228">max upload file 1.5 MB</h6>
                                        <input type="file" class="form-control" name="foto_kampanye" required>
                                    </div> -->

                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Dana Terkumpul (Rp)</label>
                                        <input type="number" min="0" name="dana_terkumpul" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Target Dana (Rp)</label>
                                        <input type="number" min="500000" name="target_donasi" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" cols="30" rows="10"></textarea>
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
                            <th>Nama Kategori</th>
                            <th>Nama Panti Asuhan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <!--th>Foto Kondisi</th-->
                            <th>Lokasi</th>
                            <th>Dana Terkumpul</th>
                            <th>Target Dana</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
                        foreach ($record->result() as $r) { ?>
                            <tr class="gradeU">
                                <?php
                                $kategori = $this->model_kategori->get_one($r->id_kategori)->row_array();
                                ?>
                                <td><?php echo $no ?></td>
                                <td><?php echo $kategori['nama_kategori'] ?></td>
                                <td><?php echo $r->nama_kampanye ?></td>
                                <td><?php echo date_indo($r->tgl_mulai) ?></td>
                                <td><?php echo date_indo($r->tgl_selesai) ?></td>
                                <!-- <td><img alt="tidak tersedia" style="width: 80px"
                                         src="<?= base_url() . $r->foto_kampanye ?>"></td> -->
                                <td><?php echo $r->lokasi ?></td>
                                <td>Rp. <?php echo nominal($r->dana_terkumpul) ?></td>
                                <td>Rp. <?php echo nominal($r->target_donasi) ?></td>
                                <td><?php echo substr($r->deskripsi,0,110).". . ." ?></td>


                                <td class="center">

                                    <a title="Edit" class="btn btn-default"
                                       href="<?php echo site_url('Kampanye/edit/' . $r->id_kampanye); ?>"><span
                                                class="glyphicon glyphicon-pencil"></span></a>

                                    <a title="Print" class="btn btn-default"
                                       href="<?php echo site_url('Kampanye/laporanDonatur/' . $r->id_kampanye); ?>"><span
                                                class="glyphicon glyphicon-print"></span></a>

                                    <a title="Hapus" class="btn btn-default"
                                       href="<?php echo site_url('Kampanye/delete/' . $r->id_kampanye); ?>"
                                       onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span
                                                class="glyphicon glyphicon-remove"></span></a>
                                </td>
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

