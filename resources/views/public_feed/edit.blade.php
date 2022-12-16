@extends('layouts.layout')

@section('title', 'Public Feed')

@section('addcss')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Public Feed</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("public_feed.index")}}">Public Feed</a>
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
                                    <div class="col-sm-6 form-group">
                                        <label>Public Feed Title</label>
                                        <input type="text" value="{{$feed->public_feed_title}}" placeholder="Public Feed Title" name="public_feed_title" class="form-control" required="">
                                        @if($errors->has('public_feed_title'))
                                            <div class="error">{{ $errors->first('public_feed_title') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Public Feed Name(Arabic)</label>
                                        <input type="text" value="{{$feed->public_feed_title_ab}}" placeholder="Public Feed Name(Arabic)" name="public_feed_title_ab" class="form-control" required="">
                                        @if($errors->has('public_feed_title_ab'))
                                            <div class="error">{{ $errors->first('public_feed_title_ab') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Public Feed Name(Hebrew)</label>
                                        <input type="text" value="{{$feed->public_feed_title_he}}" placeholder="Public Feed Name(Hebrew)" name="public_feed_title_he" class="form-control" required="">
                                        @if($errors->has('public_feed_title_he'))
                                            <div class="error">{{ $errors->first('public_feed_title_he') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="form-control-label">{{ __('Public Feed Short Content') }}</label>
                                        <textarea class="form-control" name="short_content" placeholder="Public Feed Short Content">{{$feed->short_content}}</textarea>
                                        @if($errors->has('short_content'))
                                            <div class="error">{{ $errors->first('short_content') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="form-control-label" for="content_heading_text">Public Feed Short Content(Arabic)</label>
                                        <textarea class="form-control" name="short_content_ab" placeholder="Public Feed Short Content(Arabic)">{{$feed->short_content_ab}}</textarea>
                                        @if($errors->has('short_content_ab'))
                                            <div class="error">{{ $errors->first('short_content_ab') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label class="form-control-label" for="content_heading_text">Public Feed Short Content(Hebrew)</label>
                                        <textarea class="form-control" name="short_content_he" placeholder="Public Feed Short Content(Hebrew)">{{$feed->short_content_he}}</textarea>
                                        @if($errors->has('short_content_he'))
                                            <div class="error">{{ $errors->first('short_content_he') }}</div>
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
                                        <textarea class="form-control" name="ckeditor_ab" id="content_ab">{{$feed->content_ab}}</textarea>
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
                                            <input id="file-0b" type="file" class="file form-control required" name="images[]" accept="image/*|audio/*|video/*" alt="Image" multiple="">
                                        </div>
                                    </div>

                                    <div class="row pb-2 gallery_section_card col-sm-12 form-group">
                                        @if(!empty($feed_images))
                                        @foreach($feed_images as $gallery)
                                          <?php $ext = substr($gallery->image, strrpos($gallery->image, '.') + 1);
                                            if ($ext == 'mp4') { ?>
                                                <div class="avatar-item mb-0">
                                                        <video height="100" width="100" class="embed-responsive-item" controls>
                                                            <source src="{{$gallery->image}}" type="video/mp4">
                                                        </video>
                                                        <div class="avatar-badge delete_data_button" data-id="{{$gallery->public_feed_image_id }}" data-name="{{$gallery->image}}" title="" data-toggle="tooltip" data-original-title="Remove" style="cursor: pointer"><i class="fas fa-trash text-danger"></i></div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="avatar-item mb-0">
                                                    <img alt="image" src="{{$gallery->image}}" class="img-fluid" data-toggle="tooltip" title=""  style="width: 100px;height: 100px;">
                                                    <div class="avatar-badge delete_data_button" data-id="{{$gallery->public_feed_image_id }}" data-name="{{$gallery->image}}" title="" data-toggle="tooltip" data-original-title="Remove" style="cursor: pointer"><i class="fas fa-trash text-danger"></i></div>
                                                </div>
                                            <?php } ?>
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
<script type="text/javascript" src="{{asset("public/assets/js/plugins/ckeditor/ckeditor.js")}}"></script>
<!-- <script src="{{asset("public/assets/pages-js/publicfeed/edit.js")}}"></script> -->
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