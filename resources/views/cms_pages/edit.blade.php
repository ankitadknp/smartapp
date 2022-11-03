@extends('layouts.layout')

@section('title', 'CMS Pages')

@section('addcss')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit CMS Pages</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("cms_pages.index")}}">CMS Pages</a>
                </div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="" id="edit_cms_form" novalidate="" action="{{route("cms_pages.store")}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$cms->id}}">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label>CMS Pages Title</label>
                                    <input type="text" id="c_title" placeholder="CMS Pages Title" name="title" class="form-control" required="" value="{{$cms->title}}">
                                    @if($errors->has('title'))
                                        <div class="error">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label>CMS Pages Title(Arabic)</label>
                                    <input type="text" id="title_ab" placeholder="CMS Pages Title(Arabic)" name="title_ab" class="form-control" required="" value="{{$cms->title_ab}}">
                                    @if($errors->has('title_ab'))
                                        <div class="error">{{ $errors->first('title_ab') }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label>CMS Pages Title(Hebrew)</label>
                                    <input type="text" id="title_he" placeholder="CMS Pages Title(Hebrew)" name="title_he" class="form-control" required="" value="{{$cms->title_he}}">
                                    @if($errors->has('title_he'))
                                        <div class="error">{{ $errors->first('title_he') }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label class="form-control-label" for="content">CMS Pages Content</label>
                                    <textarea class="form-control" name="content"  id="content">{{$cms->content}}</textarea>
                                    @if($errors->has('content'))
                                        <div class="error">{{ $errors->first('content') }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label class="form-control-label" for="content_ab">CMS Pages Content(Arabic)</label>
                                    <textarea class="form-control" name="content_ab"  id="content_ab" >{{$cms->content_ab}}</textarea>
                                    @if($errors->has('content_ab'))
                                        <div class="error">{{ $errors->first('content_ab') }}</div>
                                    @endif
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label class="form-control-label" for="content_he">CMS Pages Content(Hebrew)</label>
                                    <textarea class="form-control"  id="content_he" name="content_he">{{$cms->content_he}}</textarea>
                                    @if($errors->has('content_he'))
                                        <div class="error">{{ $errors->first('content_he') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{route("cms_pages.index")}}" class="btn btn-light">Cancel</a>
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
<!-- Editor Js-->
<script type="text/javascript" src="{{asset("public/assets/js/plugins/ckeditor/ckeditor.js")}}"></script>
<script>
    CKEDITOR.replace('content_he', {
        removeButtons: 'Image'
    });
    CKEDITOR.replace('content_ab', {
        removeButtons: 'Image'
    });
    CKEDITOR.replace('content', {
        removeButtons: 'Image'
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
@endsection