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
                <!-- <a role="button" href="#" class="btn bg-danger" title="Tambah data pelanggan" data-toggle="modal" data-target=".tambah_pelanggan">
                    <i class="fas fa-user-plus"></i>
                </a> -->
                <!-- <a role="button" href="#" class="btn bg-danger" title="Cetak data pelanggan">
                    <i class="fas fa-print"></i>
                </a> -->
                <a role="button" href="<?php base_url('pelanggan'); ?>" class="btn bg-danger" title="Refresh data pelanggan">
                    <i class="fas fa-sync-alt"></i>
                </a>
            <?php } ?>
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Resi</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>No Passport</th>
                            <th>Alamat</th>
                            <th>Hp</th>
                            <th>Kurir</th>
                            <th>Barang</th>
                            <th>Agen</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($pelanggan as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['no_resi']; ?></td>
                            <td>
                                <center><img src="data:<?php echo $row['tipe_foto']; ?>;base64,<?php echo $row['foto']; ?>" width="75"></center>
                            </td>
                            <td><?php echo $row['nama_pelanggan']; ?><br>Kirim Ke : <?php echo $row['nama_penerima']; ?></td>
                            <td><?php echo $row['no_ic_passport']; ?></td>
                            <td><?php echo $row['alamat_pelanggan']; ?><br>Tujuan Ke : <?php echo $row['provinsi']; ?></td>
                            <td><?php echo $row['hp']; ?></td>
                            <td><?php echo $row['nama_kurir']; ?><br><?php echo date('d-m-Y H:i:s', strtotime($row['tanggal_dibuat'])) ?></td>
                            <td>
                                <center>
                                    <a role="button" href="<?php echo site_url(); ?>penerimaan/view_barang/<?php echo $row['no_resi']; ?>" class="btn bg-danger" title="Lihat Barang"><i class="fab fa-searchengin"></i>
                                    </a>
                                </center>
                            </td>
                            <td>
                                <?php if ($user['role_id'] == 1) { ?>
                                    <a role="button" href="#" class="btn bg-danger" title="Edit data pelanggan" data-toggle="modal" data-target="#edit_pelanggan<?php echo $row['no_resi']; ?>">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <?php if ($row['status'] == 0) { ?>
                                        <a role="button" href="<?php echo site_url(); ?>pelanggan/delete/<?php echo $row['no_resi']; ?>" id="hapus" class="btn bg-danger tombol-hapus" title="Hapus data pelanggan">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    <?php } ?>

                                <?php } elseif ($user['role_id'] == 1 or $user['role_id'] == 3) { ?>
                                    <!-- <a role="button" href="<?php echo site_url(); ?>penerimaan/terima_agen/<?php echo $row['no_resi']; ?>" id="Kirim_gudang" class="btn bg-danger kirim_gudang" title="Kirim Ke Gudang">
                                        <i class="fas fa-boxes">Kirim Ke Gudang</i>
                                    </a> -->
                                <?php } ?>
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
<div class="modal fade tambah_pelanggan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form autocomplete="off" action="<?php echo base_url('pelanggan/add'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- Pengirim -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-check-square"></i> Pengirim</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="no_ic_passport">ID Passport/NIK</label>
                                    <input type="text" name="no_ic_passport" class="form-control" id="no_ic_passport" value="<?= set_value('no_ic_passport'); ?>">
                                    <?= form_error('no_ic_passport', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="hp">Hp</label>
                                    <input type="text" name="hp" class="form-control" id="hp" value="<?= set_value('hp'); ?>">
                                    <?= form_error('hp', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" value="<?= set_value('alamat'); ?>">
                                    <?= form_error('alamat', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="foto">Foto KTP</label>
                                    <input type="file" class="form-control" name="foto" id="foto">
                                </div>
                                <?php if ($user['role_id'] == 2) { ?>
                                    <div class="form-group col-md-6">
                                        <label for="id_kurir">Kurir</label>
                                        <input type="text" name="id_kurir" readonly class="form-control" id="id_kurir" value="<?php echo $user['email']; ?>">
                                        <?= form_error('id_kurir', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group col-md-6">
                                        <label for="id_kurir">Kurir</label>
                                        <select id="id_kurir" name="id_kurir" class="form-control" value="<?= set_value('id_kurir'); ?>">
                                            <option value="0">Pilih</option>
                                            <?php foreach ($kurir as $row1) { ?>
                                                <option value="<?php echo $row1['email']; ?>"><?php echo $row1['email']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('id_kurir', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                    <!-- end penirim -->


                    <!-- penerima -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-check-square"></i> Penerima</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="penerima_nama">Nama</label>
                                    <input type="text" name="penerima_nama" class="form-control" id="penerima_nama" value="<?= set_value('penerima_nama'); ?>">
                                    <?= form_error('penerima_nama', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="penerima_alamat">Alamat Detail</label>
                                    <input type="text" name="penerima_alamat" class="form-control" id="penerima_alamat" value="<?= set_value('penerima_alamat'); ?>">
                                    <?= form_error('penerima_alamat', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="rt">RT</label>
                                    <input type="text" name="rt" class="form-control" id="rt" value="<?= set_value('rt'); ?>">
                                    <?= form_error('rt', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="rw">RW</label>
                                    <input type="text" name="rw" class="form-control" id="rw" value="<?= set_value('rw'); ?>">
                                    <?= form_error('rw', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="desa">Desa</label>
                                    <input type="text" name="desa" class="form-control" id="desa" value="<?= set_value('desa'); ?>">
                                    <?= form_error('desa', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="kelurahan">Kelurahan</label>
                                    <input type="text" name="kelurahan" class="form-control" id="kelurahan" value="<?= set_value('kelurahan'); ?>">
                                    <?= form_error('kelurahan', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" name="kecamatan" class="form-control" id="kecamatan" value="<?= set_value('kecamatan'); ?>">
                                    <?= form_error('kecamatan', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="kabupaten">Kabupaten/Kota</label>
                                    <input type="text" name="kabupaten" class="form-control" id="kabupaten" value="<?= set_value('kabupaten'); ?>">
                                    <?= form_error('kabupaten', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" name="provinsi" class="form-control" id="provinsi" value="<?= set_value('provinsi'); ?>">
                                    <?= form_error('provinsi', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="negara">Negara</label>
                                    <input type="text" name="negara" readonly class="form-control" id="negara" value="Indonesia">
                                    <?= form_error('negara', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="hp1">HP 1</label>
                                    <input type="text" name="hp1" class="form-control" id="hp1" value="<?= set_value('hp1'); ?>">
                                    <?= form_error('hp1', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="hp2">HP 2</label>
                                    <input type="text" name="hp2" class="form-control" id="hp2" value="<?= set_value('hp2'); ?>">
                                    <?= form_error('hp2', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- end penerima -->

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
foreach ($pelanggan as $i) :
    //pelanggan
    $no_resi            = $i['no_resi'];
    $nama_pelanggan     = $i['nama_pelanggan'];
    $no_ic_passport     = $i['no_ic_passport'];
    $alamat_pelanggan   = $i['alamat_pelanggan'];
    $hp                 = $i['hp'];
    $status             = $i['status'];
    $id_kurir           = $i['id_kurir'];
    //penerima
    $nama_penerima      = $i['nama_penerima'];
    $alamat_penerima    = $i['alamat_penerima'];
    $rt                 = $i['rt'];
    $rw                 = $i['rw'];
    $desa               = $i['desa'];
    $kecamatan          = $i['kecamatan'];
    $kabupaten          = $i['kabupaten'];
    $provinsi           = $i['provinsi'];
    $negara             = $i['negara'];
    $hp1                = $i['hp1'];
    $hp2                = $i['hp2'];
?>
    <?php if ($status == 1) {
        $readonly = "readonly";
    } else {
        $readonly = "";
    } ?>
    <div class="modal fade edit_pelanggan" id="edit_pelanggan<?php echo $no_resi; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form edit pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form autocomplete="off" action="<?php echo base_url('pelanggan/edit/' . $no_resi); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <!-- Pengirim -->
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="far fa-check-square"></i> Pengirim</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="no_ic_passport">ID Passport/NIK</label>
                                        <input type="hidden" id="no_resi" name="no_resi" value="<?php echo $no_resi; ?>">
                                        <input type="text" name="no_ic_passport" <?php echo $readonly; ?> class="form-control" id="no_ic_passport" value="<?php echo $no_ic_passport; ?>">
                                        <?= form_error('no_ic_passport', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama_pelanggan">Nama</label>
                                        <input type="text" name="nama_pelanggan" <?php echo $readonly; ?> class="form-control" id="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>">
                                        <?= form_error('nama_pelanggan', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="hp">Hp</label>
                                        <input type="text" name="hp" <?php echo $readonly; ?> class="form-control" id="hp" value="<?php echo $hp; ?>">
                                        <?= form_error('hp', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="alamat_pelanggan">Alamat</label>
                                        <input type="text" name="alamat_pelanggan" <?php echo $readonly; ?> class="form-control" id="alamat_pelanggan" value="<?php echo $alamat_pelanggan; ?>">
                                        <?= form_error('alamat_pelanggan', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="foto">Foto KTP</label>
                                        <input type="file" <?php echo $readonly; ?> class="form-control" name="foto" id="foto">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="id_kurir">Kurir</label>
                                        <select id="id_kurir" name="id_kurir" <?php echo $readonly; ?> class="form-control" value="<?php echo $id_kurir; ?>">
                                            <option value="0">Pilih</option>
                                            <?php foreach ($kurir as $row1) { ?>
                                                <?php if ($id_kurir == $row1['id']) { ?>
                                                    <option value="<?php echo $row1['id']; ?>" selected><?php echo $row1['nama']; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['nama']; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('id_kurir', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end penirim -->


                        <!-- penerima -->
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="far fa-check-square"></i> Penerima</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama_penerima">Nama</label>
                                        <input type="text" name="nama_penerima" <?php echo $readonly; ?> class="form-control" id="nama_penerima" value="<?php echo $nama_penerima; ?>">
                                        <?= form_error('nama_penerima', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="alamat_penerima">Alamat Detail</label>
                                        <input type="text" name="alamat_penerima" <?php echo $readonly; ?> class="form-control" id="alamat_penerima" value="<?php echo $alamat_penerima; ?>">
                                        <?= form_error('alamat_penerima', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="rt">RT</label>
                                        <input type="text" name="rt" <?php echo $readonly; ?> class="form-control" id="rt" value="<?php echo $rt; ?>">
                                        <?= form_error('rt', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="rw">RW</label>
                                        <input type="text" name="rw" <?php echo $readonly; ?> class="form-control" id="rw" value="<?php echo $rw; ?>">
                                        <?= form_error('rw', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="desa">Desa</label>
                                        <input type="text" name="desa" <?php echo $readonly; ?> class="form-control" id="desa" value="<?php echo $desa; ?>">
                                        <?= form_error('desa', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="kelurahan">Kelurahan</label>
                                        <input type="text" name="kelurahan" <?php echo $readonly; ?> class="form-control" id="kelurahan" value="<?php echo $kelurahan; ?>">
                                        <?= form_error('kelurahan', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" name="kecamatan" <?php echo $readonly; ?> class="form-control" id="kecamatan" value="<?php echo $kecamatan; ?>">
                                        <?= form_error('kecamatan', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="kabupaten">Kabupaten/Kota</label>
                                        <input type="text" name="kabupaten" <?php echo $readonly; ?> class="form-control" id="kabupaten" value="<?php echo $kabupaten; ?>">
                                        <?= form_error('kabupaten', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" name="provinsi" <?php echo $readonly; ?> class="form-control" id="provinsi" value="<?php echo $provinsi; ?>">
                                        <?= form_error('provinsi', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="negara">Negara</label>
                                        <input type="text" name="negara" <?php echo $readonly; ?> class="form-control" id="negara" value="<?php echo $negara; ?>">
                                        <?= form_error('negara', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="hp1">HP 1</label>
                                        <input type="text" name="hp1" <?php echo $readonly; ?> class="form-control" id="hp1" value="<?php echo $hp1; ?>">
                                        <?= form_error('hp1', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="hp2">HP 2</label>
                                        <input type="text" name="hp2" <?php echo $readonly; ?> class="form-control" id="hp2" value="<?php echo $hp2; ?>">
                                        <?= form_error('hp2', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- end penerima -->

                    </div>
                    <div class="modal-footer">
                        <?php if ($readonly == false) { ?>
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