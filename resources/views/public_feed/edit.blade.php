@extends('layouts.layout')

@section('addcss')
<link rel="stylesheet" href="https://richtexteditor.com/richtexteditor/rte_theme_default.css" />
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("public_feed.index")}}">Category</a>
                </div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('errors.require')
                        <form class="" id="custom_form" novalidate="" action="{{route("public_feed.update",$feed->public_feed_id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Public Feed Title</label>
                                        <input type="text" value="{{$feed->public_feed_title}}" placeholder="Public Feed Title" name="public_feed_title" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Please enter public feed title
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12 form-group">
                                        <input name="content" id="inp_htmlcode" type="hidden" />
                                        <label class="form-control-label">{{ __('Public Feed Content') }}</label>
                                        <div id="div_editor1" class="richtexteditor"  >
                                            {!! old('content', $feed->content) !!}    
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Public Feed Image</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-sm-12 form-group">
                                                    <label for="customFileGallery">Public Feed Images</label>
                                                    <div class="file-loading">
                                                        <input id="file-0b" type="file" class="file form-control required" name="images[]" accept="image/*" alt="Image" multiple="">
                                                    </div>
                                                    <!-- <p class="mt-2">Upload file </p> -->
                                                </div>
                                            </div>
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