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
            <a role="button" href="#" class="btn bg-danger btn-sm" title="Add" data-toggle="modal" data-target=".tambah_ref_customers">
                <i class="fas fa-user-plus"></i> Add New
            </a>

            <a role="button" href="#" class="btn bg-danger btn-sm" title="Print">
                <i class="fas fa-print"></i> Print PDF
            </a>
            <a role="button" href="<?php base_url('ref_customers'); ?>" class="btn bg-danger btn-sm" title="Refresh">
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
                            <th>Company Name</th>
                            <th>Brand</th>
                            <th>SKU</th>
                            <th>Country</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($ref_customers as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo strtoupper($row['company_name']); ?></td>
                            <td><?php echo strtoupper($row['brand']); ?></td>
                            <td><?php echo strtoupper($row['sku']); ?></td>
                            <td><?php echo $row['negara']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['telpon']; ?></td>
                            <!-- <td>
                                <?php if ($row['role'] != 'Root' && $row['role'] != 'Administrator') { ?>
                                    <?php if ($row['is_active'] == 0) { ?>
                                        <center><a role="button" href="<?php echo site_url(); ?>account_user/publish/<?php echo $row['id']; ?>" id="publish" class="btn bg-danger publish" title="Aktif">
                                                <i class="fas fa-eye-slash"></i>
                                            </a></center>
                                    <?php } else { ?>
                                        <center><a role="button" href="<?php echo site_url(); ?>account_user/unpublish/<?php echo $row['id']; ?>" id="unpublish" class="btn bg-danger unpublish" title="Non Aktif">
                                                <i class="fas fa-eye"></i>
                                            </a></center>
                                    <?php } ?>
                                <?php } ?>
                            </td> -->
                            <td>
                                <a role="button" href="#" class="btn bg-warning btn-sm" title="Edit" data-toggle="modal" data-target="#edit_ref_customers<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                </a>
                                
                                 <a role="button" href="<?php echo site_url(); ?>ref_customers/delete/<?php echo $row['id']; ?>" id="deleted" class="btn bg-danger btn-sm tombol-hapus" title="delete record"><i class="fas fa-trash-alt"></i>
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
<div class="modal fade tambah_ref_customers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Master Customers</h5>
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
                        <form autocomplete="off" action="<?php echo base_url('ref_customers/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" class="form-control form-control-sm" id="company_name" value="<?= set_value('company_name'); ?>">
                                    <?= form_error('company_name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <!-- <div class="form-group col-md-6">
                                    <label for="nik">Material Category</label>
                                    <select id="nik" class="form-control" name="nik" id="nik">
                                        <option selected="">--Select--</option>
                                        <option value="1">RM (Row Material)</option>
                                        <option value="2">PM (Packaging Material)</option>
                                    </select>
                                </div> -->

                                <div class="form-group col-md-6">
                                    <label for="brand">Brand</label>
                                    <input type="text" name="brand" class="form-control form-control-sm" id="brand" value="<?= set_value('brand'); ?>">
                                    <?= form_error('brand', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="sku">SKU</label>
                                    <input type="text" name="sku" class="form-control form-control-sm" id="sku" value="<?= set_value('sku'); ?>">
                                    <?= form_error('sku', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                <!-- <div class="form-group col-md-6">
                                    <label for="gender">Gender</label>
                                    <select id="gender" class="form-control form-control-sm" name="gender" id="gender">
                                        <option selected="">--Select--</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div> -->
                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" class="form-control form-control-sm" name="address" value="<?= set_value('address'); ?>">
                                    <?= form_error('address', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="street">Street</label>
                                    <input type="street" id="street" class="form-control form-control-sm" name="street" value="<?=set_value('street'); ?>">
                                    <?= form_error('street', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <!-- <div class="form-group col-md-6">
                                    <label for="country">Country</label>
                                    <input type="country" id="country" class="form-control form-control-sm" name="country" value="<?=set_value('country'); ?>">
                                    <?= form_error('country', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div> -->

                                <div class="form-group col-md-6">
                                    <label for="country">Country</label>
                                    <select id="country" class="form-control form-control-sm" name="country" id="country">
                                        <option selected="">--Select--</option>
                                        <?php foreach ($option_country as $key => $row) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['country']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="zipcode">Zipcode</label>
                                    <input type="text" id="zipcode" class="form-control form-control-sm" name="zipcode" value="<?= set_value('zipcode'); ?>">
                                    <?= form_error('zipcode', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" name="city" class="form-control form-control-sm" id="city" value="<?= set_value('city'); ?>">
                                    <?= form_error('city', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="telpon">Phone Number</label>
                                    <input type="text" id="telpon" class="form-control form-control-sm" name="telpon" value="<?= set_value('telpon'); ?>">
                                    <?= form_error('telpon', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control form-control-sm" id="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="website">Website</label>
                                    <input type="text" id="website" class="form-control form-control-sm" name="website" value="<?= set_value('website'); ?>">
                                    <?= form_error('website', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label for="customer_type">Customer Type</label>
                                    <input type="text" name="customer_type" class="form-control form-control-sm" id="customer_type" value="<?= set_value('customer_type'); ?>">
                                    <?= form_error('customer_type', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Save</button>
                <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->


<!-- Modal Edit -->
<?php
foreach ($ref_customers as $i) :
    $id                         = $i['id'];
    $company_name               = $i['company_name'];
    $brand                      = $i['brand'];
    $sku                        = $i['sku'];
    $address                    = $i['address'];
    $street                     = $i['street'];
    $country                    = $i['country'];
    $zipcode                    = $i['zipcode'];
    $city                       = $i['city'];
    $website                    = $i['website'];
    $telpon                     = $i['telpon'];
    $email                      = $i['email'];
    $customer_type              = $i['customer_type'];
?>
    <div class="modal fade edit_ref_customers" id="edit_ref_customers<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Master Customers</h5>
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

                            <form autocomplete="off" action="<?php echo base_url('ref_customers/edit/' . $id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="company_name">Company Name</label>
                                        <input type="text" name="company_name" value="<?php echo $company_name; ?>" class="form-control form-control-sm" id="company_name">
                                        <?= form_error('company_name', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="brand"> Brand </label>
                                        <input type="text" name="brand" value="<?php echo $brand; ?>" class="form-control form-control-sm" id="brand">
                                        <?= form_error('brand', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <!-- <div class="form-group col-md-6">
                                        <label for="gender">Gender</label>
                                        <select id="gender" class="form-control form-control-sm" name="gender" id="gender">
                                            <option selected="">--Select--</option>
                                            <?php if ($gender==1) {?>
                                                <option value="1" selected>Male</option>
                                                <option value="2">Female</option>
                                            <?php }else{?>
                                                <option value="1">Male</option>
                                                <option value="2"selected>Female</option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div> -->


                                    <div class="form-group col-md-6">
                                        <label for="sku">SKU</label>
                                        <input type="text" id="sku" value="<?php echo $sku; ?>" class="form-control form-control-sm" name="sku" value="<?= set_value('sku'); ?>">
                                        <?= form_error('sku', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" value="<?php echo $address; ?>" class="form-control form-control-sm" name="address" value="<?= set_value('address'); ?>">
                                        <?= form_error('address', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="street">Street</label>
                                        <input type="text" name="street" value="<?php echo $street; ?>" class="form-control form-control-sm" id="street">
                                        <?= form_error('street', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <!-- <div class="form-group col-md-6">
                                        <label for="country">Country</label>
                                        <input type="text" name="country" value="<?php echo $country; ?>" class="form-control form-control-sm" id="country">
                                        <?= form_error('country', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div> -->

                                    <div class="form-group col-md-6">
                                    <label for="country">Country</label>
                                    <select id="country" class="form-control form-control-sm" name="country" id="country">
                                        <option selected="">--Select--</option>
                                        <?php foreach ($option_country as $key => $row) { ?>
                                            <?php if ($country==$row['id']) { ?>
                                                <option value="<?php echo $row['id']; ?>" selected><?php echo $row['country']; ?></option>
                                            <?php }else{ ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['country']; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    </div>

                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="zipcode">Zipcode</label>
                                        <input type="text" name="zipcode" value="<?php echo $zipcode; ?>" class="form-control form-control-sm" id="zipcode">
                                        <?= form_error('zipcode', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="city">City</label>
                                        <input type="text" name="city" value="<?php echo $city; ?>" class="form-control form-control-sm" id="city">
                                        <?= form_error('city', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <!-- <div class="form-group col-md-6">
                                        <label for="part_driver">Part Driver</label>
                                        <select id="part_driver" class="form-control form-control-sm" name="part_driver" id="part_driver">
                                            <option selected="">--Select--</option>
                                            <?php if ($part_driver==0) {?>
                                                <option value="0" selected>Internal</option>
                                                <option value="1">External</option>
                                            <?php }else{?>
                                                <option value="0">Internal</option>
                                                <option value="1"selected>External</option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div> -->


                                </div>
                                
                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="website">Website</label>
                                        <input type="text" name="website" value="<?php echo $website; ?>" class="form-control form-control-sm" id="website">
                                        <?= form_error('website', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="telpon">Phone Number</label>
                                        <input type="text" name="telpon" value="<?php echo $telpon; ?>" class="form-control form-control-sm" id="telpon">
                                        <?= form_error('telpon', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" value="<?php echo $email; ?>" class="form-control form-control-sm" id="email">
                                        <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="customer_type">Customer Type</label>
                                        <input type="text" name="customer_type" value="<?php echo $customer_type; ?>" class="form-control form-control-sm" id="customer_type">
                                        <?= form_error('customer_type', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-success btn-sm"> <i class="fas fa-save"></i> Update</button>
                    <button type="button" class="btn bg-danger btn-sm" data-dismiss="modal"> <i class="fas fa-window-close"></i> Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>
 <!--End Modal Edit -->



<!-- Modal View 
<?php
foreach ($account_user as $i) :
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