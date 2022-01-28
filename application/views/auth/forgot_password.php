<div class="wrapper">

    <div class="row no-gutters login-row">
        <div class="col align-self-center px-3 text-center">
            <br>
            <img src="<?= base_url(); ?>assets/img/logo-login.png" alt="logo" class="logo-small">
            <form class="form-signin mt-3 " method="POST" action="<?= base_url('auth/forgotpassword'); ?>">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group">
                    <input type="email" id="email" name="email" value="<?= set_value('email'); ?>" class="form-control form-control-lg text-center" placeholder="Email Address" autofocus>
                    <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>

                <!--<div class="form-group my-4 text-left">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label" for="rememberme">Remember Me</label>
                        </div>
                    </div>-->

                <p class="text-secondary mt-4 d-block">If you already have password,<br>please <a href="<?= base_url('auth'); ?>">Sign in</a> here, or <a href="<?= base_url('auth/registration'); ?>">Registration!</a></p>
        </div>
    </div>

    <!-- login buttons -->
    <div class="row mx-0 bottom-button-container">
        <div class="col">
            <button type="submit" class="btn btn-default btn-lg btn-rounded shadow btn-block">Reset Password</button>
        </div>
    </div>
    <!-- login buttons -->
    </form>
</div>