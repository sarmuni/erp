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

            <!-- <a role="button" href="#" class="btn bg-danger btn-sm" title="Add" data-toggle="modal" data-target=".tambah_menu">
                <i class="fas fa-user-plus"></i> Add New
            </a>

            <a role="button" href="#" class="btn bg-danger btn-sm" title="Print">
                <i class="fas fa-print"></i> Print PDF
            </a>

            <a role="button" href="<?php echo base_url('menu'); ?>" class="btn bg-danger btn-sm" title="Refresh">
                <i class="fas fa-sync-alt"></i> Refresh
            </a>
            <hr> -->

            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Departments</th>
                            <th>Access</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($role as $row) {
                    ?>
                        <tr>
                            <td><center><?php echo $no; ?></center></td>
                            <td><?php echo strtoupper($row['role']); ?></td>
                            <td>
                            <a role="button" href="<?php echo site_url(); ?>administrator/roleaccess/<?php echo $row['id']; ?>" id="role_id" class="btn bg-warning btn-sm" title="Role Access"><i class="fas fa-cogs"></i>
                                 </a>    
                            <!-- <a href="<?= base_url('administrator/roleaccess/') . $row['id']; ?>" class="badge badge-warning">access</a> -->
                            </td>
                            <!-- <td>
                                <a role="button" href="#" class="btn bg-danger btn-sm" title="Edit" data-toggle="modal" 
                                data-target="#edit_menu<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                </a>
                                
                                 <a role="button" href="<?php echo site_url(); ?>menu/delete/<?php echo $row['id']; ?>" id="deleted" class="btn bg-danger btn-sm tombol-hapus" title="delete record"><i class="fas fa-trash-alt"></i>
                                 </a>

                                <a role="button" href="#" class="btn bg-danger" title="More..." data-toggle="modal" data-target="#view_account_user<?php echo $row['id']; ?>">
                                    <i class="fab fa-searchengin"></i>
                                </a>
                            </td> -->
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

<!-- Modal Add -
<div class="modal fade tambah_menu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Menu</h5>
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
                        <form autocomplete="off" action="<?php echo base_url('menu/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="judul_menu">Title Menu</label>
                                    <input type="text" name="judul_menu" class="form-control" id="judul_menu" value="<?= set_value('judul_menu'); ?>">
                                    <?= form_error('judul_menu', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" class="form-control" id="description" value="<?= set_value('description'); ?>">
                                    <?= form_error('description', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="url">Url</label>
                                    <input type="text" name="url" class="form-control" id="url" value="<?= set_value('url'); ?>">
                                    <?= form_error('url', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="icon">Icon</label>
                                    <input type="text" id="icon" class="form-control" name="icon" value="<?= set_value('icon'); ?>">
                                    <?= form_error('icon', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="is_active">Active</label>
                                    <select id="is_active" class="form-control" name="is_active" id="is_active">
                                        <option selected="">--Select--</option>
                                        <option value="1">Active</option>
                                        <option value="0">Not Active</option>
                                    </select>
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
End Modal Add -->


<!-- Modal Edit 
<?php
foreach ($menu as $i) :
    $id               = $i['id'];
    $icon             = $i['icon'];
    $is_active        = $i['is_active'];
?>
    <div class="modal fade edit_menu" id="edit_menu<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Menu</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('menu/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="judul_menu">Title Menu</label>
                                        <input type="text" name="judul_menu" value="<?php echo $judul_menu; ?>" class="form-control" id="judul_menu">
                                        <?= form_error('judul_menu', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="description"> Description </label>
                                        <input type="text" name="description" value="<?php echo $description; ?>" class="form-control" id="description">
                                        <?= form_error('description', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="url">Url</label>
                                        <input type="text" id="url" value="<?php echo $url; ?>" class="form-control" name="url" value="<?= set_value('url'); ?>">
                                        <?= form_error('url', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="icon">Icon</label>
                                        <input type="text" id="icon" value="<?php echo $icon; ?>" class="form-control" name="icon" value="<?= set_value('icon'); ?>">
                                        <?= form_error('icon', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="is_active">Active</label>
                                        <select id="is_active" class="form-control" name="is_active" id="is_active">
                                            <option selected="">--Select--</option>
                                            <?php if ($is_active==1) {?>
                                                <option value="1" selected>Active</option>
                                                <option value="0">Not Active</option>
                                            <?php }else{?>
                                                <option value="1">Active</option>
                                                <option value="0"selected>Not Active</option>
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
 End Modal Edit -->



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