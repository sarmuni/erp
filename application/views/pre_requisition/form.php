<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<form autocomplete="off" action="<?php echo base_url('pre_requisition/add'); ?>" method="POST" enctype="multipart/form-data">
<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-user-friends"></i> <?php echo $title; ?></h3>
        </div>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="flash-data-required" data-flashdata="<?= $this->session->flashdata('required'); ?>"></div>

            <div class="card-body">
                

                    <div class="form-group row">
                        <label for="pre_code" class="col-sm-2 col-form-label">Pre Requisition Code</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control form-control-sm" id="pre_code" name="pre_code" readonly="readonly" value="<?php echo $pre_code; ?>" placeholder="Requisition Code" autocomplete="off">
                        </div>
                        <?= form_error('pre_code', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>

                    <div class="form-group row">
                        <label for="pre_date" class="col-sm-2 col-form-label">Pre Requisition Date</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control form-control-sm" id="pre_date" required name="pre_date" value="<?= set_value('pre_date'); ?>" placeholder="Pre Requisition Date" autocomplete="off">
                        </div>
                        <?= form_error('pre_date', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>

                    <div class="form-group row">
                        <label for="pre_deadline_date" class="col-sm-2 col-form-label">Pre Requisition Deadline Date</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control form-control-sm" id="pre_deadline_date" required name="pre_deadline_date" value="<?= set_value('pre_deadline_date'); ?>" placeholder="Pre Requisition Deadline Date" autocomplete="off">
                        </div>
                        <?= form_error('pre_deadline_date', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>

                    <div class="form-group row">
                        <label for="request_user_id" class="col-sm-2 col-form-label">Request User</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control form-control-sm" id="request_user_id" name="request_user_id" readonly value="<?php echo $this->session->fullname; ?>" placeholder="Request User" autocomplete="off">
                        </div>
                        <?= form_error('request_user_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>

                    <div class="form-group row">
                        <label for="departments_id" class="col-sm-2 col-form-label">Request Departments</label>
                        <div class="col-sm-5">
                            <select id="departments_id" name="departments_id" required class="form-control select2 form-control-sm" value="<?= set_value('departments_id'); ?>">
                                <option value="">-- Select --</option>
                                <?php foreach ($option_departments as $row1) { ?>
                                    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('departments_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Request Status</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="request_status" id="request_status1" value="1" checked="">
                                        Normal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="request_status" id="request_status2" value="2">
                                        Urgent
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <label for="notes" class="col-sm-2 col-form-label">Notes</label>
                        <div class="col-sm-5">
                        <textarea class="form-control form-control-sm" required name="notes" value="<?= set_value('notes'); ?>"></textarea>
                        </div>
                        <?= form_error('notes', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>

                    <!-- <span class="pull-right"><a href="#" id="btn-tambah-form" class="btn btn-primary btn-sm"><i class="fas fa-plus" aria-hidden="true"></i> Add New List</a></span> -->

                    <!-- <div class="form-group row"> -->
                        <!-- <div class="col-sm-10"> -->
                            <button type="button" id="btn-tambah-form" class="btn btn-primary btn-sm pull-right"> <i class="fas fa-plus" aria-hidden="true"></i> Add New List</button>
                        <!-- </div> -->
                    <!-- </div> -->
                
            </div>

    </div>
</div>


<!--  -->
<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-user-friends"></i> Detail Pre Requisition</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                    <table class="table table-hover display" style="width:100%">
                            <tr>
                                <td style="width:75%">
                                    <textarea class="form-control form-control-sm" required name="item_name[]" placeholder="Description Detail"></textarea>
                                </td>
                                <td>
                                    <input type="number" required name="pre_qty[]" placeholder="Qty" class="form-control form-control-sm" id="request_user_id" autocomplete="off">
                                </td>
                                <td>
                                <span class="pull-right"><button type="button" class="btn bg-warning btn-sm" id="btn-reset-form" data-dismiss="modal"> <i class="fas fa-window-close"></i> Remove All</button></span>
                                </td>
                            </tr>
                    </table>
            </div>
            <div id="insert-form"></div>
            <input type="hidden" id="jumlah-form" value="1">
        </div>
        <div class="modal-footer">
                <!-- <button type="submit" class="btn bg-danger">Save</button> -->
                <!-- <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button> -->

                <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Save</button>
                <a href="<?php echo base_url('pre_requisition'); ?>" class="btn bg-danger btn-sm"> <i class="fas fa-window-close"></i> Close</a>
        </div>

    </div>
</div>
</form>
<!--  -->

