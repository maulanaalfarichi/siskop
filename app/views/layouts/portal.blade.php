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

<body style="text-align:center">
	<address>
	<strong><h3>INKOP PAMSI<br>Induk Koperasi Perusahaan Air Minum Seluruh Indonesia</h3><hr></strong>
	Jl. Batu Ampar I No. 45A Condet, Kramat Jati - Jakarta Timur | <abbr title="Phone">P: </abbr> 021-80883384/80873428 Fax. 021-80871321<br>
	Website : www.inkoppamsi.co.id, Email : inkoppamsi@gmail.com, belanja@inkoppamsi.co.id
	</address>
	<div class="row">
		    <a href="{{ URL::to('trading') }}">
				{{ HTML::image('assets/img/trading.png','a picture', array('class'=>'img-rounded')) }}
			</a>
			<a href="{{ URL::to('pht') }}">
				{{ HTML::image('assets/img/pht.png','a picture', array('class'=>'img-rounded')) }}
			</a>
			<a href="{{ URL::to('accounting') }}">
				{{ HTML::image('assets/img/umroh.png','a picture', array('class'=>'img-rounded')) }}
			</a>
			<a href="{{ URL::to('usp') }}">
				{{ HTML::image('assets/img/usp.png','a picture', array('class'=>'img-rounded')) }}
			</a>
	</div><br>
	
	@Copyright Inkoppamsi.co.id - {{ date('Y') }}
        

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
