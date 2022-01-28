<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
foreach ($pelanggan as $row) {
?>

    <div class="row">
        <!-- Pengirim -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-user-friends"></i> Pengirim</h3>
                </div>

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <div class="flash-data-required" data-flashdata="<?= $this->session->flashdata('required'); ?>"></div>
                <div class="flash-data-upload" data-flashdata="<?= $this->session->flashdata('upload'); ?>"></div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">No Resi</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['no_resi']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <img src="data:<?php echo $row['tipe_foto']; ?>;base64,<?php echo $row['foto']; ?>" width="90%">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['nama_pelanggan']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">No Passport</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['no_ic_passport']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['alamat_pelanggan']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">HP</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['hp']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>

                </div>
                <div class="card-footer small text-muted">Created <?php echo date('d-m-Y H:i:s', strtotime($row['tanggal_dibuat'])); ?> Nama Kurir : <?php echo $row['nama_kurir']; ?></div>
            </div>
        </div>
        <!-- End Pengirim -->

        <!-- Penerima -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-user-friends"></i> Penerima</h3>
                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['nama_penerima']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['alamat_penerima']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">RT</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['rt']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">RW</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['rw']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Desa</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['desa']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['kecamatan']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['kabupaten']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['provinsi']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Negara</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['negara']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">HP 1</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['hp1']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">HP 2</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['hp2']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input" class="col-sm-2 col-form-label">Catatan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" value="<?php echo $row['catatan']; ?>" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="card-footer small text-muted">Created <?php echo date('d-m-Y H:i:s', strtotime($row['tanggal_dibuat'])); ?> Nama Kurir : <?php echo $row['nama_kurir']; ?></div>
            </div>
        </div>
        <!-- End Penerima -->

    </div>
<?php } ?>

<!-- Barang -->
<div class="card mb-3">
    <div class="card-header">
        <h3><i class="fas fa-user-friends"></i> Data Barang</h3>
    </div>
    <div class="card-body">
        <?php if ($user['role_id'] == 1 or $user['role_id'] == 2) { ?>
            <a role="button" href="#" class="btn bg-danger" title="Tambah data barang" data-toggle="modal" data-target=".tambah_barang">
                <i class="fas fa-user-plus"></i>
            </a>
            <a role="button" href="<?php echo site_url(); ?>cetak/invoice/<?php echo $row['no_resi']; ?>" target="_blank" class="btn bg-danger" title="Cetak Invoice">
                <i class="fas fa-print"></i>
            </a>
            <a role="button" href="<?php base_url('pelanggan'); ?>" class="btn bg-danger" title="Refresh data barang">
                <i class="fas fa-sync-alt"></i>
            </a>
        <?php } ?>
        <a role="button" href="<?php echo base_url('pelanggan'); ?>" class="btn bg-danger" title="Kembali">
            <i class="fas fa-chevron-circle-left"></i>
        </a>
        <?php if ($user['role_id'] == 1 or $user['role_id'] == 3) { ?>
            <a role="button" href="<?php echo site_url(); ?>pelanggan/terima_agen/<?php echo $row['no_resi']; ?>" id="terima_agen" class="btn bg-success terima_agen" title="Terima Agen">
                <i class="fas fa-clipboard-check"></i>
            </a>
        <?php } ?>
        <hr>

        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Resi</th>
                        <th>No Resi Barang</th>
                        <th>Foto Barang</th>
                        <th>Nama Barang</th>
                        <th>Size</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total = 0;
                    foreach ($barang as $row) {
                        $total += $row['harga'];
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['no_resi']; ?></td>
                            <td><?php echo $row['no_resi_barang']; ?></td>
                            <td><img src="data:<?php echo $row['tipe_foto']; ?>;base64,<?php echo $row['foto_barang']; ?>" width="20%"> Keterangan : <?php echo $row['barang_detail']; ?></td>
                            <td><?php echo $row['nama_barang']; ?></td>
                            <td><?php echo $row['size']; ?></td>
                            <td><?php echo number_format($row['harga']); ?></td>
                            <td>
                                <?php if ($user['role_id'] == 1 or $user['role_id'] == 2) { ?>
                                    <center><a role="button" href="<?php echo site_url(); ?>pelanggan/delete_barang/<?php echo $row['no_resi_barang']; ?>" id="hapus-barang" class="btn bg-danger tombol-hapus" title="Hapus data barang">
                                            <i class="fas fa-trash-alt"></i>
                                        </a></center>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
                <thead>
                    <tr>
                        <th colspan="6">
                            <center>Total</center>
                        </th>
                        <th><?php echo number_format($total); ?></th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
</div>
<!-- end Barang -->


<!-- Modal Add -->
<div class="modal fade tambah_barang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form autocomplete="off" action="<?php echo base_url('pelanggan/add_barang'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- barang -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-check-square"></i> Barang</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_resi">No Resi</label>
                                    <input type="text" name="no_resi" readonly class="form-control" id="no_resi" value="<?php echo $row['no_resi']; ?>">
                                    <?= form_error('no_resi', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="nama_barang">Nama Barang</label>
                                    <select id="nama_barang" name="nama_barang" class="form-control nama_barang">
                                        <option value="0">Pilih Barang</option>
                                        <?php foreach ($daftar_barang as $row1) { ?>
                                            <option value="<?php echo $row1['id']; ?>"><?php echo $row1['id']; ?> - <?php echo $row1['nama_barang']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('size', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="size">Size</label>
                                    <select id="size" name="size" class="form-control" value="<?= set_value('size'); ?>">
                                        <option value="0">Pilih</option>
                                        <?php foreach ($harga as $row1) { ?>
                                            <option value="<?php echo $row1['ukuran']; ?>"><?php echo $row1['ukuran']; ?> - <?php echo number_format($row1['nominal']); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('size', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="harga">Harga</label>
                                    <input type="text" name="harga" required="required" class="form-control" id="harga" value="<?= set_value('harga'); ?>">
                                    <?= form_error('harga', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="foto_barang">Foto Barang</label>
                                    <input type="file" class="form-control" name="foto_barang" required="required" id="foto_barang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end barang -->

                    <!-- Jenis barang -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-check-square"></i> Jenis Barang</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="id_barang">Detail Barang</label>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <div class="form-check" id="id_barang">
                                                <label class="form-check-label">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="keterangan">Lain - Lain</label>
                                    <input type="text" name="keterangan" required="required" class="form-control" id="keterangan" value="<?= set_value('keterangan'); ?>">
                                    <?= form_error('keterangan', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Jenis barang -->


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