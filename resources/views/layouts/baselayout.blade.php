<!DOCTYPE html>



<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>POS</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/favicon/apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/favicon/favicon-32x32.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/vendors.min.css') }}">
    <!-- END: VENDOR CSS-->

    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/css/themes/vertical-modern-menu-template/materialize.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/css/themes/vertical-modern-menu-template/style.css') }}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/custom/custom.css') }}">
    <!-- END: Custom CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/vendors.min.css') }}">

    {{--animations--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/animate-css/animate.css') }}">
    @yield('css')
</head>
<!-- END: Head-->
<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   "
      data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

<!-- BEGIN: Header-->
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible  navbar-dark gradient-45deg-indigo-purple no-shadow">
            <div class="nav-wrapper">
                <ul class="navbar-list right">
                    <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen"
                                                        href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a>
                    </li>
                    <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"
                           data-target="profile-dropdown"><span class="avatar-status avatar-online" ><img
                                        src="{{auth()->user()->image_path}}" class="circle" alt="avatar"><i></i></span></a>
                    </li>
                </ul>


                <!-- profile-dropdown-->
                <ul class="dropdown-content" id="profile-dropdown">

                    <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i>
                            Profile</a></li>

                    <li><a class="grey-text text-darken-1" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            <i class="material-icons">keyboard_tab</i>
                            Logout
                        </a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>


        </nav>
    </div>
</header>
<!-- END: Header-->
<ul class="display-none" id="default-search-main">
    <li class="auto-suggestion-title"><a class="collection-item" href="#">
            <h6 class="search-title">FILES</h6></a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="../../../app-assets/images/icon/pdf-image.png" width="24" height="30"
                                             alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                                class="black-text">Two new item submitted</span>
                        <small class="grey-text">Marketing Manager</small>
                    </div>
                </div>
                <div class="status">
                    <small class="grey-text">17kb</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="../../../app-assets/images/icon/doc-image.png" width="24" height="30"
                                             alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                                class="black-text">52 Doc file Generator</span>
                        <small class="grey-text">FontEnd Developer</small>
                    </div>
                </div>
                <div class="status">
                    <small class="grey-text">550kb</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="../../../app-assets/images/icon/xls-image.png" width="24" height="30"
                                             alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                                class="black-text">25 Xls File Uploaded</span>
                        <small class="grey-text">Digital Marketing Manager</small>
                    </div>
                </div>
                <div class="status">
                    <small class="grey-text">20kb</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="../../../app-assets/images/icon/jpg-image.png" width="24" height="30"
                                             alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span>
                        <small class="grey-text">Web Designer</small>
                    </div>
                </div>
                <div class="status">
                    <small class="grey-text">37kb</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion-title"><a class="collection-item" href="#">
            <h6 class="search-title">MEMBERS</h6></a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle" src="../../../app-assets/images/avatar/avatar-7.png"
                                             width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">John Doe</span>
                        <small class="grey-text">UI designer</small>
                    </div>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle" src="../../../app-assets/images/avatar/avatar-8.png"
                                             width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Michal Clark</span>
                        <small class="grey-text">FontEnd Developer</small>
                    </div>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle" src="../../../app-assets/images/avatar/avatar-10.png"
                                             width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Milena Gibson</span>
                        <small class="grey-text">Digital Marketing</small>
                    </div>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle" src="../../../app-assets/images/avatar/avatar-12.png"
                                             width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span>
                        <small class="grey-text">Web Designer</small>
                    </div>
                </div>
            </div>
        </a></li>
</ul>
<ul class="display-none" id="page-search-title">
    <li class="auto-suggestion-title"><a class="collection-item" href="#">
            <h6 class="search-title">PAGES</h6></a></li>
</ul>
<ul class="display-none" id="search-not-found">
    <li class="auto-suggestion"><a class="collection-item display-flex align-items-center" href="#"><span
                    class="material-icons">error_outline</span><span class="member-info">No results found.</span></a>
    </li>
</ul>


{{--side bar nav--}}
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{route('app.index')}}"><img
                        class="hide-on-med-and-down"
                        src="{{asset('app-assets/images/logo/materialize-logo-color.png')}}"
                        alt="materialize logo"/><img class="show-on-medium-and-down hide-on-med-and-up"
                                                     src="../../../app-assets/images/logo/materialize-logo.png"
                                                     alt="materialize logo"/><span
                        class="logo-text hide-on-med-and-down">Pos System</span></a><a class="navbar-toggler"
                                                                                       href="#"><i
                        class="material-icons">radio_button_checked</i></a></h1>
    </div>



    {{--links--}}
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
        data-menu="menu-navigation" data-collapsible="menu-accordion">

        {{--Dashboard--}}
        <li class="active bold"><a class="waves-effect waves-cyan active" href="{{route('app.index')}}"><i
                        class="material-icons">dashboard</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
        </li>

        {{--Employees--}}
        @if(auth()->user()->hasPermission('read_users'))
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i
                        class="material-icons">people</i><span class="menu-title">Employés</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="{{route('users.index')}}"><i class="material-icons">radio_button_unchecked</i><span>Liste Des Employés</span></a>
                    </li>

                    @if(auth()->user()->hasRole('super_admin'))
                    <li><a href="{{route('users.roles.index')}}"><i
                                    class="material-icons">radio_button_unchecked</i><span>Liste Des Rôles</span></a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif

        {{--products--}}
        @if(auth()->user()->hasPermission('read_products'))
        <li class="bold"><a class="waves-effect waves-cyan " href="{{route('categories.index')}}"><i
                        class="material-icons">apps</i><span class="menu-title" data-i18n="Dashboard">Catégories</span></a>
        </li>
        @endif

        {{--categories--}}
        @if(auth()->user()->hasPermission('read_categories'))
            <li class="bold"><a class="waves-effect waves-cyan " href="{{route('products.index')}}"><i
                            class="material-icons">reorder</i><span class="menu-title" data-i18n="Dashboard">Produits</span></a>
            </li>
        @endif

        {{--clients--}}
        @if(auth()->user()->hasPermission('read_clients'))
            <li class="bold"><a class="waves-effect waves-cyan " href="{{route('clients.index')}}"><i
                            class="material-icons">apps</i><span class="menu-title" data-i18n="Dashboard">Clients</span></a>
            </li>
        @endif

        @if(auth()->user()->hasPermission('read_orders'))
            <li class="bold"><a class="waves-effect waves-cyan " href="{{route('clients.orders.index')}}"><i
                            class="material-icons">apps</i><span class="menu-title" data-i18n="Dashboard">Commandes</span></a>
            </li>
        @endif
    </ul>

    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
       href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
{{--end side bar nav--}}



<!-- BEGIN: Page Main-->
<div id="main">
    @include('sweetalert::alert')
    @yield('content')
</div>
<!-- END: Page Main-->


<!-- BEGIN VENDOR JS-->
<script src=" {{ asset('app-assets/js/vendors.min.js')}}"></script>
<!-- BEGIN VENDOR JS-->


<!-- BEGIN THEME  JS-->
<script src=" {{ asset('app-assets/js/plugins.js')}}"></script>
<script src=" {{ asset('app-assets/js/search.js')}} "></script>
<script src=" {{ asset('app-assets/js/custom/custom-script.js') }}"></script>
<!-- END THEME  JS-->

<!-- BEGIN PAGE LEVEL JS-->




{{--forms--}}
<script src="{{ asset('app-assets/js/scripts/form-elements.js') }}"></script>
<script src="{{asset('app-assets/vendors/formatter/jquery.formatter.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/form-masks.js') }}"></script>
<script src="{{ asset('app-assets/vendors/noUiSlider/nouislider.js')}}"></script>
<!-- END PAGE LEVEL JS-->

{{--animations--}}
<script src="{{ asset('app-assets/js/scripts/css-animation.js') }}"></script>
@yield('js')
</body>
</html>