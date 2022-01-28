<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/template_neura/images/favicon.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/login/css/style.css">

    <title><?php echo $title; ?></title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= base_url(); ?>assets/login/images/login.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Reset Password</h3>
                                <p class="mb-4">Enterprise Resource Planning (ERP)</p>
                            </div>
                            <!-- <img src="<?= base_url(); ?>assets/template_neura/images/antaran.png" alt="Image" class="img-fluid"> -->
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('auth/forgotpassword'); ?>" method="post">
                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" value="<?= set_value('email'); ?>" class="form-control">
                                    <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <!-- <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>">
                                    <?= form_error('password', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div> -->

                                <div class="d-flex mb-5 align-items-center">
                                    <!-- <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label> -->
                                    <span class="ml-auto"><a href="<?= base_url('auth'); ?>" class="forgot-pass">Login?</a></span>
                                </div>

                                <button type="submit" value="Log In" class="btn btn-block btn-primary" style="background-color: red;">Reset Password</button>

                                <span class="d-block text-center my-4 text-muted">Don't have an account yet <a href="<?= base_url('auth/registration'); ?>"> Registrasi! </a></span>
                                <span class="d-block text-center my-4 text-muted">Rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  ' Version <strong>' . CI_VERSION . '</strong>' : '' ?></span>

                                <!-- <div class="social-login">
                                    <a href="#" class="facebook">
                                        <span class="icon-facebook mr-3"></span>
                                    </a>
                                    <a href="#" class="twitter">
                                        <span class="icon-twitter mr-3"></span>
                                    </a>
                                    <a href="#" class="google">
                                        <span class="icon-google mr-3"></span>
                                    </a>
                                </div> -->
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <span class="d-block text-center my-4 text-muted"> Copyrigth &copy; 2021-<?php echo date('Y'); ?> PT. Batavia Indo Global. All Rights Reserved.</span>
    <script src="<?= base_url(); ?>assets/login/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/login/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/login/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/login/js/main.js"></script>
</body>

</html>