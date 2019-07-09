<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico') }}">

    <title>Adminto - Responsive Admin Dashboard Template</title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('') }}admin/plugins/morris/morris.css">

    <!-- App css -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/responsive.cs') }}s" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('admin/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/datatables/fixedHeader.bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/plugins/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Notification css (Toastr) -->
    <link href="{{ asset('admin/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />




    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="{{ asset('admin/js/modernizr.min.js') }}"></script>
    <!-- jQuery  -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/detect.js') }}"></script>
    <script src="{{ asset('admin/js/fastclick.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('admin/js/waves.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>    

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo"><span>Saga<span> Digital</span></span><i
                        class="zmdi zmdi-layers"></i></a>
            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">

                    <!-- Page title -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <button class="button-menu-mobile open-left">
                                <i class="zmdi zmdi-menu"></i>
                            </button>
                        </li>
                        <li>
                            <h4 class="page-title"></h4>
                        </li>
                    </ul>

                    <!-- Right(Notification and Searchbox -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <!-- Notification -->
                            <div class="notification-box">
                                <ul class="list-inline m-b-0">
                                    <li>
                                        <a href="javascript:void(0);" class="right-bar-toggle">
                                            <i class="zmdi zmdi-notifications-none"></i>
                                        </a>
                                        <div class="noti-dot">
                                            <span class="dot"></span>
                                            <span class="pulse"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Notification bar -->
                        </li>
                        <li class="hidden-xs">
                            <form role="search" class="app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>

                </div><!-- end container -->
            </div><!-- end navbar -->
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                <!-- User -->
                <div class="user-box">
                    <div class="user-img">
                        @if (Auth::user()->avatar)
                            @if (File::exists('images/'.Auth::user()->avatar))
                                @php
                                    $avatar = asset('images/'.Auth::user()->avatar);
                                @endphp
                            @else
                                @php
                                    $avatar = Auth::user()->avatar;
                                @endphp
                            @endif
                        @else
                            @php
                                $avatar = 'admin/images/users/avatar-1.jpg';
                            @endphp
                        @endif
                        <img src="{{ $avatar }}" alt="user-img" title="Mat Helme"
                            class="img-circle img-thumbnail img-responsive" style="max-height: 95px;">
                        <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                    </div>
                    <h5><a href="#">{{ Auth::user()->name }}</a> </h5>
                    <ul class="list-inline">
                        <li>
                            <a href="{{ route('profile') }}">
                                <i class="zmdi zmdi-settings"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="text-custom">
                                    {!! Form::open(['route' => 'logout']) !!}
                                    {!! Form::close() !!}
                                <i class="zmdi zmdi-power" onclick="javascript:$('form').submit();"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End User -->

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul>
                        <li class="text-muted menu-title">Menu</li>

                        <li>
                            <a href="{{ route('category.index') }}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span>
                                    Article Category </span> </a>
                        </li>

                        <li>
                            <a href="{{ route('article.index') }}" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i>
                                <span> Article </span> </a>
                        </li>
                        @if (Auth::user()->role()->first()->role == 'admin')
                        <li>
                            <a href="{{ route('user.index') }}" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i>
                                <span> Users List</span> </a>
                        </li>                            
                        @endif

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>

        </div>
        @yield('content')
    </div>
    <script>
        var resizefunc = [];

    </script>


    <!-- Datatables-->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.scroller.min.js') }}"></script>

    <!-- Toastr js -->
    <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>


    <!-- KNOB JS -->
    <!--[if IE]>
            <script type="text/javascript" src="{{ asset('') }}admin/plugins/jquery-knob/excanvas.js"></script>
            <![endif]-->
    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('admin/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/raphael/raphael-min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('admin/pages/jquery.dashboard.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin/js/jquery.core.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.app.js') }}"></script>

    <script>
        $('.datatable').dataTable();

        @if(Session::has('message'))
        var type = "{{ Session::get('status') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif

        @if(Session::has('errors'))
        $('.modal').modal({
            show: true
        });
        @endif

    </script>
</body>

</html>
