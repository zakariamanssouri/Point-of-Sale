<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>Pos System</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{ asset('assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{ asset('assets/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('dist/css/pages/dashboard1.css') }}" rel="stylesheet">


    <link href="{{ asset('assets/node_modules/wizard/steps.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


    <![endif]-->


</head>

<body class="skin-default fixed-layout">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Pos System</p>
    </div>
</div>


<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">


            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon --><b>
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo"/>
                        <!-- Light Logo icon -->
                        <img src="{{ asset('assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo"/>
                    </b>
                    <!--End Logo icon -->


                    <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{ asset('app-assets') }}" alt="homepage" class="dark-logo"/>
                        <!-- Light Logo text -->
                         <img src="{{ asset('assets/images/logo-light-text.png') }}" class="light-logo" alt="homepage"/></span>
                </a>
            </div>
            <!-- End Logo -->

            <div class="navbar-collapse">

                <!-- toggle and nav items -->
                <ul class="navbar-nav mr-auto">
                    <!-- This is  -->
                    <li class="nav-item"><a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                                            href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                    <li class="nav-item"><a
                                class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                                href="javascript:void(0)"><i class="icon-menu"></i></a></li>
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <li class="nav-item">
                        <form class="app-search d-none d-md-block d-lg-block">
                            <input type="text" class="form-control" placeholder="Search & enter">
                        </form>
                    </li>
                </ul>

                <!-- User profile and search -->
                <ul class="navbar-nav my-lg-0">


                    <!-- Comment -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                            <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                            <ul>
                                <li>
                                    <div class="drop-title">Notifications</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Luanch Admin</h5> <span
                                                        class="mail-desc">Just see the my new admin!</span> <span
                                                        class="time">9:30 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span>
                                                <span class="time">9:10 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span>
                                                <span class="time">9:08 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span
                                                        class="mail-desc">Just see the my admin!</span> <span
                                                        class="time">9:02 AM</span></div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all
                                            notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- End Comment -->


                    <!-- Messages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>
                            <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                        </a>
                        <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                            <ul>
                                <li>
                                    <div class="drop-title">You have 4 new messages</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"><img src="{{ asset('assets/images/users/1.jpg') }}" alt="user"
                                                                       class="img-circle"> <span
                                                        class="profile-status online pull-right"></span></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span
                                                        class="mail-desc">Just see the my admin!</span> <span
                                                        class="time">9:30 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"><img src="{{ asset('assets/images/users/2.jpg') }}" alt="user"
                                                                       class="img-circle"> <span
                                                        class="profile-status busy pull-right"></span></div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span
                                                        class="mail-desc">I've sung a song! See you at</span> <span
                                                        class="time">9:10 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"><img src="{{ asset('assets/images/users/3.jpg') }}" alt="user"
                                                                       class="img-circle"> <span
                                                        class="profile-status away pull-right"></span></div>
                                            <div class="mail-contnet">
                                                <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span
                                                        class="time">9:08 AM</span></div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"><img src="{{ asset('assets/images/users/4.jpg') }}" alt="user"
                                                                       class="img-circle"> <span
                                                        class="profile-status offline pull-right"></span></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span
                                                        class="mail-desc">Just see the my admin!</span> <span
                                                        class="time">9:02 AM</span></div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all
                                            e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- End Messages -->

                    <!-- User Profile -->
                    <li class="nav-item dropdown u-pro">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="{{ asset('assets/images/users/1.jpg') }}" alt="user" class=""> <span
                                    class="hidden-md-down">{{auth()->user()->first_name . " " . auth()->user()->last_name}} <i class="fa fa-angle-down"></i></span> </a>
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account
                                Setting</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="pages-login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            <!-- text-->
                        </div>
                    </li>
                    <!-- End User Profile -->

                    <li class="nav-item right-side-toggle"><a class="nav-link  waves-effect waves-light"
                                                              href="javascript:void(0)"><i class="ti-settings"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- End Topbar header -->


    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="user-pro"><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                            aria-expanded="false"><img src="{{ asset('assets/images/users/1.jpg') }}"
                                                                       alt="user-img" class="img-circle"><span
                                    class="hide-menu font-weight-bold">{{auth()->user()->first_name . " " . auth()->user()->last_name}}</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>

                    {{--dashboard--}}
                    <li>
                        <a class=" waves-effect waves-dark" href="{{route('app.index')}}" aria-expanded="false">
                            <i class="icon-speedometer"></i>
                            <span class="hide-menu">Dashboard </span></a>
                    </li>

                    {{--employés--}}
                   @if(auth()->user()->hasPermission('read_users'))
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                        class="icon-speedometer"></i><span class="hide-menu">Employés</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('users.index')}}">Liste des employés </a></li>
                                <li><a href="{{route('users.roles.index')}}">Rôles </a></li>
                            </ul>
                        </li>
                    @endif

                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>

    {{--Right Side bar--}}
    <div class="right-sidebar">
        <div class="slimscrollright">
            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span></div>
            <div class="r-panel-body">
                <ul id="themecolors" class="m-t-20">
                    <li><b>With Light sidebar</b></li>
                    <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme working">1</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                    <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                    <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a>
                    </li>
                    <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                </ul>
                <ul class="m-t-20 chatonline">
                    <li><b>Chat option</b></li>
                    <li>
                        <a href="javascript:void(0)"><img src="{{asset('assets/images/users/1.jpg')}}" alt="user-img"
                                                          class="img-circle"> <span>Varun Dhavan <small
                                        class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="{{asset('assets/images/users/2.jpg')}}" alt="user-img"
                                                          class="img-circle"> <span>Genelia Deshmukh <small
                                        class="text-warning">Away</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/users/3.jpg') }}" alt="user-img"
                                                          class="img-circle"> <span>Ritesh Deshmukh <small
                                        class="text-danger">Busy</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/users/4.jpg') }}" alt="user-img"
                                                          class="img-circle"> <span>Arijit Sinh <small
                                        class="text-muted">Offline</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/users/5.jpg') }}" alt="user-img"
                                                          class="img-circle"> <span>Govinda Star <small
                                        class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/users/6.jpg') }}" alt="user-img"
                                                          class="img-circle"> <span>John Abraham<small
                                        class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/users/7.jpg') }}" alt="user-img"
                                                          class="img-circle"> <span>Hritik Roshan<small
                                        class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('assets/images/users/8.jpg') }}" alt="user-img"
                                                          class="img-circle"> <span>Pwandeep rajan <small
                                        class="text-success">online</small></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="page-wrapper" style="min-height: 543px">
        {{--content--}}
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>


    <!-- footer -->
    <footer class="footer">
        © 2019 Eliteadmin by themedesigner.in
    </footer>
    <!-- End footer -->


</div>
<!-- End Wrapper -->


<!-- All Jquery -->
<script src=" {{ asset('assets/node_modules/jquery/jquery-3.2.1.min.js') }} "></script>

<!-- Bootstrap popper Core JavaScript -->
<script src="{{ asset('assets/node_modules/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dist/js/custom.min.js') }}"></script>


<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{ asset('assets/node_modules/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('assets/node_modules/morrisjs/morris.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Popup message jquery -->
<script src="{{ asset('assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>
<!-- Chart JS -->
<script src="{{asset('dist/js/dashboard1.js')}}"></script>
<script src="{{asset('assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>

    <script type="text/javascript">
        type = "text/javascript" >
            $('#search').on('keyup', function () {
                $value = $(this).val();
                console.log($value);
                $.ajax({
                    type: 'get',
                    url: '{{route('users.index')}}',
                    data: {'search': $value},
                    success: function (data) {
                        console.log(data);
                    }
                });
            });
    </script>
{{--used for notifications--}}
@include('sweetalert::alert')
</body>
</html>