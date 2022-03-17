


// Add
const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal({
        title: 'Data ',
        text: 'Insert ' + flashData,
        type: 'success'
    });
}

// Upload
const Upload = $('.flash-data-upload').data('flashdata');
if (Upload) {
    Swal({
        title: 'Data ',
        text: 'Failed ' + Upload,
        type: 'warning'
    });
}
// end upload

// required
const required = $('.flash-data-required').data('flashdata');
if (required) {
    Swal({
        title: 'Data ',
        text: 'Failed ' + required,
        type: 'warning'
    });
}
// end required

// tombol-logout
$('.tombol-logout').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "Log out of this app",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});



// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "data will be deleted",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});
// end hapus


// tombol-aprov_depart_head
$('.aprov_depart_head').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "data will be aproved",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});


// tombol-aprov_hrd_manager
$('.aprov_hrd_manager').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "data will be aproved",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

// tombol-aprov_security_pos
$('.aprov_security_pos').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "data will be aproved",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

// tombol-publish
$('.publish').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "data will be deactivated",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});


// tombol-unpublish
$('.unpublish').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "data will be activated",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});


// tombol-terima_agen
$('.terima_agen').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "data will be accepted, receipt of goods can not be returned.!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

// tombol-kirim-gudang
$('.kirim-gudang').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "data will be sent to the warehouse, delivery of goods can not be returned.!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

// pre requisition
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$('.pre_req_aprov_hod').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "Will agree to the request.!",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

$('.pre_req_aprov_purchasing').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "Will agree to the request.!",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

$('.pre_req_approved_bod').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "Will agree to the request.!",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

$('.pre_req_approved_finance').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "Will agree to the request.!",
        type: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

// end pre requisition
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// identitas customers
$(document).ready(function () {
    $('#customer_id').change(function () {
        var id = $(this).val();
        $.ajax({
            url: base_url + "sales_orders/get_customers_by_id",
            method: "POST",
            data: { id: id },
            async: false,
            dataType: 'json',
            success: function (data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {

                    html += '<div class="card mb-3"><div class="card-header"><h3><i class="fas fa-user-friends"></i> Identitas Customer</h3></div><div class="card-body">';

                    html += '<div class="form-group row"><label for="company_name" class="col-sm-4 col-form-label">Company Name</label><div class="col-sm-7"><input type="text" value="' + data[i].company_name + '" class="form-control form-control-sm" readonly="readonly" autocomplete="off"></div></div>';

                    html += '<div class="form-group row"><label for="brand" class="col-sm-4 col-form-label">Brand</label><div class="col-sm-7"><input type="text" value="' + data[i].brand + '" class="form-control form-control-sm" readonly="readonly" autocomplete="off"></div></div>';

                    html += '<div class="form-group row"><label for="sku" class="col-sm-4 col-form-label">SKU</label><div class="col-sm-7"><input type="text" value="' + data[i].sku + '" class="form-control form-control-sm" readonly="readonly" autocomplete="off"></div></div>';

                    html += '<div class="form-group row"><label for="sku" class="col-sm-4 col-form-label">Country</label><div class="col-sm-7"><input type="text" value="' + data[i].country + '" class="form-control form-control-sm" readonly="readonly" autocomplete="off"></div></div>';

                    html += '<div class="form-group row"><label for="sku" class="col-sm-4 col-form-label">Email</label><div class="col-sm-7"><input type="text" value="' + data[i].email + '" class="form-control form-control-sm" readonly="readonly" autocomplete="off"></div></div>';

                    html += '<div class="form-group row"><label for="sku" class="col-sm-4 col-form-label">Telpon</label><div class="col-sm-7"><input type="text" value="' + data[i].telpon + '" class="form-control form-control-sm" readonly="readonly" autocomplete="off"></div></div>';

                    html += '<div class="form-group row"><label for="sku" class="col-sm-4 col-form-label">Address</label><div class="col-sm-7"><input type="text" value="' + data[i].address + '" class="form-control form-control-sm" readonly="readonly" autocomplete="off"></div></div>';

                    html += '</div></div></div>';

                }
                $('.identitas_customers').html(html);

            }
        });
    });
});
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// end identitas customers



