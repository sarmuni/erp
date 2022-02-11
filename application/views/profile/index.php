<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-user"></i> <?php echo $title; ?></h3>
            </div>

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
            <div class="flash-data-required" data-flashdata="<?= $this->session->flashdata('required'); ?>"></div>

            <?php foreach ($account_user as $row) { 
                $id = $row['id'];?>

                <div class="card-body">
                <form autocomplete="off" action="<?php echo base_url('account_user/profile_edit/' . $id); ?>" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Full name </label>
                                    <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
                                    <input class="form-control" name="fullname" type="text" required value="<?php echo $row['fullname']; ?>" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Valid Email (required)</label>
                                    <input class="form-control" name="email" type="email" value="<?php echo $row['email']; ?>" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password" placeholder="Leave it blank if you don't change the password"/>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Repeat Password</label>
                                    <input class="form-control" name="password2" type="password" placeholder="Leave it blank if you don't change the password" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Registration</label>
                                    <input class="form-control" readonly type="text" value="<?php echo date('d-m-Y H:i:s', strtotime($row['date_created'])); ?>" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <?php if ($row['is_active'] == 1) {
                                        $status = "Aktif";
                                    } else {
                                        $status = "Tidak Aktif";
                                    } ?>
                                    <input class="form-control" readonly type="text" value="<?php echo $status; ?>" />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Level</label>
                                    <input class="form-control" readonly  type="text" value="<?php echo $row['role']; ?>" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" name="phone" type="text" value="<?php echo $row['phone']; ?>" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                                <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Update</button>
                                <a href="<?php echo base_url('dashboard'); ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-reply"></i> Kembali</button></a>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-file-image"></i> <?php echo $title_foto; ?></h3>
            </div>

            <div class="card-body text-center">

                <div class="row">
                    <div class="col-lg-12">
                        <img alt="avatar" class="img-fluid" src="<?php echo base_url(); ?>uploads/avatar/<?php echo $row['image']; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-danger btn-block mt-3"><?php echo $row['fullname'] ?></button>
                    </div>

                    <div class="col-lg-12">
                        <!-- <button type="button" class="btn btn-info btn-block mt-3">Change avatar</button> -->

                        <a role="button" href="#" class="btn btn-info btn-block mt-3 " title="Edit Data account_user" data-toggle="modal" data-target="#edit_account_user<?php echo $row['id']; ?>">
                                    </i> Change avatar
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
</div>

<!-- Modal Edit -->
<?php
foreach ($account_user as $i) :
    $id = $i['id'];
    $image = $i['image'];
?>
    <div class="modal fade edit_account_user" id="edit_account_user<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Avatar</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('account_user/upload_avatar/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                   
                                    <div class="form-group col-md-6">
                                        <label for="phone">Image </label>
                                        <input name="id" type="hidden" value="<?php echo $id; ?>" />

                                        <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/jpg, image/gif">
                                        <?php if (isset($error)) : ?>
                                            <div class="invalid-feedback"><?= $error ?></div>
                                        <?php endif; ?>
                                    </div>

                                </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Upload</button>
                    <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<!-- End Modal Edit -->