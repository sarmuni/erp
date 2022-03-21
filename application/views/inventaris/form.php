<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<form autocomplete="off" action="<?php echo base_url('inventaris/add'); ?>" method="POST" enctype="multipart/form-data">
<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-user-friends"></i> <?php echo $title; ?></h3>
        </div>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="flash-data-required" data-flashdata="<?= $this->session->flashdata('required'); ?>"></div>

            <div class="card-body">
                
                    <div class="form-group row">
                        <label for="no_inventaris" class="col-sm-2 col-form-label">Number Inventaris</label>
                        <div class="col-sm-2">
                        <input type="text" id="no_inventaris" name="no_inventaris" readonly class="form-control form-control-sm" value="<?php echo $no_inventaris; ?>">
                        </div>
                        <?= form_error('no_inventaris', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>
           
                    <div class="form-group row">
                        <label for="id_jenis_inventaris" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-5">
                        <select id="id_jenis_inventaris" class="form-control form-control-sm select2" name="id_jenis_inventaris" id="id_jenis_inventaris">
                            <option value="">--Select--</option>
                            <?php foreach ($select_category as $row) {?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php } ?>
                        </select>
                        </div>
                        <?= form_error('id_jenis_inventaris', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>                   

                    <div class="form-group row">
                        <label for="permit_date" class="col-sm-2 col-form-label">Permit Date</label>
                        <div class="col-sm-2">
                        <input type="date" name="permit_date" class="form-control form-control-sm" id="permit_date" value="<?= set_value('permit_date'); ?>">
                        </div>
                        <?= form_error('permit_date', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>

                    <div class="form-group row">
                        <label for="necessity" class="col-sm-2 col-form-label">Necessity</label>
                        <div class="col-sm-5">
                        <textarea type="text" id="necessity" name="necessity" class="form-control"><?= set_value('necessity'); ?></textarea>
                        </div>
                        <?= form_error('necessity', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>

                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Category Permit</label>
                        <div class="col-sm-2">
                        <select id="category" class="form-control form-control-sm select2" name="category" id="category">
                            <option value="">--Select--</option>
                            <?php if (set_value('category')==1) { ?>
                                <option value="1" selected>Permit In</option>
                                <option value="2">Permit Out</option>
                            <?php }else{ ?>
                                <option value="1">Permit In</option>
                                <option value="2" selected>Permit Out</option>
                            <?php } ?>
                        </select>
                        </div>
                        <?= form_error('category', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>


                    <div class="form-group row">
                        <label for="time" class="col-sm-2 col-form-label">Time</label>
                        <div class="col-sm-2">
                        <input type="time" id="time" class="form-control form-control-sm" name="time" value="<?=set_value('time'); ?>">
                        </div>
                        <?= form_error('time', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>

                    <!-- <span class="pull-right"><a href="#" id="btn-tambah-form" class="btn btn-primary btn-sm"><i class="fas fa-plus" aria-hidden="true"></i> Add New List</a></span> -->

                    <!-- <div class="form-group row"> -->
                        <!-- <div class="col-sm-10"> -->
                            <!-- <button type="button" id="btn-tambah-form" class="btn btn-primary btn-sm pull-right"> <i class="fas fa-plus" aria-hidden="true"></i> Add New List</button> -->
                        <!-- </div> -->
                    <!-- </div> -->
                
            </div>
            <div class="modal-footer">
                <!-- <button type="submit" class="btn bg-danger btn-sm">Save</button> -->
                <!-- <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal">Close</button> -->

                <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Save</button>
                <a href="<?php echo base_url('inventaris'); ?>" class="btn bg-danger btn-sm"> <i class="fas fa-window-close"></i> Close</a>

            </div>

    </div>
</div>
</form>