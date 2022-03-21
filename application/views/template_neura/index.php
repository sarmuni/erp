<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title; ?> - Dashboard</title>
    <meta name="description" content="Enterprise Resource Planning (ERP)">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sarmuni, S.Kom | 085289008827">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/template_neura/images/BIG-warehouse.png">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url(); ?>assets/template_neura/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="<?= base_url(); ?>assets/template_neura/font-awesome/css/all.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>assets/template_neura/css/style.css" rel="stylesheet" type="text/css" />

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/template_neura/plugins/chart.js/Chart.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/template_neura/plugins/datatables/datatables.min.css" />
    <link href="<?= base_url(); ?>assets/template_neura/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- END CSS for this page -->

    
</head>

<body class="adminbody">

    <div id="main">

        <!-- top bar navigation -->
        <div class="headerbar">

            <!-- LOGO -->
            <div class="headerbar-left">
                <a href="" class="logo">
                    <img alt="Logo" src="<?= base_url(); ?>assets/template_neura/images/BIG-warehouse.png" />
                    <span>Batavia Indo Global</span>
                </a>
            </div>

            <nav class="navbar-custom">

                <ul class="list-inline float-right mb-0">
                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <i class="far fa-envelope"></i>
                            <span class="notif-bullet"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>
                                    <small>
                                        <span class="label label-danger pull-xs-right">12</span>Mailbox</small>
                                </h5>
                            </div>

                            <!-- item-->
                            <a href="mail-all.html" class="dropdown-item notify-item">
                                <p class="notify-details ml-0">
                                    <b>John Doe</b>
                                    <span>New message received</span>
                                    <small class="text-muted">3 minutes ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="mail-all.html" class="dropdown-item notify-item">
                                <p class="notify-details ml-0">
                                    <b>Michael Smith</b>
                                    <span>New message received</span>
                                    <small class="text-muted">18 minutes ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="mail-all.html" class="dropdown-item notify-item">
                                <p class="notify-details ml-0">
                                    <b>John Lenons</b>
                                    <span>New message received</span>
                                    <small class="text-muted">Yesterday, 18:27</small>
                                </p>
                            </a>

                            <!-- All-->
                            <a href="mail-all.html" class="dropdown-item notify-item notify-all">
                                View All Messages
                            </a>

                        </div>

                    </li>

                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <span class="notif-bullet"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>
                                    <small>
                                        <span class="label label-danger pull-xs-right">5</span>Allerts</small>
                                </h5>
                            </div>

                            <!-- item-->
                            <a href="#" class="dropdown-item notify-item">
                                <div class="notify-icon bg-faded">
                                    <img src="<?= base_url(); ?>assets/template_neura/images/avatars/avatar2.png" alt="img" class="rounded-circle img-fluid">
                                </div>
                                <p class="notify-details">
                                    <b>John Doe</b>
                                    <span>User registration</span>
                                    <small class="text-muted">3 minutes ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="#" class="dropdown-item notify-item">
                                <div class="notify-icon bg-faded">
                                    <img src="<?= base_url(); ?>assets/template_neura/images/avatars/avatar3.png" alt="img" class="rounded-circle img-fluid">
                                </div>
                                <p class="notify-details">
                                    <b>Michael Cox</b>
                                    <span>Task 2 completed</span>
                                    <small class="text-muted">12 minutes ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="#" class="dropdown-item notify-item">
                                <div class="notify-icon bg-faded">
                                    <img src="<?= base_url(); ?>assets/template_neura/images/avatars/avatar4.png" alt="img" class="rounded-circle img-fluid">
                                </div>
                                <p class="notify-details">
                                    <b>Michelle Dolores</b>
                                    <span>New job completed</span>
                                    <small class="text-muted">35 minutes ago</small>
                                </p>
                            </a>

                            <!-- All-->
                            <a href="#" class="dropdown-item notify-item notify-all">
                                View All Allerts
                            </a>

                        </div>
                    </li>

                    <!-- 
                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-sm">
                    
                            <div class="dropdown-item noti-title">
                                <h5>
                                    <small>Settings</small>
                                </h5>
                            </div>

                    
                            <a href="#" class="dropdown-item notify-item">
                                <p class="notify-details ml-0">
                                    <i class="fas fa-cog"></i>
                                    <b>Settings 1</b>
                                </p>
                            </a>

                    
                            <a href="#" class="dropdown-item notify-item">
                                <p class="notify-details ml-0">
                                    <i class="fas fa-cog"></i>
                                    <b>Settings 2</b>
                                </p>
                            </a>

                    
                            <a href="#" class="dropdown-item notify-item">
                                <p class="notify-details ml-0">
                                    <i class="fas fa-cog"></i>
                                    <b>Settings 3</b>
                                </p>
                            </a>

                        </div>

                    </li>
                     -->


                    <li class="list-inline-item dropdown notif">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                            <img src="<?= base_url(); ?>uploads/avatar/<?php echo $user['image']; ?>" alt="Profile image" class="avatar-rounded">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="text-overflow">
                                    <small>Hello, <?php echo $user['fullname']; ?></small>
                                </h5>
                            </div>

                            <!-- item-->
                            <a href="<?= base_url('user/profile'); ?>" class="dropdown-item notify-item">
                                <i class="fas fa-user"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item notify-item tombol-logout">
                                <i class="fas fa-power-off"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fas fa-bars"></i>
                        </button>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- End Navigation -->

        <!-- Left Sidebar Menu-->
        <?php include_once "menu_sidebar.php"; ?>
        <!-- End Sidebar Menu-->

        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">
                                <?php if ($user['role_id'] == 1) { 
                                    echo "Administrator";
                                }elseif ($user['role_id'] == 2) {
                                    echo "Departments Board of Director";    
                                }elseif ($user['role_id'] == 3) {
                                    echo "Departments Factory Management";
                                }elseif ($user['role_id'] == 4) {
                                    echo "Departments Quality Assurance";
                                }elseif ($user['role_id'] == 5) {
                                    echo "Departments Production";
                                }elseif ($user['role_id'] == 6) {
                                    echo "Departments Engineer";
                                }elseif ($user['role_id'] == 7) {
                                    echo "Departments HR & GA";
                                }elseif ($user['role_id'] == 8) {
                                    echo "Departments Finance";
                                }elseif ($user['role_id'] == 9) {
                                    echo "Departments Warehouse";
                                }elseif ($user['role_id'] == 10) {
                                    echo "Departments Building Management";
                                }elseif ($user['role_id'] == 11) {
                                    echo "Departments Internal Securit";
                                }elseif ($user['role_id'] == 12) {
                                    echo "Departments Supply Chain";
                                }elseif ($user['role_id'] == 13) {
                                    echo "Departments Information Technology";
                                } ?>

                                </h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">You are logged in as [ <a href="<?php echo base_url() ?>user/profile"><?php echo $user['fullname']; ?></a> ]</li>
                                    <!-- <li class="breadcrumb-item active"><?php echo $title; ?></li> -->
                                </ol>
                                <div class="clearfix"></div>
                            </div>

                            <!-- <div class="alert alert-warning">
                                <h6 class="mb-3">You can use the <b>free versions</b> in your personal or commercial projects as long as you keep our footer link and text ("Powered by Bootstrap24.com") in ALL admin template files.</h6>
                                <h5>Advantages for PRO / EXTENDED version:</h5>

                                <h6 class="mb-3 text-success">
                                    - Get for FREE dynamic version (PHP version) and save over 50 hours of work. <br>
                                    - You can remove footer "powered by" credits and add your own company copyright details. <br>
                                    - With Pro and Extended version you have free support via support tickets. 
                                </h6>
                                <a class="btn btn-success" href="pro.html">More info</a>
                            </div> -->

                        </div>
                    </div>
                    <!-- end row -->


                    <!-- Dhasboard -->

                    <!-- End Dhasboard -->
                    <?php echo $contents; ?>


                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->
        <?php $company = $this->db->get_where('ref_companies', ['id' => 1])->row_array();
        $companyName = $company['companyName']; ?>
        <footer class="footer">
            <span class="text-right">
                Copyright @ 2021-<?php echo date('Y'); ?> <a target="_blank" href="https://bataviaindoglobal.com/"><?php echo $companyName; ?></a>
            </span>
            <span class="float-right">
                <!-- Copyright footer link MUST remain intact if you download free version. -->
                <!-- You can delete the links only if you purchased the pro or extended version. -->
                <!-- Purchase the pro or extended version with PHP version of this template: https://bootstrap24.com/template/nura-admin-4-free-bootstrap-admin-template -->
                <!-- Powered by <a target="_blank" href="https://bootstrap24.com" title="Download free Bootstrap templates"><b>Bootstrap24.com</b></a> -->
                Rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  ' Version <strong>' . CI_VERSION . '</strong>' : '' ?>
            </span>
        </footer>

        <script src="<?= base_url(); ?>assets/template_neura/js/modernizr.min.js"></script>
        <script src="<?= base_url(); ?>assets/template_neura/js/jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/template_neura/js/moment.min.js"></script>

        <script src="<?= base_url(); ?>assets/template_neura/js/popper.min.js"></script>
        <script src="<?= base_url(); ?>assets/template_neura/js/bootstrap.min.js"></script>

        <script src="<?= base_url(); ?>assets/template_neura/js/detect.js"></script>
        <script src="<?= base_url(); ?>assets/template_neura/js/fastclick.js"></script>
        <script src="<?= base_url(); ?>assets/template_neura/js/jquery.blockUI.js"></script>
        <script src="<?= base_url(); ?>assets/template_neura/js/jquery.nicescroll.js"></script>

        <!-- App js -->
        <script src="<?= base_url(); ?>assets/template_neura/js/admin.js"></script>

    </div>
    <!-- END main -->

    <!-- BEGIN Java Script for this page -->
    <script src="<?= base_url(); ?>assets/template_neura/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>assets/template_neura/plugins/datatables/datatables.min.js"></script>

    <!-- Counter-Up-->
    <script src="<?= base_url(); ?>assets/template_neura/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?= base_url(); ?>assets/template_neura/plugins/counterup/jquery.counterup.min.js"></script>

    <!-- dataTabled data -->
    <script src="<?= base_url(); ?>assets/template_neura/data/data_datatables.js"></script>

    <!-- Charts data -->
    <script src="<?= base_url(); ?>assets/template_neura/data/data_charts_dashboard.js"></script>
    <script src="<?= base_url(); ?>assets/template_neura/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery-ui.js"></script>
    <!-- BEGIN Java Script for this page -->
    <script src="<?= base_url(); ?>assets/template_neura/plugins/select2/js/select2.min.js"></script>                            
    <script>var base_url = "<?php echo base_url(); ?>";</script>
</body>
</html>