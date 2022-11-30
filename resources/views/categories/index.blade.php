@extends('layouts.layout')

@section('title', 'Categories')

@section('addcss')
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/datatables.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css")}}">
@endsection

@section('content')
@php
$module_permissions = Session::get("user_access_permission");
$module_permission = !empty($module_permissions['categories']) ? $module_permissions['categories'] : array();
@endphp
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="col-lg-12">
                <h1>Categories</h1>
                <?php 
                $pemission = in_array("create", $module_permission)  ? 'true' : 'false';
                if($pemission == 'true') { ?>
                    <a href="#" class="float-right btn btn-primary add_category">Add New</a>
                <?php }?>
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
                                                <input type="text" placeholder="Category Name" name="category_name" id="category_name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <select class="form-control" id="type" name="type">
                                                    <option value="">Type</option>
                                                    <option value="Coupon">Coupon</option>
                                                    <option value="Blog">Blog</option>
                                                </select>
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
                                        <th>Category Name</th>
                                        <th>Category Type</th>
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
<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Categories </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('errors.require')
                <form class="" id="custom_form" novalidate="" action="{{route("categories.store")}}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="category_id" id="category_id" >
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Category Name</label>
                            <input type="text" id="cat_name" placeholder="Category Name" name="category_name" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>Category Name(Arabic)</label>
                            <input type="text" id="cat_name_ab" placeholder="Category Name(Arabic)" name="category_name_ab" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="name-ab-error"></strong>
                            </span>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>Category Name(Hebrew)</label>
                            <input type="text" id="cat_name_he" placeholder="Category Name(Hebrew)" name="category_name_he" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="name-he-error"></strong>
                            </span>
                        </div>
                        <div class="col-sm-12" class="form-group">
                            <label>Category Type</label>
                            <select name="type"  id="c_type" class="form-control" required="">
                                <option value="" >Select Type</option>
                                <option value="Blog">Blog</option>
                                <option value="Coupon">Coupon</option>
                            </select>
                            <span class="text-danger">
                                <strong id="type-error"></strong>
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
    var controller_url = "{{route('categories.index')}}";
    var module_permission = {!! json_encode(array_values($module_permission)) !!};
</script>

<!-- Page Specific JS File -->
<script src="{{asset("public/assets/pages-js/categories/index.js")}}"></script>
<script src="{{asset("public/assets/pages-js/categories/add.js")}}"></script>
@endsection