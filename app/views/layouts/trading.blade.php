<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WEB INKOPPAMSI</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/assets//bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('/assets//bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('/assets//dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('/assets//bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::to('trading') }}">TRADING</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ URL::to('pht') }}"><i class="fa fa-link fa-fw"></i> PHT</a></li>
						<li><a href="{{ URL::to('accounting') }}"><i class="fa fa-link fa-fw"></i> Accounting</a></li>
						<li><a href="{{ URL::to('usp') }}"><i class="fa fa-link fa-fw"></i> USP</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('login') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						<li><p align="center"><br> 
						    {{ HTML::image('assets/img/logo.png','a picture', array('class'=>'img-rounded')) }}           
						<br></p></li>
                        <li>
                            <a href="{{ URL::to('trading')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Master<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('barang') }}"><i class="fa fa-angle-double-right"></i> Barang</a></li>
								<li><a href="{{ URL::to('pelanggan') }}"><i class="fa fa-angle-double-right"></i> Pelanggan</a></li>
								<li><a href="{{ URL::to('supplier') }}"><i class="fa fa-angle-double-right"></i> Supplier</a></li>
								<li><a href="{{ URL::to('ekspedisi') }}"><i class="fa fa-angle-double-right"></i> Ekspedisi</a></li>
								<li><a href="{{ URL::to('sales') }}"><i class="fa fa-angle-double-right"></i> Sales</a></li>
                           </ul>
						</li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Transaction<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('penjualan') }}"><i class="fa fa-angle-double-right"></i> Penjualan</a></li>
								<li><a href="{{ URL::to('pembelian') }}"><i class="fa fa-angle-double-right"></i> Pembelian</a></li>
								<li><a href="{{ URL::to('adjustment') }}"><i class="fa fa-angle-double-right"></i> Adjustment</a></li>
							</ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li><a href="{{ URL::to('lapbarang') }}"><i class="fa fa-angle-double-right"></i> Lap. Barang</a></li>
								<li><a href="{{ URL::to('lappelanggan') }}"><i class="fa fa-angle-double-right"></i> Lap. Pelanggan</a></li>
								<li><a href="{{ URL::to('lappenjualan') }}"><i class="fa fa-angle-double-right"></i> Lap. Penjualan</a></li>
								<li><a href="{{ URL::to('lappembelian') }}"><i class="fa fa-angle-double-right"></i> Lap. Pembelian</a></li>
							</ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Settings<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('register') }}"><i class="fa fa-angle-double-right"></i> Register</a></li>
                                <li><a href="{{ URL::to('group') }}"><i class="fa fa-angle-double-right"></i> List Group Sentry</a></li>
								<li><a href="{{ URL::to('user') }}"><i class="fa fa-angle-double-right"></i> List User Sentry</a></li>
								<li><a href="{{ URL::to('login') }}"><i class="fa fa-angle-double-right"></i> Login</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><!-- Dashboard --></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">
					@yield('content')
				</div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
	{{ HTML::script("assets/bower_components/jquery/dist/jquery.min.js") }}

    <!-- Bootstrap Core JavaScript -->
	{{ HTML::script("assets/bower_components/bootstrap/dist/js/bootstrap.min.js") }}

    <!-- Metis Menu Plugin JavaScript -->
	{{ HTML::script("assets/bower_components/metisMenu/dist/metisMenu.min.js") }}

    <!-- Custom Theme JavaScript -->
	{{ HTML::script("assets/dist/js/sb-admin-2.js") }}

</body>

</html>
