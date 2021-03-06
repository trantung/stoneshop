<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin @yield('title')</title>
    @if (preg_match('/ipad/i', Request::server('HTTP_USER_AGENT')))
    <meta name="viewport" content="width=1024, maximum-scale=1, user-scalable=0">
    @else
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @endif
    <!-- bootstrap 3.0.2 -->
    <link href="{{ asset('public/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    {{-- add site css --}}
    <link href="{{ asset('public/css/site.css') }}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset('public/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('public/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('public/css/customize.css') }}" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="{{ url('public/css/bootstrap-datepicker.css') }}">
    
    <link rel="stylesheet" href="{{ url('public/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ url('public/ckeditor/samples/css/samples.css')}}">
     <script type="text/javascript" src="{{ url('public/js/jquery.js') }}"></script>
     <script src="{{ url('public/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ url('public/ckeditor/samples/js/sample.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=places" style=""></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        @yield('opening')
    </head> 
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a class="logo" href="#"> StoneShop </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                              <span>{{$username}} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('get.editprofile') }}" class="btn btn-default btn-flat">{{$title = 'Profile'}}</a>
                                <li>
                                    <a href="{{ route('get.changepassword') }}" class="btn btn-default btn-flat">{{$title = 'Change Password'}}</a>
                                </li>
                                <li>
                                    <a href="{{ route('get.logout') }}" class="btn btn-default btn-flat">{{$title = 'Logout'}}</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>{{ link_to_route('get.admin.index', $title = 'Dashboard') }}</li>
                        <li>{{ link_to_route('category.index', $title = 'Manage Category') }}</li>
                        {{-- <li>{{ link_to_route('category.index', $title = 'Manage Sub-Category') }}</li> --}}
                        <li>{{ link_to_route('product.index', $title = 'Manage Product') }}</li>
                        <li>{{ link_to_route('shop.index', $title = 'Manage Shop') }}</li>
                        <li>{{ link_to_route('image.index', $title = 'Manage Image Header') }}</li>
                        <li>{{ link_to_route('blog.index', $title = 'Manager Blog') }}</li>
                    </ul>
                </section>
                        <!-- /.sidebar -->
                    </aside>

                    <!-- Right side column. Contains the navbar and content of the page -->
                    <aside class="right-side">
                        <!-- Main content -->
                        <section class="content">
                            <div class="row">
                                <div id="page-wrapper">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" style="color:red">{{ Session::get('message') }}</div>
                                    @endif

                                    @if($errors->has())
                                        <div class="alert alert-success">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }} <br>
                                        @endforeach
                                        </div>
                                    @endif
                                </div>
                                @yield('content')
                            </div>
                        </section><!-- /.content -->
                    </aside><!-- /.right-side -->
                </div><!-- ./wrapper -->

                <!-- add new calendar event modal -->


                <!-- jQuery 2.0.2 -->
                <script src="{{ asset('public/js/jquery.min.js') }}" type="text/javascript"></script>
                <!-- jQuery UI 1.10.3 -->
                <script src="{{ asset('public/js/jquery-ui-1.10.3.min.js') }}" type="text/javascript"></script>
                <!-- Bootstrap -->
                <script src="{{ asset('public/js/bootstrap.min.js') }}" type="text/javascript"></script>
                <!-- AdminLTE App -->
                <script src="{{ asset('public/js/AdminLTE/app.js') }}" type="text/javascript"></script>

                <script src="{{ asset('public/js/common.js') }}" type="text/javascript"></script>

                <script src="{{ asset('public/js/admin.js') }}" type="text/javascript"></script>
  
                <script type="text/javascript" src="{{ url('js/jquery.timepicker.js') }}"></script>
  
                <script type="text/javascript" src="{{ url('js/bootstrap-datepicker.js') }}"></script>
                
                @yield('closing')
                
                <script>
                $(function() {
                    $('html').triggerHandler('refresh');
                });
                </script>
                
            </body>
            </html>