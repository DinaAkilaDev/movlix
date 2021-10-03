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
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-responsive-collapse">
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
                                    <a href="{{url('/admin')}}" class="text-uppercase">
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
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <h1>Intro table</h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{url('tables')}}">Tables</a>
                            </li>
                            <li class="active">Movie</li>
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
                    <div class="portlet-body form">

                        <div class="portlet box yellow">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Edit Intro
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form action="{{route('editintro')}}" method="post" class="form-horizontal">
                                    @csrf
                                    <div class="form-body">
                                        <div class="form-group">
                                            @if($errors->any())
                                                <h4 class="col-md-3 control-label" style="color: green;">{{$errors->first()}}</h4>
                                            @endif </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Image</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-image"></i>
                                                    </span>
                                                    <input type="text" name="image" value="{{$intros->image}}" class="form-control"
                                                           placeholder="Image Url">
                                                    <input type="hidden" name="id" value="{{$intros->id}}"  required>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">bio</label>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-file-movie-o"></i>
                                                    </span>
                                                    <input type="text" name="bio" value="{{$intros->bio}}" class="form-control"
                                                           placeholder="bio">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions fluid">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn green">Submit</button>
                                                <button type="button" class="btn default">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <p class="copyright"> 2021 &copy; Movlix
        </p>
        <a href="#index" class="go2top">
            <i class="icon-arrow-up"></i>
        </a>


        </body>
@endsection
