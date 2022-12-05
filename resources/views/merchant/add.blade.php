@extends('layouts.layout')

@section('title', 'Merchant')

@section('addcss')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add New Merchant</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("merchant.index")}}">Merchant</a>
                </div>
                <div class="breadcrumb-item">Add New</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="" id="add_user_form" novalidate="" action="{{route("merchant.store")}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" >
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Business Name</label>
                                    <input type="text" id="bus_name" placeholder="Business Name" name="business_name" class="form-control" required="" value="{{old('business_name')}}">
                                    @if($errors->has('business_name'))
                                        <div class="error">{{ $errors->first('business_name') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Registration Number</label>
                                    <input type="text" id="registration_number" placeholder="Registration Number" name="registration_number" class="form-control" required="" value="{{old('registration_number')}}">
                                    @if($errors->has('registration_number'))
                                        <div class="error">{{ $errors->first('registration_number') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Email</label>
                                    <input type="text" id="email_id" placeholder="Email" name="email" class="form-control" required="" value="{{old('email')}}">
                                    @if($errors->has('email'))
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group password">
                                    <label>Password</label>
                                    <input type="password" id="password" placeholder="Password" name="password" class="form-control" value="{{old('password')}}">
                                    @if($errors->has('password'))
                                        <div class="error">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group con_password">
                                    <label>Confirm Password</label>
                                    <input type="password" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}" >
                                    @if($errors->has('password_confirmation'))
                                        <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Phone Number</label>
                                    <input type="text" id="phone" placeholder="Phone Number" name="phone_number" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="{{old('phone_number')}}">
                                    @if($errors->has('phone_number'))
                                        <div class="error">{{ $errors->first('phone_number') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Website</label>
                                    <input type="url" id="website" placeholder="Website" name="website" class="form-control" required="" value="{{old('website')}}">
                                    @if($errors->has('website'))
                                        <div class="error">{{ $errors->first('website') }}</div>
                                    @endif
                                </div>
                        
                                <div class="col-sm-6 form-group" >
                                    <label>Marital Status</label>
                                    <select name="marital_status"  id="marital_status" class="form-control" required="" value="{{old('title')}}">
                                        <option value="" >Select Marital Status</option>
                                        <option value="Single" @if (old('marital_status') == 'Single') selected="selected" @endif>Single</option>
                                        <option value="Married" @if (old('marital_status') == 'Married') selected="selected" @endif>Married</option>
                                        <option value="Widowed" @if (old('marital_status') == 'Widowed') selected="selected" @endif>Widowed</option>
                                        <option value="Separated" @if (old('marital_status') == 'Separated') selected="selected" @endif>Separated</option>
                                        <option value="Divorced" @if (old('marital_status') == 'Divorced') selected="selected" @endif>Divorced</option>
                                    </select>
                                    @if($errors->has('marital_status'))
                                        <div class="error">{{ $errors->first('marital_status') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group" >
                                    <label>Business Activity</label>
                                    <select name="business_activity"  id="business_activity" class="form-control" required="">
                                        <option value="" >Select Business Activity</option>
                                        <option value="Construction" @if (old('business_activity') == 'Construction') selected="selected" @endif>Construction</option>
                                        <option value="Education" @if (old('business_activity') == 'Education') selected="selected" @endif>Education</option>
                                        <option value="FinancialInsurance" @if (old('business_activity') == 'FinancialInsurance') selected="selected" @endif>FinancialInsurance</option>
                                        <option value="Accommodation" @if (old('business_activity') == 'Accommodation') selected="selected" @endif>Accommodation</option>
                                        <option value="MedicalCare" @if (old('business_activity') == 'MedicalCare') selected="selected" @endif>MedicalCare</option>
                                        <option value="Trade" @if (old('business_activity') == 'Trade') selected="selected" @endif>Trade</option>
                                    </select>
                                    @if($errors->has('business_activity'))
                                        <div class="error">{{ $errors->first('business_activity') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group" >
                                    <label>Business Sector</label>
                                    <select name="business_sector"  id="business_sector" class="form-control" required="">
                                        <option value="" >Select Business Sector</option>
                                        <option value="Construction" @if (old('business_sector') == 'Construction') selected="selected" @endif>Construction</option>
                                        <option value="Education" @if (old('business_sector') == 'Education') selected="selected" @endif>Education</option>
                                        <option value="Chemical" @if (old('business_sector') == 'Chemical') selected="selected" @endif>Chemical</option>
                                        <option value="Commerce" @if (old('business_sector') == 'Commerce') selected="selected" @endif>Commerce</option>
                                        <option value="Health" @if (old('business_sector') == 'Health') selected="selected" @endif>Health</option>
                                    </select>
                                    @if($errors->has('business_sector'))
                                        <div class="error">{{ $errors->first('business_sector') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Establishment Year</label>
                                    <input type="year" id="establishment_year" placeholder="Establishment Year" name="establishment_year" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="{{old('establishment_year')}}">
                                    @if($errors->has('establishment_year'))
                                        <div class="error">{{ $errors->first('establishment_year') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Business Hours</label>
                                    <input type="text" id="business_hours" placeholder="Business Hours" name="business_hours" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="{{old('business_hours')}}">
                                    @if($errors->has('business_hours'))
                                        <div class="error">{{ $errors->first('business_hours') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Street Address Name</label>
                                    <input type="text" id="street_address_name" placeholder="Street Address Name" name="street_address_name" class="form-control" required="" value="{{old('street_address_name')}}">
                                    @if($errors->has('street_address_name'))
                                        <div class="error">{{ $errors->first('street_address_name') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Street Number</label>
                                    <input type="text" id="street_number" placeholder="Street Number" name="street_number" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="{{old('street_number')}}">
                                    @if($errors->has('street_number'))
                                        <div class="error">{{ $errors->first('street_number') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>District</label>
                                    <input type="text" id="district" placeholder="District" name="district" class="form-control" required="" value="{{old('district')}}">
                                    @if($errors->has('district'))
                                        <div class="error">{{ $errors->first('district') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Business Logo</label>
                                    <input type="file" id="blogo" name="business_logo" class="form-control"  accept="image/*" value="{{old('business_logo')}}">
                                    @if($errors->has('business_logo'))
                                        <div class="error">{{ $errors->first('business_logo') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{route("merchant.index")}}" class="btn btn-light">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
