@extends('layouts.layout')

@section('addcss')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add New Sub Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("sub_admin.index")}}">Sub Admin</a>
                </div>
                <div class="breadcrumb-item">Add New</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('errors.require')
                        <form class="" id="add_user_form" novalidate="" action="{{route("sub_admin.store")}}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>First Name</label>
                                        <input type="text" value="{{old("first_name")}}" placeholder="FirstName" name="first_name" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Please enter firstname
                                        </div>
                                    </div>

                                    <div class="col-sm-6 form-group">
                                        <label>Last Name</label>
                                        <input type="text" value="{{old("last_name")}}" placeholder="LastName" name="last_name" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Please enter lastname
                                        </div>
                                    </div>

                                    <div class="col-sm-6 form-group">
                                        <label>Email</label>
                                        <input type="email" value="{{old("email")}}" placeholder="Email" name="email" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Please enter valid email address
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Password</label>
                                        <input type="password" id="password" placeholder="Password" name="password" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Please enter password
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{route("sub_admin.index")}}" class="btn btn-light">Cancel</a>
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
<script type="text/javascript">
    var controller_url = "{{route('sub_admin.index')}}";
    var selected_user = "";
</script>
@endsection