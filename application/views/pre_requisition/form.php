<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<form autocomplete="off" action="<?php echo base_url('pre_requisition/add'); ?>" method="POST">
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
                            <input type="text" class="form-control form-control-sm" readonly value="<?php echo $this->session->fullname; ?>" placeholder="Request User" autocomplete="off">
                            <input type="hidden" name="request_user_id" value="<?php echo $this->session->id; ?>">
                        </div>
                        <?= form_error('request_user_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>

                    <?php if ($this->session->id==1) { ?>
                    <div class="form-group row">
                        <label for="department_id" class="col-sm-2 col-form-label">Request Departments</label>
                        <div class="col-sm-5">
                            <select id="department_id" name="department_id" required class="form-control select2 form-control-sm" value="<?= set_value('department_id'); ?>">
                                <option value="">-- Select --</option>
                                <?php foreach ($option_departments as $row1) { ?>
                                    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('department_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div>
                    <?php }else { ?>
                        <div class="form-group row">
                            <label for="department_id" class="col-sm-2 col-form-label">Request Departments</label>
                            <div class="col-sm-3">
                            <?php if ($user['role_id'] == 2) { 
                                    $role_id= "Departments Board of Director";
                                }elseif ($user['role_id'] == 3) {
                                    $role_id= "Departments Factory Management";
                                }elseif ($user['role_id'] == 4) {
                                    $role_id= "Departments Quality Assurance";
                                }elseif ($user['role_id'] == 5) {
                                    $role_id= "Departments Production";
                                }elseif ($user['role_id'] == 6) {
                                    $role_id= "Departments Engineer";
                                }elseif ($user['role_id'] == 7) {
                                    $role_id= "Departments HR & GA";
                                }elseif ($user['role_id'] == 8) {
                                    $role_id= "Departments Finance";
                                }elseif ($user['role_id'] == 9) {
                                    $role_id= "Departments Warehouse";
                                }elseif ($user['role_id'] == 10) {
                                    $role_id= "Departments Building Management";
                                }elseif ($user['role_id'] == 11) {
                                    $role_id= "Departments Internal Securit";
                                }elseif ($user['role_id'] == 12) {
                                    $role_id= "Departments Supply Chain";
                                }elseif ($user['role_id'] == 13) {
                                    $role_id= "Departments Information Technology";
                                } ?>
                                <input type="text" class="form-control form-control-sm" readonly value="<?php echo $role_id; ?>" placeholder="Request User" autocomplete="off">
                                <input type="hidden" name="department_id" value="<?php echo $this->session->role_id; ?>">
                            </div>
                            <?= form_error('department_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    <?php } ?>

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
                            <!-- <button type="button" id="btn-tambah-form" class="btn btn-primary btn-sm pull-right"> <i class="fas fa-plus" aria-hidden="true"></i> Add New List</button> -->
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
            <table id="dataTable1" class="table table-bordered table-hover display" style="width:100%"> 
                <thead>
                    <tr>
                      <th style="width:3%">No</th>
                      <th style="width:45%">Description Detail</th>
                      <th style="width:10%">Qty</th>
                      <th style="width:10%">Unit</th>
                      <th style="width:10%">Estimated Price</th>
                      <th style="width:10%">Request Status</th>
                      <th style="width:8%"><center><button type="button" id="btn-tambah-form" class="btn bg-success btn-sm"><i class="fa fa-plus"></i> Add Item</button></center></th>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                            <input type="text" required name="item_name[]" class="form-control form-control-sm" id="item_name" autocomplete="off">
                            </td>
                            <td>
                                <input type="number" required name="pre_qty[]"  class="form-control form-control-sm" id="pre_qty" autocomplete="off">
                            </td>
                            <td>
                                <input type="text" required name="measurement[]" class="form-control form-control-sm" id="measurement" autocomplete="off">
                            </td>
                            <td>
                                <input type="number" required name="estimated_price[]"  class="form-control form-control-sm" id="estimated_price" autocomplete="off">
                            </td>
                            <td>
                                <select id="status" name="status[]" required class="form-control form-control-sm">
                                    <option value="1">Normal</option>
                                    <option value="2">Urgent</option>
                                </select>
                            </td>
                        <td><center><button type="button" class="btn bg-danger btn-sm" onclick="removeRow('1')"><i class="fas fa-window-close"></i> Remove</button></center></td>
                        </tr>
                    <tbody>
                        
                </table>
                <div id="insert-form"></div>
                <input type="hidden" id="jumlah-form" value="1">
            </div>
       

            <!-- <table id="dataTable1" class="table table-bordered table-hover display" style="width:100%"> 
                <thead>
                        <tr>
                        <th colspan="2" style="width:48%; text-align: center;">Total</th>
                        <th style="width:10%; text-align: center;">0</th>
                        <th style="width:10%"></th>
                        <th style="width:10%; text-align: center;">0</th>
                        <th style="width:10%"></th>
                        <th style="width:8%"></th>
                        </tr>
                </thead>
            </table> -->

        </div>

        <div class="modal-footer">
                <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Save</button>
                <a href="<?php echo base_url('pre_requisition'); ?>" class="btn bg-danger btn-sm"> <i class="fas fa-window-close"></i> Close</a>
        </div>

    </div>
</div>
</form>
<!--  -->

