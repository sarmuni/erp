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
            <a role="button" href="#" class="btn bg-danger" title="Add" data-toggle="modal" data-target=".tambah_ref_driver">
                <i class="fas fa-user-plus"></i>
            </a>

            <a role="button" href="#" class="btn bg-danger" title="Print">
                <i class="fas fa-print"></i>
            </a>
            <a role="button" href="<?php base_url('ref_driver'); ?>" class="btn bg-danger" title="Refresh">
                <i class="fas fa-sync-alt"></i>
            </a>
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK/KTP</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Part Driver</th>
                            <th>&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($ref_driver as $row) {
                        if ($row['gender']==1) {
                            $gender = 'Male';
                        }else{
                            $gender = 'Female';
                        }

                        if ($row['part_driver']==0) {
                            $part_driver = 'Internal';
                        }else{
                            $part_driver = 'External';
                        }
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo strtoupper($row['nik']); ?></td>
                            <td><?php echo strtoupper($row['name']); ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $part_driver; ?></td>
                            <!-- <td>
                                <?php if ($row['role'] != 'Root' && $row['role'] != 'Administrator') { ?>
                                    <?php if ($row['is_active'] == 0) { ?>
                                        <center><a role="button" href="<?php echo site_url(); ?>account_user/publish/<?php echo $row['id']; ?>" id="publish" class="btn bg-danger publish" title="Aktif">
                                                <i class="fas fa-eye-slash"></i>
                                            </a></center>
                                    <?php } else { ?>
                                        <center><a role="button" href="<?php echo site_url(); ?>account_user/unpublish/<?php echo $row['id']; ?>" id="unpublish" class="btn bg-danger unpublish" title="Non Aktif">
                                                <i class="fas fa-eye"></i>
                                            </a></center>
                                    <?php } ?>
                                <?php } ?>
                            </td> -->
                            <td>
                                <a role="button" href="#" class="btn bg-danger" title="Edit" data-toggle="modal" data-target="#edit_ref_driver<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                </a>
                                
                                 <a role="button" href="<?php echo site_url(); ?>ref_driver/delete/<?php echo $row['id']; ?>" id="deleted" class="btn bg-danger tombol-hapus" title="delete record"><i class="fas fa-trash-alt"></i>
                                 </a>

                                <!-- <a role="button" href="#" class="btn bg-danger" title="More..." data-toggle="modal" data-target="#view_account_user<?php echo $row['id']; ?>">
                                    <i class="fab fa-searchengin"></i>
                                </a> -->

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
<div class="modal fade tambah_ref_driver" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Master driver</h5>
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
                        <form autocomplete="off" action="<?php echo base_url('ref_driver/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nik">NIK/KTP</label>
                                    <input type="text" name="nik" class="form-control" id="nik" value="<?= set_value('nik'); ?>">
                                    <?= form_error('nik', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <!-- <div class="form-group col-md-6">
                                    <label for="nik">Material Category</label>
                                    <select id="nik" class="form-control" name="nik" id="nik">
                                        <option selected="">--Select--</option>
                                        <option value="1">RM (Row Material)</option>
                                        <option value="2">PM (Packaging Material)</option>
                                    </select>
                                </div> -->

                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <!-- <div class="form-group col-md-6">
                                    <label for="gender">Material Name</label>
                                    <input type="text" name="gender" class="form-control" id="gender" value="<?= set_value('gender'); ?>">
                                    <?= form_error('gender', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div> -->
                                <div class="form-group col-md-6">
                                    <label for="gender">Gender</label>
                                    <select id="gender" class="form-control" name="gender" id="gender">
                                        <option selected="">--Select--</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone_number">Number Phone</label>
                                    <input type="text" id="phone_number" class="form-control" name="phone_number" value="<?= set_value('phone_number'); ?>">
                                    <?= form_error('phone_number', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address">Adderss</label>
                                    <input type="address" id="address" class="form-control" name="address" value="<?=set_value('address'); ?>">
                                    <?= form_error('address', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="sim_card">Part Driver</label>
                                    <select id="sim_card" class="form-control" name="sim_card" id="sim_card">
                                        <option selected="">--Select--</option>
                                        <option value="0">Internal</option>
                                        <option value="1">External</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="sim_card">SIM Number</label>
                                    <input type="text" name="sim_card" class="form-control" id="sim_card" value="<?= set_value('sim_card'); ?>">
                                    <?= form_error('sim_card', '<p style="color:red; font-size:12px;">', '</p>'); ?>
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
foreach ($ref_driver as $i) :
    $id                         = $i['id'];
    $nik                        = $i['nik'];
    $name                       = $i['name'];
    $gender                     = $i['gender'];
    $phone_number               = $i['phone_number'];
    $email                      = $i['email'];
    $sim_card                   = $i['sim_card'];
    $address                    = $i['address'];
    $part_driver                = $i['part_driver'];
?>
    <div class="modal fade edit_ref_driver" id="edit_ref_driver<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Master driver</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('ref_driver/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="nik">NIK/KTP</label>
                                        <input type="text" name="nik" value="<?php echo $nik; ?>" class="form-control" id="nik">
                                        <?= form_error('nik', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name"> Name </label>
                                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="name">
                                        <?= form_error('name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="gender">Gender</label>
                                        <select id="gender" class="form-control" name="gender" id="gender">
                                            <option selected="">--Select--</option>
                                            <?php if ($gender==1) {?>
                                                <option value="1" selected>Male</option>
                                                <option value="2">Female</option>
                                            <?php }else{?>
                                                <option value="1">Male</option>
                                                <option value="2"selected>Female</option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" id="phone_number" value="<?php echo $phone_number; ?>" class="form-control" name="phone_number" value="<?= set_value('phone_number'); ?>">
                                        <?= form_error('phone_number', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" id="email">
                                        <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="sim_card">SIM Number</label>
                                        <input type="text" name="sim_card" value="<?php echo $sim_card; ?>" class="form-control" id="sim_card">
                                        <?= form_error('sim_card', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" id="address">
                                        <?= form_error('address', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <!-- <div class="form-group col-md-6">
                                        <label for="part_driver">Part Driver</label>
                                        <input type="text" name="part_driver" value="<?php echo $part_driver; ?>" class="form-control" id="part_driver">
                                        <?= form_error('part_driver', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div> -->

                                    <div class="form-group col-md-6">
                                        <label for="part_driver">Part Driver</label>
                                        <select id="part_driver" class="form-control" name="part_driver" id="part_driver">
                                            <option selected="">--Select--</option>
                                            <?php if ($part_driver==0) {?>
                                                <option value="0" selected>Internal</option>
                                                <option value="1">External</option>
                                            <?php }else{?>
                                                <option value="0">Internal</option>
                                                <option value="1"selected>External</option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>


                                </div>
                                
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-danger">Update</button>
                    <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>
 <!--End Modal Edit -->



<!-- Modal View 
<?php
foreach ($account_user as $i) :
    $id = $i['id'];
    $fullname = $i['fullname'];
    $email = $i['email'];
    $phone = $i['phone'];
    $password = $i['password'];
    $role_id = $i['role_id'];
    $is_active = $i['is_active'];
?>
    <?php if ($is_active == 0) {
        $publish = "readonly";
    } else {
        $publish = "readonly";
    } ?>
    <div class="modal fade view_account_user" id="view_account_user<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View account user</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('account_user/edit/' . $id); ?>" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="fullname">Nama</label>
                                        <input type="text" name="fullname" <?php echo $publish; ?> value="<?php echo $fullname; ?>" class="form-control" id="fullname">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" <?php echo $publish; ?> value="<?php echo $email; ?>" class="form-control" id="email">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="text" name="password" <?php echo $publish; ?> value="<?php echo $password; ?>" class="form-control" id="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" <?php echo $publish; ?> value="<?php echo $phone; ?>" class="form-control" id="phone">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="role_id">Level</label>
                                    <select id="role_id" class="form-control" <?php echo $publish; ?> name="role_id" id="role_id">
                                        <option selected="">Pilih</option>
                                        <option value="2">Kurir</option>
                                        <option value="3">Agen</option>
                                        <option value="4">Keuangan</option>
                                        <option value="5">Gudang</option>
                                    </select>
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
End Modal View -->