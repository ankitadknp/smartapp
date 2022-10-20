@extends('layouts.main')

@section('sidebar')
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route("dashboard")}}">
                <img src="{{asset("public/assets/images/logo.png")}}" alt="logo" class="img-fluid" style="height: 55px">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route("dashboard")}}"><img src="{{asset("public/assets/images/logo.png")}}" alt="logo" class="img-fluid" style="width: 52px;min-height: 30px;"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="{{ request()->is('blog') || request()->is('blog/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('blog.index')}}">
                <i class="fab fa-blogger-b"></i><span>Blog</span>
                </a>
            </li>
            
            <li class="{{ request()->is('categories') || request()->is('categories/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <i class="fa fa-list-alt"></i><span>Categories</span>
                </a>
            </li>

            <li class="{{ request()->is('public_feed') || request()->is('public_feed/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('public_feed.index')}}">
                    <i class="fa fa-rss"></i><span>Public Feed</span>
                </a>
            </li>

            <li class="{{ request()->is('sub_admin') || request()->is('sub_admin/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('sub_admin.index')}}">
                    <i class="fas fa-users"></i><span>Sub Admin</span>
                </a>
            </li>

            <li class="{{ request()->is('merchant') || request()->is('merchant/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('merchant.index')}}">
                    <i class="fas fa-users"></i><span>Merchant</span>
                </a>
            </li>

            <li class="{{ request()->is('client') || request()->is('client/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('client.index')}}">
                    <i class="fas fa-users"></i><span>Client</span>
                </a>
            </li>

            <li class="{{ request()->is('coupons-qr') || request()->is('coupons-qr/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('coupons-qr.index')}}">
                    <i class="fas fa-qrcode"></i><span>Coupons QR Code</span>
                </a>
            </li>

            {{-- <li class="{{ request()->is('smart-debit-card') || request()->is('smart-debit-card/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('smart-debit-card.index')}}">
                    <i class="fas fa-qrcode"></i><span>Smart Debit Card</span>
                </a>
            </li> --}}

            <li class="{{ request()->is('language') || request()->is('language/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('language.index')}}">
                    <i class="fa fa-language"></i><span>Language</span>
                </a>
            </li>

        </ul>
    </aside>
</div>
@endsection
