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
        <div class="flash-data-upload" data-flashdata="<?= $this->session->flashdata('upload'); ?>"></div>

        <div class="card-body">
            <?php if ($user['role_id'] == 1) { ?>
                <a role="button" href="#" class="btn bg-danger" title="Tambah Data agen" data-toggle="modal" data-target=".tambah_agen">
                    <i class="fas fa-user-plus"></i>
                </a>
            <?php } ?>

            <a role="button" href="#" class="btn bg-danger" title="Cetak Data agen">
                <i class="fas fa-print"></i>
            </a>
            <a role="button" href="<?php base_url('agen'); ?>" class="btn bg-danger" title="Refresh Data agen">
                <i class="fas fa-sync-alt"></i>
            </a>
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($agen as $row) {
                        if ($row['jenis_kelamin'] == 1) {
                            $jenis = "Laki-Laki";
                        } elseif ($row['jenis_kelamin'] == 2) {
                            $jenis = "Perempuan";
                        } else {
                            $jenis = "";
                        }
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['nik']; ?></td>
                            <td>
                                <center><img src="data:<?php echo $row['tipe_foto']; ?>;base64,<?php echo $row['foto']; ?>" width="75"></center>
                            </td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['tempat_lahir']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row['tanggal_lahir'])); ?></td>
                            <td><?php echo $jenis; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php if ($user['role_id'] == 1) { ?>
                                    <?php if ($row['status'] == 0) { ?>
                                        <center><a role="button" href="<?php echo site_url(); ?>agen/publish/<?php echo $row['agen_id']; ?>" id="publish" class="btn bg-danger publish" title="Aktif">
                                                <i class="fas fa-eye"></i>
                                            </a></center>
                                    <?php } else { ?>
                                        <center><a role="button" href="<?php echo site_url(); ?>agen/unpublish/<?php echo $row['agen_id']; ?>" id="unpublish" class="btn bg-danger unpublish" title="Non Aktif">
                                                <i class="fas fa-eye-slash"></i>
                                            </a></center>
                                    <?php } ?>
                                <?php } ?>

                            </td>
                            <td>
                                <?php if ($user['role_id'] == 1) { ?>
                                    <a role="button" href="#" class="btn bg-danger" title="Edit Data agen" data-toggle="modal" data-target="#edit_agen<?php echo $row['agen_id']; ?>">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <?php if ($row['status'] == 1) { ?>
                                        <a role="button" href="<?php echo site_url(); ?>agen/delete/<?php echo $row['agen_id']; ?>" id="hapus" class="btn bg-danger tombol-hapus" title="Hapus data agen">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    <?php } ?>
                                <?php } ?>

                                <a role="button" href="#" class="btn bg-danger" title="Selengkapnya" data-toggle="modal" data-target="#view_agen<?php echo $row['agen_id']; ?>">
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
<div class="modal fade tambah_agen" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add agen</h5>
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

                        <form autocomplete="off" action="<?php echo base_url('agen/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nik">NIK</label>
                                    <input type="text" name="nik" required class="form-control" id="nik" value="<?= set_value('nik'); ?>">
                                    <?= form_error('nik', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" required class="form-control" id="nama" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" required class="form-control" id="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>">
                                    <?= form_error('tempat_lahir', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" required class="form-control" id="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>">
                                    <?= form_error('tanggal_lahir', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" required id="alamat" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="negara">Negara</label>
                                    <input type="text" name="negara" class="form-control" required id="negara" value="<?= set_value('negara'); ?>">
                                    <?= form_error('negara', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" required class="form-control" value="<?= set_value('jenis_kelamin'); ?>">
                                        <option selected="">Pilih</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hp">Hp</label>
                                    <input type="text" name="hp" class="form-control" id="hp" required value="<?= set_value('hp'); ?>">
                                    <?= form_error('hp', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" required name="foto" id="foto">
                                </div>
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
foreach ($agen as $i) :
    $id = $i['agen_id'];
    $nik = $i['nik'];
    $nama = $i['nama'];
    $tempat_lahir = $i['tempat_lahir'];
    $tanggal_lahir = $i['tanggal_lahir'];
    $jenis_kelamin = $i['jenis_kelamin'];
    $alamat = $i['alamat'];
    $negara = $i['negara'];
    $hp = $i['hp'];
    $status = $i['status'];
?>
    <?php if ($status == 1) {
        $publish = "readonly";
    } else {
        $publish = "";
    } ?>
    <div class="modal fade edit_agen" id="edit_agen<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit agen</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('agen/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" <?php echo $publish; ?> value="<?php echo $nik; ?>" class="form-control" id="nik">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" <?php echo $publish; ?> value="<?php echo $nama; ?>" class="form-control" id="nama">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" <?php echo $publish; ?> value="<?php echo $tempat_lahir; ?>" class="form-control" id="tempat_lahir">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" <?php echo $publish; ?> value="<?php echo $tanggal_lahir; ?>" class="form-control" id="tanggal_lahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" <?php echo $publish; ?> value="<?php echo $alamat; ?>" class="form-control" id="alamat">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="negara">Negara</label>
                                        <input type="text" name="negara" <?php echo $publish; ?> value="<?php echo $negara; ?>" class="form-control" id="negara">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select id="jenis_kelamin" name="jenis_kelamin" <?php echo $publish; ?> value="<?php echo $jenis_kelamin; ?>" class="form-control">

                                            <?php if ($jenis_kelamin == 1) { ?>
                                                <option value="1" selected>Laki-Laki</option>
                                                <option value="2">Perempuan</option>
                                            <?php } else { ?>
                                                <option value="1">Laki-Laki</option>
                                                <option value="2" selected>Perempuan</option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="hp">Hp</label>
                                        <input type="text" name="hp" <?php echo $publish; ?> value="<?php echo $hp; ?>" class="form-control" id="hp">
                                    </div>
                                    <?php if ($publish == false) { ?>
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" class="form-control" name="foto" id="foto">
                                        </div>
                                    <?php } ?>

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
foreach ($agen as $i) :
    $id = $i['agen_id'];
    $nik = $i['nik'];
    $nama = $i['nama'];
    $tempat_lahir = $i['tempat_lahir'];
    $tanggal_lahir = $i['tanggal_lahir'];
    $jenis_kelamin = $i['jenis_kelamin'];
    $alamat = $i['alamat'];
    $negara = $i['negara'];
    $hp = $i['hp'];
    $foto = $i['foto'];
    $status = $i['status'];
?>
    <?php if ($status == 0) {
        $publish = "readonly";
    } else {
        $publish = "readonly";
    } ?>
    <div class="modal fade view_agen" id="view_agen<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Data agen</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('agen/edit/' . $id); ?>" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" <?php echo $publish; ?> value="<?php echo $nik; ?>" class="form-control" id="nik">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama">Foto</label>
                                        <center><img src="data:<?php echo $row['tipe_foto']; ?>;base64,<?php echo $row['foto']; ?>" width="90%"></center>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" <?php echo $publish; ?> value="<?php echo $nama; ?>" class="form-control" id="nama">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" <?php echo $publish; ?> value="<?php echo $tempat_lahir; ?>" class="form-control" id="tempat_lahir">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" <?php echo $publish; ?> value="<?php echo $tanggal_lahir; ?>" class="form-control" id="tanggal_lahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" <?php echo $publish; ?> value="<?php echo $alamat; ?>" class="form-control" id="alamat">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="negara">Negara</label>
                                        <input type="text" name="negara" <?php echo $publish; ?> value="<?php echo $negara; ?>" class="form-control" id="negara">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select id="jenis_kelamin" name="jenis_kelamin" <?php echo $publish; ?> value="<?php echo $jenis_kelamin; ?>" class="form-control">

                                            <?php if ($jenis_kelamin == 1) { ?>
                                                <option value="1" selected>Laki-Laki</option>
                                                <option value="2">Perempuan</option>
                                            <?php } else { ?>
                                                <option value="1">Laki-Laki</option>
                                                <option value="2" selected>Perempuan</option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="hp">Hp</label>
                                        <input type="text" name="hp" <?php echo $publish; ?> value="<?php echo $hp; ?>" class="form-control" id="hp">
                                    </div>
                                    <?php if ($publish == false) { ?>
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" class="form-control" name="foto" id="foto" value="<?php echo $foto; ?>" multiple="multiple">
                                        </div>
                                    <?php } ?>

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