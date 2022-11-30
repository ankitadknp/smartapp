"use strict";
var data_table = '#datatable';
function get_all_data() {
    var business_name = $('#business_name').val();
    var phone_number = $('#phone_number').val();
    var email = $('#email').val();
    var status = $('#status').val();
    var token = jQuery("#csrf-token").prop("content");
    jQuery(data_table).dataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        pagingType: "full_numbers",
        scrollY: '50vh',
        scrollCollapse: true,
        searching: false,
        order: [0, 'DESC'],
        pageLength: 10,
        "columns": [
            {"data": "business_name"},
            {"data": "email"},
            {"data": "phone_number"},
            {"data": "status"},
            {"data": "view"},
            {"data": "delete"}
        ],
        columnDefs: [
            {
                targets: [0],
                searchable: true,
                sortable: true
            },
            {
                targets: [1],
                searchable: true,
                sortable: true
            },
            {
                targets: [2],
                searchable: true,
                sortable: true,
            },
            {
                targets: [3],
                searchable: true,
                sortable: true,
                visible: jQuery.inArray("change_status", module_permission) >= 0 ? true : false,
            },
            {
                targets: [4],
                searchable: true,
                sortable: false,
                visible: jQuery.inArray("show", module_permission) >= 0 ? true : false,
            },
            {
                targets: [5],
                searchable: true,
                sortable: false,
                visible: jQuery.inArray("destroy", module_permission) >= 0 ? true : false,
            },
        ],
        language: {
            emptyTable: "No data available",
            zeroRecords: "No matching records found...",
            infoEmpty: "No records available"
        },
        oLanguage: {
            "sProcessing": ''
        },
        ajax: {
            "url": controller_url + '/list-data',
            "type": "POST",
            "async": false,
            "data": {'_token': token, 'business_name': business_name, 'phone_number': phone_number, 'email':email,'status': status},
        },
        drawCallback: function () {
            jQuery('<li><a onclick="refresh_tab()" style="cursor:pointer" title="Refresh"><i class="ion-refresh" style="font-size:25px"></i></a></li>').prependTo('div.dataTables_paginate ul.pagination');
        }
    });
}

function refresh_tab() {
    jQuery(data_table).dataTable().fnDestroy();
    get_all_data();
    jQuery("#datatable_list_filter").css('display', 'none');
}

function filterGlobal() {
    jQuery(data_table).dataTable().search(
            jQuery('#global_filter').val()
            ).draw();
}

function filterColumn(i) {
    jQuery(data_table).dataTable().column(i).search(
            jQuery('#col' + i + '_filter').val()
            ).draw();
}

jQuery(document).ready(function () {
    get_all_data();

    // change active / inactive status
    jQuery(document).on('change', '.change_status', function () {
        var status;
        var id;
        if (jQuery(this).is(':checked')) {
            status = 1;
        } else {
            status = 2;
        }
        id = jQuery(this).attr('data-id');
        if (!isNaN(id)) {
            jQuery.ajax({
                "url": controller_url + '/change_status',
                type: "POST",
                data: {
                    'id': id,
                    'status': status,
                },
                dataType: 'json',
                cache: false,
                success: function (response) {
                    if (response.success == true) {
                        iziToast.success({
                            message: response.message,
                            position: 'topRight'
                        });
                    } else {
                        iziToast.error({
                            message: response.message,
                            position: 'topRight'
                        });
                    }
                },
                error: function () {
                    iziToast.error({
                        message: "Problem in performing your action",
                        position: 'topRight'
                    });
                }
            });
        } else {
            iziToast.error({
                message: "Problem in performing your action",
                position: 'topRight'
            });
        }
    });

    // delete data
    jQuery(document).on('click', '.delete_data_button', function () {
        var id;
        var this_row = jQuery(this);
        id = jQuery(this).attr('data-id');
        if (!isNaN(id)) {
            swal({
                title: 'Are you sure you want to delete this record?',
                text: 'Once deleted, you will not be able to recover this data!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(function(willDelete) {
                if (willDelete) {
                    jQuery.ajax({
                        "url": controller_url + '/delete',
                        type: "POST",
                        data: {
                            'id': id,
                        },
                        dataType: 'json',
                        cache: false,
                        success: function (response) {
                            if (response.success == true) {
                                setTimeout(function () {
                                    swal(response.message, {
                                        icon: 'success',
                                    });
                                    jQuery(data_table).DataTable().row(this_row).remove().draw(false);
                                });

                            } else {
                                setTimeout(function () {
                                    swal(response.message, {
                                        icon: 'error',
                                    });
                                });
                            }
                        },
                        error: function () {
                            setTimeout(function () {
                                swal("Problem in performing your action.", {
                                    icon: 'info',
                                });
                            });
                        }
                    });
                }
            });
        }
    });

    jQuery('.search_filter').click(function () {
        jQuery(data_table).dataTable().fnDestroy();
        get_all_data();
    });

    jQuery('.reset_filter').click(function () {
        $('#business_name').val('');
        $('#email').val('');
        $('#phone_number').val('');
        $('#status').val('');
        setTimeout(function () {
            jQuery(data_table).dataTable().fnDestroy();
            get_all_data();
        }, 100);
    });
});