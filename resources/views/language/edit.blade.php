@extends('layouts.layout')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Language</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route('dashboard')}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route('language.index')}}">Language</a>
                </div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('errors.require')
                        <form class="" id="edit_user_form" novalidate="" action="{{route("language.update",$language->language_id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="col-sm-12">
                                <div class="row">
                         
                                    <div class="col-sm-6 form-group">
                                        <label>Language Name</label>
                                        <input type="text" value="{{$language->language_name}}" placeholder="Language Name" name="language_name" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Please enter login language name
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Language Code</label>
                                        <input type="text" value="{{$language->language_code}}" placeholder="Language Code" name="language_code" class="form-control" required="">
                                        <div class="invalid-feedback">
                                            Please enter language code
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{route('language.index')}}" class="btn btn-light">Cancel</a>
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
    var controller_url = "{{route('language.index')}}";
</script>

@endsection