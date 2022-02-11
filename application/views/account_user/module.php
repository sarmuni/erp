<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-user"></i> <?php echo $title_user; ?></h3>
            </div>
            <?php foreach ($account_user as $row) { ?>

                <div class="card-body">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Full name </label>
                                    <input class="form-control form-control-sm" readonly name="name" type="text" required value="<?php echo $row['fullname']; ?>" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Valid Email (required)</label>
                                    <input class="form-control form-control-sm" readonly name="email" type="email" value="<?php echo $row['email']; ?>" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Registration</label>
                                    <input class="form-control form-control-sm" readonly name="skype" type="text" value="<?php echo date('d-m-Y H:i:s', strtotime($row['date_created'])); ?>" />
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
                                    <input class="form-control form-control-sm" readonly name="skype" type="text" value="<?php echo $status; ?>" />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Level</label>
                                    <input class="form-control form-control-sm" readonly name="skype" type="text" value="<?php echo $row['role']; ?>" />
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control form-control-sm" readonly name="skype" type="text" value="<?php echo $row['phone']; ?>" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                                <a href="<?php echo base_url('account_user'); ?>"><button type="button" class="btn btn-primary btn-sm"> <i class="fas fa-arrow-circle-left"></i> Back</button></a>
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
                    <div class="col-lg-8">
                    <img alt="avatar" class="img-fluid" src="<?php echo base_url(); ?>assets/template_neura/images/avatars/avatar.png">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-danger btn-block mt-3"><?php echo $row['fullname']; ?></button>
                    </div>

                    <div class="col-lg-12">
                        <button type="button" class="btn btn-info btn-block mt-3"><?php echo $row['email']; ?></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
</div>


<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-user-friends"></i> <?php echo $title; ?></h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable1" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Url</th>
                            <th>Icon</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($menu as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo strtoupper($row['judul_menu']); ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['url']; ?></td>
                            <td><?php echo $row['icon']; ?></td>
                            <td>
                                    <?php if ($row['is_active'] == 0) { ?>
                                        <center><a role="button" href="<?php echo site_url(); ?>menu/publish/<?php echo $row['id']; ?>" id="publish" class="btn bg-danger btn-sm publish" title="Non Aktif">
                                        <i class="fas fa-toggle-off"></i>
                                            </a></center>
                                    <?php } else { ?>
                                        <center><a role="button" href="<?php echo site_url(); ?>menu/unpublish/<?php echo $row['id']; ?>" id="unpublish" class="btn bg-info btn-sm unpublish" title="Aktif">
                                        <i class="fas fa-toggle-on"></i>
                                            </a></center>
                                    <?php } ?>
                                
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
