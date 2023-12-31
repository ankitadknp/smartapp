@extends('layouts.layout')

@section('title', 'User Permission')

@section('addcss')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit User Permission</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("user-roles.index")}}">User Permission</a>
                </div>
                <div class="breadcrumb-item">Edit User Permission</div>
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
                        <form class="needs-validation" novalidate="" action="{{route("user-roles.update",$user_role->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>User</label>
                                    <select name="user" id="user_id" class="form-control select1" required="">
                                        <option value="" data-type="">Select User</option>
                                        @foreach($user as $val)
                                            @if($list_of_other_roles->user_id == $val->id)
                                            <option value="{{$val->id}}" selected="">{{$val->name}}</option>
                                            @else
                                            <option value="{{$val->id}}" >{{$val->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('user'))
                                        <div class="error">{{ $errors->first('user') }}</div>
                                    @endif
                                </div>    
                                <div class="form-group">
                                    <label>Permissions</label>
                                    <div id="accordion">
                                        @php 
                                        $first_group = true;
                                        $selected_permissions = json_decode($user_role->role_permissions,true);
                                        @endphp
                                        @foreach($all_avilable_role_permissions as $role_group)
                                        <div class="accordion">
                                            <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-{{$role_group->id}}" aria-expanded="{{$first_group == true ? "true" : "false"}}">
                                                <h4>{{$role_group->name}}</h4>
                                            </div>
                                            <div class="accordion-body collapse {{$first_group == true ? "show" : ""}}" id="panel-body-{{$role_group->id}}" data-parent="#accordion">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        @php($permission_modules = $role_group->roleTypes)
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="list-group" id="list-tab" role="tablist">
                                                                    @php($first_permission = true)
                                                                    @foreach($permission_modules as $permission)
                                                                    <a class="list-group-item list-group-item-action {{$first_permission==true ? "active show":""}}" id="tab-{{$permission->id}}-list" data-toggle="list" href="#list-{{$permission->id}}" role="tab" {{$first_permission=true ? 'aria-selected=="true"':""}}>
                                                                       {{$permission->name}}
                                                                    </a>
                                                                    @php($first_permission = false)
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="tab-content" id="nav-tabContent">
                                                                    @php($first_permission = true)
                                                                    @foreach($permission_modules as $permission)
                                                                    @php($types_permission = json_decode($permission->module_list, true))
                                                                    <div class="tab-pane fade {{$first_permission==true ? "active show":""}}" id="list-{{$permission->id}}" role="tabpanel" aria-labelledby="tab-{{$permission->id}}-list">
                                                                        <div class="selectgroup selectgroup-pills">
                                                                            @foreach($types_permission as $key => $sub_permission)
                                                                            @php ($checked_str='')
                                                                            @if(!empty($selected_permissions[$permission->id][$key]))
                                                                            @php ($checked_str='checked="checked"')
                                                                            @endif
                                                                            <label class="selectgroup-item">
                                                                                <input type="checkbox" {{$checked_str}} name="role_permissions[{{$permission->id}}][{{$key}}]" value="{{$sub_permission['key']}}" class="selectgroup-input" id="permission_{{$permission->id}}_{{$key}}">
                                                                                <span class="selectgroup-button">{{$sub_permission['value']}}</span>
                                                                            </label>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    @php($first_permission = false)
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php ($first_group = false)
                                        @endforeach
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