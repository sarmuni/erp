<div class="wrapper">
    <!-- header -->
    <div class="header">
        <div class="row no-gutters">
            <div class="col-auto">
                <a href="<?= base_url('intro'); ?>" class="btn  btn-link text-dark"><i class="material-icons">chevron_left</i></a>
            </div>
            <div class="col text-center"></div>
            <div class="col-auto">
            </div>
        </div>
    </div>
    <!-- header ends -->

    <div class="row no-gutters login-row">
        <div class="col align-self-center px-3 text-center">
            <br>
            <img src="<?= base_url(); ?>assets/img/logo-login.png" alt="logo" class="logo-small">
            <form class="form-signin mt-3 " method="POST" action="<?= base_url('auth'); ?>">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group">
                    <input type="text" id="email" name="email" value="<?= set_value('email'); ?>" class="form-control form-control-lg text-center" placeholder="Email" autofocus>
                    <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>

                <div class="form-group">
                    <input type="password" id="password" name="password" value="<?= set_value('password'); ?>" class="form-control-lg form-control text-center" placeholder="Password">
                    <?= form_error('password', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>

                <!--<div class="form-group my-4 text-left">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label" for="rememberme">Remember Me</label>
                        </div>
                    </div>-->
                <p class="mt-4 d-block text-secondary">
                    No have an account? <a href="<?= base_url('auth/registration'); ?>">Registration!</a>
                    <a href="<?= base_url('auth/forgotpassword'); ?>" class="mt-1 d-block">Forgot Password?</a>
                </P>

        </div>
    </div>

    <!-- login buttons -->
    <div class="row mx-0 bottom-button-container">
        <div class="col">
            <button type="submit" class="btn btn-default btn-lg btn-rounded shadow btn-block">Login</button>
        </div>
    </div>
    <!-- login buttons -->
    </form>
</div>