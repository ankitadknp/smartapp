@extends('layouts.layout')
@section('title', 'Coupons Management')
@section('addcss')
<link rel="stylesheet" href="{{asset("public/css/style.css")}}">
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Coupons Details</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{route("dashboard")}}">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{route("coupons-qr.index")}}">Coupons Management</a>
                </div>
                <div class="breadcrumb-item">Details</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Merchant Name</label> : {{ $coupons->business_name }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Coupon Title</label> : {{ $coupons->coupon_title }}
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Coupon Code</label> : {{ $coupons->coupon_code }} 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Discount Amount</label> : {{ $coupons->discount_amount }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Discount Type</label> : {{ $coupons->discount_type }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Coupon Expiry Date</label> : {{ $coupons->expiry_date }} 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Location</label> : {{ $coupons->city_area }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>MyCouponList Total Coupons</label> : {{ $total_add }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Total Used Coupon</label> : {{ $total_use }} 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Total Share Coupons</label> : {{ $total_share }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Total Coupons Share By Whatsapp</label> : {{ $total_whatsapp }} 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Total Coupons Share By Email</label> : {{ $total_email }} 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Business Logo</label> : <img src="{{ $coupons->business_logo }}" height="35" width="35"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 coupon_back">
                        <a href="{{route("coupons-qr.index")}}" class="float-right btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection