@extends('layouts.auth')

@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
    @endif

            <body class="page-header-fixed page-sidebar-closed-hide-logo">
            <!-- BEGIN CONTAINER -->
            <div class="wrapper">
                <!-- BEGIN HEADER -->
                <header class="page-header">
                    <nav class="navbar mega-menu" role="navigation">
                        <div class="container-fluid">
                            <div class="clearfix navbar-fixed-top">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="toggle-icon">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </span>
                                </button>
                                <a id="index" class="page-logo" href="{{url('/')}}">
                                    <img src="{{asset('../assets/pages/img/Path 1420.png')}}" alt="Logo"> </a>
                                <div class="topbar-actions">
                                    <div class="btn-group-img btn-group">
                                        <button type="button" class="btn btn-sm md-skip dropdown-toggle"
                                                data-toggle="dropdown" data-hover="dropdown"
                                                data-close-others="true">
                                            <span>{{auth()->user()->name}}</span>
                                            <img src="../assets/layouts/layout5/img/avatar1.jpg" alt="">
                                        </button>
                                    </div>
                                    <button type="button" class="quick-sidebar-toggler md-skip" onclick="$('#logoutFrm').submit()"
                                            data-toggle="collapse">
                                        <span class="sr-only">Toggle Quick Sidebar</span>
                                        <i class="icon-logout"></i>
                                    </button>

                                    <form method="POST" action="{{url('logout')}}" id="logoutFrm">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown dropdown-fw dropdown-fw-disabled  ">
                                        <a href="{{url('admin')}}" class="text-uppercase">
                                            <i class="icon-home"></i> Dashboard </a>
                                    </li>
                                    <li class="dropdown dropdown-fw dropdown-fw-disabled  active open selected">
                                        <a href="{{url('tables')}}" class="text-uppercase">
                                            <i class="icon-briefcase"></i> Tables </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
                <div class="container-fluid">
                    <div class="page-content">
                        <div class="breadcrumbs">
                            <h1>Editable Datatables</h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{url('/')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{url('tables')}}" class="active">Tables</a>
                                </li>
                            </ol>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-sidebar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                            </button>
                        </div>
                        <div class="page-content-container">
                            <div class="page-content-row">
                                <div class="page-sidebar">
                                    <nav class="navbar" role="navigation">
                                        <ul class="nav navbar-nav margin-bottom-35">
                                            <li>
                                                <a href="{{url('admin/users')}}">
                                                    <i class="icon-user"></i> 	Users </a>
                                            </li>
                                            <li>
                                                <a href="{{url('admin/favorites')}}">
                                                    <i class="icon-heart "></i> 	Favorites </a>
                                            </li>
                                            <li>
                                                <a href="{{url('admin/intros')}}">
                                                    <i class="icon-fire "></i> Intros </a>
                                            </li>
                                            <li>
                                                <a href="{{url('admin/movies')}}">
                                                    <i class="icon-film "></i> Movies </a>
                                            </li>
                                            <li>
                                                <a href="{{url('admin/reviews')}}">
                                                    <i class="icon-star"></i> Reviews </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                    <p class="copyright"> 2021 &copy; Movlix

                    </p>
                    <a href="#index" class="go2top">
                        <i class="icon-arrow-up"></i>
                    </a>
                </div>
            </div>



            </body>
@endsection
