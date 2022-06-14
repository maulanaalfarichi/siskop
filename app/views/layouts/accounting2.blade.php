<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Accounting</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
		<link rel="stylesheet" href="{{asset('/assets//css/morris/morris.css')}}">
        <!-- jvectormap -->
		<link rel="stylesheet" href="{{asset('/assets//css/jvectormap/jquery-jvectormap-1.2.2.css')}}">
        <!-- Date Picker -->
		<link rel="stylesheet" href="{{asset('/assets//css/datepicker/datepicker3.css')}}">
        <!-- Daterange picker -->
		<link rel="stylesheet" href="{{asset('/assets//css/daterangepicker/daterangepicker-bs3.css')}}">
        <!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="{{asset('/assets//css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
        <!-- Theme style -->
		<link rel="stylesheet" href="{{asset('/assets//css/AdminLTE.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                WEB INKOP PAMSI
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
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
                                <span>Admin <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    {{ HTML::image('assets/img/avatar3.png','a picture', array('class'=>'img-circle')) }}
                                    <p>
                                        Admin - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile x</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ URL::to('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
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
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div >
						    {{ HTML::image('assets/img/logo.png','a picture', array('class'=>'img-rounded')) }}
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="{{ URL::to('accounting') }}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
						<li class="active">
                            <a href="{{ URL::to('setup') }}">
                                <i class="fa fa-gear"></i> <span>Setup</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Transaction</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
							<ul class="treeview-menu">
                                <li><a href="{{ URL::to('jurnal_umum') }}"><i class="fa fa-angle-double-right"></i> Jurnal Umum</a></li>
								<li><a href="{{ URL::to('jurnal_kas') }}"><i class="fa fa-angle-double-right"></i> Jurnal Kas Keluar</a></li>
								<li><a href="{{ URL::to('posting') }}"><i class="fa fa-angle-double-right"></i> Posting</a></li>
                            </ul>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-print"></i>
                                <span>Laporan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
							<ul class="treeview-menu">
                                <li><a href="{{ URL::to('buku_jurnal') }}"><i class="fa fa-angle-double-right"></i> Buku Jurnal</a></li>
								<li><a href="{{ URL::to('neraca_percobaan') }}"><i class="fa fa-angle-double-right"></i> Neraca Percobaan</a></li>
								<li><a href="{{ URL::to('hitung_shu') }}"><i class="fa fa-angle-double-right"></i> Hitung SHU</a></li>
								<li><a href="{{ URL::to('rugi_laba') }}"><i class="fa fa-angle-double-right"></i> Rugi Laba</a></li>
								<li><a href="{{ URL::to('neraca') }}"><i class="fa fa-angle-double-right"></i> Neraca</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span>Settings</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
							<ul class="treeview-menu">
                                <li><a href="{{ URL::to('register') }}"><i class="fa fa-angle-double-right"></i> Register</a></li>
                                <li><a href="{{ URL::to('group') }}"><i class="fa fa-angle-double-right"></i> List Group Sentry</a></li>
								<li><a href="{{ URL::to('user') }}"><i class="fa fa-angle-double-right"></i> List User Sentry</a></li>
								<li><a href="{{ URL::to('login') }}"><i class="fa fa-angle-double-right"></i> Login</a></li>
                            </ul>
                        </li>                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Accounting
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ URL::to('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">{{ $page }}</li>
						<li class="active">{{ $modul }}</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                  <!-- Main row -->                   
					@yield('content')

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        {{ HTML::script("assets/js/plugins/morris/morris.min.js") }}
        <!-- Sparkline -->
		{{ HTML::script("assets/js/plugins/sparkline/jquery.sparkline.min.js") }}
        <!-- jvectormap -->
		{{ HTML::script("assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}
		{{ HTML::script("assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}
        <!-- jQuery Knob Chart -->
		{{ HTML::script("assets/js/plugins/jqueryKnob/jquery.knob.js") }}
        <!-- daterangepicker -->
		{{ HTML::script("assets/js/plugins/daterangepicker/daterangepicker.js") }}
        <!-- datepicker -->
		{{ HTML::script("assets/js/plugins/datepicker/bootstrap-datepicker.js") }}
        <!-- Bootstrap WYSIHTML5 -->
		{{ HTML::script("assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}
        <!-- iCheck -->
		{{ HTML::script("assets/js/plugins/iCheck/icheck.min.js") }}

        <!-- AdminLTE App -->
		{{ HTML::script("assets/js/AdminLTE/app.js") }}

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		{{ HTML::script("assets/js/AdminLTE/dashboard.js") }}

        <!-- AdminLTE for demo purposes -->
		{{ HTML::script("assets/js/AdminLTE/dashboard.js") }}
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
	</body>
</html>