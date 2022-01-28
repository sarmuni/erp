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
            <a role="button" href="#" class="btn bg-danger" title="Add" data-toggle="modal" data-target=".tambah_departments">
                <i class="fas fa-user-plus"></i>
            </a>

            <a role="button" href="#" class="btn bg-danger" title="Print">
                <i class="fas fa-print"></i>
            </a>
            <a role="button" href="<?php base_url('payment_credits'); ?>" class="btn bg-danger" title="Refresh">
                <i class="fas fa-sync-alt"></i>
            </a>
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Invoice No</th>
                            <th>Customer</th>
                            <th>Narration</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Total</th>
                            <th>View Invoice</th>
                            <th>&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($payment_credits as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['paymentNarration']; ?></td>
                            <td><?php echo $row['customerId']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td><?php echo $row['updated_at']; ?></td>
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
                                <a role="button" href="#" class="btn bg-danger" title="Edit" data-toggle="modal" data-target="#edit_departments<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                </a>
                                
                                 <a role="button" href="<?php echo site_url(); ?>departments/delete/<?php echo $row['id']; ?>" id="deleted" class="btn bg-danger tombol-hapus" title="delete record"><i class="fas fa-trash-alt"></i>
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
<div class="modal fade tambah_departments" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Departments & Buget</h5>
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

                        <form autocomplete="off" action="<?php echo base_url('departments/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label for="name">Departments</label>
                                    <select id="name" class="form-control" name="name" id="name" value="<?= set_value('name'); ?>">
                                        <option selected="">Select</option>
                                        <?php foreach ($departments as $select) { ?>
                                            <option value="<?php echo $select['name'] ?>"><?php echo $select['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="departmentEmail">Department Email</label>
                                    <input type="text" name="departmentEmail" class="form-control" id="departmentEmail" value="<?= set_value('departmentEmail'); ?>">
                                    <?= form_error('departmentEmail', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="budgetLimit">Budget Limit</label>
                                    <input type="number" name="budgetLimit" class="form-control" id="budgetLimit" value="<?= set_value('budgetLimit'); ?>">
                                    <?= form_error('budgetLimit', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date">Budget StartDate</label>
                                    <input type="date" id="budgetStartDate" class="form-control" name="budgetStartDate" value="<?= set_value('budgetStartDate'); ?>">
                                    <?= form_error('budgetStartDate', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="date">Budget End Date</label>
                                    <input type="date" id="budgetEndDate" class="form-control" name="budgetEndDate" value="<?= set_value('budgetEndDate'); ?>">
                                    <?= form_error('budgetEndDate', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <!-- <div class="form-group col-md-6">
                                    <label for="role_id">Level</label>
                                    <select id="role_id" class="form-control" name="role_id" id="role_id" value="<?= set_value('role_id'); ?>">
                                        <option selected="">Pilih</option>
                                        <?php foreach ($role_id as $role) { ?>
                                            <option value="<?php echo $role['id'] ?>"><?php echo $role['role'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('role_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div> -->
                                <!-- <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="<?= set_value('phone'); ?>">
                                    <?= form_error('phone', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div> -->
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
foreach ($payment_credits as $i) :
    $id                     = $i['id'];
    $name                   = $i['name'];
    $budgetLimit            = $i['budgetLimit'];
    $departmentEmail        = $i['departmentEmail'];
    $budgetStartDate        = $i['budgetStartDate'];
    $budgetEndDate          = $i['budgetEndDate'];
?>
    <div class="modal fade edit_departments" id="edit_departments<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Departments</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('departments/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6">
                                        <label for="name">Select</label>
                                        <select id="name" class="form-control" name="name" id="name">
                                            <option selected="">Select</option>
                                            <?php foreach ($departments as $role1) { ?>
                                                <?php if ($role1['name'] == $name) { ?>
                                                    <option value="<?php echo $role1['name'] ?>" selected><?php echo $role1['name'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $role1['name'] ?>"><?php echo $role1['name'] ?></option>
                                                <?php } ?>

                                            <?php } ?>
                                        </select>
                                        <?= form_error('name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="departmentEmail">Department Email</label>
                                        <input type="text" name="departmentEmail" value="<?php echo $departmentEmail; ?>" class="form-control" id="departmentEmail">
                                        <?= form_error('departmentEmail', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="budgetLimit">Budget Limit</label>
                                        <input type="text" name="budgetLimit" value="<?php echo $budgetLimit; ?>" class="form-control" id="budgetLimit">
                                        <?= form_error('budgetLimit', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="budgetStartDate">Budget Start Date</label>
                                        <input type="date" id="budgetStartDate" value="<?php echo $budgetStartDate; ?>" class="form-control" name="budgetStartDate" value="<?= set_value('budgetStartDate'); ?>">
                                        <?= form_error('budgetStartDate', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!-- <div class="form-group col-md-6">
                                        <label for="role_id">Level</label>
                                        <select id="role_id" class="form-control" <?php echo $publish; ?> name="role_id" id="role_id">
                                            <option selected="">Pilih</option>
                                            <?php foreach ($role_id as $role1) { ?>
                                                <?php if ($role1['id'] == $role) { ?>
                                                    <option value="<?php echo $role1['id'] ?>" selected><?php echo $role1['role'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $role1['id'] ?>"><?php echo $role1['role'] ?></option>
                                                <?php } ?>

                                            <?php } ?>
                                        </select>
                                        <?= form_error('role_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div> -->
                                    <div class="form-group col-md-6">
                                        <label for="budgetEndDate">Budget End Date</label>
                                        <input type="date" name="budgetEndDate" value="<?php echo $budgetEndDate; ?>" class="form-control" id="budgetEndDate">
                                        <?= form_error('budgetEndDate', '<p style="color:red; font-size:12px;">', '</p>'); ?>
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