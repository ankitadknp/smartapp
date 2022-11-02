@extends('layouts.layout')
@section('title', 'Merchant')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Merchant Details</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("merchant.index")}}">Merchant</a>
                </div>
                <div class="breadcrumb-item">Details</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Business Name</label> : {{ $user->business_name }}
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Email</label> : {{ $user->email }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Registration Number</label> : {{ $user->registration_number }} 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Phone Number</label> : {{ $user->phone_number }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Website</label> : {{ $user->website }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Merital Status</label> : {{ $user->marital_status }} 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Business Activity</label> : {{ $user->business_activity }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Business Sector</label> : {{ $user->business_sector }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Establishment Year</label> : {{ $user->establishment_year }} 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Business Hours</label> : {{ $user->business_hours }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Street Address Name</label> : {{ $user->street_address_name }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Street Number</label> : {{ $user->street_number }} 
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="form-group col-md-4">
                                    <label>Business Logo</label> : <img alt="image" src="{{$user->business_logo}}" class="rounded-circle mr-1" width="100" height="100">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>District</label> : {{ $user->district }} 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection