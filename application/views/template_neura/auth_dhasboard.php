<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left"><?php echo $title; ?></h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><?php echo $title; ?></li>
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

            <!-- Quick Info -->
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box noradius noborder bg-danger">
                        <i class="fa fa-users float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">PENGIRIM</h6>
                        <h1 class="m-b-20 text-white counter">487</h1>
                        <span class="text-white">Customer</span>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box noradius noborder bg-purple">
                        <i class="fa fa-ship float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">BARANG MASUK</h6>
                        <h1 class="m-b-20 text-white counter">290</h1>
                        <span class="text-white">In Kargo</span>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box noradius noborder bg-warning">
                        <i class="fa fa-truck float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">BARANG KELUAR</h6>
                        <h1 class="m-b-20 text-white counter">320</h1>
                        <span class="text-white">Out Kargo</span>
                    </div>
                </div>

                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card-box noradius noborder bg-info">
                        <i class="far fa-user float-right text-white"></i>
                        <h6 class="text-white text-uppercase m-b-20">PENERIMA</h6>
                        <h1 class="m-b-20 text-white counter">58</h1>
                        <span class="text-white">Client</span>
                    </div>
                </div>
            </div>
            <!-- end Quick Info -->

            <!-- Chart -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fas fa-chart-bar"></i> DELIVERY GOODS IN-OUT</h3>
                            <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus.
                                    Vivamus fermentum ultricies orci sit amet sollicitudin. -->
                        </div>

                        <div class="card-body">
                            <canvas id="comboBarLineChart"></canvas>
                        </div>
                        <div class="card-footer small text-muted">Updated <?php echo date('d-m-Y H:i:s'); ?></div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fas fa-chart-bar"></i> Income</h3>
                            <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus.
                                    Vivamus fermentum ultricies orci sit amet sollicitudin. -->
                        </div>

                        <div class="card-body">
                            <canvas id="barChart"></canvas>
                        </div>
                        <div class="card-footer small text-muted">Updated <?php echo date('d-m-Y H:i:s'); ?></div>
                    </div>
                </div>
            </div>
            <!-- end Chart -->
            <div class="row">

                <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-history"></i> Tasks progress</h3>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>

                                <div class="card-body">
                                    <p class="font-600 mb-1">Task completed <span class="text-info pull-right"><b>100%</b></span></p>
                                    <div class="progress">
                                        <div class="progress-bar progress-xs bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <div class="mb-3"></div>

                                    <p class="font-600 mb-1">Task 1 <span class="text-primary pull-right"><b>95%</b></span></p>
                                    <div class="progress">
                                        <div class="progress-bar progress-xs bg-primary" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="95">
                                        </div>
                                    </div>

                                    <div class="mb-3"></div>

                                    <p class="font-600 mb-1">Task 2 <span class="text-primary pull-right"><b>88%</b></span></p>
                                    <div class="progress">
                                        <div class="progress-bar progress-xs bg-primary" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="88">
                                        </div>
                                    </div>

                                    <div class="mb-3"></div>

                                    <p class="font-600 mb-1">Task 3 <span class="text-info pull-right"><b>75%</b></span>
                                    </p>
                                    <div class="progress">
                                        <div class="progress-bar progress-xs bg-info" role="progressbar" style="width: 78%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                                        </div>
                                    </div>

                                    <div class="mb-3"></div>

                                    <p class="font-600 mb-1">Task 4 <span class="text-info pull-right"><b>70%</b></span>
                                    </p>
                                    <div class="progress">
                                        <div class="progress-bar progress-xs bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="70">
                                        </div>
                                    </div>

                                    <div class="mb-3"></div>

                                    <p class="font-600 mb-1">Task 5 <span class="text-warning pull-right"><b>68%</b></span></p>
                                    <div class="progress">
                                        <div class="progress-bar progress-xs bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="68">
                                        </div>
                                    </div>

                                    <div class="mb-3"></div>

                                    <p class="font-600 mb-1">Task 6 <span class="text-warning pull-right"><b>65%</b></span></p>
                                    <div class="progress">
                                        <div class="progress-bar progress-xs bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="65">
                                        </div>
                                    </div>

                                    <div class="mb-3"></div>

                                    <p class="font-600 mb-1">Task 7 <span class="text-danger pull-right"><b>55%</b></span></p>
                                    <div class="progress">
                                        <div class="progress-bar progress-xs bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="55">
                                        </div>
                                    </div>

                                    <div class="mb-3"></div>

                                    <p class="font-600 mb-1">Task 8 <span class="text-danger pull-right"><b>40%</b></span></p>
                                    <div class="progress">
                                        <div class="progress-bar progress-xs bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40">
                                        </div>
                                    </div>

                                    <div class="mb-3"></div>

                                    <p class="font-600 mb-1">Task 9 <span class="text-danger pull-right"><b>20%</b></span></p>
                                    <div class="progress">
                                        <div class="progress-bar progress-xs bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer small text-muted">Updated today at 11:59 PM</div>
                            </div>
                           
                        </div> -->


                <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-envelope"></i> Latest messages</h3>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>

                                <div class="card-body">

                                    <div class="widget-messages nicescroll" style="height: 550px;">
                                        <a href="#">
                                            <div class="message-item">
                                                <p class="message-item-user">John Doe</p>
                                                <p class="message-item-msg">Hello. I want to buy your product</p>
                                                <p class="message-item-date">11:50 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="message-item">
                                                <p class="message-item-user">Ashton Cox</p>
                                                <p class="message-item-msg">Great job for this task</p>
                                                <p class="message-item-date">14:25 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="message-item">
                                                <p class="message-item-user">Colleen Hurst</p>
                                                <p class="message-item-msg">I have a new project for you</p>
                                                <p class="message-item-date">13:20 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="message-item">
                                                <p class="message-item-user">Fiona Green</p>
                                                <p class="message-item-msg">Nice to meet you</p>
                                                <p class="message-item-date">15:45 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="message-item">
                                                <p class="message-item-user">Donna Snider</p>
                                                <p class="message-item-msg">I have a new project for you</p>
                                                <p class="message-item-date">15:45 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="message-item">
                                                <p class="message-item-user">Garrett Winters</p>
                                                <p class="message-item-msg">I have a new project for you</p>
                                                <p class="message-item-date">15:45 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="message-item">
                                                <p class="message-item-user">Herrod Chandler</p>
                                                <p class="message-item-msg">Hello! I'm available for this job</p>
                                                <p class="message-item-date">15:45 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="message-item">
                                                <p class="message-item-user">Jena Gaines</p>
                                                <p class="message-item-msg">I have a new project for you</p>
                                                <p class="message-item-date">15:45 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="message-item">
                                                <p class="message-item-user">Airi Satou</p>
                                                <p class="message-item-msg">I have a new project for you</p>
                                                <p class="message-item-date">15:45 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="message-item">
                                                <p class="message-item-user">Brielle Williamson</p>
                                                <p class="message-item-msg">I have a new project for you</p>
                                                <p class="message-item-date">15:45 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="message-item">
                                                <p class="message-item-user">Jena Gaines</p>
                                                <p class="message-item-msg">I have a new project for you</p>
                                                <p class="message-item-date">16:30 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="message-item">
                                                <p class="message-item-user">Airi Satou</p>
                                                <p class="message-item-msg">I have a new project for you</p>
                                                <p class="message-item-date">18:55 AM</p>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                                <div class="card-footer small text-muted">Updated today at 11:59 PM</div>
                            </div>

                        </div> -->

                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fas fa-user-friends"></i> History Barang</h3>
                            <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus.
                                    Vivamus fermentum ultricies orci sit amet sollicitudin. -->
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No Resi</th>
                                            <th>Posisi</th>
                                            <th>Status</th>
                                            <th>Extn.</th>
                                            <th>Date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- end table-responsive-->

                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card-->
                </div>



            </div>
            <!-- end row-->

        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
<!-- END content-page -->