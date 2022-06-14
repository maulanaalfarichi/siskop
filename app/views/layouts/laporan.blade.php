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
	@yield('content')
</body>
</html>