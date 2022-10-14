@extends('layouts.layout')

@section('title', 'Edit Profile')

@section('addcss')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Edit Profile</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="margin-bottom: 0px">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="" id="edit_user_form" novalidate="" action="{{route("update_profile",$user->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="password" style="display: none">
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="row">
                                    
                                        <div class="col-sm-6 form-group">
                                            <label>First Name</label>
                                            <input type="text" value="{{$user->first_name}}" placeholder="First Name" name="first_name" class="form-control required" required="">
                                            <div class="invalid-feedback">
                                                Please enter first name
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Last Name</label>
                                            <input type="text" value="{{$user->last_name}}" placeholder="Last Name" name="last_name" class="form-control" required="">
                                            <div class="invalid-feedback">
                                                Please enter last name
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Email</label>
                                            <input type="email" value="{{$user->email}}" placeholder="Email" name="email" class="form-control" required="">
                                            <div class="invalid-feedback">
                                                Please enter valid email address
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{route("dashboard")}}" class="btn btn-light">Cancel</a>
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
<script src="{{asset("public/assets/pages-js/admins/add_edit.js")}}"></script>
@endsection