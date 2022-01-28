<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-user-friends"></i> List Vendor Machinery</h3>
        </div>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="flash-data-required" data-flashdata="<?= $this->session->flashdata('required'); ?>"></div>
        <div class="flash-data-upload" data-flashdata="<?= $this->session->flashdata('upload'); ?>"></div>

        <div class="card-body">
        
            <a role="button" href="#" class="btn bg-danger" title="Add Machinery" data-toggle="modal" data-target=".tambah_agen"><i class="fas fa-user-plus"></i></a>

            <a role="button" href="#" class="btn bg-danger" title="Print">
                <i class="fas fa-print"></i>
            </a>
            <a role="button" href="<?php base_url('machinery'); ?>" class="btn bg-danger" title="Refresh">
                <i class="fas fa-sync-alt"></i>
            </a>
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Vendor Name</th>
                            <th>Description Machinery</th>
                            <th>Origin Country</th>
                            <th>Number of Packing List</th>
                            <th>Number of Container</th>
                            <th>Area Location</th>
                            <th width='150px'>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($machinery as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo strtoupper($row['vendor']); ?></td>
                            <td><?php echo strtoupper($row['machinery_name']); ?></td>
                            <td><?php echo strtoupper($row['origin']); ?></td>
                            <td><?php echo strtoupper($row['packing_list']); ?></td>
                            <td><?php echo strtoupper($row['number_container']); ?></td>
                            <td><?php echo strtoupper($row['location']); ?></td>
                            <td><center>
                                    <a role="button" href="#" class="btn bg-danger" title="Edit" data-toggle="modal" data-target="#edit_agen<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                    </a>
                                    <a role="button" href="<?php echo site_url(); ?>agen/delete/<?php echo $row['id']; ?>" id="hapus" class="btn bg-danger tombol-hapus" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    
                                    <a role="button" href="#" class="btn bg-danger" title="More..." data-toggle="modal" data-target="#view_agen<?php echo $row['id']; ?>"><i class="fab fa-searchengin"></i></a>
                            </center></td>
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

<!-- Modal Add 
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
End Modal Add -->

