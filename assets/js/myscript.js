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


$('.in-kargo').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure',
        text: "Goods will be sent to Indonesia, delivery of goods cannot be canceled.!",
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
