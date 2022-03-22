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
            <!-- <a role="button" href="#" class="btn bg-danger btn-sm" title="Add" data-toggle="modal" data-target=".tambah_ref_room_zone">
                <i class="fas fa-user-plus"></i> Add New
            </a> -->

            <!-- <a role="button" href="#" class="btn bg-danger btn-sm" title="Print">
                <i class="fas fa-print"></i> Print PDF
            </a> -->
            <a role="button" href="<?php base_url('purchase_order'); ?>" class="btn bg-danger btn-sm" title="Refresh">
                <i class="fas fa-sync-alt"></i> Refresh
            </a>

            <span class="pull-right"><a href="#" id="" title="Sort" class="btn bg-info btn-sm"><i class="fas fa-search" aria-hidden="true"></i> Sort</a></span>
            <div class="col-sm-2 pull-right">
                <select id="departments_id" name="departments_id" required class="form-control select2" value="<?= set_value('departments_id'); ?>">
                    <option value="">-- All District--</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="year" name="year" required class="form-control select2" value="<?= set_value('year'); ?>">
                    <option value="">-- All Year--</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="category" name="category" required class="form-control select2" value="<?= set_value('category'); ?>">
                    <option value="">-- All Factory--</option>
                </select>
            </div>

            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Number PO</th>
                            <th>Number PR</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                           <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($purchase_order as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo strtoupper($row['number_po']); ?></td>
                            <td><?php echo strtoupper($row['pre_code']); ?></td>
                            <td><?php echo $row['approved_finance_by']; ?></td>
                            <td><?php echo strtoupper($row['approved_finance_date']); ?></td>
                            <td>
                                <!-- <a role="button" href="#" class="btn bg-warning btn-sm" title="Edit" data-toggle="modal" data-target="#edit_ref_room_zone<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                </a> -->
                                
                                 <a role="button" href="<?php echo site_url(); ?>purchase_order/cancel/<?php echo $row['id']; ?>" id="cancel" class="btn bg-danger btn-sm tombol-hapus" title="Cancel PO"><i class="fas fa-trash-alt"></i> Cancel PO
                                 </a>

                                 <a role="button" href="<?php echo site_url(); ?>cetak/purchase_order_po/<?php echo $row['id']; ?>/<?php echo $row['pre_code']; ?>" target="_blank" class="btn bg-warning btn-sm" title="Cetak"><i class="fas fa-print"></i> Print PO
                                 </a>

                                <a role="button" href="<?php echo site_url(); ?>cetak/pre_requisition/<?php echo $row['id']; ?>/<?php echo $row['pre_code']; ?>" target="_blank" class="btn bg-info btn-sm" title="Cetak"><i class="fas fa-print"></i> Print PR
                                 </a>

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
