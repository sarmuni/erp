<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- 
<?php
foreach ($head_employee as $row) {
    echo $row['id_user'];
}
?> -->

<div class="col-12">
    <div class="card mb-3">
        <div class="card-header">
            <h3><i class="fas fa-user-friends"></i> <?php echo $title; ?></h3>
        </div>

        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="flash-data-required" data-flashdata="<?= $this->session->flashdata('required'); ?>"></div>

        <div class="card-body">
            <!-- <a role="button" href="#" class="btn bg-danger" title="Add" data-toggle="modal" data-target=".tambah_pre_requisition">
                <i class="fas fa-user-plus"></i>
            </a> -->
            <a role="button" href="<?php base_url(); ?>pre_requisition/form" class="btn bg-danger btn-sm" title="Add New">
                <i class="fas fa-user-plus"></i> Add New
            </a>

            <!-- <a role="button" href="#" class="btn bg-danger btn-sm" title="Print PDF">
                <i class="fas fa-print"></i> Print PDF
            </a> -->
            <a role="button" href="#" class="btn bg-danger btn-sm" title="Export Excel">
                <i class="fas fa-download"></i> Export Excel
            </a>
            <a role="button" href="<?php echo base_url('pre_requisition'); ?>" class="btn bg-danger btn-sm" title="Refresh">
                <i class="fas fa-sync-alt"></i> Refresh
            </a>


            <span class="pull-right"><a href="#" id="" title="Sort" class="btn bg-info btn-sm"><i class="fas fa-search" aria-hidden="true"></i> Sort</a></span>
            <div class="col-sm-2 pull-right">
                <select id="departments_id" name="departments_id" required class="form-control select2">
                    <option value="">-- All Departments--</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="year" name="year" required class="form-control select2">
                    <option value="">-- All Year--</option>
                </select>
            </div>
            <div class="col-sm-2 pull-right">
                <select id="category" name="category" required class="form-control select2">
                    <option value="">-- All Category--</option>
                </select>
            </div>

            <hr>
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pre Code</th>
                            <th>Pre Date</th>
                            <th>Deadline Date</th>
                            <th>Request User</th>
                            <th>Departments</th>
                            <th>Request Status</th>
                            <th>Total Item</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($pre_requisition as $row) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><a href="<?php echo site_url(); ?>pre_requisition/view/<?php echo $row['id']; ?>/<?php echo $row['pre_code']; ?>"><?php echo strtoupper($row['pre_code']); ?></a></td>
                            <td><?php echo date('Y-m-d',strtotime($row['pre_date'])); ?></td>
                            <td><?php echo date('Y-m-d',strtotime($row['pre_deadline_date'])); ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><center><?php if ($row['request_status']==1) {
                                echo"<p style='color:blue; font-size:15px;'>Normal</p>";
                            }else{
                                echo"<p style='color:red; font-size:15px;'>Urgent</p>";
                            } ?></center></td>
                            <td><center><?php echo strtoupper($row['total_item']); ?></center></td>
                            <td>
                                <?php if ($row['status'] == 0) { ?>
                                    <center><a role="button" href="<?php echo site_url(); ?>pre_requisition/aprov_hod/<?php echo $row['id']; ?>" id="publish" class="btn bg-warning btn-sm publish" title="Aktif">
                                    <i class="fas fa-check"></i> Approved HOD
                                        </a></center>
                                <?php } else { ?>
                                    <center><a role="button" href="<?php echo site_url(); ?>pre_requisition/unpublish/<?php echo $row['id']; ?>" id="unpublish" class="btn bg-success btn-sm unpublish" title="Non Aktif">
                                            <i class="fas fa-eye"></i>
                                        </a></center>
                                <?php } ?>
                            </td>
                            <td>
                                <a role="button" href="#" class="btn bg-warning btn-sm" title="Edit" data-toggle="modal" data-target="#edit_pre_requisition<?php echo $row['id']; ?>"><i class="fas fa-user-edit"></i>
                                </a>
                                
                                 <a role="button" href="<?php echo site_url(); ?>pre_requisition/delete/<?php echo $row['id']; ?>/<?php echo $row['pre_code']; ?>" id="deleted" class="btn bg-danger btn-sm tombol-hapus" title="delete record"><i class="fas fa-trash-alt"></i>
                                 </a>


                                 <a role="button" href="<?php echo site_url(); ?>cetak/pre_requisition/<?php echo $row['id']; ?>/<?php echo $row['pre_code']; ?>" target="_blank" class="btn bg-info btn-sm" title="Cetak"><i class="fas fa-print"></i>
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
<div class="modal fade tambah_pre_requisition" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Add Pre Requisition</h5>
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

                        <form autocomplete="off" action="<?php echo base_url('pre_requisition/add'); ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="person_id">Pre Date</label>
                                    <input type="date" name="person_id" class="form-control" id="person_id" value="<?= set_value('person_id'); ?>">
                                    <?= form_error('person_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="person_name">Pre Deadline Date</label>
                                    <input type="date" name="person_name" class="form-control" id="person_name" value="<?= set_value('person_name'); ?>">
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
                                    <label for="departments_id">Request User</label>
                                    <select id="departments_id" name="departments_id" required class="form-control" value="<?= set_value('departments_id'); ?>">
                                        <option value="0">-- Select --</option>
                                        <?php foreach ($employee as $row1) { ?>
                                            <option value="<?php echo $row1['id']; ?>"><?php echo $row1['person_id']; ?> - <?php echo $row1['person_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?= form_error('departments_id', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                    </div>
                                    
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="gender">Item Name</label>
                                    <select id="gender" class="form-control" name="gender" id="gender" onchange="addRecord(this)">
                                        <option selected="">Select</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                            </div>
                            <table class="table" id="record">
                                <thead>
                                <tr>
                                    <td width="5%">No</td>
                                    <td width="15%">Item Code</td>
                                    <td width="10%" class="text-center">Quantity</td>
                                    <td width="15%" class="text-center">MOQ</td>
                                    <td width="15%">Description</td>
                                    <td width="5%" class="text-center">Action</td>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="email">Notes</label>
                                    <input type="email" id="email" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<p style="color:red; font-size:12px;">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <br>
                                    <label class="radio-inline">
                                    <input type="radio" name="request_status" id="urgent" value="1" checked> Urgent
                                    </label>
                                    <label class="radio-inline">
                                    <input type="radio" name="request_status" id="top_urgent" value="2"> TOP Urgent
                                    </label>
                                    <label class="radio-inline">
                                    <input type="radio" name="request_status" id="normal" value="3"> Normal
                                    </label>
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

<script>
    $('.select2').select2();
    var rowNum = 1;
    function addRecord(event) {
        var selected_text = event.options[event.selectedIndex].innerHTML;
        var selected_value = event.value;
        var location = event.options[event.selectedIndex].dataset.location;
        var item_name = event.options[event.selectedIndex].dataset.name;
        var item_code = event.options[event.selectedIndex].dataset.code;
        var quantity = event.options[event.selectedIndex].dataset.quantity;
        var unit_price = event.options[event.selectedIndex].dataset.unit_price;
        var measurement = event.options[event.selectedIndex].dataset.measurement;
        
        if(selected_value != "") {
            $('#record tbody').append('<tr>'
            +'<td id="number">'+rowNum+'</td>'
            +'<td>'+item_code+'<input type="hidden" name="item_code[]" value="'+item_code+'"></td>'
            +'<td><input type="number" name="qty[]" min="0" class="form-control"></td>'
            +'<td class="text-center">'+measurement+'<input type="hidden" name="unit_price[]" value="'+unit_price+'"><input type="hidden" name="measurement[]" value="'+measurement+'"></td>'
            +'<td>'+selected_text+'<input type="hidden" name="item_id[]" value="'+selected_value+'"><input type="hidden" name="item_name[]" value="'+item_name+'"></td>'
            +'<td class="text-center"><a href="javascript:void(0);" class="removeRecord"><i class="fa fa-trash"></i></a></td>'
            +'</tr>');   
            rowNum++;
        }
        console.log('number '+rowNum);
        
        $('#location'+selected_value+'').val(location).trigger('change');
        $('.select2').select2();
        
    }
    
    function setUser(event) {
        var selected_text = event.options[event.selectedIndex].innerHTML;
        var selected_value = event.value;
        var department = event.options[event.selectedIndex].dataset.department;
        var department_id = event.options[event.selectedIndex].dataset.department_id;
        var company = event.options[event.selectedIndex].dataset.company;
        var company_id = event.options[event.selectedIndex].dataset.company_id;
        
        $('#department').text(department);
        $('[name=department_id]').val(department_id);
        $('#company').text(company);
        $('[name=company_id]').val(company_id);
    }
    
    function setSupplier(event) {
        var selected_text = event.options[event.selectedIndex].innerHTML;
        var selected_value = event.value;
        var address = event.options[event.selectedIndex].dataset.address;
        var phone = event.options[event.selectedIndex].dataset.phone;
        var handphone = event.options[event.selectedIndex].dataset.handphone;
        var pic = event.options[event.selectedIndex].dataset.pic;
        var pic_id = event.options[event.selectedIndex].dataset.pic_id;
        
        $('#address').text(address);
        $('[name=vendor_address]').val(address);
        $('#phone').text(phone);
        $('[name=vendor_phone]').val(phone);
        $('#handphone').text(handphone);
        $('#pic').text(pic);
        $('[name=vendor_pic]').val(pic_id);
    }
    
    $('.date').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true,
    });
    
    var recalculate = function() {
       $('#record').find('tbody > tr').each(function(index) {
          var newCount = index + 1;
          $(this).find('[id^=number]').text(newCount);
       });
    }

    $("#record").on('click','.removeRecord',function(){
        $(this).parent().parent().remove();
        recalculate();
    });
</script>