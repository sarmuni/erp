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
            <a role="button" href="#" class="btn bg-danger btn-sm" title="Tambah account user" data-toggle="modal" data-target=".tambah_account_user">
                <i class="fas fa-user-plus"></i> Add New
            </a>

            <a role="button" href="#" class="btn bg-danger btn-sm" title="Cetak account user">
                <i class="fas fa-print"></i> Print PDF
            </a>
            <a role="button" href="<?php base_url('account_user'); ?>" class="btn bg-danger btn-sm" title="Refresh data account user">
                <i class="fas fa-sync-alt"></i> Refresh
            </a>

            <span class="pull-right"><a href="#" id="" title="Sort" class="btn bg-info btn-sm"><i class="fas fa-search" aria-hidden="true"></i> Sort</a></span>
            <!-- <div class="col-sm-2 pull-right">
                <select id="departments_id" name="departments_id" required class="form-control select2" value="<?= set_value('departments_id'); ?>">
                    <option value="">-- All Zone Location--</option>
                </select>
            </div> -->
            <div class="col-sm-2 pull-right">
                <select id="year" name="year" required class="form-control select2" value="<?= set_value('year'); ?>">
                    <option value="">-- All Status--</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="category" name="category" required class="form-control select2" value="<?= set_value('category'); ?>">
                    <option value="">-- All Level--</option>
                </select>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Person ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($account_user as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['person_id']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td>
                                    <?php if ($row['is_active'] == 0) { ?>
                                        <center><a role="button" href="<?php echo site_url(); ?>account_user/publish/<?php echo $row['id']; ?>/<?php echo $row['role_id']; ?>" id="publish" class="btn bg-info btn-sm publish" title="Aktif">
                                                <i class="fas fa-eye-slash"></i>
                                            </a></center>
                                    <?php } else { ?>
                                        <center><a role="button" href="<?php echo site_url(); ?>account_user/unpublish/<?php echo $row['id']; ?>/<?php echo $row['role_id']; ?>" id="unpublish" class="btn bg-success btn-sm unpublish" title="Non Aktif">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </center>
                                <?php } ?>
                            </td>
                            <td>
                                <a role="button" href="#" class="btn bg-warning btn-sm" title="Edit Data account_user" data-toggle="modal" data-target="#edit_account_user<?php echo $row['id']; ?>">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <?php if ($row['is_active'] == 0) { ?>
                                    <a role="button" href="<?php echo site_url(); ?>account_user/delete/<?php echo $row['id']; ?>" id="hapus" class="btn bg-danger btn-sm tombol-hapus" title="Hapus Data account user">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                <?php } ?>
                                <a role="button" href="#" class="btn bg-info btn-sm" title="Selengkapnya" data-toggle="modal" data-target="#view_account_user<?php echo $row['id']; ?>">
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
<div class="modal fade tambah_account_user" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form add account user</h5>
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

                        <form autocomplete="off" action="<?php echo base_url('account_user/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="person_id">Person ID</label>
                                    <select id="person_id" class="form-control form-control-sm" name="person_id" id="person_id" value="<?= set_value('person_id'); ?>">
                                        <option selected="">Pilih</option>
                                        <?php foreach ($person_id as $role) { ?>
                                            <option value="<?php echo $role['person_id'] ?>"><?php echo $role['person_id'] ?> - <?php echo $role['person_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('person_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fullname">Account Name</label>
                                    <input type="text" name="fullname" class="form-control form-control-sm" id="fullname" value="<?= set_value('fullname'); ?>">
                                    <?= form_error('fullname', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control form-control-sm" id="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control form-control-sm" id="password" value="<?= set_value('password'); ?>">
                                    <?= form_error('password', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" id="confirmPassword" class="form-control form-control-sm" name="confirmpassword" value="<?= set_value('confirmpassword'); ?>">
                                    <?= form_error('confirmpassword', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="role_id">Level</label>
                                    <select id="role_id" class="form-control form-control-sm" name="role_id" id="role_id" value="<?= set_value('role_id'); ?>">
                                        <option selected="">Pilih</option>
                                        <?php foreach ($role_id as $role) { ?>
                                            <option value="<?php echo $role['departments_id'] ?>"><?php echo $role['role'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('role_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control form-control-sm" id="phone" value="<?= set_value('phone'); ?>">
                                    <?= form_error('phone', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Save</button>
                <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>

                <!-- <button type="submit" class="btn bg-danger btn-sm">Save</button>
                <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal">Close</button> -->
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->


<!-- Modal Edit -->
<?php
foreach ($account_user as $i) {
    $id = $i['id'];
    $personid = $i['person_id'];
    $fullname = $i['fullname'];
    $email = $i['email'];
    $phone = $i['phone'];
    $password = $i['password'];
    $roleID = $i['role_id'];
    $is_active = $i['is_active'];
?>
    <?php if ($is_active == 1) {
        $publish = "";
    } else {
        $publish = "readonly";
    } ?>
    <div class="modal fade edit_account_user" id="edit_account_user<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form edit account user</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('account_user/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="person_id">Person ID</label>
                                        <select id="person_id" class="form-control form-control-sm" name="person_id" id="person_id" value="<?= set_value('person_id'); ?>">
                                            <option selected="">Pilih</option>
                                            <?php foreach ($person_id as $role) { ?>
                                                <?php if ($role['person_id']==$personid) { ?>
                                                    <option value="<?php echo $role['person_id'] ?>" selected><?php echo $role['person_id'] ?> - <?php echo $role['person_name'] ?></option>
                                                <?php }else{?>
                                                    <option value="<?php echo $role['person_id'] ?>"><?php echo $role['person_id'] ?> - <?php echo $role['person_name'] ?></option>
                                                <?php } ?>

                                            <?php } ?>
                                        </select>
                                        <?= form_error('person_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="fullname">Nama</label>
                                        <input type="text" name="fullname" <?php echo $publish; ?> value="<?php echo $fullname; ?>" class="form-control form-control-sm" id="fullname">
                                        <?= form_error('fullname', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" <?php echo $publish; ?> value="<?php echo $email; ?>" class="form-control form-control-sm" id="email">
                                        <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="text" name="password" <?php echo $publish; ?> class="form-control form-control-sm" id="password">
                                        <?= form_error('password', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">Confirm Password</label>
                                        <input type="password" id="confirmPassword" <?php echo $publish; ?> class="form-control form-control-sm" name="confirmpassword" value="<?= set_value('confirmpassword'); ?>">
                                        <?= form_error('confirmpassword', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="role_id">Level</label>
                                        <select id="role_id" class="form-control form-control-sm" <?php echo $publish; ?> name="role_id" id="role_id">
                                            <option selected="">Pilih</option>
                                            <?php foreach ($role_id as $role1) { ?>

                                                <?php if ($role1['id'] == $roleID) { ?>
                                                    <option value="<?php echo $role1['id'] ?>" selected><?php echo $role1['role'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $role1['id'] ?>"><?php echo $role1['role'] ?></option>
                                                <?php } ?>

                                            <?php } ?>
                                        </select>
                                        <?= form_error('role_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" <?php echo $publish; ?> value="<?php echo $phone; ?>" class="form-control form-control-sm" id="phone">
                                        <?= form_error('phone', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <?php if ($publish == false) { ?>
                        <!-- <button type="submit" class="btn bg-danger">Update</button> -->
                        <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Update</button>
                    <?php } ?>
                    <!-- <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button> -->
                    <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End Modal Edit -->



<!-- Modal View -->
<?php
foreach ($account_user as $i) :
    $id = $i['id'];
    $fullname = $i['fullname'];
    $email = $i['email'];
    $phone = $i['phone'];
    $password = $i['password'];
    $roleID = $i['role_id'];
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
                                        <input type="text" name="fullname" <?php echo $publish; ?> value="<?php echo $fullname; ?>" class="form-control form-control-sm" id="fullname">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" <?php echo $publish; ?> value="<?php echo $email; ?>" class="form-control form-control-sm" id="email">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="text" name="password" <?php echo $publish; ?> value="<?php echo $password; ?>" class="form-control form-control-sm" id="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" <?php echo $publish; ?> value="<?php echo $phone; ?>" class="form-control form-control-sm" id="phone">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="role_id">Level</label>
                                        <select id="role_id" class="form-control form-control-sm" <?php echo $publish; ?> name="role_id" id="role_id">
                                            <option selected="">Pilih</option>
                                            <?php foreach ($role_id as $role1) { ?>
                                                <?php if ($role1['id'] == $roleID) { ?>
                                                    <option value="<?php echo $role1['id'] ?>" selected><?php echo $role1['role'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?php echo $role1['id'] ?>"><?php echo $role1['role'] ?></option>
                                                <?php } ?>

                                            <?php } ?>
                                        </select>
                                        <?= form_error('role_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="is_active">Status</label>
                                        <?php if ($is_active==1) {
                                            $status="Aktif";
                                        }else{
                                            $status="Tidak Aktif";
                                        } ?>
                                        <input type="text" name="is_active" <?php echo $publish; ?> value="<?php echo $status; ?>" class="form-control form-control-sm" id="is_active">
                                        <?= form_error('is_active', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div> 
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <?php if ($publish == false) { ?>
                        <!-- <button type="submit" class="btn bg-danger">Update</button> -->
                        <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Update</button>
                    <?php } ?>
                    <!-- <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button> -->
                    <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<!-- End Modal View -->