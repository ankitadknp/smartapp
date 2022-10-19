"use strict";

var data_table = '#datatable';
function get_all_data() {
    var category_id = $('#category_id').val();
    var blog_title = $('#blog_title').val();
    var blog_content = $('#blog_content').val();
    var status = $('#status').val();
    var token = jQuery("#csrf-token").prop("content");
    jQuery(data_table).dataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        pagingType: "full_numbers",
        scrollY: '50vh',
        //scrollX: true,
        scrollCollapse: true,
        searching: false,
        order: [0, 'DESC'],
        pageLength: 10,
        "columns": [
            {"data": "category_id"},
            {"data": "blog_title"},
            {"data": "status"},
            {"data": "view"},
            {"data": "view_comment"},
            {"data": "view_like"},
            {"data": "edit"},
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
                sortable: false,
            },
            {
                targets: [3],
                searchable: true,
                sortable: false,
            },
            {
                targets: [4],
                searchable: true,
                sortable: false,
            },
            {
                targets: [5],
                searchable: true,
                sortable: false,
            },
            {
                targets: [6],
                searchable: true,
                sortable: false,
            },
            {
                targets: [7],
                searchable: true,
                sortable: false,
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
            "data": {'_token': token, 'category_id': category_id, 'blog_title': blog_title, 'blog_content': blog_content, 'status': status},
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
            status = 0;
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
        $('#blog_title').val('');
        $('#category_id').val('');
        $('#status').val('');
        setTimeout(function () {
            jQuery(data_table).dataTable().fnDestroy();
            get_all_data();
        }, 100);
    });

    //comment modal

    jQuery(document).on('click', '.comment_modal', function () 
    {
        var id = jQuery(this).attr('data-id');
        var token = jQuery("#csrf-token").prop("content");
        jQuery.ajax({
            "url": controller_url + '/comment',
            type: "POST",
            data: {
                'id': id,
                '_token': token,
            },
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $("body").addClass("loading");    
            },
            success: function (response) {
                $('#view-comments').html(response.blog_comment);
                $('#comment_title').html('Blog Comments ('+response.comment_count+')');
                $("body").removeClass("loading");
            }
        })
    });

    //report modal

    jQuery(document).on('click', '.show_modal', function () 
    {
        var id = jQuery(this).attr('data-id');
        var token = jQuery("#csrf-token").prop("content");
        jQuery.ajax({
            "url": controller_url + '/show',
            type: "POST",
            data: {
                'id': id,
                '_token': token,
            },
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $("body").addClass("loading");    
            },
            success: function (response) {
                $('#view-reports').html(response.blog_report);
                $('#report_title').html('Blog Reports ('+response.report_count+')');
                $("body").removeClass("loading");
            }
        })
    });

    
    //like modal

    jQuery(document).on('click', '.like_modal', function () 
    {
        var id = jQuery(this).attr('data-id');
        var token = jQuery("#csrf-token").prop("content");
        jQuery.ajax({
            "url": controller_url + '/like',
            type: "POST",
            data: {
                'id': id,
                '_token': token,
            },
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $("body").addClass("loading");    
            },
            success: function (response) {
                $('#view-like').html(response.blog_like);
                $('#like_title').html('Blog Likes ('+response.like_count+')');
                $("body").removeClass("loading");
            }
        })
    });

    //close modal
    $('.close').click(function (){
        $("#view-reports").empty();
        $("#view-comments").empty();
        $("#view-like").empty();
    })
});