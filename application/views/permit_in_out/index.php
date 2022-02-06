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
            <!-- <a role="button" href="#" class="btn bg-danger btn-sm" title="Add" data-toggle="modal" data-target=".tambah_permit_in_out">
                <i class="fas fa-user-plus"></i> Add New
            </a> -->

            <a role="button" href="<?php echo base_url('permit_in_out/form'); ?>" class="btn bg-danger btn-sm" title="Add New">
            <i class="fas fa-user-plus"></i> Add New
            </a>

            <a role="button" href="<?php echo base_url('permit_in_out'); ?>" class="btn bg-danger btn-sm" title="Refresh">
                <i class="fas fa-sync-alt"></i> Refresh
            </a>
            
            <span class="pull-right"><a href="#" id="" title="Sort" class="btn bg-info btn-sm"><i class="fas fa-search" aria-hidden="true"></i> Sort</a></span>
            <div class="col-sm-2 pull-right">
                <select id="departments_id" name="departments_id" required class="form-control form-control-sm select2" value="<?= set_value('departments_id'); ?>">
                    <option value="">-- All Status--</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="year" name="year" required class="form-control form-control-sm select2" value="<?= set_value('year'); ?>">
                    <option value="">-- All Year--</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="category" name="category" required class="form-control form-control-sm select2" value="<?= set_value('category'); ?>">
                    <option value="">-- All Category--</option>
                </select>
            </div>

            <!-- <form method="post" action="<?php echo base_url('permit_in_out/deleteAll') ?>" id="form-delete"> -->
            <button type="button" id="btn-delete" class="btn bg-danger btn-sm" title="Delete All"> <i class="fas fa-trash-alt"></i> Delete Selected</button>
            <!-- </form> -->
            <button type="button" id="btn-delete" class="btn bg-danger btn-sm" title="Aprov All"> <i class="fas fa-list"></i> Aprov All</button> 

            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="check-all"></th>
                            <th>No</th>
                            <th>ID Card</th>
                            <th>Employee Name</th>
                            <th>Permit Date</th>
                            <th>Necessity</th>
                            <th>Time</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($permit_in_out as $row) {
                    ?>
                        <tr>
                            <td><input type="checkbox" class="check-item" name="id[]" value="<?php echo $row['id']; ?>"></td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo strtoupper($row['person_id']); ?></td>
                            <td><?php echo strtoupper($row['person_name']); ?></td>
                            <td><?php echo $row['permit_date']; ?></td>
                            <td><?php echo $row['necessity']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php if ($row['category']==1) {
                                echo "Permit In";
                            }else{
                                echo "Permit Out";
                            } ?></td>
                            <td>
                                <?php if ($row['status'] == 0) { ?>
                                    <center><a role="button" href="<?php echo site_url(); ?>permit_in_out/aprov_depart_head/<?php echo $row['id']; ?>" id="aprov_depart_head" class="btn bg-danger btn-sm aprov_depart_head" title="Aprov">
                                            Waiting...Departements Head
                                        </a></center>
                                <?php } elseif($row['status']==1) { ?>
                                    <center><a role="button" href="<?php echo site_url(); ?>permit_in_out/aprov_security_pos/<?php echo $row['id']; ?>" id="aprov_security_pos" class="btn bg-info btn-sm aprov_security_pos" title="Aprov">
                                            Waiting...Security POS
                                        </a></center>
                                <?php } elseif($row['status']==2) { ?>
                                    <center><a role="button" href="<?php echo site_url(); ?>permit_in_out/aprov_hrd_manager/<?php echo $row['id']; ?>" id="aprov_hrd_manager" class="btn bg-warning btn-sm aprov_hrd_manager" title="Aprov">
                                            Waiting...HRD Manager
                                        </a></center>
                                <?php }else{?>
                                    <center><a role="button" href="" class="btn bg-success btn-sm" title="Finish">
                                        Finish
                                        </a>
                                    </center>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($row['status'] == 0) { ?>
                                <a role="button" href="<?php echo site_url(); ?>permit_in_out/form_edit/<?php echo $row['id']; ?>" class="btn bg-danger btn-sm" title="Edit"><i class="fas fa-user-edit"></i>
                                </a>
                                
                                 <a role="button" href="<?php echo site_url(); ?>permit_in_out/delete/<?php echo $row['id']; ?>" id="deleted" class="btn bg-danger btn-sm tombol-hapus" title="delete record"><i class="fas fa-trash-alt"></i>
                                 </a>
                                 
                                <?php }?>

                                 <?php if ($row['status'] == 3) { ?>
                                 <a role="button" target="_blank" href="<?php echo site_url(); ?>cetak/permit_in_out/<?php echo $row['id']; ?>" class="btn bg-danger btn-sm" title="Print">
                                  <i class="fas fa-print"></i>
                                </a>
                                <?php }?>
                                
                                <a role="button" href="#" class="btn bg-warning btn-sm" title="More..." data-toggle="modal" data-target="#view_permit_in_out<?php echo $row['id']; ?>">
                                    <i class="fab fa-searchengin"></i>
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


<!-- Modal Add -->
<div class="modal fade tambah_permit_in_out" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Permit In Out</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="far fa-check-square"></i> <?php echo $title; ?></h3>
                    </div>

                    <div class="card-body">
                        <form autocomplete="off" action="<?php echo base_url('permit_in_out/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="employee_name">Employee</label>
                                    <select id="employee_name" class="form-control" name="employee_name" id="employee_name">
                                        <option selected="">--Select--</option>
                                        <?php foreach ($select_employee as $row) {?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['person_name']; ?></option>
                                        <?php } ?>
                                        
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="permit_date">Permite Date</label>
                                    <input type="date" name="permit_date" class="form-control" id="permit_date" value="<?= set_value('permit_date'); ?>">
                                    <?= form_error('permit_date', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="necessity">Necessity</label>
                                    <textarea type="text" id="necessity" value="<?= set_value('necessity'); ?>" name="necessity" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="category">Category</label>
                                    <select id="category" class="form-control" name="category" id="category">
                                        <option value="0">--Select--</option>
                                        <option value="1">Permit In</option>
                                        <option value="2">Permit Out</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="time">Time</label>
                                    <input type="time" id="time" class="form-control" name="time" value="<?=set_value('time'); ?>">
                                    <?= form_error('time', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-danger">Save</button>
                <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->

<!-- Modal Edit -->
<?php
foreach ($permit_in_out as $i) :
    $id                         = $i['id'];
    $employee_name              = $i['employee_name'];
    $permit_date                = $i['permit_date'];
    $necessity                  = $i['necessity'];
    $category                   = $i['category'];
    $time                       = $i['time'];
    
    $date_create                = $i['date_create'];
    $aprov_depart_head          = $i['aprov_depart_head'];
    $date_depart_head           = $i['date_depart_head'];
    $aprov_security_pos         = $i['aprov_security_pos'];
    $date_security_pos          = $i['date_security_pos'];
    $aprov_hrd_manager          = $i['aprov_hrd_manager'];
    $date_hrd_manager           = $i['date_hrd_manager'];
    $status                     = $i['status'];
?>
    <div class="modal fade edit_permit_in_out" id="edit_permit_in_out<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Permit In Out</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-check-square"></i> <?php echo $title; ?></h3>
                        </div>

                        <div class="card-body">

                            <form autocomplete="off" action="<?php echo base_url('permit_in_out/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="employee_name">Employee</label>
                                        <select id="employee_name" class="form-control" name="employee_name" id="employee_name">
                                            <option selected="">--Select--</option>
                                            <?php foreach ($select_employee as $row) {?>
                                                
                                                <?php if ($row['id']==$employee_name) { ?>
                                                    <option value="<?php echo $row['id']; ?>"selected><?php echo $row['person_name']; ?></option>
                                                <?php }else{ ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['person_name']; ?></option>
                                                <?php } ?>

                                            <?php } ?>
                                            
                                        </select>
                                    </div>

                                        <div class="form-group col-md-6">
                                        <label for="permit_date">Permite Date</label>
                                        <input type="date" name="permit_date" class="form-control" id="permit_date" value="<?php echo $permit_date; ?>">
                                        <?= form_error('permit_date', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="necessity">Necessity</label>
                                        <textarea type="text" id="necessity" value="<?= set_value('necessity'); ?>" name="necessity" class="form-control"><?php echo $necessity; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="category">Category</label>
                                        <select id="category" class="form-control" name="category" id="category">
                                            <option value="0">--Select--</option>
                                            <?php if ($category==1) { ?>
                                            <option value="1" selected>Permit In</option>
                                            <option value="2">Permit Out</option>
                                            <?php }else{?>
                                            <option value="1">Permit In</option>
                                            <option value="2" selected>Permit Out</option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="time">Time</label>
                                        <input type="time" id="time" class="form-control" name="time" value="<?php echo $time; ?>">
                                        <?= form_error('time', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                </div>
                            </div>
                        </div>
            
            

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-danger">Update</button>
                    <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>



<!-- Modal View -->
<?php
foreach ($permit_in_out as $i) :
    $id                         = $i['id'];
    $person_id                  = $i['person_id'];
    $person_name                = $i['person_name'];
    $permit_date                = $i['permit_date'];
    $category                   = $i['category'];
    $necessity                  = $i['necessity'];
    $time                       = $i['time'];
    $date_create                = $i['date_create'];
    $aprov_depart_head          = $i['aprov_depart_head'];
    $date_depart_head           = $i['date_depart_head'];
    $aprov_security_pos         = $i['aprov_security_pos'];
    $date_security_pos          = $i['date_security_pos'];
    $aprov_hrd_manager          = $i['aprov_hrd_manager'];
    $date_hrd_manager           = $i['date_hrd_manager'];
    $status                     = $i['status'];
?>
    <?php if ($status == 1) {
        $publish = "readonly";
    } else {
        $publish = "readonly";
    } ?>
    <div class="modal fade view_permit_in_out" id="view_permit_in_out<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Permit In Out</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="far fa-check-square"></i> <?php echo $title; ?></h3>
                        </div>

                        <div class="card-body">

                            
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="person_id">Person ID</label>
                                        <input type="text" name="person_id" <?php echo $publish; ?> value="<?php echo $person_id; ?>" class="form-control form-control-sm" id="person_id">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="person_name">Person Name</label>
                                        <input type="text" name="person_name" <?php echo $publish; ?> value="<?php echo $person_name; ?>" class="form-control form-control-sm" id="person_name">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="permit_date">Permit Date</label>
                                        <input type="text" name="permit_date" <?php echo $publish; ?> value="<?php echo $permit_date; ?>" class="form-control form-control-sm" id="permit_date">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="necessity">Necessity</label>
                                        <input type="text" name="necessity" <?php echo $publish; ?> value="<?php echo $necessity; ?>" class="form-control form-control-sm" id="necessity">
                                    </div>
                                </div>

                                <div class="form-row">
                                <div class="form-group col-md-6">
                                        <label for="category">Category</label>
                                        <select id="category" <?php echo $publish; ?> class="form-control form-control-sm" name="category" id="category">
                                            <option value="0">--Select--</option>
                                            <?php if ($category==1) { ?>
                                            <option value="1" selected>Permit In</option>
                                            <option value="2">Permit Out</option>
                                            <?php }else{?>
                                            <option value="1">Permit In</option>
                                            <option value="2" selected>Permit Out</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="time">Time</label>
                                        <input type="text" name="time" <?php echo $publish; ?> value="<?php echo $time; ?>" class="form-control form-control-sm" id="time">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <?php if ($aprov_depart_head==1) {
                                            $alredy = "bg-success";
                                        }else{
                                            $alredy = "bg-danger";
                                        } ?>

                                        <label for="aprov_depart_head">Aprov Depart Head</label>
                                        <input type="text" name="aprov_depart_head" <?php echo $publish; ?> value="Aprov in Departments Head" class="form-control form-control-sm <?php echo $alredy; ?>" id="aprov_depart_head">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date_depart_head">Date Depart Head</label>
                                        <input type="text" name="date_depart_head" <?php echo $publish; ?> value="<?php echo $date_depart_head; ?>" class="form-control form-control-sm" id="date_depart_head">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <?php if ($aprov_security_pos==1) {
                                            $alredy = "bg-success";
                                        }else{
                                            $alredy = "bg-danger";
                                        } ?>

                                        <label for="aprov_security_pos">Approv Security POS</label>
                                        <input type="text" name="aprov_security_pos" <?php echo $publish; ?> value="Aprov in Security POS" class="form-control form-control-sm <?php echo $alredy; ?>" id="aprov_security_pos">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date_security_pos">Date Security POS</label>
                                        <input type="text" name="date_security_pos" <?php echo $publish; ?> value="<?php echo $date_security_pos; ?>" class="form-control form-control-sm" id="date_security_pos">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <?php if ($aprov_hrd_manager==1) {
                                            $alredy = "bg-success";
                                        }else{
                                            $alredy = "bg-danger";
                                        } ?>
                                        
                                        <label for="aprov_hrd_manager">Aprov Manager H&G</label>
                                        <input type="text" name="aprov_hrd_manager" <?php echo $publish; ?> value="Aprov in Manager H&G" class="form-control form-control-sm <?php echo $alredy; ?>" id="aprov_hrd_manager">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date_hrd_manager">Date Manager H&G</label>
                                        <input type="text" name="date_hrd_manager" <?php echo $publish; ?> value="<?php echo $date_hrd_manager; ?>" class="form-control form-control-sm" id="date_hrd_manager">
                                    </div>
                                </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<!-- End Modal View -->
