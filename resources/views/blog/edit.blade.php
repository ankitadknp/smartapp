@extends('layouts.layout')

@section('addcss')
<link rel="stylesheet" href="https://richtexteditor.com/richtexteditor/rte_theme_default.css" />
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
                        @include('errors.require')
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
                                        <div class="invalid-feedback">
                                            Please select category
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Blog Title</label>
                                        <input type="text" value="{{$blog->blog_title}}" placeholder="Blog Title" name="blog_title" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Please enter Blog Title
                                        </div>
                                    </div>

                                    <input name="blog_content" id="inp_htmlcode" type="hidden" />
                                    <label class="form-control-label">{{ __('Blog Content') }}</label>
                                    <div id="div_editor1" class="richtexteditor"  >
                                        {!! old('blog_content', $blog->blog_content) !!}    
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