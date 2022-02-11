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
            <a role="button" href="#" class="btn bg-danger btn-sm" title="Add" data-toggle="modal" data-target=".tambah_suppliers">
                <i class="fas fa-user-plus"></i> Add New
            </a>

            <a role="button" href="#" class="btn bg-danger btn-sm" title="Print">
                <i class="fas fa-print"></i> Print PDF
            </a>
            <a role="button" href="<?php base_url('suppliers'); ?>" class="btn bg-danger btn-sm" title="Refresh">
                <i class="fas fa-sync-alt"></i> Refresh
            </a>

            <span class="pull-right"><a href="#" id="" title="Sort" class="btn bg-info btn-sm"><i class="fas fa-search" aria-hidden="true"></i> Sort</a></span>
            <div class="col-sm-2 pull-right">
                <select id="departments_id" name="departments_id" required class="form-control select2" value="<?= set_value('departments_id'); ?>">
                    <option value="">-- All PIC --</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="year" name="year" required class="form-control select2" value="<?= set_value('year'); ?>">
                    <option value="">-- All Year --</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="category" name="category" required class="form-control select2" value="<?= set_value('category'); ?>">
                    <option value="">-- All Location --</option>
                </select>
            </div>

            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Supplier Name</th>
                            <th>Address</th>
                            <th>Location</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>PIC Supplier</th>
                            <th>Status</th>
                            <th>&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($suppliers as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo strtoupper($row['supplierName']); ?></td>
                            <td><?php echo strtoupper($row['address']); ?></td>
                            <td><?php echo strtoupper($row['location']); ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo strtoupper($row['picSupplier']); ?></td>
                            <td></td>
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
                                <a role="button" href="#" class="btn bg-warning btn-sm" title="Edit" data-toggle="modal" data-target="#edit_suppliers<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                </a>
                                
                                 <a role="button" href="<?php echo site_url(); ?>suppliers/delete/<?php echo $row['id']; ?>" id="deleted" class="btn bg-danger btn-sm tombol-hapus" title="delete record"><i class="fas fa-trash-alt"></i>
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
<div class="modal fade tambah_suppliers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Suppliers</h5>
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

                        <form autocomplete="off" action="<?php echo base_url('suppliers/add'); ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="supplierName">Supplier Name</label>
                                    <input type="text" name="supplierName" class="form-control form-control-sm" id="supplierName" value="<?= set_value('supplierName'); ?>">
                                    <?= form_error('supplierName', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="address">Supplier Address</label>
                                    <input type="text" name="address" class="form-control form-control-sm" id="address" value="<?= set_value('address'); ?>">
                                    <?= form_error('address', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="location">Supplier Premise</label>
                                    <input type="text" name="location" class="form-control form-control-sm" id="location" value="<?= set_value('location'); ?>">
                                    <?= form_error('location', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="website">Website</label>
                                    <input type="text" id="website" class="form-control form-control-sm" name="website" value="<?= set_value('website'); ?>">
                                    <?= form_error('website', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control form-control-sm" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                 <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control form-control-sm" id="phone" value="<?= set_value('phone'); ?>">
                                    <?= form_error('phone', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="remarks">Remarks</label>
                                    <input type="text" id="remarks" class="form-control form-control-sm" name="remarks" value="<?= set_value('remarks'); ?>">
                                    <?= form_error('remarks', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="supplierDiscount">Supplier Discount Percentage</label>
                                    <input type="text" name="supplierDiscount" class="form-control form-control-sm" id="supplierDiscount" value="<?= set_value('supplierDiscount'); ?>">
                                    <?= form_error('supplierDiscount', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="picSupplier">PIC Supplier</label>
                                    <input type="text" id="picSupplier" class="form-control form-control-sm" name="picSupplier" value="<?= set_value('picSupplier'); ?>">
                                    <?= form_error('picSupplier', '<p style="color:red; font-size:12px;">', '</p>'); ?>
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
foreach ($suppliers as $i) :
    $id                     = $i['id'];
    $supplierName           = $i['supplierName'];
    $address                = $i['address'];
    $location               = $i['location'];
    $website                = $i['website'];
    $email                  = $i['email'];
    $phone                  = $i['phone'];
    $remarks                = $i['remarks'];
    $supplierDiscount       = $i['supplierDiscount'];
    $picSupplier            = $i['picSupplier'];
?>
    <div class="modal fade edit_suppliers" id="edit_suppliers<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Suppliers</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('suppliers/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="supplierName">Supplier Name</label>
                                        <input type="text" name="supplierName" value="<?php echo $supplierName; ?>" class="form-control form-control-sm" id="supplierName">
                                        <?= form_error('supplierName', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="address"> Supplier Address </label>
                                        <input type="text" name="address" value="<?php echo $address; ?>" class="form-control form-control-sm" id="address">
                                        <?= form_error('address', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="location">Supplier Premise</label>
                                        <input type="text" name="location" value="<?php echo $location; ?>" class="form-control form-control-sm" id="location">
                                        <?= form_error('location', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="website">Website</label>
                                        <input type="text" id="website" value="<?php echo $website; ?>" class="form-control form-control-sm" name="website" value="<?= set_value('website'); ?>">
                                        <?= form_error('website', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control form-control-sm" id="email">
                                        <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control form-control-sm" id="phone">
                                        <?= form_error('phone', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="remarks">Remarks</label>
                                        <input type="text" name="remarks" value="<?php echo $remarks; ?>" class="form-control form-control-sm" id="remarks">
                                        <?= form_error('remarks', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="supplierDiscount">Supplier Discount Percentage</label>
                                        <input type="text" name="supplierDiscount" value="<?php echo $supplierDiscount; ?>" class="form-control form-control-sm" id="supplierDiscount">
                                        <?= form_error('supplierDiscount', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="picSupplier">PIC Supplier</label>
                                        <input type="text" name="picSupplier" value="<?php echo $picSupplier; ?>" class="form-control form-control-sm" id="picSupplier">
                                        <?= form_error('picSupplier', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn bg-danger">Update</button>
                    <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button> -->

                    <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Update</button>
                    <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>
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