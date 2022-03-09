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
                            <a href="<?= base_url('account_user/profile'); ?>" class="dropdown-item notify-item">
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
                                    echo "Departments Board of Director";
                                }elseif ($user['role_id'] == 2) {
                                    echo "Departments Factory Management";
                                }elseif ($user['role_id'] == 3) {
                                    echo "Departments Quality Assurance";
                                }elseif ($user['role_id'] == 4) {
                                    echo "Departments Production";
                                }elseif ($user['role_id'] == 5) {
                                    echo "Departments Engineer";
                                }elseif ($user['role_id'] == 6) {
                                    echo "Departments HR & GA";
                                }elseif ($user['role_id'] == 7) {
                                    echo "Departments Finance";
                                }elseif ($user['role_id'] == 8) {
                                    echo "Departments Warehouse";
                                }elseif ($user['role_id'] == 9) {
                                    echo "Departments Building Management";
                                }elseif ($user['role_id'] == 10) {
                                    echo "Departments Internal Securit";
                                }elseif ($user['role_id'] == 11) {
                                    echo "Departments Supply Chain";
                                }elseif ($user['role_id'] == 12) {
                                    echo "Departments Information Technology";
                                } ?>

                                </h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">You are logged in as [ <a href="<?php echo base_url() ?>account_user/profile"><?php echo $user['fullname']; ?></a> ]</li>
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

        <footer class="footer">
            <span class="text-right">
                Copyright @ 2021-<?php echo date('Y'); ?> <a target="_blank" href="https://bataviaindoglobal.com/">PT. Batavia Indo Global</a>
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
    <!-- BEGIN Java Script for this page -->
    <script src="<?= base_url(); ?>assets/template_neura/plugins/select2/js/select2.min.js"></script>

    <!-- END Java Script for this page -->
    <script>
        $(document).on('ready', function() {
            // data-tables
            $('#dataTable').DataTable(
                {
                "lengthMenu": [
                    [10, 25, 50, -1], 
                    [10, 25, 50, "All"]
                    ]
                }
            );

            // counter-up
            $('.counter').counterUp({
                delay: 10,
                time: 600
            });
        });
        $(document).on('ready', function() {
            $('.select2').select2();
        });
    </script>
    <!-- END Java Script for this page -->

    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                type: "POST",
                url: "<?php echo base_url('employee/ambil_data'); ?>",
                cache: false,
            });

            $("#departments_id").change(function() {

                var value = $(this).val();
                if (value > 0) {
                    $.ajax({
                        data: {
                            modul: 'part_departments_id',
                            id: value
                        },
                        success: function(respond) {
                            $("#part_departments_id").html(respond);
                        }
                    })
                }

            });

        });
    </script>


    <!-- <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                type: "POST",
                url: "<?php echo base_url('pelanggan/ambil_data'); ?>",
                cache: false,
            });

            $("#provinsi").change(function() {

                var value = $(this).val();
                if (value > 0) {
                    $.ajax({
                        data: {
                            modul: 'kabupaten',
                            id: value
                        },
                        success: function(respond) {
                            $("#kabupaten-kota").html(respond);
                        }
                    })
                }

            });


            $("#kabupaten-kota").change(function() {
                var value = $(this).val();
                if (value > 0) {
                    $.ajax({
                        data: {
                            modul: 'kecamatan',
                            id: value
                        },
                        success: function(respond) {
                            $("#kecamatan").html(respond);
                        }
                    })
                }
            });

            $("#kecamatan").change(function() {
                var value = $(this).val();
                if (value > 0) {
                    $.ajax({
                        data: {
                            modul: 'kelurahan',
                            id: value
                        },
                        success: function(respond) {
                            $("#kelurahan-desa").html(respond);
                        }
                    })
                }
            });

            $("#nama_barang").change(function() {
                var value = $(this).val();
                if (value > 0) {
                    $.ajax({
                        data: {
                            modul: 'id_barang',
                            id: value
                        },
                        success: function(respond) {
                            $("#id_barang").html(respond);
                        }
                    })
                }

            });

        });
    </script> -->

    
<script>  
$(document).ready(function(){
    $("#check-all").click(function(){ 
        if($(this).is(":checked")) 
        $(".check-item").prop("checked", true); 
        else
        $(".check-item").prop("checked", false); 
    }); 
        $("#btn-delete").click(function(){
        if (!$(".check-item").is(":checked")){
        alert("You have not selected data!");
        }
        else if($(".check-item").is(":checked")) {
        var confirm = window.confirm("Are you sure you want to delete chekbox this data?"); 
        if(confirm) 
        $("#form-delete").submit();     
    }
        
    }); 
});  
</script>

