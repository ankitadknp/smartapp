@extends('layouts.layout')

@section('title', 'Public Feed')

@section('addcss')
<style>
    .avatar-item {
        margin-left: 5px
    }
</style>
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
                                        <label>Public Feed Name(Arabic)</label>
                                        <input type="text" value="{{$feed->public_feed_title_ab}}" placeholder="Public Feed Name(Arabic)" name="public_feed_title_ab" class="form-control" required="">
                                        @if($errors->has('public_feed_title_ab'))
                                            <div class="error">{{ $errors->first('public_feed_title_ab') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Public Feed Name(Hebrew)</label>
                                        <input type="text" value="{{$feed->public_feed_title_he}}" placeholder="Public Feed Name(Hebrew)" name="public_feed_title_he" class="form-control" required="">
                                        @if($errors->has('public_feed_title_he'))
                                            <div class="error">{{ $errors->first('public_feed_title_he') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="col-sm-12 form-group">
                                        <label class="form-control-label">{{ __('Public Feed Content') }}</label>
                                        <textarea class="form-control" name="content" id="ckeditor">{{$feed->content}}</textarea>
                                        @if($errors->has('content'))
                                            <div class="error">{{ $errors->first('content') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label class="form-control-label" for="content_heading_text">Public Feed Content(Arabic)</label>
                                        <textarea class="form-control" id="ckeditor_ab" name="content_ab">{{$feed->content_ab}}</textarea>
                                        @if($errors->has('content_ab'))
                                            <div class="error">{{ $errors->first('content_ab') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label class="form-control-label" for="content_heading_text">Public Feed Content(Hebrew)</label>
                                        <textarea class="form-control" name="content_he" id="ckeditor_he">{{$feed->content_he}}</textarea>
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

                                    <div class="row pb-2 gallery_section_card col-sm-12 form-group">
                                        @if(!empty($feed_images))
                                        @foreach($feed_images as $gallery)
                                            <div class="avatar-item mb-0">
                                                <img alt="image" src="{{$gallery->image}}" class="img-fluid" data-toggle="tooltip" title=""  style="width: 100px;height: 100px;">
                                                <div class="avatar-badge delete_data_button" data-id="{{$gallery->public_feed_image_id }}" data-name="{{$gallery->image}}" title="" data-toggle="tooltip" data-original-title="Remove" style="cursor: pointer"><i class="fas fa-trash text-danger"></i></div>
                                            </div>
                                        @endforeach
                                        @endif
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
     //delete image
     jQuery(document).on('click', '.delete_data_button', function () 
    {
        var result = confirm("Are you sure you want to remove this Image ?");
        if (result) {
            var id = jQuery(this).attr('data-id');
            jQuery.ajax({
                "url": controller_url + '/image_delete',
                type: "POST",
                data: {
                    'id': id,
                },
                dataType: 'json',
                cache: false,
                success: function (response) {
                    if (response.success == true) {
                        // iziToast.success({
                        //         message: response.message,
                        //         position: 'topRight'
                        //     });
                        location.reload();

                    } else {
                        setTimeout(function () {
                            iziToast.error({
                                message: response.message,
                                position: 'topRight'
                            });
                        });
                    }
                }
            })
        }
    });
   
 
</script>
<!-- Editor Js End -->
@endsection