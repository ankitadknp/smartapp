@extends('layouts.layout')

@section('title', 'Merchant')

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
                <h1>Merchant</h1>
                <a href="#" class="float-right btn btn-primary add_merchant">Add New</a>
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
                                            <input type="text" placeholder="Business Name" name="business_name" id="business_name" class="form-control">
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
                                        <th>Business Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
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

<!-- add category -->
<div class="modal fade" id="add_merchant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Merchant </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('errors.require')
                <form class="" id="merchant_form" novalidate="" action="{{route("merchant.store")}}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="user_id" id="user_id" >
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Business Name</label>
                            <input type="text" id="bus_name" placeholder="Business Name" name="business_name" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="name_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Registration Number</label>
                            <input type="text" id="registration_number" placeholder="Registration Number" name="registration_number" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="registration_number_error"></strong>
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
                            <input type="text" id="phone" placeholder="Phone Number" name="phone_number" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="phone_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Website</label>
                            <input type="url" id="website" placeholder="Website" name="website" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="website_error"></strong>
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
                            <label>Business Activity</label>
                            <select name="business_activity"  id="business_activity" class="form-control" required="">
                                <option value="" >Select Business Activity</option>
                                <option value="Construction">Construction</option>
                                <option value="Education">Education</option>
                                <option value="FinancialInsurance">FinancialInsurance</option>
                                <option value="Accommodation">Accommodation</option>
                                <option value="MedicalCare">MedicalCare</option>
                                <option value="Trade">Trade</option>
                            </select>
                            <span class="text-danger">
                                <strong id="business_activity_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group" >
                            <label>Business Sector</label>
                            <select name="business_sector"  id="business_sector" class="form-control" required="">
                                <option value="" >Select Business Sector</option>
                                <option value="Construction">Construction</option>
                                <option value="Education">Education</option>
                                <option value="Chemical">Chemical</option>
                                <option value="Commerce">Commerce</option>
                                <option value="Health">Health</option>
                            </select>
                            <span class="text-danger">
                                <strong id="business_sector_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Establishment Year</label>
                            <input type="year" id="establishment_year" placeholder="Establishment Year" name="establishment_year" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="establishment_year_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Business Hours</label>
                            <input type="text" id="business_hours" placeholder="Business Hours" name="business_hours" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="business_hours_error"></strong>
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
                            <input type="text" id="street_number" placeholder="Street Number" name="street_number" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="street_number_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>District</label>
                            <input type="text" id="district" placeholder="District" name="district" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="district_error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Business Logo</label>
                            <input type="file" id="business_logo" placeholder="Business Logo" name="business_logo" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="business_logo_error"></strong>
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
    var controller_url = "{{route('merchant.index')}}";

    $(".add_merchant").click(function(){
        $('#user_id').val('');
        $('#merchant_form').trigger("reset");
        $('#saveBtn').html("Save");
        $('#exampleModalLongTitle').html("Add Merchant");
        $('#add_merchant').modal('show');
        $('#name_error').html( "" );
        $('#registration_number_error').html( "" );
        $('#email_error').html( "" );
        $('#pwd_error').html( "" );
        $('#con_pwd_error').html( "" );
        $('#phone_error').html( "" );
        $('#website_error').html( "" );
        $('#marital_status_error').html( "" );
        $('#business_activity_error').html( "" );
        $('#business_sector_error').html( "" );
        $('#establishment_year_error').html( "" );
        $('#business_hours_error').html( "" );
        $('#street_address_name_error').html( "" );
        $('#street_number_error').html( "" );
        $('#district_error').html( "" );
        $('#business_logo_error').html( "" );
    });

    $('body').on('click', '.edit_merchant', function () 
    {
        var user_id = $(this).data('id');
        $('#merchant_form').trigger("reset");
        $('#saveBtn').html("Save");
        $('#exampleModalLongTitle').html("Add Merchant");
        $('#add_merchant').modal('show');
        $('#name_error').html( "" );
        $('#registration_number_error').html( "" );
        $('#email_error').html( "" );
        $('#pwd_error').html( "" );
        $('#con_pwd_error').html( "" );
        $('#phone_error').html( "" );
        $('#website_error').html( "" );
        $('#marital_status_error').html( "" );
        $('#business_activity_error').html( "" );
        $('#business_sector_error').html( "" );
        $('#establishment_year_error').html( "" );
        $('#business_hours_error').html( "" );
        $('#street_address_name_error').html( "" );
        $('#street_number_error').html( "" );
        $('#district_error').html( "" );
        $('#business_logo_error').html( "" );

        $.get('merchant/'+user_id+'/edit', function (data) 
        {
            $('.password').hide();
            $('.con_password').hide();
            $('#exampleModalLongTitle').html("Edit Merchant");
            $('#saveBtn').html("Update");
            $('#add_merchant').modal('show');
            $('#user_id').val(data.id);
            $('#bus_name').val(data.business_name);
            $('#registration_number').val(data.registration_number);
            $('#email_id').val(data.email);
            $('#phone').val(data.phone_number);
            $('#website').val(data.website);
            $('#marital_status').val(data.marital_status);
            $('#business_activity').val(data.business_activity);
            $('#business_sector').val(data.business_sector);
            $('#establishment_year').val(data.establishment_year);
            $('#business_hours').val(data.business_hours);
            $('#street_address_name').val(data.street_address_name);
            $('#street_number').val(data.street_number);
            $('#district').val(data.district);
            $('#business_logo').val(data.business_logo);
        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();

        $.ajax({
          data: $('#merchant_form').serialize(),
          type: "POST",
          dataType: 'json',
      
            success: function (data) 
            {
                if(data.success){

                    $('#merchant_form').trigger("reset");
                    $('#add_merchant').modal('hide');
                    jQuery(data_table).DataTable().draw();

                    setTimeout(function () {
                        swal(data.message, {
                            icon: 'success',
                        });
                    });
                } else {
                    $('#name_error').html( data.errors.business_name );
                    $('#registration_number_error').html( data.errors.registration_number );
                    $('#email_error').html( data.errors.email );
                    $('#pwd_error').html( data.errors.password );
                    $('#con_pwd_error').html( data.errors.password_confirmation );
                    $('#phone_error').html( data.errors.phone_number );
                    $('#website_error').html( data.errors.website );
                    $('#marital_status_error').html( data.errors.marital_status );
                    $('#business_activity_error').html( data.errors.business_activity );
                    $('#business_sector_error').html( data.errors.business_sector );
                    $('#establishment_year_error').html( data.errors.establishment_year );
                    $('#business_hours_error').html( data.errors.business_hours );
                    $('#street_address_name_error').html( data.errors.street_address_name );
                    $('#street_number_error').html( data.errors.street_number );
                    $('#district_error').html( data.errors.district );
                    $('#business_logo_error').html( data.errors.business_logo );
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
<script src="{{asset("public/assets/pages-js/merchant/index.js?v1")}}"></script>
@endsection