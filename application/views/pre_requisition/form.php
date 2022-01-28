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

        <div class="card-body">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pre_code">Pre Code</label>
                    <input type="text" class="form-control" id="pre_code" autocomplete="off">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Pre Date</label>
                    <input type="date" class="form-control" id="inputEmail4" placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Pre Deadline Date</label>
                    <input type="date" class="form-control" id="inputEmail4" placeholder="Email" autocomplete="off">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="request_user_id">Request User</label>
                    <input type="text" class="form-control" id="request_user_id" autocomplete="off">
                </div>
                <div class="form-group col-md-3">
                    <label for="department_id">Department ID</label>
                    <input type="text" class="form-control" id="department_id" autocomplete="off">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="request_user_id">Item Name</label>
                    <input type="text" class="form-control" id="request_user_id" autocomplete="off">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="request_user_id">Notes</label>
                    <input type="text" class="form-control" id="request_user_id" autocomplete="off">
                </div>
            </div>

            <!-- <a role="button" href="#" class="btn bg-danger" title="Print">
                <i class="fas fa-print"></i>
            </a> -->
            <!-- <a role="button" href="<?php base_url('pre_requisition'); ?>" class="btn bg-danger" title="Refresh">
                <i class="fas fa-sync-alt"></i>
            </a> -->
            <hr>
            <div class="table-responsive">
                <table id="#" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Item Code</th>
                            <th>Quantity</th>
                            <th>MOQ</th>
                            <th>Description</th>
                            <th>&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($pre_requisition as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo strtoupper($row['pre_code']); ?></td>
                            <td><?php echo date('Y-m-d',strtotime($row['pre_date'])); ?></td>
                            <td><?php echo date('Y-m-d',strtotime($row['pre_deadline_date'])); ?></td>
                            <td><?php echo $row['request_user_id']; ?></td>
                            <td>
                                 <center><a role="button" href="<?php echo site_url(); ?>pre_requisition/delete/<?php echo $row['id']; ?>" id="deleted" class="btn bg-danger tombol-hapus" title="delete record"><i class="fas fa-trash-alt"></i>
                                 </a></center>
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
