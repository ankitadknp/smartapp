@extends('layouts.layout')

@section('title', 'Client')

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
                <h1>Client</h1>
                <a href="#" class="float-right btn btn-primary add_client">Add New</a>
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
                                                <input type="text" placeholder="Phone Number" name="phone_number" id="phone_number" class="form-control">
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
                                        <th>Client Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Status</th>
                                        <!-- <th>Edit</th> -->
                                        <th>View</th>
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

<!-- add client -->
<div class="modal fade" id="add_client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Client </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('errors.require')
                <form class="" id="client_form" novalidate="" action="{{route("merchant.store")}}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="user_id" id="user_id" >
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>First Name</label>
                            <input type="text" id="f_name" placeholder="First Name" name="first_name" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="name_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Last Name</label>
                            <input type="text" id="l_name" placeholder="Last Name" name="last_name" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="last_name_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Email</label>
                            <input type="text" id="email_id" placeholder="Email" name="email" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="email_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group password">
                            <label>Password</label>
                            <input type="password" id="password" placeholder="Password" name="password" class="form-control" required="" >
                            <span class="text-danger">
                                <strong id="pwd_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group con_password">
                            <label>Confirm Password</label>
                            <input type="password" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" class="form-control" required="" >
                            <span class="text-danger">
                                <strong id="con_pwd_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Phone Number</label>
                            <input type="text" id="phone" placeholder="Phone Number" name="phone_number" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
                            <span class="text-danger">
                                <strong id="phone_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>ID Number</label>
                            <input type="url" id="id_number" placeholder="ID Number" name="id_number" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="id_number_error"></strong>
                            </span>
                        </div>
                
                        <div class="col-sm-6 form-group" >
                            <label>Marital Status</label>
                            <select name="marital_status"  id="marital_status" class="form-control" required="">
                                <option value="" >Select Marital Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                            <span class="text-danger">
                                <strong id="marital_status_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group" >
                            <label>Education</label>
                            <select name="education_level"  id="education_level" class="form-control" required="">
                                <option value="" >Select Education Level</option>
                                <option value="Primary">Primary</option>
                                <option value="Secondary">Secondary</option>
                                <option value="Bachelor">Bachelor</option>
                                <option value="Master">Master</option>
                                <option value="Doctorate">Doctorate</option>
                            </select>
                            <span class="text-danger">
                                <strong id="education_level_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Number Of Children</label>
                            <input type="text" id="no_of_child" placeholder="Number Of Children" name="no_of_child" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
                            <span class="text-danger">
                                <strong id="no_of_child_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Occupation</label>
                            <input type="text" id="occupation" placeholder="Occupation" name="occupation" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="occupation_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Street Address Name</label>
                            <input type="text" id="street_address_name" placeholder="Street Address Name" name="street_address_name" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="street_address_name_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Street Number</label>
                            <input type="text" id="street_number" placeholder="Street Number" name="street_number" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
                            <span class="text-danger">
                                <strong id="street_number_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>House Number</label>
                            <input type="text" id="house_number" placeholder="House Number" name="house_number" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
                            <span class="text-danger">
                                <strong id="house_number_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>City</label>
                            <input type="text" id="city" placeholder="City" name="city" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="city_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>District</label>
                            <input type="text" id="district" placeholder="District" name="district" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="district_error"></strong>
                            </span>
                        </div>

                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-primary" id="saveBtn" name="btnsave" >Save</button>
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
    var controller_url = "{{route('client.index')}}";

    $(".add_client").click(function(){
        $('#user_id').val('');
        $('#client_form').trigger("reset");
        $('#saveBtn').html("Save");
        $('#exampleModalLongTitle').html("Add Client");
        $('#add_client').modal('show');
        $('#name_error').html( "" );
        $('#last_name_error').html( "" );
        $('#email_error').html( "" );
        $('#pwd_error').html( "" );
        $('#con_pwd_error').html( "" );
        $('#phone_error').html( "" );
        $('#id_number_error').html( "" );
        $('#marital_status_error').html( "" );
        $('#education_level_error').html( "" );
        $('#business_sector_error').html( "" );
        $('#no_of_child_error').html( "" );
        $('#occupation_error').html( "" );
        $('#street_address_name_error').html( "" );
        $('#street_number_error').html( "" );
        $('#district_error').html( "" );
        $('#house_number_error').html( "" );
        $('#city_error').html( "" );
    });

    $('body').on('click', '.edit_client', function () 
    {
        var user_id = $(this).data('id');
        $('#client_form').trigger("reset");
        $('#saveBtn').html("Save");
        $('#exampleModalLongTitle').html("Add Client");
        $('#add_client').modal('show');
        $('#name_error').html( "" );
        $('#last_name_error').html( "" );
        $('#email_error').html( "" );
        $('#pwd_error').html( "" );
        $('#con_pwd_error').html( "" );
        $('#phone_error').html( "" );
        $('#id_number_error').html( "" );
        $('#marital_status_error').html( "" );
        $('#education_level_error').html( "" );
        $('#business_sector_error').html( "" );
        $('#no_of_child_error').html( "" );
        $('#occupation_error').html( "" );
        $('#street_address_name_error').html( "" );
        $('#street_number_error').html( "" );
        $('#district_error').html( "" );
        $('#house_number_error').html( "" );
        $('#city_error').html( "" );

        $.get('client/'+user_id+'/edit', function (data) 
        {
            $('.password').hide();
            $('.con_password').hide();
            $('#exampleModalLongTitle').html("Edit Client");
            $('#saveBtn').html("Update");
            $('#add_client').modal('show');
            $('#user_id').val(data.id);
            $('#f_name').val(data.first_name);
            $('#l_name').val(data.last_name);
            $('#email_id').val(data.email);
            $('#phone').val(data.phone_number);
            $('#id_number').val(data.id_number);
            $('#marital_status').val(data.marital_status);
            $('#education_level').val(data.education_level);
            $('#business_sector').val(data.business_sector);
            $('#no_of_child').val(data.no_of_child);
            $('#occupation').val(data.occupation);
            $('#street_address_name').val(data.street_address_name);
            $('#street_number').val(data.street_number);
            $('#district').val(data.district);
            $('#house_number').val(data.house_number);
            $('#city').val(data.city);
        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();

        $.ajax({
          data: $('#client_form').serialize(),
          type: "POST",
          dataType: 'json',
      
            success: function (data) 
            {
                if(data.success){

                    $('#client_form').trigger("reset");
                    $('#add_client').modal('hide');
                    jQuery(data_table).DataTable().draw();

                    setTimeout(function () {
                        swal(data.message, {
                            icon: 'success',
                        });
                    });
                } else {
                    $('#name_error').html( data.errors.first_name );
                    $('#last_name_error').html( data.errors.last_name );
                    $('#email_error').html( data.errors.email );
                    $('#pwd_error').html( data.errors.password );
                    $('#con_pwd_error').html( data.errors.password_confirmation );
                    $('#phone_error').html( data.errors.phone_number );
                    $('#id_number_error').html( data.errors.id_number );
                    $('#marital_status_error').html( data.errors.marital_status );
                    $('#education_level_error').html( data.errors.education_level );
                    $('#business_sector_error').html( data.errors.business_sector );
                    $('#no_of_child_error').html( data.errors.no_of_child );
                    $('#occupation_error').html( data.errors.occupation );
                    $('#street_address_name_error').html( data.errors.street_address_name );
                    $('#street_number_error').html( data.errors.street_number );
                    $('#district_error').html( data.errors.district );
                    $('#house_number_error').html( data.errors.house_number );
                    $('#city_error').html( data.errors.city );
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
<script src="{{asset("public/assets/pages-js/client/index.js?v1")}}"></script>
@endsection