<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<form autocomplete="off" action="<?php echo base_url('sales_orders/add'); ?>" method="POST">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-user-friends"></i> <?php echo $title; ?></h3>
        </div>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="flash-data-required" data-flashdata="<?= $this->session->flashdata('required'); ?>"></div>

            <div class="card-body">
                    <div class="form-group row">
                        <label for="pre_code" class="col-sm-4 col-form-label">Orders Number</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" id="orders_number" name="orders_number" readonly="readonly" value="<?php echo $orders_number; ?>" placeholder="Orders Number" autocomplete="off">
                        </div>
                        <?= form_error('orders_number', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>

                    <div class="form-group row">
                        <label for="customer_id" class="col-sm-4 col-form-label">Customers</label>
                        <div class="col-sm-7">
                            <select id="customer_id" name="customer_id" required class="form-control select2 form-control-sm" value="<?= set_value('customer_id'); ?>">
                                <option value="">-- Select --</option>
                                <?php foreach ($option_customers as $row1) { ?>
                                    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['company_name']; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('customer_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="payment_method" class="col-sm-4 col-form-label">Payment Method</label>
                        <div class="col-sm-7">
                            <select id="payment_method" name="payment_method" required class="form-control select2 form-control-sm" value="<?= set_value('payment_method'); ?>">
                                <option value="">-- Select --</option>
                                <option value="1">Cash</option>
                                <option value="2">Credit Cards</option>
                                <option value="3">Debit Cards</option>
                                <option value="4">Mobile Payments</option>
                                <option value="5">Internet Banking</option>
                               
                            </select>
                            <?= form_error('payment_method', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="on_hold" class="col-sm-4 col-form-label">Hold Items</label>
                        <div class="col-sm-7">
                            <select id="on_hold" name="on_hold" required class="form-control select2 form-control-sm" value="<?= set_value('on_hold'); ?>">
                                <option value="">-- Select --</option>
                                <option value="">Sale</option>
                                <option value="">On Hold For Client</option>
                                
                            </select>
                            <?= form_error('on_hold', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div>
                    

                    <div class="form-group row">
                        <label for="payment_terms" class="col-sm-4 col-form-label">Payment Terms</label>
                        <div class="col-sm-7">
                             <input type="text" class="form-control form-control-sm" id="payment_terms" name="payment_terms" value="<?= set_value('payment_terms'); ?>" autocomplete="off">
                            <?= form_error('payment_terms', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div>
               
                    <div class="form-group row">
                        <label for="delivered" class="col-sm-4 col-form-label">Mark for Delivery</label>
                        <div class="col-sm-7">
                            <select id="delivered" name="delivered" required class="form-control select2 form-control-sm" value="<?= set_value('delivered'); ?>">
                                <option value="">-- Select --</option>
                                <option value="1">Driver</option>
                            </select>
                            <?= form_error('delivered', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="remarks" class="col-sm-4 col-form-label">Remarks</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" id="remarks" name="remarks" value="<?= set_value('remarks'); ?>" autocomplete="off">
                        </div>
                        <?= form_error('remarks', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                    </div>
                
            </div>

    </div>
</div>


<!-- Buyer -->
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 identitas_customers">
</div>
<!-- End Buyer -->

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
                       <div class="col-sm-15" style="width:100%;">
                        <select class="form-control form-control-sm select2" data-row-id="row_1" id="product_1" name="product[]" onchange="getProductData(1)" required>
                            <option value=""></option>
                            <?php foreach ($products as $k => $v): ?>
                              <option value="<?php echo $v['id']; ?>"> <?php echo $v['product_name']; ?>
                            </option>
                            <?php endforeach ?>
                          </select>
                        </div>
                        </td>
                        <td><input type="number" name="quantity[]" id="quantity_1" class="form-control form-control-sm" required onkeyup="getTotal(1)"></td>
                        <td>
                          <input type="text" name="selling_price[]" id="selling_price_1" class="form-control form-control-sm" disabled autocomplete="off">
                          <input type="hidden" name="selling_price_value[]" id="selling_price_value_1" class="form-control form-control-sm" autocomplete="off">
                        </td>

                        <td>
                         <select class="form-control form-control-sm" id="taxable" name="taxable[]" style="width:100%;" required>
                            <option value="1"selected>Yes</option>
                            <option value="2">No</option>
                          </select>
                        </td>
                        
                        <input type="hidden" id="product_tax_rate_value_1" class="form-control form-control-sm" autocomplete="off">

                        <td>
                          <input type="text" name="discount[]" id="discount_1" class="form-control form-control-sm" autocomplete="off">
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

                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow1('1')"><i class="fas fa-window-close"></i></button></td>
                     </tr>
                   </tbody>

                   </table>
                    
            </div>
        


        <!-- Total -->
        <table class="table table-bordered">
            <tr>
                <th style="width:60%"> <p class="float-right">Total Price</p></right></th>
                <th style="width:10%"><input type="text"  id="subtotal_value" class="form-control form-control-sm" disabled autocomplete="off"></th>
            </tr>
            <tr>
                <th style="width:60%"><p class="float-right">Total Tax</p></th>
                <th style="width:10%"><input type="text" id="subtotal_tax_value" class="form-control form-control-sm" disabled autocomplete="off"></th>
            </tr>
            <tr>
                <th style="width:60%"><p class="float-right">Grand Total</p></th>
                <th style="width:10%"><input type="text" id="subtotal_total_value" class="form-control form-control-sm" disabled autocomplete="off"></th>
            </tr>
        </table>
        <!-- end total -->
        </div>

        <div class="modal-footer">
                <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Save</button>
                <a href="<?php echo base_url('sales_orders'); ?>" class="btn bg-danger btn-sm"> <i class="fas fa-window-close"></i> Close</a>
        </div>

    </div>
</div>
</form>
<!--  -->


