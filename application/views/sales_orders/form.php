<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<form autocomplete="off" action="<?php echo base_url('sales_orders/add'); ?>" method="POST">
<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-user-friends"></i> <?php echo $title; ?></h3>
        </div>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="flash-data-required" data-flashdata="<?= $this->session->flashdata('required'); ?>"></div>

            <div class="card-body">
                    <div class="form-group row">
                        <label for="pre_code" class="col-sm-2 col-form-label">Orders Number</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control form-control-sm" id="orders_number" name="orders_number" readonly="readonly" value="<?php echo $orders_number; ?>" placeholder="Orders Number" autocomplete="off">
                        </div>
                        <?= form_error('orders_number', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="customer_id" class="col-sm-2 col-form-label">Customers</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control form-control-sm" id="customer_id" required name="customer_id" value="<?= set_value('customer_id'); ?>" autocomplete="off">
                        </div>
                        <?= form_error('customer_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div> -->

                    <div class="form-group row">
                        <label for="customer_id" class="col-sm-2 col-form-label">Customers</label>
                        <div class="col-sm-4">
                            <select id="customer_id" name="customer_id" required class="form-control select2 form-control-sm" value="<?= set_value('customer_id'); ?>">
                                <option value="">-- Select --</option>
                                <?php foreach ($option_customers as $row1) { ?>
                                    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['company_name']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('customer_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="pre_deadline_date" class="col-sm-2 col-form-label">Payment Method</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control form-control-sm" id="pre_deadline_date" required name="pre_deadline_date" value="<?= set_value('pre_deadline_date'); ?>" placeholder="Pre Requisition Deadline Date" autocomplete="off">
                        </div>
                        <?= form_error('pre_deadline_date', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div> -->

                    <div class="form-group row">
                        <label for="payment_method" class="col-sm-2 col-form-label">Payment Method</label>
                        <div class="col-sm-4">
                            <select id="payment_method" name="payment_method" required class="form-control select2 form-control-sm" value="<?= set_value('payment_method'); ?>">
                                <option value="">-- Select --</option>
                                <?php foreach ($option_departments as $row1) { ?>
                                    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('payment_method', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="on_hold" class="col-sm-2 col-form-label">Hold Items</label>
                        <div class="col-sm-4">
                            <select id="on_hold" name="on_hold" required class="form-control select2 form-control-sm" value="<?= set_value('on_hold'); ?>">
                                <option value="">-- Select --</option>
                                <?php foreach ($option_departments as $row1) { ?>
                                    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('on_hold', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div>
                    
                    <!-- <div class="form-group row">
                        <label for="department_id" class="col-sm-2 col-form-label">Generate Packing Slip</label>
                        <div class="col-sm-4">
                            <select id="department_id" name="department_id" required class="form-control select2 form-control-sm" value="<?= set_value('department_id'); ?>">
                                <option value="">-- Select --</option>
                                <?php foreach ($option_departments as $row1) { ?>
                                    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('department_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div> -->

                    <!-- <div class="form-group row">
                        <label for="department_id" class="col-sm-2 col-form-label">Email Customer</label>
                        <div class="col-sm-4">
                            <select id="department_id" name="department_id" required class="form-control select2 form-control-sm" value="<?= set_value('department_id'); ?>">
                                <option value="">-- Select --</option>
                                <?php foreach ($option_departments as $row1) { ?>
                                    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('department_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label for="payment_terms" class="col-sm-2 col-form-label">Payment Terms</label>
                        <div class="col-sm-4">
                            <select id="payment_terms" name="payment_terms" required class="form-control select2 form-control-sm" value="<?= set_value('payment_terms'); ?>">
                                <option value="">-- Select --</option>
                                <?php foreach ($option_departments as $row1) { ?>
                                    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('payment_terms', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div>
               
                    <div class="form-group row">
                        <label for="delivered" class="col-sm-2 col-form-label">Mark for Delivery</label>
                        <div class="col-sm-4">
                            <select id="delivered" name="delivered" required class="form-control select2 form-control-sm" value="<?= set_value('delivered'); ?>">
                                <option value="">-- Select --</option>
                                <?php foreach ($option_departments as $row1) { ?>
                                    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('delivered', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                        <div class="col-sm-4">
                        <textarea class="form-control form-control-sm" required name="remarks" value="<?= set_value('remarks'); ?>"></textarea>
                        </div>
                        <?= form_error('remarks', '<p style="color:red; font-size:12px;">', '</p>'); ?>
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
            <h3><i class="fas fa-shopping-cart"></i> Detail Orders Items</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="product_info_table">
                  <thead>
                    <tr>
                      <th style="width:40%">Product Description</th>
                      <th style="width:7%"><center>Qty</center></th>
                      <th style="width:10%">Price</th>
                      <th style="width:10%">Taxable</th>
                      <th style="width:10%">Discount</th>
                      <th style="width:10%">Tax</th>
                      <th style="width:10%">Total</th>
                      <th style="width:10%"><button type="button" id="add_row" class="btn bg-success btn-sm"><i class="fa fa-plus"></i></button></th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr id="row_1">
                       <td>
                       <div class="col-sm-15">
                        <select class="form-control form-control-sm" data-row-id="row_1" id="product_1" name="product[]" style="width:100%;" required>
                            <option value=""></option>
                            <?php foreach ($products as $k => $v): ?>
                              <option value="<?php echo $v['id'] ?>"><?php echo $v['product_name'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                        </td>
                        <td><input type="text" name="quantity[]" id="quantity_1" class="form-control form-control-sm" required onkeyup="getTotal(1)"></td>
                        <td>
                          <input type="text" name="selling_price[]" id="selling_price_1" class="form-control form-control-sm" disabled autocomplete="off">
                          <input type="hidden" name="selling_price_value[]" id="selling_price_value_1" class="form-control form-control-sm" autocomplete="off">
                        </td>

                        <td>
                        <select class="form-control form-control-sm" id="taxable" name="taxable[]" style="width:100%;" required>
                            <option value=""></option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                          </select>
                        </td>
                        
                        <td>
                          <input type="text" name="discount[]" id="discount_1" class="form-control form-control-sm" disabled autocomplete="off">
                          <input type="hidden" name="discount_value[]" id="discount_value_1" class="form-control form-control-sm" autocomplete="off">
                        </td>
                        
                        <td>
                          <input type="text" name="tax[]" id="tax_1" class="form-control form-control-sm" disabled autocomplete="off">
                          <input type="hidden" name="tax_value[]" id="tax_value_1" class="form-control form-control-sm" autocomplete="off">
                        </td>

                        <td>

                          <input type="text" name="total[]" id="total_1" class="form-control form-control-sm" disabled autocomplete="off">
                          <input type="hidden" name="total_value[]" id="total_value_1" class="form-control form-control-sm" autocomplete="off">
                        </td>

                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow('1')"><i class="fas fa-window-close"></i></button></td>
                     </tr>
                   </tbody>

                   </table>
                    
            </div>
        </div>
        
        <div class="modal-footer">
                <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Save</button>
                <a href="<?php echo base_url('sales_orders'); ?>" class="btn bg-danger btn-sm"> <i class="fas fa-window-close"></i> Close</a>
        </div>

    </div>
</div>
</form>
<!--  -->


