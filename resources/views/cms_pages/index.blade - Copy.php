@extends('layouts.layout')

@section('title', 'CMS Pages')

@section('addcss')
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/datatables.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css")}}">
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="col-lg-12">
                @php
                $routeName = explode('.', \Request::route()->getName());
                @endphp
                <h1>CMS Pages</h1>
                <a href="#" class="float-right btn btn-primary add_cms">Add New</a>
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
                                                <input type="text" placeholder="Title" name="title" id="title" class="form-control">
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
                                        <th>CMS Pages Title</th>
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

<!-- add cms -->
<div class="modal fade" id="add_cms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New CMS Pages </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" id="cms_form" novalidate="" action="{{route("cms_pages.store")}}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" id="id" >
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>CMS Pages Title</label>
                            <input type="text" id="c_title" placeholder="CMS Pages Title" name="title" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="title_error"></strong>
                            </span>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>CMS Pages Title(Arabic)</label>
                            <input type="text" id="title_ab" placeholder="CMS Pages Title(Arabic)" name="title_ab" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="title_ab_error"></strong>
                            </span>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>CMS Pages Title(Hebrew)</label>
                            <input type="text" id="cat_name_he" placeholder="CMS Pages Title(Hebrew)" name="title_he" class="form-control" required="">
                            <span class="text-danger">
                                <strong id="title_he_error"></strong>
                            </span>
                        </div>

                        
                        <div class="col-sm-12 form-group">
                            <label class="form-control-label" for="content">CMS Pages Content</label>
                            <textarea class="form-control" name="content"  id="content">{{old("content")}}</textarea>
                            <span class="text-danger">
                                <strong id="content_error"></strong>
                            </span>
                        </div>
                        <!-- <div class="col-sm-12 form-group">
                            <label class="form-control-label" for="content_ab">CMS Pages Content(Arabic)</label>
                            <textarea class="form-control" name="content_ab"  id="content_ab" >{{old("content_ab")}}</textarea>
                            <span class="text-danger">
                                <strong id="content_ab_error"></strong>
                            </span>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label class="form-control-label" for="content_he">CMS Pages Content(Hebrew)</label>
                            <textarea class="form-control"  id="content_he" name="content_he">{{old("content_he")}}</textarea>
                            <span class="text-danger">
                                <strong id="content_he_error"></strong>
                            </span>
                        </div> -->
                
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

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    var controller_url = "{{route('cms_pages.index')}}";

    $(".add_cms").click(function(){
        $('#id').val('');
        $('#cms_form').trigger("reset");
        $('#saveBtn').html("Save");
        $('#exampleModalLongTitle').html("Add CMS Pages");
        $('#add_cms').modal('show');
        $( '#title-error').html( "" );
        $( '#title_ab_error').html( "" );
        $( '#title_he_error').html( "" );
        $( '#content_error').html( "" );
        $( '#content_ab_error').html( "" );
        $( '#content_he_error').html( "" );
    });

    $('body').on('click', '.edit_category', function () {
        var id = $(this).data('id');
        $( '#title-error').html( "" );
        $( '#title_ab_error').html( "" );
        $( '#title_he_error').html( "" );
        $( '#content_error').html( "" );
        $( '#content_ab_error').html( "" );
        $( '#content_he_error').html( "" );

        $.get('categories/'+id+'/edit', function (data) {
            $('#exampleModalLongTitle').html("Edit CMS Pages");
            $('#saveBtn').html("Update");
            $('#add_cms').modal('show');
            $('#id').val(data.id);
            $('#cat_name').val(data.category_name);
            $('#cat_name_ab').val(data.category_name_ab);
            $('#cat_name_he').val(data.category_name_he);
        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();

        var form = $('#cms_form');
        var formdata=new FormData(form);
        formdata.content = CKEDITOR.instances['content'].getData();

        $.ajax({
          data: formdata,
          type: "POST",
          dataType: 'json',
          processData:false,
           contentType:false,
         
      
            success: function (data) 
            {
                if(data.success){

                    $('#cms_form').trigger("reset");
                    $('#add_cms').modal('hide');
                    jQuery(data_table).DataTable().draw();

                    setTimeout(function () {
                        swal(data.message, {
                            icon: 'success',
                        });
                    });
                } else {
                    $( '#title_error').html( data.errors.title );
                    $( '#title_ab_error').html( data.errors.title_ab );
                    $( '#title_he_error').html( data.errors.title_he );
                    $( '#content_error').html( data.errors.content );
                    $( '#content_ab_error').html( data.errors.content_ab );
                    $( '#content_he_error').html( data.errors.content_he );
                }
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
    });
</script>

<!-- Page Specific JS File -->
<script src="{{asset("public/assets/pages-js/cms_pages/index.js")}}"></script>
<!-- Editor Js-->
<script type="text/javascript" src="{{asset("public/assets/js/plugins/ckeditor/ckeditor.js")}}"></script>
<script>
    // CKEDITOR.replace('content_he');
    // CKEDITOR.replace('content_ab');
    CKEDITOR.replace('content');


    CKEDITOR.on("instanceReady", function(event) {
        event.editor.on("beforeCommandExec", function(event) {
            // Show the paste dialog for the paste buttons and right-click paste
            if (event.data.name == "paste") {
                event.editor._.forcePasteDialog = true;
            }
            // Don't show the paste dialog for Ctrl+Shift+V
            if (event.data.name == "pastetext" && event.data.commandData.from == "keystrokeHandler") {
                event.cancel();
            }
        })
    });

</script>
<!-- Editor Js End -->
@endsection