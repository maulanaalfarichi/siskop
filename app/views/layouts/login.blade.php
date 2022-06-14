<!DOCTYPE html>
<html class="bg-black">
    <head>
            <title>WEB INKKOP PAMSI</title>
			<link rel="stylesheet" href="{{asset('/assets//old/css/bootstrap.min.css')}}">
			<link rel="stylesheet" href="{{asset('/assets//old/css/bootstrap-theme.min.css')}}">
			{{ HTML::script("assets/old/js/bootstrap.min.js") }}
			{{ HTML::script("assets/old/jquery.js") }}
    </head>
    <body class="bg-black">
		<div class="container"> 
			<div class="col-md-4"></div>
			<div class="col-md-4 .col-md-offset-3">
				<br><br><center>
					{{ HTML::image('assets/img/logo.png','a picture', array('class'=>'img-rounded')) }}		
				</center>
				<div class="form-box" id="login-box">
					@yield('content')
				</div>
			</div>
		</div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>