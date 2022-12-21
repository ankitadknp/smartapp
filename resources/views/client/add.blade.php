@extends('layouts.layout')

@section('title', 'Client')

@section('addcss')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
<style>
    select.form-control {
        height : 42px !important;
    }
</style>
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add New Client</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("client.index")}}">Client</a>
                </div>
                <div class="breadcrumb-item">Add New</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="" id="client_form" novalidate="" action="{{route("client.store")}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" >
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>First Name</label>
                                    <input type="text" id="f_name" placeholder="First Name" name="first_name" class="form-control" required="" value="{{old("f_name")}}" >
                                    @if($errors->has('first_name'))
                                        <div class="error">{{ $errors->first('first_name') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Last Name</label>
                                    <input type="text" id="l_name" placeholder="Last Name" name="last_name" class="form-control" required="" value="{{old("l_name")}}" >
                                    @if($errors->has('last_name'))
                                        <div class="error">{{ $errors->first('last_name') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Email</label>
                                    <input type="text" id="email_id" placeholder="Email" name="email" class="form-control" required="">
                                    @if($errors->has('email'))
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group password">
                                    <label>Password</label>
                                    <input type="password" id="password" placeholder="Password" name="password" class="form-control" required="" >
                                    @if($errors->has('password'))
                                        <div class="error">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group con_password">
                                    <label>Confirm Password</label>
                                    <input type="password" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" class="form-control" required="" >
                                    @if($errors->has('password_confirmation'))
                                        <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Phone Number</label>
                                    <input type="text" id="phone" placeholder="Phone Number" name="phone_number" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
                                    @if($errors->has('phone_number'))
                                        <div class="error">{{ $errors->first('phone_number') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>ID Number</label>
                                    <input type="url" id="id_number" placeholder="ID Number" name="id_number" class="form-control" required="">
                                    @if($errors->has('id_number'))
                                        <div class="error">{{ $errors->first('id_number') }}</div>
                                    @endif
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
                                    @if($errors->has('marital_status'))
                                        <div class="error">{{ $errors->first('marital_status') }}</div>
                                    @endif
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
                                    @if($errors->has('education_level'))
                                        <div class="error">{{ $errors->first('education_level') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Number Of Children</label>
                                    <input type="text" id="no_of_child" placeholder="Number Of Children" name="no_of_child" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
                                    @if($errors->has('no_of_child'))
                                        <div class="error">{{ $errors->first('no_of_child') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Occupation</label>
                                    <input type="text" id="occupation" placeholder="Occupation" name="occupation" class="form-control" required="">
                                    @if($errors->has('occupation'))
                                        <div class="error">{{ $errors->first('occupation') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Street Address Name</label>
                                    <input type="text" id="street_address_name" placeholder="Street Address Name" name="street_address_name" class="form-control" required="">
                                    @if($errors->has('street_address_name'))
                                        <div class="error">{{ $errors->first('street_address_name') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Street Number</label>
                                    <input type="text" id="street_number" placeholder="Street Number" name="street_number" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
                                    @if($errors->has('street_number'))
                                        <div class="error">{{ $errors->first('street_number') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>House Number</label>
                                    <input type="text" id="house_number" placeholder="House Number" name="house_number" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'>
                                    @if($errors->has('house_number'))
                                        <div class="error">{{ $errors->first('house_number') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>City</label>
                                    <input type="text" id="city" placeholder="City" name="city" class="form-control" required="">
                                    @if($errors->has('city'))
                                        <div class="error">{{ $errors->first('city') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>District</label>
                                    <input type="text" id="district" placeholder="District" name="district" class="form-control" required="">
                                    @if($errors->has('district'))
                                        <div class="error">{{ $errors->first('district') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Profile Photo</label>
                                    <input type="file" id="blogo" name="profile_pic" class="form-control"  accept="image/*" value="{{old('profile_pic')}}">
                                    @if($errors->has('profile_pic'))
                                        <div class="error">{{ $errors->first('profile_pic') }}</div>
                                    @endif
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{route("client.index")}}" class="btn btn-light">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('addjs')
@endsection
