@extends('layouts.layout')
@section('title', 'Public Feed')
@section('addcss')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add New Public Feed</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("public_feed.index")}}">Public Feed</a>
                </div>
                <div class="breadcrumb-item">Add New</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="" id="custom_form" novalidate="" action="{{route("public_feed.store")}}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Public Feed Name</label>
                                        <input type="text" value="{{old("public_feed_title")}}" placeholder="Public Feed Name" name="public_feed_title" class="form-control" required="">
                                        @if($errors->has('public_feed_title'))
                                            <div class="error">{{ $errors->first('public_feed_title') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Public Feed Name(Arabic)</label>
                                        <input type="text" value="{{old("public_feed_title_ab")}}" placeholder="Public Feed Name(Arabic)" name="public_feed_title_ab" class="form-control" required="">
                                        @if($errors->has('public_feed_title_ab'))
                                            <div class="error">{{ $errors->first('public_feed_title_ab') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Public Feed Name(Hebrew)</label>
                                        <input type="text" value="{{old("public_feed_title_he")}}" placeholder="Public Feed Name(Hebrew)" name="public_feed_title_he" class="form-control" required="">
                                        @if($errors->has('public_feed_title_he'))
                                            <div class="error">{{ $errors->first('public_feed_title_he') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="form-control-label" for="content_heading_text">Public Feed Short Content</label>
                                        <textarea class="form-control" name="short_content" placeholder="Public Feed Short Content">{{old("short_content")}}</textarea>
                                        @if($errors->has('short_content'))
                                            <div class="error">{{ $errors->first('short_content') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="form-control-label" for="content_heading_text">Public Feed Short Content(Arabic)</label>
                                        <textarea class="form-control" name="short_content_ab" placeholder="Public Feed Short Content(Arabic)">{{old("short_content_ab")}}</textarea>
                                        @if($errors->has('short_content_ab'))
                                            <div class="error">{{ $errors->first('short_content_ab') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="form-control-label" for="content_heading_text">Public Feed Short Content(Hebrew)</label>
                                        <textarea class="form-control" name="short_content_he" placeholder="Public Feed Short Content(Hebrew)">{{old("short_content_he")}}</textarea>
                                        @if($errors->has('short_content_he'))
                                            <div class="error">{{ $errors->first('short_content_he') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-sm-12 form-group">
                                        <label class="form-control-label" for="content_heading_text">Public Feed Content</label>
                                        <textarea class="form-control" name="content" id="ckeditor">{{old("content")}}</textarea>
                                        @if($errors->has('content'))
                                            <div class="error">{{ $errors->first('content') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label class="form-control-label" for="content_heading_text">Public Feed Content(Arabic)</label>
                                        <textarea class="form-control" name="content_ab" id="ckeditor_ab">{{old("content_ab")}}</textarea>
                                        @if($errors->has('content_ab'))
                                            <div class="error">{{ $errors->first('content_ab') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label class="form-control-label" for="content_heading_text">Public Feed Content(Hebrew)</label>
                                        <textarea class="form-control" name="content_he" id="ckeditor_he">{{old("content_he")}}</textarea>
                                        @if($errors->has('content_he'))
                                            <div class="error">{{ $errors->first('content_he') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-sm-12 form-group">
                                        <label for="customFileGallery">Public Feed Images</label>
                                        <div class="file-loading">
                                            <input id="file-0b" type="file" class="file form-control required" name="images[]" accept="image/*" alt="Image" multiple="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{route("public_feed.index")}}" class="btn btn-light">Cancel</a>
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
    var controller_url = "{{route('public_feed.index')}}";
    var selected_user = "";
</script>

<!-- Editor Js-->
<script type="text/javascript" src="{{asset("public/assets/js/plugins/ckeditor/ckeditor.js")}}"></script>
<script>
    CKEDITOR.replace('ckeditor_he', {
        filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('ckeditor_ab', {
        filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('ckeditor', {
        filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

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