@extends('layouts.layout')
@section('title', 'Client')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Client Details</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("client.index")}}">Client</a>
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
                                    <label>Name</label> : {{ $user->first_name }} {{ $user->last_name }}
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Email</label> : {{ $user->email }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Phone Number</label> : {{ $user->phone_number }} 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>ID Number</label> : {{ $user->id_number }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Merital Status</label> : {{ $user->marital_status }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Number Of Children</label> : {{ $user->no_of_child }} 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Occupation</label> : {{ $user->occupation }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Education Level</label> : {{ $user->education_level }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Street Address Name</label> : {{ $user->street_address_name }} 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Street Number</label> : {{ $user->street_number }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>House Number</label> : {{ $user->house_number }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>City</label> : {{ $user->city }} 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Profile Photo</label> : 
                                    @if ($user->profile_pic != null)
                                    <img alt="image" src="{{$user->profile_pic}}" class="rounded-circle mr-1" width="100" height="100">
                                    @else
                                    <img alt="image" src="{{$NO_PROFILE_PIC}}" class="rounded-circle mr-1" width="100" height="100">
                                    @endif
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