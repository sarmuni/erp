<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
        <div class="card-header">
            <h3><i class="far fa-user"></i> <?php echo $title; ?></h3>
        </div>
        <?php foreach ($spareparts as $row) { ?>
            <div class="card-body">

                <table class="table table-responsive-xl table-striped">
                <tbody>
                    <tr>
                        <td>Global Location Number (GLN)</td>
                        <td>:</td>
                        <td><?php echo $row['gln_spt_in']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Parts Name</td>
                        <td>:</td>
                        <td><?php echo $row['parts_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Parts Number</td>
                        <td>:</td>
                        <td><?php echo $row['parts_number']; ?></td>
                    </tr>
                    <tr>
                        <td>Origin</td>
                        <td>:</td>
                        <td><?php echo $row['origin']; ?></td>
                    </tr>
                    <tr>
                        <td>Unit Of Measurment</td>
                        <td>:</td>
                        <td><?php echo $row['unit_of_measurment']; ?></td>
                    </tr>
                    <tr>
                        <td>Qty</td>
                        <td>:</td>
                        <td><?php echo $row['qty']; ?></td>
                    </tr>
                    <tr>
                        <td>Critical</td>
                        <td>:</td>
                        <td><?php if ($row['critical']==1) {
                            echo "Yes";
                        }else{
                            echo "No";
                        } ?></td>
                    </tr>
                    <tr>
                        <td>Minimum Stock</td>
                        <td>:</td>
                        <td><?php echo $row['minimum_stock']; ?></td>
                    </tr>
                    <tr>
                        <td>Maximum Stock</td>
                        <td>:</td>
                        <td><?php echo $row['maximum_stock']; ?></td>
                    </tr>
                    <tr>
                        <td>Made In</td>
                        <td>:</td>
                        <td><?php echo $row['made_in']; ?></td>
                    </tr>
                    <tr>
                        <td>Factory Location</td>
                        <td>:</td>
                        <td><?php echo $row['factory_location']; ?></td>
                    </tr>
                    <tr>
                        <td>Zone Division</td>
                        <td>:</td>
                        <td><?php echo $row['zone_division']; ?></td>
                    </tr>
                    <tr>
                        <td>Area Zone</td>
                        <td>:</td>
                        <td><?php echo $row['area_zone']; ?></td>
                    </tr>
                    <tr>
                        <td>Room Area</td>
                        <td>:</td>
                        <td><?php echo $row['room_area']; ?></td>
                    </tr>
                    <tr>
                        <td>Rack Location</td>
                        <td>:</td>
                        <td><?php echo $row['rack_location']; ?></td>
                    </tr>
                    <tr>
                        <td>Rack Level Area</td>
                        <td>:</td>
                        <td><?php echo $row['rack_level']; ?></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>:</td>
                        <td><?php echo $row['description']; ?></td>
                    </tr>
                </tbody>
            </table>

                    <!-- <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Global Location Number (GLN)</label>
                                <input class="form-control" readonly name="gln_spt_in" type="text" required value="<?php echo $row['gln_spt_in']; ?>" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>spareparts Name</label>
                                <input class="form-control" readonly name="parts_name" type="text" value="<?php echo $row['parts_name']; ?>" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Serial Number</label>
                                <input class="form-control" readonly name="parts_number" type="text" required value="<?php echo $row['parts_number']; ?>" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Origin</label>
                                <input class="form-control" readonly name="origin" type="text" value="<?php echo $row['origin']; ?>" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Net Weight</label>
                                <input class="form-control" readonly name="net_weight" type="text" required value="<?php echo $row['net_weight']; ?>" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Unit Of Measurment</label>
                                <input class="form-control" readonly name="unit_of_measurment" type="text" value="<?php echo $row['unit_of_measurment']; ?>" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Qty</label>
                                <input class="form-control" readonly name="qty" type="text" required value="<?php echo $row['qty']; ?>" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Made In</label>
                                <input class="form-control" readonly name="made_in" type="text" value="<?php echo $row['made_in']; ?>" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Factory Location</label>
                                <input class="form-control" readonly name="name" type="text" value="<?php echo $row['factory_location']; ?>"/>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Zone Division</label>
                                <input class="form-control" readonly name="email" type="email" value="<?php echo $row['zone_division']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Area Zone</label>
                                <input class="form-control" readonly name="name" type="text" value="<?php echo $row['area_zone']; ?>"/>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Room Area</label>
                                <input class="form-control" readonly name="email" type="email" value="<?php echo $row['room_area']; ?>"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Rack Location</label>
                                <input class="form-control" readonly name="name" type="text" value="<?php echo $row['rack_location'];?>"/>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Rack Level Area</label>
                                <input class="form-control" readonly name="email" type="email" value="<?php echo $row['rack_level']; ?>"/>
                            </div>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-file-image"></i> QRCode</h3>
            </div>

            <div class="card-body text-center">

                <div class="row">
                    <div class="col-lg-12">
                        <img alt="avatar" class="img-fluid" src="<?php echo base_url(); ?>assets/img/qr.png">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-danger btn-block mt-3"><?php echo $row['gln_spt_in']; ?></button>
                    </div>

                    <div class="col-lg-12">
                        <button type="button" class="btn btn-info btn-block mt-3"><?php echo $row['parts_number']; ?></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php } ?>
</div>


<!-- Supplier -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
        <div class="card-header">
            <h3><i class="far fa-user"></i> Identitas Supplier</h3>
        </div>
        <?php foreach ($spareparts as $row) { ?>
            <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Supplier Name</label>
                                <input class="form-control" readonly name="name" type="text" required value="<?php echo $row['supplierName']; ?>" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea rows="6" readonly type="text" class="form-control"><?php echo $row['addres_supplier']; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" readonly name="name" type="text" required value="<?php echo $row['email']; ?>" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control" readonly name="email" type="email" value="<?php echo $row['phone']; ?>" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>PIC Supplier</label>
                                <input class="form-control" readonly name="name" type="text" required value="<?php echo $row['picSupplier']; ?>" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Phone Number PIC</label>
                                <input class="form-control" readonly name="email" type="email" value="" required />
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-file-image"></i> Images Supplier</h3>
            </div>

            <div class="card-body text-center">

                <div class="row">
                    <div class="col-lg-12">
                        <img alt="avatar" class="img-fluid" src="<?php echo base_url(); ?>assets/template_neura/images/avatars/avatar.png">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-danger btn-block mt-3"><?php echo strtoupper($row['picSupplier']); ?></button>
                    </div>

                    <div class="col-lg-12">
                        <button type="button" class="btn btn-info btn-block mt-3"><?php echo strtoupper($row['phone']); ?></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php } ?>
</div>
<!-- End Supplier -->

<!-- Driver -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
        <div class="card-header">
            <h3><i class="far fa-user"></i> Identitas Driver</h3>
        </div>
        <?php foreach ($spareparts as $row) { ?>
            <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>SIM Card</label>
                                <input class="form-control" readonly name="name" type="text" required value="<?php echo $row['sim_card']; ?>" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input class="form-control" readonly name="email" type="email" value="<?php echo $row['nik']; ?>" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Driver Name</label>
                                <input class="form-control" readonly name="name" type="text" required value="<?php echo strtoupper($row['name_driver']); ?>" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea rows="6" readonly type="text" class="form-control"><?php echo $row['address_driver']; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" readonly name="name" type="text" required value="<?php echo $row['email_driver']; ?>" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input class="form-control" readonly name="email" type="email" value="<?php echo $row['phone_number']; ?>" required />
                            </div>
                        </div>
                    </div>
                    
                </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-file-image"></i> Images Driver</h3>
            </div>

            <div class="card-body text-center">

                <div class="row">
                    <div class="col-lg-12">
                        <img alt="avatar" class="img-fluid" src="<?php echo base_url(); ?>assets/template_neura/images/avatars/avatar.png">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-danger btn-block mt-3"><?php echo strtoupper($row['name_driver']); ?></button>
                    </div>

                    <div class="col-lg-12">
                        <button type="button" class="btn btn-info btn-block mt-3"><?php echo strtoupper($row['nik']); ?></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php } ?>
</div>
<!-- End Driver -->