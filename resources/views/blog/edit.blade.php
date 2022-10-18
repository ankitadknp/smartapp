@extends('layouts.layout')

@section('title', 'Blog')

@section('addcss')
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Blog</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("blog.index")}}">Blog</a>
                </div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="" id="edit_user_form" novalidate="" action="{{route("blog.update",$blog->blog_id )}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Category</label>
                                        <select name="category" id="category_id" class="form-control select1" required="">
                                            <option value="" data-type="">Select Category</option>
                                            @foreach($all_avilable_category as $cat)
                                                @if($blog->category_id == $cat->category_id)
                                                <option value="{{$cat->category_id}}" selected="">{{$cat->category_name}}</option>
                                                @else
                                                <option value="{{$cat->category_id }}" >{{$cat->category_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('category'))
                                            <div class="error">{{ $errors->first('category') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Blog Title</label>
                                        <input type="text" value="{{$blog->blog_title}}" placeholder="Blog Title" name="blog_title" class="form-control" required="">
                                        @if($errors->has('blog_title'))
                                            <div class="error">{{ $errors->first('blog_title') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Blog Title(Arabic)</label>
                                        <input type="blog_title" value="{{$blog->blog_title_ab}}"placeholder="Blog Title(Arabic)" name="blog_title_ab" class="form-control" required="">
                                        @if($errors->has('blog_title_ab'))
                                            <div class="error">{{ $errors->first('blog_title_ab') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Blog Title(Hebrew)</label>
                                        <input type="blog_title" value="{{$blog->blog_title_he}}" placeholder="Blog Title(Hebrew)" name="blog_title_he" class="form-control" required="">
                                        @if($errors->has('blog_title_he'))
                                            <div class="error">{{ $errors->first('blog_title_he') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-sm-12 form-group">
                                        <label class="form-control-label">{{ __('Blog Content') }}</label>
                                        <textarea class="form-control" name="blog_content" id="ckeditor">{{$blog->blog_content}}</textarea>
                                        @if($errors->has('blog_content'))
                                            <div class="error">{{ $errors->first('blog_content') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label class="form-control-label" for="blog_content_heading_text">Blog Content(Arabic)</label>
                                        <textarea class="form-control" id="ckeditor_ab" name="blog_content_ab">{{$blog->blog_content_ab}}</textarea>
                                        @if($errors->has('blog_content_ab'))
                                            <div class="error">{{ $errors->first('blog_content_ab') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label class="form-control-label" for="blog_content_heading_text">Blog Content(Hebrew)</label>
                                        <textarea class="form-control"  id="ckeditor_he" name="blog_content_he">{{$blog->blog_content_he}}</textarea>
                                        @if($errors->has('blog_content_he'))
                                            <div class="error">{{ $errors->first('blog_content_he') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{route("blog.index")}}" class="btn btn-light">Cancel</a>
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
    var controller_url = "{{route('blog.index')}}";
</script>

<script src="{{asset("public/assets/pages-js/blog/add_edit.js")}}"></script>

<!-- Editor Js-->
<script type="text/javascript" src="{{asset("public/assets/js/plugins/ckeditor/ckeditor.js")}}"></script>
<script>
   CKEDITOR.replace('ckeditor_he', {
        filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('ckeditor_ab', {
        filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
        contentsLangDirection: "rtl"
    });
    CKEDITOR.replace('ckeditor', {
        filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form',
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