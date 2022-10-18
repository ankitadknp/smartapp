@extends('layouts.layout')

@section('addcss')
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
                        <form class="" id="custom_form" novalidate="" action="{{route("public_feed.update",$feed->public_feed_id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Public Feed Title</label>
                                        <input type="text" value="{{$feed->public_feed_title}}" placeholder="Public Feed Title" name="public_feed_title" class="form-control" required="">
                                        @if($errors->has('public_feed_title'))
                                            <div class="error">{{ $errors->first('public_feed_title') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="col-sm-12 form-group">
                                        <label class="form-control-label">{{ __('Public Feed Content') }}</label>
                                        <textarea class="ckeditor form-control" name="content">{{$feed->content}}</textarea>
                                        @if($errors->has('content'))
                                            <div class="error">{{ $errors->first('content') }}</div>
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
</script>


<!-- Editor Js-->
<script type="text/javascript" src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });

    // CKEDITOR.replace('content', {
    //     filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    //     filebrowserUploadMethod: 'form'
    // });
</script>
<!-- Editor Js End -->
@endsection