<script>  
$(document).ready(function(){   
    $("#btn-tambah-form").click(function(){      
        var jumlah = parseInt($("#jumlah-form").val());    
        var nextform = jumlah + 1; 
        $("#insert-form").append('<div class="table-responsive">'+
                    '<table class="table table-hover display" style="width:100%">'+
                            '<tr>'+
                                '<td style="width:40%">'+
                                    '<textarea class="form-control form-control-sm" required name="item_name[]" placeholder="Description Detail"></textarea>'+
                                '</td>'+
                                '<td>'+
                                    '<input type="number" required name="pre_qty[]" placeholder="Qty" class="form-control form-control-sm" id="pre_qty" autocomplete="off">'+
                                '</td>'+
                                '<td>'+
                                    '<input type="text" required name="measurement[]" placeholder="Unit" class="form-control form-control-sm" id="measurement" autocomplete="off">'+
                                '</td>'+
                                '<td>'+
                                    '<input type="number" required name="estimated_price[]" placeholder="Estimated Price" class="form-control form-control-sm" id="estimated_price" autocomplete="off">'+
                                '</td>'+
                                '<td>'+
                                    '<select id="status" name="status[]" required class="form-control form-control-sm">'+
                                        '<option value="1">Normal</option>'+
                                        '<option value="2">Urgent</option>'+
                                    '</select>'+
                                '</td>'+
                            '</tr>'+
                    '</table>'+
            '</div>');            
        $("#jumlah-form").val(nextform); 
    });       
        $("#btn-reset-form").click(function(){      
            $("#insert-form").html("");      
            $("#jumlah-form").val("1"); 
        });  
});  


var base_url = "<?php echo base_url(); ?>";
  $(document).ready(function() {
    $(".select_group").select2();
 
    // Add new row in the table 
    $("#add_row").unbind('click').bind('click', function() {
      var table = $("#product_info_table");
      var count_table_tbody_tr = $("#product_info_table tbody tr").length;
      var row_id = count_table_tbody_tr + 1;

      $.ajax({
          url: base_url + '/sales_orders/getTableProductRow/',
          type: 'post',
          dataType: 'json',
          success:function(response) {
            
              // console.log(reponse.x);
               var html = '<tr id="row_'+row_id+'">'+
                   '<td>'+ 
                   '<div class="col-sm-15">'+
                    '<select class="form-control" data-row-id="'+row_id+'" id="product_'+row_id+'" name="product_name[]" style="width:100%;" onchange="getProductData('+row_id+')">'+
                        '<option value=""></option>';
                        $.each(response, function(index, value) {
                          html += '<option value="'+value.id+'">'+value.product_name+'</option>';             
                        });
                        
                      html += '</select>'+
                    '</div>'+

                    '</td>'+ 
                    '<td><input type="number" name="quantity[]" id="quantity_'+row_id+'" class="form-control form-control-sm" onkeyup="getTotal('+row_id+')"></td>'+

                    '<td><input type="text" name="selling_price[]" id="selling_price_'+row_id+'" class="form-control form-control-sm" disabled><input type="hidden" name="selling_price_value[]" id="selling_price_value_'+row_id+'" class="form-control form-control-sm"></td>'+

                    '<td>'+
                        '<select class="form-control form-control-sm" id="taxable" name="taxable[]" style="width:100%;" required>'+
                            '<option value=""></option>'+
                            '<option value="1">Yes</option>'+
                            '<option value="2">No</option>'+
                          '</select>'+
                        '</td>'+

                    '<td><input type="text" name="discount[]" id="discount_'+row_id+'" class="form-control form-control-sm" disabled><input type="hidden" name="discount_value[]" id="discount_value_'+row_id+'" class="form-control form-control-sm"></td>'+

                    '<td><input type="text" name="tax[]" id="tax_'+row_id+'" class="form-control form-control-sm" disabled><input type="hidden" name="tax_value[]" id="tax_value_'+row_id+'" class="form-control form-control-sm"></td>'+

                    '<td><input type="text" name="total[]" id="total_'+row_id+'" class="form-control form-control-sm" disabled><input type="hidden" name="total_value[]" id="total_value_'+row_id+'" class="form-control form-control-sm"></td>'+

                    '<td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(\''+row_id+'\')"><i class="fas fa-window-close"></i></button></td>'+
                    '</tr>';

                if(count_table_tbody_tr >= 1) {
                    $("#product_info_table tbody tr:last").after(html);  
                }
                else {
                    $("#product_info_table tbody").html(html);
                }

              $(".select_group").select2();

          }
        });

      return false;
    });

  }); // /document

  function getTotal(row = null) {
    if(row) {
      var total = Number($("#selling_price_value_"+row).val()) * Number($("#quantity_"+row).val());
      total = total.toFixed(2);
      $("#total"+row).val(total);
      $("#total_value_"+row).val(total);
      
      subAmount();

    } else {
      alert('no row !! please refresh the page');
    }
  }


  // get the product information from the server
  function getProductData(row_id)
  {
    var product_id = $("#product_"+row_id).val();    
    if(product_id == "") {
      $("#selling_price_"+row_id).val("");
      $("#selling_price_value_"+row_id).val("");

      $("#quantity_"+row_id).val("");           

      $("#total_"+row_id).val("");
      $("#total_value_"+row_id).val("");

    } else {
      $.ajax({
        url: base_url + '/sales_orders/getProductValueById',
        type: 'post',
        data: {product_id : product_id},
        dataType: 'json',
        success:function(response) {
          // setting the rate value into the rate input field
          
          $("#selling_price_"+row_id).val(response.price);
          $("#selling_price_value_"+row_id).val(response.price);

          $("#quantity_"+row_id).val(1);
          $("#quantity_value_"+row_id).val(1);

          var total = Number(response.price) * 1;
          total = total.toFixed(2);
          $("#total_"+row_id).val(total);
          $("#total_value_"+row_id).val(total);
          
          subAmount();
        } // /success
      }); // /ajax function to fetch the product data 
    }
  }

</script>


</body>
</html>