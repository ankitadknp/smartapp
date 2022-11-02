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
                            <input type="hidden" name="id" id="id" >
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
                                    <label class="form-control-label" for="cms_content">CMS Pages Content</label>
                                    <textarea class="form-control" name="cms_content" id="cms_content">{{old("cms_content")}}</textarea>
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
@section('addjs')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<!-- Editor Js-->
<script type="text/javascript" src="{{asset("public/assets/js/plugins/ckeditor/ckeditor.js")}}"></script>
<script>
delete CKEDITOR.instances[ 'cms_content' ];
    // CKEDITOR.replace('content_he');
    // CKEDITOR.replace('content_ab');
    CKEDITOR.replace('cms_content');
    // $('#cms_content').ckeditor();


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
