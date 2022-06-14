<!DOCTYPE html>
<html>
<head>
    <title>SK-Project</title>
    <link rel="stylesheet" href="{{asset('/assets//css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets//css/bootstrap-theme.min.css')}}">
	{{ HTML::script("assets/js/bootstrap.min.js") }}
	{{ HTML::script("assets/jquery.js") }} 
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
	 <div class="container-fluid">
		<div class="navbar-header">
			  <a class="navbar-brand" href="#">SK-Project</a>
		</div>		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <form class="navbar-form navbar-left" role="search" action="http://www.google.com">
					<div class="form-group">
					  <input type="text" class="form-control" placeholder="Search">
					</div>
			  </form>
			  
			  <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>  Admin <span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="#">Edit User</a></li>
					<li><a href="#">Logout</a></li>
				  </ul>
				</li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Settings <span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
				  </ul>
				</li>
			  </ul>
		</div>
	</div>
</nav>

<div class="row">
	<div class="col-md-2" style="padding-left:30px">			
			<div class="list-group">
				  <a href="#" class="list-group-item disabled">
					Main
				  </a>
				  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-home"></span> Master</a>
				  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-th-large"></span>Budget</a>
				  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-th"></span>Reconsiliasi</a>
				  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-list"></span>Claim</a>
				  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-file"></span>Report</a>
				  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-file"></span>Settings</a>
				   
				  <a href="#" class="list-group-item disabled">
						Master
				  </a>
				  <a href="{{ URL::to('company') }}" class="list-group-item"><span class="glyphicon glyphicon-hand-right"></span> Perusahaan</a>
				  <a href="{{ URL::to('area') }}" class="list-group-item"><span class="glyphicon glyphicon-hand-right"></span> Area</a>
				  <a href="{{ URL::to('departemen') }}" class="list-group-item"><span class="glyphicon glyphicon-hand-right"></span> Departemen</a>
				  <a href="{{ URL::to('golongan') }}" class="list-group-item"><span class="glyphicon glyphicon-hand-right"></span> Golongan</a>
				  <a href="{{ URL::to('jabatan') }}" class="list-group-item"><span class="glyphicon glyphicon-hand-right"></span> Jabatan</a>
				  <a href="{{ URL::to('karyawan') }}" class="list-group-item"><span class="glyphicon glyphicon-hand-right"></span> Pegawai</a>
				  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-hand-right"></span> Users</a>
				  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-lock"></span> Login</a>
				  
			</div>
	</div>
	<div class="col-md-10">
			<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Dashboard</li>
			</ol>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
					@yield('content')
				</div>
			</div>
	</div>
</div>
 

</body>
</html>