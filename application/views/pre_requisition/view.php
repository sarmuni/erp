<?php
defined('BASEPATH') or exit('No direct script access allowed');

        foreach($pre_requisition as $row){
            $id                 = $row['id'];
            $pre_code           = $row['pre_code'];
            $pre_date           = $row['pre_date'];
            $pre_deadline_date  = $row['pre_deadline_date'];
            $request_user_id    = $row['fullname'];
            $department_id      = $row['department'];
            $notes              = $row['notes'];
            $request_status     = $row['request_status'];

            $approved_hod_date  = $row['approved_hod_date'];
            $approved_hod_by    = $row['approved_hod_by'];

            $verified_purchasing_date   = $row['verified_purchasing_date'];
            $verified_purchasing_by     = $row['verified_purchasing_by'];

            $approved_bod_by_date       = $row['approved_bod_by_date'];
            $approved_bod_by            = $row['approved_bod_by'];

            $approved_finance_date      = $row['approved_finance_date'];
            $approved_finance_by        = $row['approved_finance_by'];

            $paid_by                    = $row['paid_by'];
            $paid_date                  = $row['paid_date'];


            if ($request_status==1) {
                $_request_status="Normal";
            }else{
                $_request_status="Urgent";
            }

            $code_replace       = str_replace("-","","$pre_code");
            $substr_replace     = substr($code_replace,6);
        }

?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-user-friends"></i> <?php echo $title; ?></h3>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable1" class="table table-bordered" style="width:100%">
                                <tr>
                                    <td style="width:30%">Pre Requisition Code</td>
                                    <td style="width:2%">:</td>
                                    <th><?php echo $pre_code; ?></th>
                                </tr>
                                <tr>
                                    <td>Pre Requisition Date</td>
                                    <td>:</td>
                                    <td><?php echo date('Y-m-d',strtotime($pre_date)); ?></td>
                                </tr>
                                <tr>
                                    <td>Pre Requisition Deadline Date</td>
                                    <td>:</td>
                                    <td><?php echo $pre_deadline_date; ?></td>
                                </tr>
                                <tr>
                                    <td>Request User</td>
                                    <td>:</td>
                                    <td><?php echo $request_user_id; ?></td>
                                </tr>
                                <tr>
                                    <td>Request Departments</td>
                                    <td>:</td>
                                    <td><?php echo $department_id; ?></td>
                                </tr>
                                <tr>
                                    <td>Request Status</td>
                                    <td>:</td>
                                    <td><?php echo $_request_status; ?></td>
                                </tr>
                                <tr>
                                    <td>Notes</td>
                                    <td>:</td>
                                    <td><?php echo $notes; ?></td>
                                </tr>
                        </table>
                    </div>
                </div>
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="fas fa-qrcode"></i> QR Code</h3>
                </div>

                <div class="card-body text-center">
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                        <img alt="avatar" class="img-fluid" src="<?php echo base_url(); ?>uploads/qr_requisition/<?php echo $pre_code; ?>.PNG">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-danger btn-block mt-3"><?php echo $pre_code; ?></button>
                    </div>

                    <div class="col-lg-12"> 
                        <a role="button" href="<?php echo site_url(); ?>cetak/pre_requisition/<?php echo $row['id']; ?>/<?php echo $row['pre_code']; ?>" target="_blank" class="btn btn-info btn-block mt-3 " title="Print To PDF" > Print To PDF
                        </a>

                    </div>
                </div>


                </div>
            </div>
        </div>
</div>


<div class="row">
<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-shopping-cart"></i> Detail Item</h3>
        </div>
            <div class="card-body">
            <div class="table-responsive">
                    <table id="dataTable1" class="table table-bordered table-hover display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Description Details</th>
                                <th>Status</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Estimated Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $pre_code_uri = $this->uri->segment(4);
                            $pre_req_detail = $this->pre_requisition_detail_model->get_all_item($pre_code_uri);
                            ?>
                            <?php 
                            $no=1; 
                            $total_harga=0; 
                            foreach($pre_req_detail as $row):  
                            if ($row['status']==1) {
                                $_status="Normal";
                            }else{
                                $_status="Urgent";
                            }
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['item_name']; ?></td>
                                <td><?php echo $_status; ?></td>
                                <td><?php echo $row['pre_qty']; ?></td>
                                <td><?php echo $row['measurement']; ?></td>
                                <td><?php echo number_format($row['estimated_price']); ?></td>
                                <td><?php echo number_format($row['pre_qty']*$row['estimated_price']); ?></td>
                            </tr>
                            <?php $total_harga = $total_harga+($row['pre_qty']*$row['estimated_price']);?>
                            <?php $no++;
                            endforeach; 
                            ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="6"><center>Total</center></th>
                                <th><?php echo number_format($total_harga); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </div>
</div>

<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-cog"></i> Information System </h3>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable1" class="table table-bordered" style="width:100%">
                          
                            <tr>
                                <td style="width:30%">Approval by HOD</td>
                                <td style="width:2%">:</td>
                                <td><?php echo $approved_hod_by; ?></td>
                            </tr>
                            <tr>
                                <td>Approval Date</td>
                                <td>:</td>
                                <td><?php echo $approved_hod_date; ?></td>
                            </tr>

                            <tr>
                                <td style="width:30%">Approval by Purchasing</td>
                                <td style="width:2%">:</td>
                                <td><?php echo $verified_purchasing_by; ?></td>
                            </tr>
                            <tr>
                                <td>Approval Date</td>
                                <td>:</td>
                                <td><?php echo $verified_purchasing_date; ?></td>
                            </tr>

                            <tr>
                                <td style="width:30%">Approval by BOD</td>
                                <td style="width:2%">:</td>
                                <td><?php echo $approved_bod_by; ?></td>
                            </tr>
                            <tr>
                                <td>Approval Date</td>
                                <td>:</td>
                                <td><?php echo $approved_bod_by_date; ?></td>
                            </tr>

                            <tr>
                                <td style="width:30%">Approval by Finance</td>
                                <td style="width:2%">:</td>
                                <td><?php echo $approved_finance_by; ?></td>
                            </tr>
                            <tr>
                                <td>Approval Date</td>
                                <td>:</td>
                                <td><?php echo $approved_finance_date; ?></td>
                            </tr>
                          
                    </table>
                </div>
            </div>
    </div>
</div>
</div>

