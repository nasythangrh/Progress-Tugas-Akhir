<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
        <li class="active">Data Master</li>
        <li class="active">Perkembangan</li>
    </ol>

    <div class="col-md-12">
        <h2 class="page-header">
            Perkembangan
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Perkembangan
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Perkembangan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="perkembangan/post" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Nama Panti Asuhan</label>
                                        <select class="form-control" name="id_kampanye" required>
<!--                                            <option>--Pilih Kampanye--</option>;-->
                                            <?php
                                            foreach ($kampanye->result() as $key) {
                                                echo "<option value='$key->id_kampanye'>$key->nama_kampanye</option>";
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" name="judul" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label style="margin-bottom: 0px">Foto Perkembangan</label>
                                        <h6 style="margin: 0 0; color: #f43228">max upload file 1.5 MB</h6>
                                        <input type="file" class="form-control" name="foto_perk">
                                    </div>

                                    <div class="form-group">
                                        <label>Isi</label>
                                        <textarea name="isi" id="" cols="30" rows="10" class="form-control" required></textarea>
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
                            <th>Judul</th>
                            <th>Foto Perkembangan</th>
                            <th>Isi</th>
                            <th>Tanggal Posting</th>
                            <th>Aksi</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
                        foreach ($record->result() as $r) { ?>
                            <tr class="gradeU">
                                <?php
                                $kampanye = $this->model_kampanye->get_one($r->id_kampanye)->row_array();
                                ?>
                                <td><?php echo $no ?></td>
                                <td><?php echo $kampanye['nama_kampanye'] ?></td>
                                <td><?php echo $r->judul ?></td>
                                <td><img alt="tidak tersedia" style="width: 80px"
                                         src="<?= base_url() . $r->foto_perk ?>"></td>
                                <td><?php echo substr($r->isi, 0,110).". . ." ?></td>
                                <td><?php echo date_indo($r->tgl_posting) ?></td>
                                <td class="center">

                                    <a title="Edit" class="btn btn-default"
                                       href="<?php echo site_url('Perkembangan/edit/' . $r->id_perkembangan); ?>"><span
                                                class="glyphicon glyphicon-pencil"></span></a>

                                    <a title="Hapus" class="btn btn-default"
                                       href="<?php echo site_url('Perkembangan/delete/' . $r->id_perkembangan); ?>"
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

