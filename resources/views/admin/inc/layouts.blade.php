<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Admin Panel</title>
    <script src="{{asset('admin/vendor/pace/pace.min.js')}}"></script>
    <link href="{{asset('admin/vendor/pace/pace-theme-minimal.css')}}" rel="stylesheet"/>

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/animate.css/animate.css')}}">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="{{asset('admin/vendor/toastr/toastr.min.css')}}">
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{asset('admin/vendor/magnific-popup/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('admin/vendor/data-table/media/css/dataTables.bootstrap.min.css')}}">

    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('admin/stylesheets/css/style.css')}}">
    {{--toggle status--}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

</head>

<body>
<div class="wrap">
    <!-- page HEADER -->
    <!-- ========================================================= -->
    <div class="page-header">
        <!-- LEFTSIDE header -->
        <div class="leftside-header">
            <div class="logo">
                <a href="{{ route('dashboard') }}" class="on-click">
                    <h3 class="">Faz Group</h3>
                </a>
            </div>
            <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open"
                 data-target="html">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <!-- RIGHTSIDE header -->
        <div class="rightside-header">
            <div class="header-middle"></div>
            <!--SEARCH HEADERBOX-->
            <!--USER HEADERBOX -->
            <div class="header-section" id="user-headerbox">
                <div class="user-header-wrap">
                    <div class="user-photo">
                        <img alt="profile photo" src="/admin/images/avatar/avatar_user.jpg"/>
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ strstr(auth()->user()->name,' ',true) }}</span>
                        <span class="user-profile">Admin</span>
                    </div>
                    <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                    <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                </div>
                <div class="user-options dropdown-box">
                    <div class="drop-content basic">
                        <ul>
                            <li><a href=""><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                            <li><a href=""><i class="fa fa-lock" aria-hidden="true"></i> LogOut</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="header-separator"></div>
            <!--Log out -->
            <div class="header-section">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out log-out" aria-hidden="true"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body">
        <!-- LEFT SIDEBAR -->
        <!-- ========================================================= -->
        <div class="left-sidebar">
            <!-- left sidebar HEADER -->
            <div class="left-sidebar-header">
                <div class="left-sidebar-title">Navigation</div>
                <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs"
                     data-toggle-class="left-sidebar-collapsed" data-target="html">
                    <span></span>
                </div>
            </div>
            <!-- NAVIGATION -->
            <!-- ========================================================= -->
            <div id="left-nav" class="nano">
                <div class="nano-content">
                    <nav>
                        <ul class="nav nav-left-lines" id="main-nav">
                            <!--HOME-->
                            <li class=" {{ request()->routeIs('dashboard') ? 'active-item':'' }}"><a href="{{ route('dashboard') }}"><i class="fa fa-home"
                                                                                          aria-hidden="true"></i><span>Dashboard</span></a>
                            </li>
                            <!--UI ELEMENTENTS-->

                            <!--CHARTS-->
                            <li class="has-child-item close-item {{ request()->routeIs('brand.addBrand') ? 'open-item active-item':'' }} {{ request()->routeIs('brand.manageBrand') ? 'open-item active-item':'' }}">
                                <a><i class="fa fa-list" aria-hidden="true"></i><span>Brand</span> </a>
                                <ul class="nav child-nav level-1">
                                    <li class="{{ request()->routeIs('brand.addBrand') ? 'open-item':'' }}"><a href="{{ route('brand.addBrand') }}">Add Brand</a></li>
                                    <li class="{{ request()->routeIs('brand.manageBrand') ? 'open-item':'' }}"><a href="{{ route('brand.manageBrand') }}">Manage Brand</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- CONTENT -->
        <!-- ========================================================= -->
        <div class="content">
            @yield('content')
        </div>

        <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
    </div>
</div>

<!--  CM spinner  -->
<div class="cm-loader">
    <div class="cm-spinner"></div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="{{asset('admin/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/vendor/nano-scroller/nano-scroller.js')}}"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="{{asset('admin/javascripts/template-script.min.js')}}"></script>
<script src="{{asset('admin/javascripts/template-init.min.js')}}"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
<!--Notification msj-->
<script src="{{asset('admin/vendor/toastr/toastr.min.js')}}"></script>
<!--morris chart-->
<script src="{{asset('admin/vendor/chart-js/chart.min.js')}}"></script>
<!--Gallery with Magnific popup-->
<script src="{{asset('admin/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>


<script src="{{asset('admin/vendor/data-table/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/data-table/media/js/dataTables.bootstrap.min.js')}}"></script>
<!--Examples-->
<script src="{{asset('admin/javascripts/examples/tables/data-tables.js')}}"></script>
{{--toggle status--}}
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<!--Examples-->
<script src="{{asset('admin/javascripts/examples/dashboard.js')}}"></script>
</body>

</html>
