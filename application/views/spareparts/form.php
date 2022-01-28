<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fa fa-address-card"></i> <?php echo $title; ?></h3>
        </div>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="flash-data-required" data-flashdata="<?= $this->session->flashdata('required'); ?>"></div>
        <div class="card-body">
        <!--  -->
        <form autocomplete="off" action="<?php echo base_url('machinery/add'); ?>" method="POST" enctype="multipart/form-data">
            
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="gln_mc_in">Global Location Number</label>
                    <input type="text" name="gln_mc_in" readonly required class="form-control" id="gln_mc_in" value="<?php echo $gln_mc; ?>">
                    <?= form_error('gln_mc_in', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="serial_number">Serial Number</label>
                    <input type="text" name="serial_number" required class="form-control" id="serial_number" value="<?= set_value('serial_number'); ?>">
                    <?= form_error('serial_number', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="container_number">Container Number</label>
                    <input type="text" name="container_number" required class="form-control" id="container_number" value="<?= set_value('container_number'); ?>">
                    <?= form_error('container_number', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="driver_id">Driver Name</label>
                    <select id="driver_id" name="driver_id" required class="form-control" value="<?= set_value('driver_id'); ?>">
                        <option value="0">--Select--</option>
                        <?php foreach ($driver as $row) {?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
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
                <div class="form-group col-md-3">
                    <label for="origin">Origin</label>
                    <input type="text" name="origin" required class="form-control" id="origin" value="<?= set_value('origin'); ?>">
                    <?= form_error('origin', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="packing_list">Packing List</label>
                    <input type="text" name="packing_list" required class="form-control" id="packing_list" value="<?= set_value('packing_list'); ?>">
                    <?= form_error('packing_list', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
            </div>

            <!-- <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="supplier_id">Vendor/Supplier</label>
                    <input type="text" name="supplier_id" required class="form-control" id="supplier_id" value="<?= set_value('supplier_id'); ?>">
                    <?= form_error('supplier_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="nama">Identitas Vendor/Supplier</label>
                    <textarea type="text" readonly rows="7" class="form-control"></textarea>
                </div>
            </div> -->

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="net_weight">Net Weight</label>
                    <input type="text" name="net_weight" required class="form-control" id="net_weight" value="<?= set_value('net_weight'); ?>">
                    <?= form_error('net_weight', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="unit_of_measurment">Unit Of Measurment</label>
                    <input type="text" name="unit_of_measurment" required class="form-control" id="unit_of_measurment" value="<?= set_value('unit_of_measurment'); ?>">
                    <?= form_error('unit_of_measurment', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="qty">Qty</label>
                    <input type="number" name="qty" required class="form-control" id="qty" value="<?= set_value('qty'); ?>">
                    <?= form_error('qty', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="made_in">Made In</label>
                    <input type="text" name="made_in" required class="form-control" id="made_in" value="<?= set_value('made_in'); ?>">
                    <?= form_error('made_in', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="driver_id">Vendor/Supplier</label>
                    <select id="driver_id" name="driver_id" required class="form-control" value="<?= set_value('driver_id'); ?>">
                        <option value="0">--Select--</option>
                        <?php foreach ($driver as $row) {?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                    </select>
                    <?= form_error('driver_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="factory_location_id">Factory Location</label>
                    <select id="factory_location_id" name="factory_location_id" required class="form-control" value="<?= set_value('factory_location_id'); ?>">
                        <option selected="">Pilih</option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                    <?= form_error('factory_location_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>

                <div class="form-group col-md-4">
                    <label for="zone_division_id">Zone Division</label>
                    <select id="zone_division_id" name="zone_division_id" required class="form-control" value="<?= set_value('zone_division_id'); ?>">
                        <option selected="">Pilih</option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                    <?= form_error('zone_division_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>

                <div class="form-group col-md-4">
                    <label for="area_zone_id">Area Zone</label>
                    <select id="area_zone_id" name="area_zone_id" required class="form-control" value="<?= set_value('area_zone_id'); ?>">
                        <option selected="">Pilih</option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                    <?= form_error('area_zone_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="room_area_id">Room Area</label>
                    <select id="room_area_id" name="room_area_id" required class="form-control" value="<?= set_value('room_area_id'); ?>">
                        <option selected="">Pilih</option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                    <?= form_error('room_area_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>

                <div class="form-group col-md-4">
                    <label for="rack_location_id">Rack Location</label>
                    <select id="rack_location_id" name="rack_location_id" required class="form-control" value="<?= set_value('rack_location_id'); ?>">
                        <option selected="">Pilih</option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                    <?= form_error('rack_location_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>

                <div class="form-group col-md-4">
                    <label for="rack_level_id">Rack level</label>
                    <select id="rack_level_id" name="rack_level_id" required class="form-control" value="<?= set_value('rack_level_id'); ?>">
                        <option selected="">Pilih</option>
                        <option value="1">Laki-Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                    <?= form_error('rack_level_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-danger">Save</button>
                <a role="button" href="<?php echo base_url('machinery'); ?>" class="btn bg-danger" title="Close"> Close</a>
            </div>
        </form>
        <!--  -->
        </div>
    </div>
</div>


