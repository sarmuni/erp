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
            <a role="button" href="#" class="btn bg-danger" title="Tambah account user" data-toggle="modal" data-target=".tambah_account_user">
                <i class="fas fa-user-plus"></i>
            </a>

            <a role="button" href="#" class="btn bg-danger" title="Cetak account user">
                <i class="fas fa-print"></i>
            </a>
            <a role="button" href="<?php base_url('account_user'); ?>" class="btn bg-danger" title="Refresh data account user">
                <i class="fas fa-sync-alt"></i>
            </a>
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
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
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td>
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
                            </td>
                            <td>
                                <a role="button" href="#" class="btn bg-danger" title="Edit Data account_user" data-toggle="modal" data-target="#edit_account_user<?php echo $row['id']; ?>">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <?php if ($row['is_active'] == 0) { ?>
                                    <a role="button" href="<?php echo site_url(); ?>account_user/delete/<?php echo $row['id']; ?>" id="hapus" class="btn bg-danger tombol-hapus" title="Hapus Data account user">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                <?php } ?>
                                <a role="button" href="#" class="btn bg-danger" title="Selengkapnya" data-toggle="modal" data-target="#view_account_user<?php echo $row['id']; ?>">
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
                                <div class="form-group col-md-6">
                                    <label for="fullname">Nama</label>
                                    <input type="text" name="fullname" class="form-control" id="fullname" value="<?= set_value('fullname'); ?>">
                                    <?= form_error('fullname', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" value="<?= set_value('password'); ?>">
                                    <?= form_error('password', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" id="confirmPassword" class="form-control" name="confirmpassword" value="<?= set_value('confirmpassword'); ?>">
                                    <?= form_error('confirmpassword', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="role_id">Level</label>
                                    <select id="role_id" class="form-control" name="role_id" id="role_id" value="<?= set_value('role_id'); ?>">
                                        <option selected="">Pilih</option>
                                        <?php foreach ($role_id as $role) { ?>
                                            <option value="<?php echo $role['id'] ?>"><?php echo $role['role'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('role_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="<?= set_value('phone'); ?>">
                                    <?= form_error('phone', '<p style="color:red; font-size:12px;">', '</p>'); ?>
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
foreach ($account_user as $i) :
    $id = $i['id'];
    $fullname = $i['fullname'];
    $email = $i['email'];
    $phone = $i['phone'];
    $password = $i['password'];
    $role = $i['role_id'];
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
                                    <div class="form-group col-md-6">
                                        <label for="fullname">Nama</label>
                                        <input type="text" name="fullname" <?php echo $publish; ?> value="<?php echo $fullname; ?>" class="form-control" id="fullname">
                                        <?= form_error('fullname', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" <?php echo $publish; ?> value="<?php echo $email; ?>" class="form-control" id="email">
                                        <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="text" name="password" <?php echo $publish; ?> class="form-control" id="password">
                                        <?= form_error('password', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">Confirm Password</label>
                                        <input type="password" id="confirmPassword" <?php echo $publish; ?> class="form-control" name="confirmpassword" value="<?= set_value('confirmpassword'); ?>">
                                        <?= form_error('confirmpassword', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
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
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" <?php echo $publish; ?> value="<?php echo $phone; ?>" class="form-control" id="phone">
                                        <?= form_error('phone', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
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
<!-- End Modal Edit -->



<!-- Modal View -->
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
<!-- End Modal View -->