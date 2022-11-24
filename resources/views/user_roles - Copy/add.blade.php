@extends('layouts.layout')

@section('title', 'Permission')

@section('addcss')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add Permission</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("user-roles.index")}}">Permission</a>
                </div>
                <div class="breadcrumb-item">Add New</div>
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
                        <form class="needs-validation" novalidate="" action="{{route("user-roles.store")}}" method="POST">
                            @csrf
                            <div class="col-sm-12">
                                <div class="col-sm-12 form-group">
                                    <label>User</label>
                                    <select name="user" id="user_id" class="form-control select1" required="">
                                        <option value="" data-type="">Select User</option>
                                        @foreach($user as $val)
                                        <option value="{{$val->id}}" >{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('user'))
                                        <div class="error">{{ $errors->first('user') }}</div>
                                    @endif
                                </div>
                         
                                <div class="form-group col-sm-12">
                                    <label>Permissions</label>
                                    <div id="accordion">
                                    <br/>
                                        @foreach($permission as $value)
                                            
                                            <input type="checkbox" id="vehicle1" name="permission[]" value="{{ $value->id }}" class=""><label>{{ $value->name }}
                                            </label>
                                        @endforeach
                                    <br/>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{route("user-roles.index")}}" class="btn btn-light">Cancel</a>
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