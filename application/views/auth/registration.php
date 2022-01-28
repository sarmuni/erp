<div class="wrapper">
    <!-- header -->
    <div class="header">
        <div class="row no-gutters">
            <div class="col-auto">
                <a href="<?= base_url('auth'); ?>" class="btn  btn-link text-dark"><i class="material-icons">chevron_left</i></a>
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
            <form class="form-signin mt-3 " method="post" action="<?= base_url('auth/registration'); ?>">
                <div class="form-group">
                    <input type="text" id="fullname" name="fullname" value="<?= set_value('fullname'); ?>" class="form-control form-control-lg text-center" placeholder="Full Name" autofocus>
                    <?= form_error('fullname', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <input type="number" id="phone" name="phone" value="<?= set_value('phone'); ?>" class="form-control form-control-lg text-center" placeholder="Phone Number">
                    <?= form_error('phone', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" value="<?= set_value('email'); ?>" class="form-control form-control-lg text-center" placeholder="Email">
                    <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" value="<?= set_value('password'); ?>" class="form-control form-control-lg text-center" placeholder="Password">
                    <?= form_error('password', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <input type="password" id="confirmPassword" name="confirmpassword" value="<?= set_value('confirmpassword'); ?>" class="form-control form-control-lg text-center" placeholder="Confirm Password">
                    <?= form_error('confirmpassword', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>

                <p class="mt-4 d-block text-secondary">
                    Already have an account? <a href="<?= base_url('auth'); ?>">Login!</a>
                </p>
                <p class="mt-4 d-block text-secondary">
                    By clicking register your are agree to the
                    <a href="javascript:void(0)">Terms and Condition.</a>
                </p>

        </div>
    </div>

    <!-- login buttons -->
    <div class="row mx-0 bottom-button-container">
        <div class="col">
            <button type="submit" class="btn btn-default btn-lg btn-rounded shadow btn-block">Registration</button>
        </div>
    </div>
    <!-- login buttons -->
    </form>
</div>