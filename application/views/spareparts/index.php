<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-user-friends"></i> <?php echo $title; ?></h3>
        </div>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="flash-data-required" data-flashdata="<?= $this->session->flashdata('required'); ?>"></div>
        <div class="flash-data-upload" data-flashdata="<?= $this->session->flashdata('upload'); ?>"></div>

        <div class="card-body">
        
            <!-- <a role="button" href="<?php echo base_url('spareparts/form'); ?>" class="btn bg-danger" title="Create spareparts">
                <i class="fas fa-user-plus"></i>
            </a> -->

            <a role="button" href="#" class="btn bg-danger" title="Add spareparts" data-toggle="modal" data-target=".tambah_spareparts"><i class="fas fa-user-plus"></i></a>

            <!-- <a role="button" href="#" class="btn bg-danger" title="Print">
                <i class="fas fa-print"></i>
            </a> -->

            <a role="button" href="<?php echo base_url('spareparts'); ?>" class="btn bg-danger" title="Refresh">
                <i class="fas fa-sync-alt"></i>
            </a>

            <a role="button" href="#" class="btn bg-danger" title="Import spareparts" data-toggle="modal" data-target=".tambah_import"><i class="fas fa-file-import"></i></a>
            

            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>GLN</th>
                            <th>Parts Number</th>
                            <th>Parts Name</th>
                            <th>Qty</th>
                            <th>Supplier</th>
                            <th>Number of Packing List</th>
                            <th>Number of Container</th>
                            <th>Area Zone Location</th>
                            <th width='150px'>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($spareparts as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>
                                <a role="button" href="<?php echo site_url(); ?>spareparts/view/<?php echo $row['id']; ?>" class="btn bg-info" title="View">
                                <?php echo strtoupper($row['gln_spt_in']); ?>
                                </a>

                            </td>
                            <td><?php echo strtoupper($row['parts_number']); ?></td>
                            <td><?php echo strtoupper($row['parts_name']); ?></td>
                            <td><?php echo strtoupper($row['qty']); ?></td>
                            <td><?php echo strtoupper($row['supplierName']); ?></td>
                            <td><?php echo strtoupper($row['packing_list']); ?></td>
                            <td><?php echo strtoupper($row['container_number']); ?></td>
                            <td><?php echo strtoupper($row['area_zone_location']); ?></td>
                            <td>
                            <center>
                                    <a role="button" href="#" class="btn bg-danger" title="Edit" data-toggle="modal" data-target="#edit_spareparts<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                    </a>
                                    <a role="button" href="<?php echo site_url(); ?>spareparts/delete/<?php echo $row['id']; ?>" id="hapus" class="btn bg-danger tombol-hapus" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    
                                    <!-- <a role="button" href="#" class="btn bg-danger" title="More..." data-toggle="modal" data-target="#view_spareparts<?php echo $row['id']; ?>"><i class="fab fa-searchengin"></i></a> -->
                            </center>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>

                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade tambah_spareparts" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Spare Part</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="far fa-check-square"></i> <?php echo $title; ?></h3>
                    </div>

                    <div class="card-body">

                        <form autocomplete="off" action="<?php echo base_url('spareparts/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="gln_spt_in">Global Location Number</label>
                                    <input type="text" name="gln_spt_in" readonly required class="form-control" id="gln_spt_in" value="<?php echo $gln_spt_in; ?>">
                                    <?= form_error('gln_spt_in', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="parts_number">Parts Number</label>
                                    <input type="text" name="parts_number" required class="form-control" id="parts_number" value="<?= set_value('parts_number'); ?>">
                                    <?= form_error('parts_number', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="parts_name">Parts Name</label>
                                    <input type="text" name="parts_name" required class="form-control" id="parts_name" value="<?= set_value('parts_name'); ?>">
                                    <?= form_error('parts_name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="driver_id">Driver Name</label>
                                    <select id="driver_id" name="driver_id" required class="form-control" value="<?= set_value('driver_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($driver as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper($row['name']); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('driver_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="machinery_name">Machinery Name</label>
                                    <input type="text" name="machinery_name" required class="form-control" id="machinery_name" value="<?= set_value('machinery_name'); ?>">
                                    <?= form_error('machinery_name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="origin">Origin</label>
                                    <input type="text" name="origin" required class="form-control" id="origin" value="<?= set_value('origin'); ?>">
                                    <?= form_error('origin', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="minimum_stock">Minimum Stock</label>
                                    <input type="text" name="minimum_stock" required class="form-control" id="minimum_stock" value="<?= set_value('minimum_stock'); ?>">
                                    <?= form_error('minimum_stock', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="maximum_stock">Maximum Stock</label>
                                    <input type="text" name="maximum_stock" required class="form-control" id="maximum_stock" value="<?= set_value('maximum_stock'); ?>">
                                    <?= form_error('maximum_stock', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="unit_of_measurment">Unit Of Measurment</label>
                                    <input type="text" name="unit_of_measurment" required class="form-control" id="unit_of_measurment" value="<?= set_value('unit_of_measurment'); ?>">
                                    <?= form_error('unit_of_measurment', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="qty">Qty</label>
                                    <input type="number" name="qty" required class="form-control" id="qty" value="<?= set_value('qty'); ?>">
                                    <?= form_error('qty', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="packing_list">Packing List</label>
                                    <input type="text" name="packing_list" required class="form-control" id="packing_list" value="<?= set_value('packing_list'); ?>">
                                    <?= form_error('packing_list', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="critical">Critical</label>
                                    <select id="critical" name="critical" required class="form-control" value="<?= set_value('critical'); ?>">
                                        <option value="0">--Select--</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <?= form_error('critical', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="made_in">Made In</label>
                                    <input type="text" name="made_in" required class="form-control" id="made_in" value="<?= set_value('made_in'); ?>">
                                    <?= form_error('made_in', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="supplier_id">Vendor/Supplier</label>
                                    <select id="supplier_id" name="supplier_id" required class="form-control" value="<?= set_value('supplier_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($suppliers as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['supplierName'])); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('supplier_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="packing_list">Packing List</label>
                                    <input type="text" name="packing_list" required class="form-control" id="packing_list" value="<?= set_value('packing_list'); ?>">
                                    <?= form_error('packing_list', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="container_number">Container Number</label>
                                    <input type="text" name="container_number" required class="form-control" id="container_number" value="<?= set_value('container_number'); ?>">
                                    <?= form_error('container_number', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="factory_location_id">Factory Location</label>
                                    <select id="factory_location_id" name="factory_location_id" required class="form-control" value="<?= set_value('factory_location_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($factory_location as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('factory_location_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="zone_division_id">Zone Division</label>
                                    <select id="zone_division_id" name="zone_division_id" required class="form-control" value="<?= set_value('zone_division_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($zone_division as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('zone_division_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="area_zone_id">Area Zone</label>
                                    <select id="area_zone_id" name="area_zone_id" required class="form-control" value="<?= set_value('area_zone_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($area_zone as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('area_zone_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="room_area_id">Room Area</label>
                                    <select id="room_area_id" name="room_area_id" required class="form-control" value="<?= set_value('room_area_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($room_zone as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('room_area_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="rack_location_id">Rack Location</label>
                                    <select id="rack_location_id" name="rack_location_id" required class="form-control" value="<?= set_value('rack_location_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($rack_location as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('rack_location_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="rack_level_id">Rack level</label>
                                    <select id="rack_level_id" name="rack_level_id" required class="form-control" value="<?= set_value('rack_level_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($level_rack as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('rack_level_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="dokumen">Documents</label>
                                    <input type="file" class="form-control" name="dokumen" id="dokumen">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" rows="2" class="form-control"></textarea>
                                </div>
                            </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-danger">Save</button>
                <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->



<!-- Modal Edit -->
<?php
foreach ($spareparts as $i) :
    $id                     = $i['id'];
    $gln_spt_in             = $i['gln_spt_in'];
    $origin                 = $i['origin'];
    $supplier_id            = $i['supplier_id'];
    $parts_name             = $i['parts_name'];
    $parts_number           = $i['parts_number'];
    $machinery_name         = $i['machinery_name'];
    $unit_of_measurment     = $i['unit_of_measurment'];
    $qty                    = $i['qty'];
    $critical               = $i['critical'];
    $minimum_stock          = $i['minimum_stock'];
    $maximum_stock          = $i['maximum_stock'];
    $made_in                = $i['made_in'];
    $factory_location_id    = $i['factory_location_id'];
    $zone_division_id       = $i['zone_division_id'];
    $area_zone_id           = $i['area_zone_id'];
    $room_area_id           = $i['room_area_id'];
    $rack_location_id       = $i['rack_location_id'];
    $rack_level_id          = $i['rack_level_id'];
    $packing_list           = $i['packing_list'];
    $container_number       = $i['container_number'];
    $driver_id              = $i['driver_id'];
    $description            = $i['description'];
?>
    <div class="modal fade edit_spareparts" id="edit_spareparts<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Spareparts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-check-square"></i> <?php echo $title; ?></h3>
                        </div>

                        <div class="card-body">

                            <form autocomplete="off" action="<?php echo base_url('spareparts/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="gln_spt_in">Global Location Number</label>
                                    <input type="text" name="gln_spt_in" readonly required class="form-control" id="gln_spt_in" value="<?php echo $gln_spt_in; ?>">
                                    <?= form_error('gln_spt_in', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="parts_number">Parts Number</label>
                                    <input type="text" name="parts_number" required class="form-control" id="parts_number" value="<?php echo $parts_number; ?>">
                                    <?= form_error('parts_number', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="parts_name">Parts Name</label>
                                    <input type="text" name="parts_name" required class="form-control" id="parts_name" value="<?php echo $parts_name; ?>">
                                    <?= form_error('parts_name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="driver_id">Driver Name</label>
                                    <select id="driver_id" name="driver_id" required class="form-control" value="<?= set_value('driver_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($driver as $row) {?>
                                            <?php if ($row['id']==$driver_id) { ?>
                                                <option value="<?php echo $row['id']; ?>" selected><?php echo strtoupper($row['name']); ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper($row['name']); ?></option>
                                            <?php } ?>
                                            
                                        <?php } ?>
                                    </select>
                                    <?= form_error('driver_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="machinery_name">Machinery Name</label>
                                    <input type="text" name="machinery_name" required class="form-control" id="machinery_name" value="<?php echo $machinery_name; ?>">
                                    <?= form_error('machinery_name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="origin">Origin</label>
                                    <input type="text" name="origin" required class="form-control" id="origin" value="<?php echo $origin; ?>">
                                    <?= form_error('origin', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="minimum_stock">Minimum Stock</label>
                                    <input type="text" name="minimum_stock" required class="form-control" id="minimum_stock" value="<?php echo $minimum_stock; ?>">
                                    <?= form_error('minimum_stock', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="maximum_stock">Maximum Stock</label>
                                    <input type="text" name="maximum_stock" required class="form-control" id="maximum_stock" value="<?php echo $maximum_stock; ?>">
                                    <?= form_error('maximum_stock', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="unit_of_measurment">Unit Of Measurment</label>
                                    <input type="text" name="unit_of_measurment" required class="form-control" id="unit_of_measurment" value="<?php echo $unit_of_measurment; ?>">
                                    <?= form_error('unit_of_measurment', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="qty">Qty</label>
                                    <input type="number" name="qty" required class="form-control" id="qty" value="<?php echo $qty; ?>">
                                    <?= form_error('qty', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="packing_list">Packing List</label>
                                    <input type="text" name="packing_list" required class="form-control" id="packing_list" value="<?php echo $packing_list; ?>">
                                    <?= form_error('packing_list', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="critical">Critical</label>
                                    <select id="critical" name="critical" required class="form-control" value="<?= set_value('critical'); ?>">
                                        <option value="0">--Select--</option>
                                            <?php if ($critical==1) { ?>
                                                <option value="1"selected>Yes</option>
                                                <option value="2">No</option>
                                            <?php }else{ ?>
                                                <option value="1">Yes</option>
                                                <option value="2"selected>No</option>
                                            <?php } ?>
                                    </select>
                                    <?= form_error('critical', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="made_in">Made In</label>
                                    <input type="text" name="made_in" required class="form-control" id="made_in" value="<?php echo $made_in; ?>">
                                    <?= form_error('made_in', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="supplier_id">Vendor/Supplier</label>
                                    <select id="supplier_id" name="supplier_id" required class="form-control" value="<?= set_value('supplier_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($suppliers as $row) {?>
                                            <?php if ($row['id']==$supplier_id) { ?>
                                                <option value="<?php echo $row['id']; ?>" selected><?php echo strtoupper(($row['supplierName'])); ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['supplierName'])); ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('supplier_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="packing_list">Packing List</label>
                                    <input type="text" name="packing_list" required class="form-control" id="packing_list" value="<?php echo $packing_list; ?>">
                                    <?= form_error('packing_list', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="container_number">Container Number</label>
                                    <input type="text" name="container_number" required class="form-control" id="container_number" value="<?php echo $container_number; ?>">
                                    <?= form_error('container_number', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="factory_location_id">Factory Location</label>
                                    <select id="factory_location_id" name="factory_location_id" required class="form-control" value="<?= set_value('factory_location_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($factory_location as $row) {?>
                                            <?php if ($row['id']==$factory_location_id) { ?>
                                                <option value="<?php echo $row['id']; ?>" selected><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('factory_location_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="zone_division_id">Zone Division</label>
                                    <select id="zone_division_id" name="zone_division_id" required class="form-control" value="<?= set_value('zone_division_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($zone_division as $row) {?>
                                            <?php if ($row['id']==$zone_division_id) { ?>
                                                <option value="<?php echo $row['id']; ?>"selected><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('zone_division_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="area_zone_id">Area Zone</label>
                                    <select id="area_zone_id" name="area_zone_id" required class="form-control" value="<?= set_value('area_zone_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($area_zone as $row) {?>
                                            <?php if ($row['id']==$area_zone_id) { ?>
                                                <option value="<?php echo $row['id']; ?>" selected><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('area_zone_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="room_area_id">Room Area</label>
                                    <select id="room_area_id" name="room_area_id" required class="form-control" value="<?= set_value('room_area_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($room_zone as $row) {?>
                                            <?php if ($row['id']==$room_area_id) { ?>
                                                <option value="<?php echo $row['id']; ?>" selected><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('room_area_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="rack_location_id">Rack Location</label>
                                    <select id="rack_location_id" name="rack_location_id" required class="form-control" value="<?= set_value('rack_location_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($rack_location as $row) {?>
                                            <?php if ($row['id']==$rack_location_id) { ?>
                                                <option value="<?php echo $row['id']; ?>" selected><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('rack_location_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="rack_level_id">Rack level</label>
                                    <select id="rack_level_id" name="rack_level_id" required class="form-control" value="<?= set_value('rack_level_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($level_rack as $row) {?>
                                            <?php if ($row['id']==$rack_level_id) {?>
                                                <option value="<?php echo $row['id']; ?>"selected><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php }else{?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('rack_level_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="dokumen">Documents</label>
                                    <input type="file" class="form-control" name="dokumen" id="dokumen">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" rows="2" class="form-control"><?php echo $description; ?></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-danger">Update</button>
                    <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>
 <!--End Modal Edit -->


 <!-- Modal Import -->
<div class="modal fade tambah_import" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Import Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="far fa-check-square"></i> <?php echo $title; ?></h3>
                    </div>

                    <div class="card-body">

                        <form autocomplete="off" action="<?php echo base_url('spareparts/import_excel'); ?>" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="dokumen">Documents Excel</label>
                                    <input type="file" class="form-control" required="required" name="fileExcel" id="fileExcel">
                                </div>
                            </div>

                            <a role="button" href="<?php echo base_url(); ?>assets/spareparts.xlsx" class="btn bg-danger" title="Download Format Excel">Download Format Excel <i class="fa fa-download" aria-hidden="true"></i></a>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-danger">Upload</button>
                <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Import -->
