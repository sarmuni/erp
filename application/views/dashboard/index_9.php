<!-- Quick Info -->
<div class="row">
    
    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
    <a href="<?php base_url() ?>account_user">
        <div class="card-box noradius noborder bg-danger">
            <i class="fa fa-users float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Users</h6>
            <h1 class="m-b-20 text-white counter">
                <?php foreach ($count_users as $total_pengirim) {
                    echo $total_pengirim['total'];
                } ?>
            </h1>
            <span class="text-white">More Information</span>
        </div>
    </a>
    </div>
    

    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
    <a href="">
        <div class="card-box noradius noborder bg-purple">
            <i class="fa fa-shopping-cart float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Finish Product</h6>
            <h1 class="m-b-20 text-white counter">
                <?php foreach ($count_departments as $total_barang) {
                    // echo $total_barang['total'];
                } ?>0
            </h1>
            <span class="text-white">More Information</span>
        </div>
    </a>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
    <a href="<?php base_url(); ?>materials">
        <div class="card-box noradius noborder bg-warning">
            <i class="fa fa-truck float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Material</h6>
            <h1 class="m-b-20 text-white counter">
                <?php foreach ($count_materials as $total_barang) {
                    echo $total_barang['total'];
                } ?></h1>
            <span class="text-white">More Information</span>
        </div>
    </a>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
    <a href="<?php base_url(); ?>machinery">
        <div class="card-box noradius noborder bg-success">
            <i class="fa fa-truck float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">Machinery</h6>
            <h1 class="m-b-20 text-white counter">
                <?php foreach ($count_machinery as $total_pengirim) {
                    echo $total_pengirim['total'];
                } ?>
            </h1>
            <span class="text-white">More Information</span>
        </div>
    </a>
    </div>
</div>
<!-- end Quick Info -->
