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
            <a role="button" href="#" class="btn bg-danger" title="Add" data-toggle="modal" data-target=".tambah_ref_materials">
                <i class="fas fa-user-plus"></i>
            </a>

            <a role="button" href="#" class="btn bg-danger" title="Print">
                <i class="fas fa-print"></i>
            </a>
            <a role="button" href="<?php base_url('ref_materials'); ?>" class="btn bg-danger" title="Refresh">
                <i class="fas fa-sync-alt"></i>
            </a>
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Material Category</th>
                            <th>Material Code</th>
                            <th>Material Name</th>
                            <th>Material Brand</th>
                            <th>Company Id</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($ref_materials as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo strtoupper($row['material_category']); ?></td>
                            <td><?php echo strtoupper($row['material_code']); ?></td>
                            <td><?php echo strtoupper($row['material_name']); ?></td>
                            <td><?php echo $row['material_brand']; ?></td>
                            <td><?php echo $row['companyId']; ?></td>
                            <td><?php echo strtoupper($row['createdBy']); ?></td>
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
                                <a role="button" href="#" class="btn bg-danger" title="Edit" data-toggle="modal" data-target="#edit_ref_materials<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                </a>
                                
                                 <a role="button" href="<?php echo site_url(); ?>ref_materials/delete/<?php echo $row['id']; ?>" id="deleted" class="btn bg-danger tombol-hapus" title="delete record"><i class="fas fa-trash-alt"></i>
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
<div class="modal fade tambah_ref_materials" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Master Materials</h5>
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
                        <form autocomplete="off" action="<?php echo base_url('ref_materials/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <!-- <div class="form-group col-md-6">
                                    <label for="material_category">Material Category</label>
                                    <input type="text" name="material_category" class="form-control" id="material_category" value="<?= set_value('material_category'); ?>">
                                    <?= form_error('material_category', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div> -->

                                <div class="form-group col-md-6">
                                    <label for="material_category">Material Category</label>
                                    <select id="material_category" class="form-control" name="material_category" id="material_category">
                                        <option selected="">--Select--</option>
                                        <option value="1">RM (Row Material)</option>
                                        <option value="2">PM (Packaging Material)</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="material_code">Material Code</label>
                                    <input type="text" name="material_code" class="form-control" id="material_code" value="<?= set_value('material_code'); ?>">
                                    <?= form_error('material_code', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="material_name">Material Name</label>
                                    <input type="text" name="material_name" class="form-control" id="material_name" value="<?= set_value('material_name'); ?>">
                                    <?= form_error('material_name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="material_brand">Material Brand</label>
                                    <input type="text" id="material_brand" class="form-control" name="material_brand" value="<?= set_value('material_brand'); ?>">
                                    <?= form_error('material_brand', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="companyId">Company Id</label>
                                    <input type="companyId" id="companyId" class="form-control" name="companyId" value="PT. Batavia Indo Global">
                                    <?= form_error('companyId', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control" name="status" id="status">
                                        <option selected="">--Select--</option>
                                        <option value="0">Active</option>
                                        <option value="1">Not Active</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="remarks">Remarks</label>
                                    <input type="text" id="remarks" class="form-control" name="remarks" value="<?= set_value('remarks'); ?>">
                                    <?= form_error('remarks', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="supplierDiscount">Supplier Discount Percentage</label>
                                    <input type="text" name="supplierDiscount" class="form-control" id="supplierDiscount" value="<?= set_value('supplierDiscount'); ?>">
                                    <?= form_error('supplierDiscount', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div> -->

                            <!-- <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="picSupplier">PIC Supplier</label>
                                    <input type="text" id="picSupplier" class="form-control" name="picSupplier" value="<?= set_value('picSupplier'); ?>">
                                    <?= form_error('picSupplier', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div> -->
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
foreach ($ref_materials as $i) :
    $id                     = $i['id'];
    $material_category      = $i['material_category'];
    $material_code          = $i['material_code'];
    $material_name          = $i['material_name'];
    $material_brand         = $i['material_brand'];
    $companyId              = $i['companyId'];
    $status                 = $i['status'];
?>
    <div class="modal fade edit_ref_materials" id="edit_ref_materials<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Master Materials</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('ref_materials/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="material_category">Material Category</label>
                                        <input type="text" name="material_category" value="<?php echo $material_category; ?>" class="form-control" id="material_category">
                                        <?= form_error('material_category', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="material_code"> Material Code </label>
                                        <input type="text" name="material_code" value="<?php echo $material_code; ?>" class="form-control" id="material_code">
                                        <?= form_error('material_code', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="material_name">Material Name</label>
                                        <input type="text" name="material_name" value="<?php echo $material_name; ?>" class="form-control" id="material_name">
                                        <?= form_error('material_name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="material_brand">Material Brand</label>
                                        <input type="text" id="material_brand" value="<?php echo $material_brand; ?>" class="form-control" name="material_brand" value="<?= set_value('material_brand'); ?>">
                                        <?= form_error('material_brand', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="companyId">Company Id</label>
                                        <input type="text" name="companyId" value="<?php echo $companyId; ?>" class="form-control" id="companyId">
                                        <?= form_error('companyId', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <input type="text" name="status" value="<?php echo $status; ?>" class="form-control" id="status">
                                        <?= form_error('status', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <!-- <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="remarks">Remarks</label>
                                        <input type="text" name="remarks" value="<?php echo $remarks; ?>" class="form-control" id="remarks">
                                        <?= form_error('remarks', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="supplierDiscount">Supplier Discount Percentage</label>
                                        <input type="text" name="supplierDiscount" value="<?php echo $supplierDiscount; ?>" class="form-control" id="supplierDiscount">
                                        <?= form_error('supplierDiscount', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div> -->
                                <!-- <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="picSupplier">PIC Supplier</label>
                                        <input type="text" name="picSupplier" value="<?php echo $picSupplier; ?>" class="form-control" id="picSupplier">
                                        <?= form_error('picSupplier', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div> -->

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