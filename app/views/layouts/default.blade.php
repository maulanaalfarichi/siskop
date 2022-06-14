<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    @if(Session::has('message'))
		<p style='color:green'>{{ session::get('message') }}</p>
	@endif
	@yield('content')
</body>
</html>