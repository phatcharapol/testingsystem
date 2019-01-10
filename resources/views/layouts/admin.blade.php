<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="Admin Panel">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link href="{{asset('css/core.css')}}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css"> --}}


    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="css/style.css"> --}}

    {{-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> --}}

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{asset('images/admin/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('images/admin/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route('admin')}}"> <i class="menu-icon fa fa-dashboard"></i>DashBoard </a>
                    </li>
                     @if(Auth::user()->isAdmin())
                    <h3 class="menu-title">User</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Manage User</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{route('admin.user.index')}}">CRUD Admin</a></li>
                        </ul>
                    </li>
                    @endif
                    
                    @if(Auth::user()->isAdmin() || Auth::user()->isTeacher())
                    <h3 class="menu-title">Test</h3><!-- /.menu-title -->
                    <li>
                         <a href="{{route('test.subject.index')}}"> <i class="menu-icon fa fa-dashboard"></i>Manage Test </a>
                    </li>
                    @endif
                  {{--   <li class="menu-item-has-children dropdown">
                         <a href="{{route('admin.subject.index')}}"> <i class="menu-icon fa fa-dashboard"></i>Manage Test </a>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Manage Test</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{route('admin.subject.index')}}">CRUD Subject</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{route('admin.content.index')}}">CRUD Content</a></li>              
                        </ul>   
                    </li> --}}

                    <h3 class="menu-title">Group Access</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Manage Group Access</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">CRUD Group Access</a></li>
                        </ul>
                    </li>


                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">

                    <div class="user-area dropdown float-right">
                        Welcome
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           {{auth::user()->firstname." ".auth::user()->lastname}}
                        </a>
                        <div class="user-menu dropdown-menu">
                            
                            <a class="nav-link" href="{{ route('admin.chgpwd') }}">
                            <i class="fa fa-power-off"></i> {{ __('Change Password') }}
                             </a>

                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> {{ __('Logout') }}
                             </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

    @if (session()->has('msg'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong> {{session('msg')}} </strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

    @endif


    @yield("content")


    <!-- Right Panel -->
    <script src="{{asset('js/core.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>


</body>

</html>
