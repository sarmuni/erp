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

        <form autocomplete="off" action="<?php echo base_url('pre_requisition/add'); ?>" method="POST" enctype="multipart/form-data">
        
        <div class="card-body">
            <div class="table-responsive">
                    <table class="table table-hover display" style="width:100%">
                            <tr>
                                <td style="width: 250px;">Pre Requisition Code</td>
                                <td>:</td>
                                <td><input type="text" name="pre_code" class="form-control" readonly="readonly" value="<?php echo $pre_code; ?>" id="pre_code" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>Pre Requisition Date</td>
                                <td>:</td>
                                <td><input type="date" class="form-control" name="pre_date" id="pre_date" placeholder="Pre Requisition Date" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>Pre Requisition Deadline Date</td>
                                <td>:</td>
                                <td><input type="date" name="pre_deadline_date" class="form-control" id="pre_deadline_date" placeholder="Pre Requisition Deadline Date" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>Request User</td>
                                <td>:</td>
                                <td><input type="text" name="request_user_id" class="form-control" id="request_user_id" readonly value="<?php echo $this->session->fullname; ?>" autocomplete="off"></td>
                            </tr>
                            <tr>
                                <td>Request Departments</td>
                                <td>:</td>
                                <td><select id="departments_id" name="departments_id" required class="form-control" value="<?= set_value('departments_id'); ?>">
                                        <option value="0">-- Select --</option>
                                        <?php foreach ($option_departments as $row1) { ?>
                                            <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('departments_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Request Status</td>
                                <td>:</td>
                                <td><select id="request_status" name="request_status" required class="form-control" value="<?= set_value('request_status'); ?>">
                                        <option value="0">-- Select --</option>
                                        <option value="1">Normal</option>
                                        <option value="2">Urgent</option>
                                    </select>
                                    <?= form_error('request_status', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Notes</td>
                                <td>:</td>
                                <td><textarea class="form-control" name="notes"></textarea>
                                </td>
                            </tr>
                    </table>
            </div>
        </div>
    </div>
</div>


<!--  -->
<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-user-friends"></i> Detail Pre Requisition <button type="button" class="btn bg-info" id="btn-tambah-form">Add</button></h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                    <table class="table table-hover display" style="width:100%">
                            <tr>
                                <td style="width:80%">
                                    <textarea class="form-control" name="item_name[]" placeholder="Description Detail"></textarea>
                                </td>
                                <td>
                                    <input type="number" name="pre_qty[]" placeholder="Qty" class="form-control" id="request_user_id" autocomplete="off">
                                </td>
                                <td>
                                    <button type="button" class="btn bg-danger" id="btn-reset-form" data-dismiss="modal">Remove</button>
                                </td>
                            </tr>
                    </table>
            </div>
            <div id="insert-form"></div>
            <input type="hidden" id="jumlah-form" value="1">
        </div>
        <div class="modal-footer">
                <button type="submit" class="btn bg-danger">Save</button>
                <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
            </div>

    </div>
</div>
</form>
<!--  -->

