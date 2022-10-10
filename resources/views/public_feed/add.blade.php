@extends('layouts.layout')

@section('addcss')
<link rel="stylesheet" href="https://richtexteditor.com/richtexteditor/rte_theme_default.css" />
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
                        @include('errors.require')
                        <form class="" id="custom_form" novalidate="" action="{{route("public_feed.store")}}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Public Feed Name</label>
                                        <input type="text" value="{{old("public_feed_title")}}" placeholder="Public Feed Name" name="public_feed_title" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Please enter public eed name
                                        </div>
                                    </div>

                                    <input name="content" id="inp_htmlcode" type="hidden" />
                                    <div class="col-sm-12 form-group">
                                        <label class="form-control-label" for="content_heading_text">Public Feed Content</label>
                                        <div id="div_editor1" class="richtexteditor" required>
			                            </div>
                                    </div>

                                    <div class="col-sm-12 form-group">
                                        <label for="customFileGallery">Public Feed Images</label>
                                        <div class="file-loading">
                                            <input id="file-0b" type="file" class="file form-control required" name="images[]" accept="image/*" alt="Image" multiple="">
                                        </div>
                                        <!-- <p class="mt-2">Upload file </p> -->
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
<script type="text/javascript" src="{{ asset('public/assets/js') }}/rte.js"></script>
<script type="text/javascript" src="{{ asset('public/assets/js') }}/plugins/all_plugins.js"></script>
<script>
    var editor1 = new RichTextEditor(document.getElementById("div_editor1"));
    editor1.attachEvent("change", function () {
        document.getElementById("inp_htmlcode").value = editor1.getHTMLCode();
    });
</script>
<!-- Editor Js End -->
@endsection