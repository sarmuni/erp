<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!--  
<div class="col-12">
    <div class="card mb-3">
    <div class="card-header">
        <h3><i class="far fa-check-square"></i> Custom Search <?php echo $title; ?></h3>
    </div>

    <div class="card-body">
        <form autocomplete="off" action="<?php echo base_url('employee/search'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-row">
            <div class="form-group col-md-6">
            <label for="departments_id">Departments</label>
            <select id="departments_id" name="departments_id" required class="form-control" value="<?= set_value('departments_id'); ?>">
                <option value="0">-- Select --</option>
                <?php foreach ($option_departments as $row1) { ?>
                    <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                <?php } ?>
            </select>
            <?= form_error('departments_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
            </div>


            <div class="form-group col-md-6">
                <label for="gender">Gender</label>
                <select id="gender" class="form-control" name="gender" id="gender">
                    <option selected="">-- Select --</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="is_active">Active</label>
                <select id="is_active" class="form-control" name="is_active" id="is_active">
                    <option selected="">-- Select --</option>
                    <option value="0">Is Active</option>
                    <option value="1">Not Active</option>
                </select>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
                <button type="submit" class="btn bg-danger">Save</button>
                <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
            </div>
  -->


<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-user-friends"></i> <?php echo $title; ?></h3>
        </div>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="flash-data-required" data-flashdata="<?= $this->session->flashdata('required'); ?>"></div>

        <div class="card-body">
            <a role="button" href="#" class="btn bg-danger" title="Add" data-toggle="modal" data-target=".tambah_employee">
                <i class="fas fa-user-plus"></i>
            </a>

            <a role="button" href="#" class="btn bg-danger" title="Print">
                <i class="fas fa-print"></i>
            </a>
            <a role="button" href="<?php base_url('employee'); ?>" class="btn bg-danger" title="Refresh">
                <i class="fas fa-sync-alt"></i>
            </a>
            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Person ID</th>
                            <th>Person Name</th>
                            <th>Gender</th>
                            <th>Departments</th>
                            <th>Email</th>
                            <th>Effective Time</th>
                            <th>Active</th>
                            <th>&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($employee as $row) {
                        if ($row['gender']==1) {
                            $gender = 'Male';
                        }else{
                            $gender = 'Female';
                        }

                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo strtoupper($row['person_id']); ?></td>
                            <td><?php echo strtoupper($row['person_name']); ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $row['name_departments']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo strtoupper($row['effective_time']); ?></td>
                            <td>
                                <?php if ($row['is_active'] == 0) { ?>
                                    <center><a role="button" href="<?php echo site_url(); ?>employee/publish/<?php echo $row['id']; ?>" id="publish" class="btn bg-danger publish" title="Aktif">
                                            <i class="fas fa-eye-slash"></i>
                                        </a></center>
                                <?php } else { ?>
                                    <center><a role="button" href="<?php echo site_url(); ?>employee/unpublish/<?php echo $row['id']; ?>" id="unpublish" class="btn bg-danger unpublish" title="Non Aktif">
                                            <i class="fas fa-eye"></i>
                                        </a></center>
                                <?php } ?>
                            </td>
                            <td>
                                <a role="button" href="#" class="btn bg-danger" title="Edit" data-toggle="modal" data-target="#edit_employee<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                </a>
                                
                                 <a role="button" href="<?php echo site_url(); ?>employee/delete/<?php echo $row['id']; ?>" id="deleted" class="btn bg-danger tombol-hapus" title="delete record"><i class="fas fa-trash-alt"></i>
                                 </a>

                                <!-- <a role="button" href="#" class="btn bg-danger" title="More..." data-toggle="modal" data-target="#view_account_user<?php echo $row['id']; ?>">
                                    <i class="fab fa-searchengin"></i>
                                </a> -->

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
<div class="modal fade tambah_employee" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Employee</h5>
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

                        <form autocomplete="off" action="<?php echo base_url('employee/add'); ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="person_id">Person ID</label>
                                    <input type="text" name="person_id" class="form-control" id="person_id" value="<?= set_value('person_id'); ?>">
                                    <?= form_error('person_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="person_name">Person Name</label>
                                    <input type="text" name="person_name" class="form-control" id="person_name" value="<?= set_value('person_name'); ?>">
                                    <?= form_error('person_name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="departments_id">Departments</label>
                                    <select id="departments_id" name="departments_id" required class="form-control" value="<?= set_value('departments_id'); ?>">
                                        <option value="0">-- Select --</option>
                                        <?php foreach ($option_departments as $row1) { ?>
                                            <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('departments_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                    <label for="part_departments_id">Part Departments</label>
                                    <select id="part_departments_id" name="part_departments_id" required class="form-control" value="<?= set_value('part_departments_id'); ?>">
                                        <option value="0">-- Select --</option>
                                    </select>
                                    <?= form_error('part_departments_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="gender">Gender</label>
                                    <select id="gender" class="form-control" name="gender" id="gender">
                                        <option selected="">Select</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="contact">Contact</label>
                                    <input type="text" id="contact" class="form-control" name="contact" value="<?= set_value('contact'); ?>">
                                    <?= form_error('contact', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                 <div class="form-group col-md-6">
                                    <label for="effective_time">Effective Time</label>
                                    <input type="date" name="effective_time" class="form-control" id="effective_time" value="<?= set_value('effective_time'); ?>">
                                    <?= form_error('effective_time', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="card_no">Card No</label>
                                    <input type="text" id="card_no" class="form-control" name="card_no" value="<?= set_value('card_no'); ?>">
                                    <?= form_error('card_no', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="room_no">Room No</label>
                                    <input type="text" name="room_no" class="form-control" id="room_no" value="<?= set_value('room_no'); ?>">
                                    <?= form_error('room_no', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="floor_no">Floor No</label>
                                    <input type="text" id="floor_no" class="form-control" name="floor_no" value="<?= set_value('floor_no'); ?>">
                                    <?= form_error('floor_no', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="is_active">Active</label>
                                    <select id="is_active" class="form-control" name="is_active" id="is_active">
                                        <option selected="">Select</option>
                                        <option value="0">Is Active</option>
                                        <option value="1">Not Active</option>
                                    </select>
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
foreach ($employee as $i) :
    $id                  = $i['id'];
    $person_id           = $i['person_id'];
    $company_id          = $i['company_id'];
    $person_name         = $i['person_name'];
    $departments_id      = $i['departments_id'];
    $part_departments_id = $i['part_departments_id'];
    $gender              = $i['gender'];
    $contact             = $i['contact'];
    $email               = $i['email'];
    $effective_time      = $i['effective_time'];
    $card_no             = $i['card_no'];
    $room_no             = $i['room_no'];
    $floor_no            = $i['floor_no'];
    $is_active           = $i['is_active'];
?>
    <div class="modal fade edit_employee" id="edit_employee<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Employee</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('employee/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="person_id">Person ID</label>
                                        <input type="text" name="person_id" value="<?php echo $person_id; ?>" class="form-control" id="person_id">
                                        <?= form_error('person_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="person_name">Person Name</label>
                                        <input type="text" name="person_name" value="<?php echo $person_name; ?>" class="form-control" id="person_name">
                                        <?= form_error('person_name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="departments_id">Departments</label>
                                    <select id="departments_id" name="departments_id" required class="form-control" value="<?= set_value('departments_id'); ?>">
                                        <option value="0">-- Select --</option>
                                        <?php foreach ($option_departments as $row1) { ?>
                                            <?php if ($departments_id==$row1['id']) { ?>
                                                <option value="<?php echo $row1['id']; ?>"selected><?php echo $row1['name']; ?></option>                                                
                                            <?php }else{ ?>
                                                <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                            <?php } ?>

                                        <?php } ?>
                                    </select>
                                    <?= form_error('departments_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                    <label for="part_departments_id">Part Departments</label>
                                    <select id="part_departments_id" name="part_departments_id" required class="form-control" value="<?= set_value('part_departments_id'); ?>">
                                    <option value="0">-- Select --</option>
                                        <?php foreach ($part_departments as $row1) { ?>
                                            <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                                        <?php } ?>
                                        </select>
                                    <?= form_error('part_departments_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="gender">Gender</label>
                                        <select id="gender" class="form-control" name="gender" id="gender">
                                            <?php if ($gender==1) {?>
                                            <option value="1" selected>Male</option>
                                            <option value="2">Female</option>
                                            <?php }else{?>
                                            <option value="1">Male</option>
                                            <option value="2" selected>Female</option>
                                            <?php } ?>                                            
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="contact">Contact</label>
                                        <input type="text" id="contact" value="<?php echo $contact; ?>" class="form-control" name="contact" value="<?= set_value('contact'); ?>">
                                        <?= form_error('contact', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" id="email">
                                        <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="effective_time">Effective Time</label>
                                        <input type="date" name="effective_time" value="<?php echo $effective_time; ?>" class="form-control" id="effective_time">
                                        <?= form_error('effective_time', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="card_no">Card No</label>
                                        <input type="text" name="card_no" value="<?php echo $card_no; ?>" class="form-control" id="card_no">
                                        <?= form_error('card_no', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="room_no">Room No</label>
                                        <input type="text" name="room_no" value="<?php echo $room_no; ?>" class="form-control" id="room_no">
                                        <?= form_error('room_no', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="floor_no">Floor No</label>
                                        <input type="text" name="floor_no" value="<?php echo $floor_no; ?>" class="form-control" id="floor_no">
                                        <?= form_error('floor_no', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="is_active">Active</label>
                                        <select id="is_active" class="form-control" name="is_active" id="is_active">
                                            <?php if ($is_active==0) {?>
                                            <option value="0" selected>Is Active</option>
                                            <option value="1">Not Active</option>
                                            <?php }else{?>
                                            <option value="0">Is Active</option>
                                            <option value="1" selected>Not Active</option>
                                            <?php } ?>                                            
                                        </select>
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
 <!--End Modal Edit -->



<!-- Modal View 
<?php
foreach ($employee as $i) :
    $id = $i['id'];
    $fullname = $i['fullname'];
    $email = $i['email'];
    $phone = $i['phone'];
    $password = $i['password'];
    $role_id = $i['role_id'];
    $is_active = $i['is_active'];
?>
    <?php if ($is_active == 0) {
        $publish = "readonly";
    } else {
        $publish = "readonly";
    } ?>
    <div class="modal fade view_account_user" id="view_account_user<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View account user</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('account_user/edit/' . $id); ?>" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="fullname">Nama</label>
                                        <input type="text" name="fullname" <?php echo $publish; ?> value="<?php echo $fullname; ?>" class="form-control" id="fullname">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" <?php echo $publish; ?> value="<?php echo $email; ?>" class="form-control" id="email">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="text" name="password" <?php echo $publish; ?> value="<?php echo $password; ?>" class="form-control" id="password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" <?php echo $publish; ?> value="<?php echo $phone; ?>" class="form-control" id="phone">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="role_id">Level</label>
                                    <select id="role_id" class="form-control" <?php echo $publish; ?> name="role_id" id="role_id">
                                        <option selected="">Pilih</option>
                                        <option value="2">Kurir</option>
                                        <option value="3">Agen</option>
                                        <option value="4">Keuangan</option>
                                        <option value="5">Gudang</option>
                                    </select>
                                </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <?php if ($publish == false) { ?>
                        <button type="submit" class="btn bg-danger">Update</button>
                    <?php } ?>
                    <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>
End Modal View -->