//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// start detail orders sales
$(document).ready(function () {
    $(".select2").select2();

    // Add new row in the table 
    $("#add_row").unbind('click').bind('click', function () {
        var table = $("#product_info_table");
        var count_table_tbody_tr = $("#product_info_table tbody tr").length;
        var row_id = count_table_tbody_tr + 1;

        $.ajax({
            url: base_url + '/sales_orders/getTableProductRow/',
            type: 'post',
            dataType: 'json',
            success: function (response) {

                // console.log(reponse.x);
                var html = '<tr id="row_' + row_id + '">' +
                    '<td>' +
                    '<div class="col-sm-15" style="width:100%;">' +
                    '<select class="form-control form-control-sm select2" data-row-id="' + row_id + '" id="product_' + row_id + '" name="product[]" onchange="getProductData(' + row_id + ')">' +
                    '<option value=""></option>';
                $.each(response, function (index, value) {
                    html += '<option value="' + value.id + '">' + value.product_name + '</option>';
                });

                html += '</select>' +
                    '</div>' +
                    '</td>' +
                    '<td><input type="number" name="quantity[]" id="quantity_' + row_id + '" class="form-control form-control-sm" onkeyup="getTotal(' + row_id + ')"></td>' +

                    '<td><input type="text" name="selling_price[]" id="selling_price_' + row_id + '" class="form-control form-control-sm" disabled><input type="hidden" name="selling_price_value[]" id="selling_price_value_' + row_id + '" class="form-control form-control-sm"></td>' +

                    '<td>' +
                    '<select class="form-control form-control-sm" id="taxable" name="taxable[]" style="width:100%;" required>' +
                    '<option value="1"selected>Yes</option>' +
                    '<option value="2">No</option>' +
                    '</select>' +
                    '</td>' +

                    '<input type="hidden" name="product_tax_rate_value[]" id="product_tax_rate_value_' + row_id + '" class="form-control form-control-sm" autocomplete="off">' +
                    '<td><input type="text" name="discount[]" id="discount_' + row_id + '" class="form-control form-control-sm"><input type="hidden" name="discount_value[]" id="discount_value_' + row_id + '" class="form-control form-control-sm"></td>' +

                    '<td><input type="text" name="tax[]" id="tax_' + row_id + '" class="form-control form-control-sm" disabled><input type="hidden" name="tax_value[]" id="tax_value_' + row_id + '" class="form-control form-control-sm"></td>' +

                    '<td><input type="text" name="total[]" id="total_' + row_id + '" class="form-control form-control-sm" disabled><input type="hidden" name="total_value[]" id="total_value_' + row_id + '" class="form-control form-control-sm"></td>' +

                    '<td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow1(\'' + row_id + '\')"><i class="fas fa-window-close"></i></button></td>' +
                    '</tr>';

                if (count_table_tbody_tr >= 1) {
                    $("#product_info_table tbody tr:last").after(html);
                }
                else {
                    $("#product_info_table tbody").html(html);
                }

                $(".select2").select2();

            }
        });

        return false;
    });

}); // /document

function getTotal(row = null) {
    if (row) {

        var tax = (Number($("#selling_price_value_" + row).val()) * Number($("#product_tax_rate_value_" + row).val()) / 100) * Number($("#quantity_" + row).val());
        tax = tax.toFixed(2);
        $("#tax_" + row).val(tax);
        $("#tax_value_" + row).val(tax);


        var total = Number(tax) + Number($("#selling_price_value_" + row).val()) * Number($("#quantity_" + row).val());
        total = total.toFixed(2);
        $("#total_" + row).val(total);
        $("#total_value_" + row).val(total);


        subAmount();

    } else {
        alert('no row !! please refresh the page');
    }
}


// get the product information from the server
function getProductData(row_id) {
    var product_id = $("#product_" + row_id).val();
    if (product_id == "") {
        $("#selling_price_" + row_id).val("");
        $("#selling_price_value_" + row_id).val("");

        $("#quantity_" + row_id).val("");
        $("#quantity_value_" + row_id).val("");

        $("#tax_" + row_id).val("");
        $("#tax_value_" + row_id).val("");

        $("#product_tax_rate_" + row_id).val("");
        $("#product_tax_rate_value_" + row_id).val("");

        $("#total_" + row_id).val("");
        $("#total_value_" + row_id).val("");

    } else {
        $.ajax({
            url: base_url + 'sales_orders/getProductValueById',
            type: 'post',
            data: { product_id: product_id },
            dataType: 'json',
            success: function (response) {
                // setting the rate value into the rate input field

                $("#selling_price_" + row_id).val(response.selling_price);
                $("#selling_price_value_" + row_id).val(response.selling_price);

                $("#quantity_" + row_id).val(1);
                $("#quantity_value_" + row_id).val(1);

                $("#discount_" + row_id).val(0);
                $("#discount_value_" + row_id).val(0);

                $("#product_tax_rate_" + row_id).val(response.product_tax_rate);
                $("#product_tax_rate_value_" + row_id).val(response.product_tax_rate);

                var tax_data = Number(response.selling_price * response.product_tax_rate / 100);
                tax_data = tax_data.toFixed(2);
                $("#tax_" + row_id).val(tax_data);
                $("#tax_value_" + row_id).val(tax_data);


                var total = Number(response.selling_price) + Number(tax_data);
                total = total.toFixed(2);
                $("#total_" + row_id).val(total);
                $("#total_value_" + row_id).val(total);

                subAmount();
            } // /success
        }); // /ajax function to fetch the product data 
    }
}


