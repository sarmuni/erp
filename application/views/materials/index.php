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
        
            <!-- <a role="button" href="<?php echo base_url('materials/form'); ?>" class="btn bg-danger" title="Create materials">
                <i class="fas fa-user-plus"></i>
            </a> -->

            <a role="button" href="#" class="btn bg-danger btn-sm" title="Add materials" data-toggle="modal" data-target=".tambah_materials"><i class="fas fa-user-plus"></i> Add New</a>

            <a role="button" href="#" class="btn bg-danger btn-sm" title="Print">
                <i class="fas fa-print"></i> Print PDF
            </a>

            <a role="button" href="<?php echo base_url('materials'); ?>" class="btn bg-danger btn-sm" title="Refresh">
                <i class="fas fa-sync-alt"></i> Refresh
            </a>

            <a role="button" href="#" class="btn bg-danger btn-sm" title="Import materials" data-toggle="modal" data-target=".tambah_import"><i class="fas fa-file-import"></i> Import Excel</a>

            <span class="pull-right"><a href="#" id="" title="Sort" class="btn bg-info btn-sm"><i class="fas fa-search" aria-hidden="true"></i> Sort</a></span>
            <div class="col-sm-2 pull-right">
                <select id="departments_id" name="departments_id" required class="form-control form-control-sm select2" value="<?= set_value('departments_id'); ?>">
                    <option value="">-- All Zone Location--</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="year" name="year" required class="form-control form-control-sm select2" value="<?= set_value('year'); ?>">
                    <option value="">-- All Year--</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="category" name="category" required class="form-control form-control-sm select2" value="<?= set_value('category'); ?>">
                    <option value="">-- All Supplier--</option>
                </select>
            </div>
            

            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th width='200px'>Global Location Number</th>
                            <th>Material Code</th>
                            <th>Materials Name</th>
                            <th>Qty</th>
                            <th>Supplier</th>
                            <th>Number of Packing List</th>
                            <th>Number of Container</th>
                            <th>Area Zone Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($materials as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>
                                <a role="button" href="<?php echo site_url(); ?>materials/view/<?php echo $row['id']; ?>" class="btn bg-info btn-sm" title="View">
                                <?php echo strtoupper($row['gln_mt_in']); ?>
                                </a>

                            </td>
                            <td><?php echo strtoupper($row['materials_code']); ?></td>
                            <td><?php echo strtoupper($row['materials_name']); ?></td>
                            <td><?php echo strtoupper($row['qty']); ?></td>
                            <td><?php echo strtoupper($row['supplierName']); ?></td>
                            <td><?php echo strtoupper($row['packing_list']); ?></td>
                            <td><?php echo strtoupper($row['container_number']); ?></td>
                            <td><?php echo strtoupper($row['area_zone_location']); ?></td>
                            <td>
                            <center>
                                    <a role="button" href="#" class="btn bg-warning btn-sm" title="Edit" data-toggle="modal" data-target="#edit_materials<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                    </a>
                                    <a role="button" href="<?php echo site_url(); ?>materials/delete/<?php echo $row['id']; ?>" id="hapus" class="btn bg-danger btn-sm tombol-hapus" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    
                                    <!-- <a role="button" href="#" class="btn bg-danger" title="More..." data-toggle="modal" data-target="#view_materials<?php echo $row['id']; ?>"><i class="fab fa-searchengin"></i></a> -->
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
<div class="modal fade tambah_materials" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Materials</h5>
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

                        <form autocomplete="off" action="<?php echo base_url('materials/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="gln_mt_in">Global Location Number</label>
                                    <input type="text" name="gln_mt_in" readonly required class="form-control form-control-sm" id="gln_mt_in" value="<?php echo $gln_mt_in; ?>">
                                    <?= form_error('gln_mt_in', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="materials_code">Materials Code</label>
                                    <input type="text" name="materials_code" required class="form-control form-control-sm" id="materials_code" value="<?= set_value('materials_code'); ?>">
                                    <?= form_error('materials_code', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="container_number">Container Number</label>
                                    <input type="text" name="container_number" required class="form-control form-control-sm" id="container_number" value="<?= set_value('container_number'); ?>">
                                    <?= form_error('container_number', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="driver_id">Driver Name</label>
                                    <select id="driver_id" name="driver_id" required class="form-control select2" style="width: 500px !important" value="<?= set_value('driver_id'); ?>">
                                        <option value="">--Select--</option>
                                        <?php foreach ($driver as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper($row['name']); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('driver_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="materials_name">Materials Name</label>
                                    <input type="text" name="materials_name" required class="form-control form-control-sm" id="materials_name" value="<?= set_value('materials_name'); ?>">
                                    <?= form_error('materials_name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="origin">Origin</label>
                                    <input type="text" name="origin" required class="form-control form-control-sm" id="origin" value="<?= set_value('origin'); ?>">
                                    <?= form_error('origin', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="packing_list">Packing List</label>
                                    <input type="text" name="packing_list" required class="form-control form-control-sm" id="packing_list" value="<?= set_value('packing_list'); ?>">
                                    <?= form_error('packing_list', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="catgeory_type">Materials Type</label>
                                    <select id="catgeory_type" name="catgeory_type" required class="form-control select2" style="width: 500px !important" value="<?= set_value('catgeory_type'); ?>">
                                        <option value="">--Select--</option>
                                        <option value="1">RM (Raw Material)</option>
                                        <option value="2">PM (Packaging Material)</option>
                                    </select>
                                    <?= form_error('catgeory_type', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="unit_of_measurment">Unit Of Measurment</label>
                                    <input type="text" name="unit_of_measurment" required class="form-control form-control-sm" id="unit_of_measurment" value="<?= set_value('unit_of_measurment'); ?>">
                                    <?= form_error('unit_of_measurment', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="qty">Qty</label>
                                    <input type="number" name="qty" required class="form-control form-control-sm" id="qty" value="<?= set_value('qty'); ?>">
                                    <?= form_error('qty', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="made_in">Made In</label>
                                    <input type="text" name="made_in" required class="form-control form-control-sm" id="made_in" value="<?= set_value('made_in'); ?>">
                                    <?= form_error('made_in', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="supplier_id">Vendor/Supplier</label>
                                    <select id="supplier_id" name="supplier_id" required class="form-control select2" style="width: 500px !important" value="<?= set_value('supplier_id'); ?>">
                                        <option value="">--Select--</option>
                                        <?php foreach ($suppliers as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['supplierName'])); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('supplier_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="factory_location_id">Factory Location</label>
                                    <select id="factory_location_id" name="factory_location_id" required class="form-control select2" style="width: 500px !important" value="<?= set_value('factory_location_id'); ?>">
                                        <option value="">--Select--</option>
                                        <?php foreach ($factory_location as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('factory_location_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="zone_division_id">Zone Division</label>
                                    <select id="zone_division_id" name="zone_division_id" required class="form-control select2" style="width: 500px !important" value="<?= set_value('zone_division_id'); ?>">
                                        <option value="">--Select--</option>
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
                                    <select id="area_zone_id" name="area_zone_id" required class="form-control select2" style="width: 500px !important" value="<?= set_value('area_zone_id'); ?>">
                                        <option value="">--Select--</option>
                                        <?php foreach ($area_zone as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('area_zone_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="room_area_id">Room Area</label>
                                    <select id="room_area_id" name="room_area_id" required class="form-control select2" style="width: 500px !important" value="<?= set_value('room_area_id'); ?>">
                                        <option value="">--Select--</option>
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
                                    <select id="rack_location_id" name="rack_location_id" required class="form-control select2" style="width: 500px !important" value="<?= set_value('rack_location_id'); ?>">
                                        <option value="">--Select--</option>
                                        <?php foreach ($rack_location as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('rack_location_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="rack_level_id">Rack level</label>
                                    <select id="rack_level_id" name="rack_level_id" required class="form-control select2" style="width: 500px !important" value="<?= set_value('rack_level_id'); ?>">
                                        <option value="">--Select--</option>
                                        <?php foreach ($level_rack as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('rack_level_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="dokumen">Documents</label>
                                    <input type="file" class="form-control form-control-sm" name="dokumen" id="dokumen">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" rows="2" class="form-control form-control-sm"></textarea>
                                </div>
                            </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn bg-danger">Save</button>
                <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button> -->

                <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Save</button>
                <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>

            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->



<!-- Modal Edit -->
<?php
foreach ($materials as $i) :
    $id                     = $i['id'];
    $gln_mt_in              = $i['gln_mt_in'];
    $materials_name         = $i['materials_name'];
    $materials_code         = $i['materials_code'];
    $origin                 = $i['origin'];
    $supplier_id            = $i['supplier_id'];
    $catgeory_type          = $i['catgeory_type'];
    $unit_of_measurment     = $i['unit_of_measurment'];
    $qty                    = $i['qty'];
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
    <div class="modal fade edit_materials" id="edit_materials<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit materials</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('materials/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">

                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="gln_mt_in">Global Location Number</label>
                                    <input type="text" name="gln_mt_in" readonly required class="form-control form-control-sm" id="gln_mt_in" value="<?php echo $gln_mt_in; ?>">
                                    <?= form_error('gln_mt_in', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="materials_code">Serial Number</label>
                                    <input type="text" name="materials_code" required class="form-control form-control-sm" id="materials_code" value="<?php echo $materials_code; ?>">
                                    <?= form_error('materials_code', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="container_number">Container Number</label>
                                    <input type="text" name="container_number" required class="form-control form-control-sm" id="container_number" value="<?php echo $container_number; ?>">
                                    <?= form_error('container_number', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="driver_id">Driver Name</label>
                                    <select id="driver_id" name="driver_id" required class="form-control form-control-sm" value="<?= set_value('driver_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($driver as $row) {?>
                                            <?php if ($row['id']==$driver_id) {?>
                                                <option value="<?php echo $row['id']; ?>"selected><?php echo strtoupper($row['name']); ?></option>
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
                                    <label for="materials_name">Materials Name</label>
                                    <input type="text" name="materials_name" required class="form-control form-control-sm" id="materials_name" value="<?php echo $materials_name; ?>">
                                    <?= form_error('materials_name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="origin">Origin</label>
                                    <input type="text" name="origin" required class="form-control form-control-sm" id="origin" value="<?php echo $origin; ?>">
                                    <?= form_error('origin', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="packing_list">Packing List</label>
                                    <input type="text" name="packing_list" required class="form-control form-control-sm" id="packing_list" value="<?php echo $packing_list; ?>">
                                    <?= form_error('packing_list', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="catgeory_type">Material Type</label>
                                    <select id="catgeory_type" name="catgeory_type" required class="form-control select2" style="width: 500px !important">
                                    <?php if (set_value('catgeory_type')==1) { ?>
                                        <option value="">--Select--</option>
                                        <option value="1" selected>RM (Raw Material)</option>
                                        <option value="2">PM (Packaging Material)</option>
                                    <?php }else{ ?>
                                        <option value="">--Select--</option>
                                        <option value="1">RM (Raw Material)</option>
                                        <option value="2" selected>PM (Packaging Material)</option>
                                    <?php } ?>
                                        
                                    </select>
                                    <?= form_error('catgeory_type', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="unit_of_measurment">Unit Of Measurment</label>
                                    <input type="text" name="unit_of_measurment" required class="form-control form-control-sm" id="unit_of_measurment" value="<?php echo $unit_of_measurment; ?>">
                                    <?= form_error('unit_of_measurment', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="qty">Qty</label>
                                    <input type="number" name="qty" required class="form-control form-control-sm" id="qty" value="<?php echo $qty; ?>">
                                    <?= form_error('qty', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="made_in">Made In</label>
                                    <input type="text" name="made_in" required class="form-control form-control-sm" id="made_in" value="<?php echo $made_in; ?>">
                                    <?= form_error('made_in', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="supplier_id">Vendor/Supplier</label>
                                    <select id="supplier_id" name="supplier_id" required class="form-control form-control-sm" value="<?= set_value('supplier_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($suppliers as $row) {?>
                                            <?php if ($row['id']==$supplier_id) {?>
                                            <option value="<?php echo $row['id']; ?>"selected><?php echo strtoupper(($row['supplierName'])); ?></option>
                                            <?php }else{?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['supplierName'])); ?></option>
                                            <?php } ?>

                                        <?php } ?>
                                    </select>
                                    <?= form_error('supplier_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="factory_location_id">Factory Location</label>
                                    <select id="factory_location_id" name="factory_location_id" required class="form-control form-control-sm" value="<?= set_value('factory_location_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($factory_location as $row) {?>
                                            <?php if ($row['id']==$factory_location_id) { ?>
                                                <option value="<?php echo $row['id']; ?>"selected><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php }else{?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php } ?>

                                        <?php } ?>
                                    </select>
                                    <?= form_error('factory_location_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="zone_division_id">Zone Division</label>
                                    <select id="zone_division_id" name="zone_division_id" required class="form-control form-control-sm" value="<?= set_value('zone_division_id'); ?>">
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
                                    <select id="area_zone_id" name="area_zone_id" required class="form-control form-control-sm" value="<?= set_value('area_zone_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($area_zone as $row) {?>
                                            <?php if ($row['id']==$area_zone_id) {?>
                                            <option value="<?php echo $row['id']; ?>"selected><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php }else{?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('area_zone_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="room_area_id">Room Area</label>
                                    <select id="room_area_id" name="room_area_id" required class="form-control form-control-sm" value="<?= set_value('room_area_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($room_zone as $row) {?>
                                            <?php if ($row['id']==$room_area_id) { ?>
                                            <option value="<?php echo $row['id']; ?>"selected><?php echo strtoupper(($row['name'])); ?></option>
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
                                    <select id="rack_location_id" name="rack_location_id" required class="form-control form-control-sm" value="<?= set_value('rack_location_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($rack_location as $row) {?>
                                            <?php if ($row['id']==$rack_location_id) {?>
                                            <option value="<?php echo $row['id']; ?>"selected><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php } ?>

                                        <?php } ?>
                                    </select>
                                    <?= form_error('rack_location_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="rack_level_id">Rack level</label>
                                    <select id="rack_level_id" name="rack_level_id" required class="form-control form-control-sm" value="<?= set_value('rack_level_id'); ?>">
                                        <option value="0">--Select--</option>
                                        <?php foreach ($level_rack as $row) {?>
                                            <?php if ($row['id']==$rack_level_id) { ?>
                                            <option value="<?php echo $row['id']; ?>"selected><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo strtoupper(($row['name'])); ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('rack_level_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <!-- <div class="form-group col-md-12">
                                    <label for="dokumen">Documents</label>
                                    <input type="file" class="form-control form-control-sm" name="dokumen" id="dokumen">
                                </div> -->
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea type="text" name="description" rows="2" class="form-control form-control-sm"><?php echo $description; ?></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn bg-danger">Update</button>
                    <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button> -->

                    <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Update</button>
                    <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>

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

                        <form autocomplete="off" action="<?php echo base_url('materials/import_excel'); ?>" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="dokumen">Documents Excel</label>
                                    <input type="file" class="form-control form-control-sm" required="required" name="fileExcel" id="fileExcel">
                                </div>
                            </div>

                            <a role="button" href="<?php echo base_url(); ?>assets/materials.xlsx" class="btn bg-warning btn-sm" title="Download Format Excel">Download Format Excel <i class="fa fa-download" aria-hidden="true"></i></a>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn bg-danger">Upload</button>
                <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button> -->
                <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Upload</button>
                <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Import -->
