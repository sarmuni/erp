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
            <a role="button" href="#" class="btn bg-danger btn-sm" title="Add" data-toggle="modal" data-target=".tambah_ref_rack_level">
                <i class="fas fa-user-plus"></i> Add New
            </a>

            <a role="button" href="#" class="btn bg-danger btn-sm" title="Print">
                <i class="fas fa-print"></i> Print PDF
            </a>
            <a role="button" href="<?php echo base_url('ref_rack_level'); ?>" class="btn bg-danger btn-sm" title="Refresh">
                <i class="fas fa-sync-alt"></i> Refresh
            </a>

            <span class="pull-right"><a href="#" id="" title="Sort" class="btn bg-info btn-sm"><i class="fas fa-search" aria-hidden="true"></i> Sort</a></span>
            <div class="col-sm-2 pull-right">
                <select id="departments_id" name="departments_id" required class="form-control select2" value="<?= set_value('departments_id'); ?>">
                    <option value="">-- All District--</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="year" name="year" required class="form-control select2" value="<?= set_value('year'); ?>">
                    <option value="">-- All Year--</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="category" name="category" required class="form-control select2" value="<?= set_value('category'); ?>">
                    <option value="">-- All Factory--</option>
                </select>
            </div>
            
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Rack Level Name</th>
                            <th>GLN-RLD</th>
                            <th>Rack Location Name</th>
                            <th>Description</th>
                            <th>&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($ref_rack_level as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo strtoupper($row['name']); ?></td>
                            <td><?php echo strtoupper($row['gln_rld']); ?></td>
                            <td><?php echo strtoupper($row['name_rack_location']); ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <a role="button" href="#" class="btn bg-warning btn-sm" title="Edit" data-toggle="modal" data-target="#edit_ref_rack_level<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                </a>
                                
                                 <a role="button" href="<?php echo site_url(); ?>ref_rack_level/delete/<?php echo $row['id']; ?>" id="deleted" class="btn bg-danger btn-sm tombol-hapus" title="delete record"><i class="fas fa-trash-alt"></i>
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
<div class="modal fade tambah_ref_rack_level" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Master Rack level</h5>
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
                        <form autocomplete="off" action="<?php echo base_url('ref_rack_level/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="id_rack_loc">Rack Location Name</label>
                                    <select id="id_rack_loc" class="form-control form-control-sm" name="id_rack_loc" id="id_rack_loc" value="<?= set_value('id_rack_loc'); ?>">
                                        <option selected="">Select</option>
                                        <?php foreach ($ref_rack_location as $select) { ?>
                                            <option value="<?php echo $select['id'] ?>"><?php echo $select['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('id_rack_loc', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="name">Rack level Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" id="name" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" class="form-control form-control-sm" value="<?= set_value('description'); ?>"></textarea>
                                    <?= form_error('description', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn bg-danger">Save</button>
                <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button> -->

                <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Save</button>
                <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->


<!-- Modal Edit -->
<?php
foreach ($ref_rack_level as $i) :
    $id                         = $i['id'];
    $id_rack_loc               = $i['id_rack_loc'];
    $name                       = $i['name'];
    $description                = $i['description'];
?>
    <div class="modal fade edit_ref_rack_level" id="edit_ref_rack_level<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Rack Level</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('ref_rack_level/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">

                                <div class="form-group col-md-6">
                                        <label for="id_rack_loc">Rack Location Name</label>
                                        <select id="id_rack_loc" class="form-control form-control-sm" name="id_rack_loc" id="id_rack_loc">
                                            <option selected="">--Select--</option>
                                            <?php foreach ($ref_rack_location as $select) { ?>
                                                
                                                <?php if ($select['id']==$id_rack_loc) { ?>
                                                <option value="<?php echo $select['id'] ?>" selected><?php echo $select['name'] ?></option>  

                                                <?php }else{ ?>
                                                    <option value="<?php echo $select['id'] ?>"><?php echo $select['name'] ?></option>  
                                                    
                                                <?php } ?>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Rack Level Name</label>
                                        <input type="text" name="name" class="form-control form-control-sm" id="name" value="<?php echo $name; ?>">
                                        <?= form_error('name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" class="form-control form-control-sm" value="<?= set_value('description'); ?>"><?php echo $description; ?></textarea>
                                    <?= form_error('description', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Update</button>
                    <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>

                    <!-- <button type="submit" class="btn bg-danger">Update</button>
                    <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button> -->
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