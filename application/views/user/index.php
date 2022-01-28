<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-user-friends"></i> <?php echo $title; ?></h3>
        </div>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="flash-data-required" data-flashdata="<?= $this->session->flashdata('required'); ?>"></div>
        <div class="card-body">
            <?php if ($user['role_id'] == 1) { ?>
                <a role="button" href="#" class="btn bg-danger" title="Tambah Data harga" data-toggle="modal" data-target=".tambah_harga">
                    <i class="fas fa-user-plus"></i>
                </a>
            <?php } ?>

            <a role="button" href="#" class="btn bg-danger" title="Cetak Data harga">
                <i class="fas fa-print"></i>
            </a>
            <a role="button" href="<?php base_url('harga'); ?>" class="btn bg-danger" title="Refresh Data harga">
                <i class="fas fa-sync-alt"></i>
            </a>
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ukuran</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($harga as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['ukuran']; ?></td>
                            <td><?php echo number_format($row['nominal']); ?></td>
                            <td><?php echo $row['keterangan']; ?></td>
                            <td>
                                <?php if ($user['role_id'] == 1) { ?>
                                    <?php if ($row['status'] == 0) { ?>
                                        <center><a role="button" href="<?php echo site_url(); ?>harga/publish/<?php echo $row['id']; ?>" id="publish" class="btn bg-danger publish" title="Aktif">
                                                <i class="fas fa-eye"></i>
                                            </a></center>
                                    <?php } else { ?>
                                        <center><a role="button" href="<?php echo site_url(); ?>harga/unpublish/<?php echo $row['id']; ?>" id="unpublish" class="btn bg-danger unpublish" title="Non Aktif">
                                                <i class="fas fa-eye-slash"></i>
                                            </a></center>
                                    <?php } ?>
                                <?php } ?>

                            </td>
                            <td>
                                <?php if ($user['role_id'] == 1) { ?>
                                    <a role="button" href="#" class="btn bg-danger" title="Edit Data harga" data-toggle="modal" data-target="#edit_harga<?php echo $row['id']; ?>">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <?php if ($row['status'] == 1) { ?>
                                        <a role="button" href="<?php echo site_url(); ?>harga/delete/<?php echo $row['id']; ?>" id="hapus" class="btn bg-danger tombol-hapus" title="Hapus Data harga">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    <?php } ?>
                                <?php } ?>

                                <a role="button" href="#" class="btn bg-danger" title="Selengkapnya" data-toggle="modal" data-target="#view_harga<?php echo $row['id']; ?>">
                                    <i class="fab fa-searchengin"></i>
                                </a>

                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>

                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade tambah_harga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add harga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="far fa-check-square"></i> <?php echo $title; ?></h3>
                    </div>

                    <div class="card-body">

                        <form autocomplete="off" action="<?php echo base_url('harga/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ukuran">Ukuran</label>
                                    <input type="text" name="ukuran" required class="form-control" id="ukuran" value="<?= set_value('ukuran'); ?>">
                                    <?= form_error('ukuran', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nominal">Nominal</label>
                                    <input type="text" name="nominal" required class="form-control" id="nominal" value="<?= set_value('nominal'); ?>">
                                    <?= form_error('nominal', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" name="keterangan" required class="form-control" id="keterangan" value="<?= set_value('keterangan'); ?>">
                                <?= form_error('keterangan', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                            </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-danger">Save</button>
                <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->


<!-- Modal Edit -->
<?php
foreach ($harga as $i) :
    $id = $i['id'];
    $ukuran = $i['ukuran'];
    $nominal = $i['nominal'];
    $keterangan = $i['keterangan'];
    $status = $i['status'];
?>
    <?php if ($status == 1) {
        $publish = "readonly";
    } else {
        $publish = "";
    } ?>
    <div class="modal fade edit_harga" id="edit_harga<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit harga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-check-square"></i> <?php echo $title; ?></h3>
                        </div>

                        <div class="card-body">

                            <form autocomplete="off" action="<?php echo base_url('harga/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="ukuran">Ukuran</label>
                                        <input type="text" name="ukuran" <?php echo $publish; ?> value="<?php echo $ukuran; ?>" class="form-control" id="ukuran">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nominal">Nominal</label>
                                        <input type="text" name="nominal" <?php echo $publish; ?> value="<?php echo $nominal; ?>" class="form-control" id="nominal">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" <?php echo $publish; ?> value="<?php echo $keterangan; ?>" class="form-control" id="keterangan">
                                </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <?php if ($publish == false) { ?>
                        <button type="submit" class="btn bg-danger">Update</button>
                    <?php } ?>
                    <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<!-- End Modal Edit -->



<!-- Modal View -->
<?php
foreach ($harga as $i) :
    $id = $i['id'];
    $ukuran = $i['ukuran'];
    $nominal = $i['nominal'];
    $keterangan = $i['keterangan'];
    $status = $i['status'];
?>
    <?php if ($status == 0) {
        $publish = "readonly";
    } else {
        $publish = "readonly";
    } ?>
    <div class="modal fade view_harga" id="view_harga<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Data harga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-check-square"></i> <?php echo $title; ?></h3>
                        </div>

                        <div class="card-body">

                            <form autocomplete="off" action="<?php echo base_url('harga/edit/' . $id); ?>" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="ukuran">Ukuran</label>
                                        <input type="text" name="ukuran" <?php echo $publish; ?> value="<?php echo $ukuran; ?>" class="form-control" id="ukuran">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nominal">Nominal</label>
                                        <input type="text" name="nominal" <?php echo $publish; ?> value="<?php echo number_format($nominal); ?>" class="form-control" id="nominal">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" <?php echo $publish; ?> value="<?php echo $keterangan; ?>" class="form-control" id="keterangan">
                                </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <?php if ($publish == false) { ?>
                        <button type="submit" class="btn bg-danger">Update</button>
                    <?php } ?>
                    <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<!-- End Modal View -->