@extends('MerchantApp.layouts.main')

@section('sidebar')
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route("dashboard")}}">
                <img src="{{asset("public/assets/images/smart_logo.png")}}" alt="logo" class="img-fluid" style="height: 55px">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route("dashboard")}}"><img src="{{asset("public/assets/images/smart_logo.png")}}" alt="logo" class="img-fluid" style="width: 52px;min-height: 30px;"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->is('merchantapp/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('merchantapp.dashboard')}}">
                    <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="{{ request()->is('merchantapp/apply_coupon') || request()->is('merchantapp/apply_coupon/*')? 'active' : '' }}">
                <a class="nav-link" href="{{route('merchantapp.apply_coupon.create')}}">
                    <i class="fa fa-gift"></i><span>Coupon Redeem</span>
                </a>
            </li>

        </ul>
    </aside>
</div>
@endsection
