<div class="wrapper">
    <div class="header">
        <div class="row no-gutters">
            <div class="col-auto">
                <a href="#" class="btn  btn-link text-dark"><i class="material-icons">navigate_before</i></a>
            </div>
            <div class="col text-center"><img src="<?= base_url(); ?>assets/img/logo-header.png" alt="" class="header-logo"></div>
            <div class="col-auto">
                <a href="#" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto text-center">
                <h4 class="mt-5"><span class="font-weight-light">Change </span>Password</h4>
                <br>
                <form class="form-signin mt-3 " method="POST" action="<?= base_url('auth/change_password'); ?>">
                    <div class="form-group float-label active">
                        <input type="text" value="<?= $this->session->userdata('reset_email'); ?>" readonly="readonly" class="form-control form-control-lg">
                        <label for="email" class="form-control-label">Email</label>
                    </div>
                    <div class="form-group float-label">
                        <input type="password" id="password" name="password" class="form-control form-control-lg">
                        <?= form_error('password', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        <label for="inputPassword1" class="form-control-label">New Password</label>
                    </div>
                    <div class="form-group float-label">
                        <input type="password" id="confirmpassword" name="confirmpassword" class="form-control form-control-lg">
                        <?= form_error('confirmpassword', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        <label for="inputPassword2" class="form-control-label">Confirm New Password</label>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <button type="submit" class="btn btn-lg btn-default btn-block btn-rounded shadow"><span>Update Password</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>