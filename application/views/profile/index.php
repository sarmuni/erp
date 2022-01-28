<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-user"></i> <?php echo $title; ?></h3>
            </div>
            <?php foreach ($account_user as $row) { ?>

                <div class="card-body">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Full name </label>
                                    <input class="form-control" readonly name="name" type="text" required value="<?php echo $row['fullname']; ?>" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Valid Email (required)</label>
                                    <input class="form-control" readonly name="email" type="email" value="<?php echo $row['email']; ?>" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" readonly name="password" type="password" value="" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Repeat Password</label>
                                    <input class="form-control" readonly name="password2" type="password" value="" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Registration</label>
                                    <input class="form-control" readonly name="skype" type="text" value="<?php echo date('d-m-Y H:i:s', strtotime($row['date_created'])); ?>" />
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
                                    <input class="form-control" readonly name="skype" type="text" value="<?php echo $status; ?>" />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Level</label>
                                    <input class="form-control" readonly name="skype" type="text" value="<?php echo $row['role']; ?>" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" readonly name="skype" type="text" value="<?php echo $row['phone']; ?>" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                                <a href="<?php echo base_url('dashboard'); ?>"><button type="button" class="btn btn-primary">Kembali</button></a>
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
                        <img alt="avatar" class="img-fluid" src="<?php echo base_url(); ?>assets/template_neura/images/avatars/avatar.png">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-danger btn-block mt-3">Delete avatar</button>
                    </div>

                    <div class="col-lg-12">
                        <button type="button" class="btn btn-info btn-block mt-3">Change avatar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
</div>