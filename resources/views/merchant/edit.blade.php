@extends('layouts.layout')

@section('title', 'Merchant')

@section('addcss')
<link rel="stylesheet" href="{{asset("public/css/style.css")}}">
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Merchant</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("merchant.index")}}">Merchant</a>
                </div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="" id="edit_user_form" novalidate="" action="{{route("merchant.store")}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Business Name</label>
                                    <input type="text" id="bus_name" placeholder="Business Name" name="business_name" class="form-control" required="" value="{{$user->business_name}}">
                                    @if($errors->has('business_name'))
                                        <div class="error">{{ $errors->first('business_name') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Registration Number</label>
                                    <input type="text" id="registration_number" placeholder="Registration Number" name="registration_number" class="form-control" required="" value="{{$user->registration_number}}">
                                    @if($errors->has('registration_number'))
                                        <div class="error">{{ $errors->first('registration_number') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Email</label>
                                    <input type="text" id="email_id" placeholder="Email" name="email" class="form-control" required="" value="{{$user->email}}">
                                    @if($errors->has('email'))
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Phone Number</label>
                                    <input type="text" id="phone" placeholder="Phone Number" name="phone_number" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="{{$user->phone_number}}">
                                    @if($errors->has('phone_number'))
                                        <div class="error">{{ $errors->first('phone_number') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Website</label>
                                    <input type="url" id="website" placeholder="Website" name="website" class="form-control" required="" value="{{$user->website}}">
                                    @if($errors->has('website'))
                                        <div class="error">{{ $errors->first('website') }}</div>
                                    @endif
                                </div>
                        
                                <div class="col-sm-6 form-group" >
                                    <label>Business Activity</label>
                                    <select name="business_activity"  id="business_activity" class="form-control" required="">
                                        <option value="" >Select Business Activity</option>
                                        <option value="Construction" {{ $user->business_activity == 'Construction' ? 'selected':'' }}>Construction</option>
                                        <option value="Education" {{ $user->business_activity == 'Education' ? 'selected':'' }}>Education</option>
                                        <option value="FinancialInsurance" {{ $user->business_activity == 'FinancialInsurance' ? 'selected':'' }}>FinancialInsurance</option>
                                        <option value="Accommodation" {{ $user->business_activity == 'Accommodation' ? 'selected':'' }}>Accommodation</option>
                                        <option value="MedicalCare" {{ $user->business_activity == 'MedicalCare' ? 'selected':'' }}>MedicalCare</option>
                                        <option value="Trade" {{ $user->business_activity == 'Trade' ? 'selected':'' }}>Trade</option>
                                    </select>
                                    @if($errors->has('business_activity'))
                                        <div class="error">{{ $errors->first('business_activity') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group" >
                                    <label>Business Sector</label>
                                    <select name="business_sector"  id="business_sector" class="form-control" required="">
                                        <option value="" >Select Business Sector</option>
                                        <option value="Construction" {{ $user->business_sector == 'Construction' ? 'selected':'' }}>Construction</option>
                                        <option value="Education" {{ $user->business_sector == 'Education' ? 'selected':'' }}>Education</option>
                                        <option value="Chemical" {{ $user->business_sector == 'Chemical' ? 'selected':'' }}>Chemical</option>
                                        <option value="Commerce" {{ $user->business_sector == 'Commerce' ? 'selected':'' }}>Commerce</option>
                                        <option value="Health" {{ $user->business_sector == 'Health' ? 'selected':'' }}>Health</option>
                                    </select>
                                    @if($errors->has('business_sector'))
                                        <div class="error">{{ $errors->first('business_sector') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Establishment Year</label>
                                    <input type="year" id="establishment_year" placeholder="Establishment Year" name="establishment_year" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="{{$user->establishment_year}}">
                                    @if($errors->has('establishment_year'))
                                        <div class="error">{{ $errors->first('establishment_year') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Business Hours</label>
                                    <input type="text" id="business_hours" placeholder="Business Hours" name="business_hours" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="{{$user->business_hours}}">
                                    @if($errors->has('business_hours'))
                                        <div class="error">{{ $errors->first('business_hours') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Street Address Name</label>
                                    <input type="text" id="street_address_name" placeholder="Street Address Name" name="street_address_name" class="form-control" required="" value="{{$user->street_address_name}}">
                                    @if($errors->has('street_address_name'))
                                        <div class="error">{{ $errors->first('street_address_name') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label>Street Number</label>
                                    <input type="text" id="street_number" placeholder="Street Number" name="street_number" class="form-control" required="" onkeypress ='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="{{$user->street_number}}">
                                    @if($errors->has('street_number'))
                                        <div class="error">{{ $errors->first('street_number') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label>District</label>
                                    <input type="text" id="district" placeholder="District" name="district" class="form-control" required="" value="{{$user->district}}">
                                    @if($errors->has('district'))
                                        <div class="error">{{ $errors->first('district') }}</div>
                                    @endif
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label>Business Logo</label>
                                    <input type="file" id="blogo" name="business_logo" class="form-control"  accept="image/*">
                                    @if($errors->has('business_logo'))
                                        <div class="error">{{ $errors->first('business_logo') }}</div>
                                    @endif
                                </div>
                                <div class="row pb-2 gallery_section_card col-sm-12 form-group">
                                    <div class="avatar-item mb-0">
                                        <img alt="image" src="{{$user->business_logo}}" class="img-fluid" data-toggle="tooltip" title=""  style="width: 100px;height: 100px;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{route("blog.index")}}" class="btn btn-light">Cancel</a>
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