<!-- Quick Info -->

<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-danger">
            <i class="fa fa-users float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">warehouses</h6>
            <h1 class="m-b-20 text-white counter">
                <?php foreach ($count_warehouses as $total_pengirim) {
                    echo $total_pengirim['total'];
                } ?>
            </h1>
            <span class="text-white">More Info</span>
        </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-purple">
            <i class="fa fa-building float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">departments</h6>
            <h1 class="m-b-20 text-white counter">
                <?php foreach ($count_departments as $total_barang) {
                    echo $total_barang['total'];
                } ?>
            </h1>
            <span class="text-white">More Info</span>
        </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-warning">
            <i class="fa fa-truck float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">MACHINERY</h6>
            <h1 class="m-b-20 text-white counter">
                <?php foreach ($count_spareparts as $total_barang) {
                    echo $total_barang['total'];
                } ?></h1>
            <span class="text-white">More Info</span>
        </div>
    </div>

    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card-box noradius noborder bg-info">
            <i class="far fa-snowflake float-right text-white"></i>
            <h6 class="text-white text-uppercase m-b-20">SPARE PARTS</h6>
            <h1 class="m-b-20 text-white counter">
                <?php foreach ($count_spareparts as $total_pengirim) {
                    echo $total_pengirim['total'];
                } ?>
            </h1>
            <span class="text-white">More Info</span>
        </div>
    </div>
</div>
<!-- end Quick Info -->

<!-- Chart -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-chart-bar"></i> Delivery Goods In-Out</h3>
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
                <h3><i class="fas fa-chart-bar"></i> Spare Part General</h3>
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


<div class="card mb-3">
    <div class="card-header">
        <h3><i class="fas fa-user-friends"></i> History Requestion</h3>
        <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus.
                                    Vivamus fermentum ultricies orci sit amet sollicitudin. -->
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Posision</th>
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