// calculate the total amount of the order
function subAmount() {
    var service_charge = 0;
    var vat_charge = 0;

    var tableProductLength = $("#product_info_table tbody tr").length;
    var totalSubAmount = 0;
    for (x = 0; x < tableProductLength; x++) {
        var tr = $("#product_info_table tbody tr")[x];
        var count = $(tr).attr('id');
        count = count.substring(4);

        totalSubAmount = Number(totalSubAmount) + Number($("#selling_price_" + count).val());
        total_tax = Number($("#tax_" + count).val());
        total_total = totalSubAmount + total_tax;

    } // /for

    total_price = totalSubAmount.toFixed(2);
    total_tax = total_tax.toFixed(2);
    total_total = total_total.toFixed(2);

    // sub total
    $("#subtotal_value").val(total_price);
    $("#subtotal_tax_value").val(total_tax);
    $("#subtotal_total_value").val(total_total);


} // /sub total amount



// remove the selected table row
function removeRow1(tr_id) {
    $("#product_info_table tbody tr#row_" + tr_id).remove();
    subAmount();
}

// end detail orders sales
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// pre requisiton

$(document).ready(function () {
    $("#btn-tambah-form").click(function () {
        var jumlah = parseInt($("#jumlah-form").val());
        var nextform = jumlah + 1;
        $("#insert-form").append(
            '<table id="dataTable1' + nextform + '" class="table table-bordered table-hover display" style="width:100%"> ' +
            '<tbody>' +
            '<tr>' +
            '<td style="width:3%">' +
            '' + nextform + '' +
            '</td>' +
            '<td style="width:45%">' +
            '<input type="text" required name="item_name[]" class="form-control form-control-sm" id="item_name" autocomplete="off">' +
            '</td>' +
            '<td style="width:10%">' +
            '<input type="number" required name="pre_qty[]"  class="form-control form-control-sm" id="pre_qty" autocomplete="off">' +
            '</td>' +
            '<td style="width:10%">' +
            '<input type="text" required name="measurement[]"  class="form-control form-control-sm" id="measurement" autocomplete="off">' +
            '</td>' +
            '<td style="width:10%">' +
            '<input type="number" required name="estimated_price[]"  class="form-control form-control-sm" id="estimated_price" autocomplete="off">' +
            '</td>' +
            '<td style="width:10%">' +
            '<select id="status" name="status[]" required class="form-control form-control-sm">' +
            '<option value="1">Normal</option>' +
            '<option value="2">Urgent</option>' +
            '</select>' +
            '</td>' +
            '<td style="width:8%">' +
            '<center><button type="button" class="btn bg-danger btn-sm" onclick="removeRow(' + nextform + ')"><i class="fas fa-window-close"></i> Remove</button></center>' +
            '</td>' +
            '</tr>' +
            '</tbody>' +
            '</table>'
        );
        $("#jumlah-form").val(nextform);
    });

});

function removeRow(nextform) {
    $("#dataTable1" + nextform).remove();
}

// end pre requisiton
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++






//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// select all deleted permit

$(document).ready(function () {
    $("#check-all").click(function () {
        if ($(this).is(":checked"))
            $(".check-item").prop("checked", true);
        else
            $(".check-item").prop("checked", false);
    });
    $("#btn-delete").click(function () {
        if (!$(".check-item").is(":checked")) {
            alert("You have not selected data!");
        }
        else if ($(".check-item").is(":checked")) {
            var confirm = window.confirm("Are you sure you want to delete chekbox this data?");
            if (confirm)
                $("#form-delete").submit();
        }

    });
});

// end select all deleted permit
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// employye select part departements

$(function () {

    $.ajaxSetup({
        type: "POST",
        url: base_url + 'employee/ambil_data',
        cache: false,
    });

    $("#departments_id").change(function () {

        var value = $(this).val();
        if (value > 0) {
            $.ajax({
                data: {
                    modul: 'part_departments_id',
                    id: value
                },
                success: function (respond) {
                    $("#part_departments_id").html(respond);
                }
            })
        }

    });

});

// end employee
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// datatabel
$(document).on('ready', function () {
    // data-tables
    $('#dataTable').DataTable(
        {
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        }
    );

    // counter-up
    $('.counter').counterUp({
        delay: 10,
        time: 600
    });
});
$(document).on('ready', function () {
    $('.select2').select2();
});
//end datatabel
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++




//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

$('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
        url: base_url + 'administrator/changeaccess',
        type: 'post',
        data: {
            menuId: menuId,
            roleId: roleId
        },
        success: function() {
            document.location.href = base_url + 'administrator/roleaccess/' + roleId;
        }
    });

});

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


