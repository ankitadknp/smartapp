@extends('MerchantApp.layouts.layout')

@section('title', 'Coupon')

@section('addcss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Apply Coupon</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("merchantapp.dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Apply Coupon</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                   
                        <form class=""  novalidate="" action="{{route("merchantapp.apply_coupon.store")}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>User</label>
                                        <input class="typeahead form-control select_user" type="text"  placeholder="User" id="user" name="user">
                                        <input  type="hidden" name="user_id"  id="user_id">
                                        @if($errors->has('user'))
                                            <div class="error">{{ $errors->first('user') }}</div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Coupon</label>
                                        <input class="typeahead form-control select_coupon" type="text" name="coupon" placeholder="Coupon" id="coupon">
                                        <input  type="hidden" name="coupon_id"  id="coupon_id">
                                        @if($errors->has('coupon'))
                                            <div class="error">{{ $errors->first('coupon') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Apply</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
    var user_url = "{{ route('merchantapp.autocomplete_user') }}";
    var coupon_url = "{{ route('merchantapp.autocomplete_coupon') }}";
</script>
<script src="{{asset("public/assets/pages-js/merchant-app/coupon/add.js")}}"></script>
@endsection