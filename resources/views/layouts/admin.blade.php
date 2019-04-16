<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRM App - @yield('title')</title>
    @include('inc.header')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/home',app()->getLocale())}}" class="nav-link">@lang('header.home')</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="@lang('header.search')" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout',app()->getLocale()) }}"
                       onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout',app()->getLocale()) }}" method="POST"
                          style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-language"></i>
                    <span class="badge badge-primary navbar-badge">2</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="/home/en" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="/dist/img/english_flag.png" alt="User Avatar" class="img-size-50 mr-3 ">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    <span class="float-right text-sm"></span>
                                </h3>
                                <p class="text-sm" >@lang('header.english')</p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-divider"></div>
                    <a href="/home/ro" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="/dist/img/flag_romania.png" alt="User Avatar" class="img-size-50 mr-3 ">
                            <div class="media-body" >
                                <h3 class="dropdown-item-title">
                                    <span class="float-right text-sm"></span>
                                </h3>
                                <p class="text-sm">@lang('header.romanian')</p>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{'home'),url(app()->getLocale()}}" class="brand-link">
            <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">CRM Laravel</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>
                                <i class="right fa fa-angle-left"></i>
                                @lang('header.home')
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/companies" class="nav-link">
                                    <i class="fas fa-warehouse"></i>
                                    <p>@lang('header.companies')</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/employees" class="nav-link">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>@lang('header.employees')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-envelope-o"></i>
                            <p>
                                @lang('header.mailbox')
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/mailbox/mailbox.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Inbox</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/mailbox/compose.html" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>@lang('header.compose')</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
               @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
@include('inc.footer')
</body>
</html>
