@extends('Merchant.layouts.layout')

@section('title', 'Dashboard')

@section('addcss')
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/datatables.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css")}}">
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{route('merchant.index')}}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Merchant</h4>
                        </div>
                        <div class="card-body">
                            {{$total_merchant}}
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{route('client.index')}}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Client</h4>
                        </div>
                        <div class="card-body">
                            {{$total_client}}
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{route('sub_admin.index')}}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sub Admin</h4>
                        </div>
                        <div class="card-body">
                            {{$total_subadmin}}
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{route('categories.index')}}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa fa-list-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Categories</h4>
                        </div>
                        <div class="card-body">
                            {{$total_categories}}
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{route('blog.index')}}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fab fa-blogger-b"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Blog</h4>
                        </div>
                        <div class="card-body">
                        {{$total_blog}}
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{route('public_feed.index')}}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-rss"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Public Feed</h4>
                        </div>
                        <div class="card-body">
                        {{$total_feed}}
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{route('language.index')}}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa fa-language"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Language</h4>
                        </div>
                        <div class="card-body">
                        {{$total_lan}}
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </section>
</div>

@endsection

@section('addjs')
<script src="{{asset("public/assets/modules/datatables/datatables.min.js")}}"></script>
<script src="{{asset("public/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("public/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js")}}"></script>
<script src="{{asset("public/assets/modules/jquery-ui/jquery-ui.min.js")}}"></script>
<script src="{{asset("public/assets/modules/chart.min.js")}}"></script>
<script type="text/javascript">
var controller_url = "{{route('dashboard')}}";
</script>

<script src="{{asset("public/assets/pages-js/dashboard/index.js")}}"></script>   
@endsection
