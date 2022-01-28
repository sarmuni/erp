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
            <a role="button" href="#" class="btn bg-danger" title="Add" data-toggle="modal" data-target=".tambah_ref_room_zone">
                <i class="fas fa-user-plus"></i>
            </a>

            <a role="button" href="#" class="btn bg-danger" title="Print">
                <i class="fas fa-print"></i>
            </a>
            <a role="button" href="<?php base_url('ref_room_zone'); ?>" class="btn bg-danger" title="Refresh">
                <i class="fas fa-sync-alt"></i>
            </a>
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Room Name</th>
                            <th>GLN-RA</th>
                            <th>Area Name</th>
                            <th>Description</th>
                            <th>&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($ref_room_zone as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo strtoupper($row['name']); ?></td>
                            <td><?php echo strtoupper($row['gln_ra']); ?></td>
                            <td><?php echo strtoupper($row['name_room_zone']); ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <a role="button" href="#" class="btn bg-danger" title="Edit" data-toggle="modal" data-target="#edit_ref_room_zone<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                </a>
                                
                                 <a role="button" href="<?php echo site_url(); ?>ref_room_zone/delete/<?php echo $row['id']; ?>" id="deleted" class="btn bg-danger tombol-hapus" title="delete record"><i class="fas fa-trash-alt"></i>
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
<div class="modal fade tambah_ref_room_zone" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Master Room Zone</h5>
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
                        <form autocomplete="off" action="<?php echo base_url('ref_room_zone/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="area_zone_id">Area Name</label>
                                    <select id="area_zone_id" class="form-control" name="area_zone_id" id="area_zone_id" value="<?= set_value('area_zone_id'); ?>">
                                        <option selected="">Select</option>
                                        <?php foreach ($ref_area_zone as $select) { ?>
                                            <option value="<?php echo $select['id'] ?>"><?php echo $select['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('area_zone_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name">Room Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" class="form-control" value="<?= set_value('description'); ?>"></textarea>
                                    <?= form_error('description', '<p style="color:red; font-size:12px;">', '</p>'); ?>
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
foreach ($ref_room_zone as $i) :
    $id                         = $i['id'];
    $area_zone_id               = $i['area_zone_id'];
    $name                       = $i['name'];
    $description                = $i['description'];
?>
    <div class="modal fade edit_ref_room_zone" id="edit_ref_room_zone<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Zone Area</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('ref_room_zone/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">

                                <div class="form-group col-md-6">
                                        <label for="area_zone_id">Area Name</label>
                                        <select id="area_zone_id" class="form-control" name="area_zone_id" id="area_zone_id">
                                            <option selected="">--Select--</option>
                                            <?php foreach ($ref_area_zone as $select) { ?>
                                                
                                                <?php if ($select['id']==$area_zone_id) { ?>
                                                <option value="<?php echo $select['id'] ?>" selected><?php echo $select['name'] ?></option>  

                                                <?php }else{ ?>
                                                    <option value="<?php echo $select['id'] ?>"><?php echo $select['name'] ?></option>  
                                                    
                                                <?php } ?>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Room Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $name; ?>">
                                        <?= form_error('name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" class="form-control" value="<?= set_value('description'); ?>"><?php echo $description; ?></textarea>
                                    <?= form_error('description', '<p style="color:red; font-size:12px;">', '</p>'); ?>
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