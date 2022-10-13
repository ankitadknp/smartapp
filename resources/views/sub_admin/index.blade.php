@extends('layouts.layout')

@section('addcss')
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/datatables.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css")}}">
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="col-lg-12">
                @php
                $routeName = explode('.', \Request::route()->getName());
                @endphp
                <h1>Sub Admin</h1>
                <a href="#" class="float-right btn btn-primary add_admin">Add New</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="padding: 0px">
                        <div id="accordion">
                            <div class="accordion">
                                <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                                    <h4>Filter</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" placeholder="Name" name="name" id="name" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" placeholder="Email" name="email" id="email" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <select class="form-control" id="status" name="status">
                                                    <option value="">Status (All)</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">In Active</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="button" name="resetfilter" value="Reset Filter" id="reset-filter" class="btn btn-light float-right reset_filter">
                                            <input type="button" name="filter" value="Filter" id="apply-filter" class="btn btn-primary float-right search_filter" style="margin-right: 15px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- add subadmin -->
<div class="modal fade" id="add_sub_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Sub Admin </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('errors.require')
                <form class="" id="sub_admin_form" novalidate="" action="{{route("sub_admin.store")}}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="user_id" id="user_id" >
                    @csrf
                    
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>First Name</label>
                            <input type="text" placeholder="FirstName" name="first_name" class="form-control" required="" id="first_name">
                            <span class="text-danger">
                                <strong id="first-name-error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label>Last Name</label>
                            <input type="text"  placeholder="LastName" name="last_name" class="form-control" required="" id="last_name">
                            <span class="text-danger">
                                <strong id="last-name-error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label>Email</label>
                            <input type="email"  placeholder="Email" name="email" class="form-control" required="" id="mail">
                            <span class="text-danger">
                                <strong id="email-error"></strong>
                            </span>
                        </div>
                        <div class="col-sm-12 form-group password">
                            <label>Password</label>
                            <input type="password" id="password" placeholder="Password" name="password" class="form-control" required="" >
                            <span class="text-danger">
                                <strong id="pwd-error"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button class="btn btn-primary" id="saveBtn">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
         
        </div>
    </div>
</div>
@endsection

@section('addjs')
<script src="{{asset("public/assets/modules/datatables/datatables.min.js")}}"></script>
<script src="{{asset("public/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("public/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js")}}"></script>
<script src="{{asset("public/assets/modules/jquery-ui/jquery-ui.min.js")}}"></script>

<script type="text/javascript">
   var controller_url = "{{route('sub_admin.index')}}";

    $(".add_admin").click(function(){
        $('#user_id').val('');
        $('.password').show();
        $('#sub_admin_form').trigger("reset");
        $('#saveBtn').html("Save");
        $('#exampleModalLongTitle').html("Add Sub Admin");
        $('#add_sub_admin').modal('show');
        return false;
    });

    $('body').on('click', '.edit_sub_admin', function () {
        var user_id = $(this).data('id');
        $( '#email-error' ).html("" );
        $( '#pwd-error' ).html("");
        $( '#last-name-error' ).html("");
        $( '#first-name-error' ).html("");

        $.get('sub_admin/'+user_id+'/edit', function (data) {
            $('#exampleModalLongTitle').html("Edit Sub Admin");
            $('#saveBtn').html("Update");
            $('#add_sub_admin').modal('show');
            $('.password').hide();
            $('#user_id').val(data.id);
            $('#first_name').val(data.first_name);
            $('#last_name').val(data.last_name);
            $('#mail').val(data.email);
        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        // $(this).html('Sending..');

        $.ajax({
          data: $('#sub_admin_form').serialize(),
          type: "POST",
          dataType: 'json',
            success: function (data) 
            {
                if(data.success) {
                    $(this).html('Sending..');
                    $('#sub_admin_form').trigger("reset");
                    $('#add_sub_admin').modal('hide');
                
                    jQuery(data_table).DataTable().draw();

                    setTimeout(function () {
                        swal(data.message, {
                            icon: 'success',
                        });
                    });
                } else {
                    $( '#email-error' ).html( data.errors.email );
                    $( '#pwd-error' ).html( data.errors.password );
                    $( '#last-name-error' ).html( data.errors.last_name );
                    $( '#first-name-error' ).html( data.errors.first_name);
                }
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
    });
    
</script>

<!-- Page Specific JS File -->
<script src="{{asset("public/assets/pages-js/sub_admin/index.js")}}"></script>
@endsection