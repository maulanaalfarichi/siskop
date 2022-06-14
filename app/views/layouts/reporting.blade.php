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
	
	<script>
		function to_excel(e){
			window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#report').html()));
			e.prefentDefault();
		}
	</script>

</head>

<body>

        <!-- Page Content -->
        <div id="page-wrapper2">
            <div class="container-fluid">
				<div class="row">
					@yield('content')
				</div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


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
