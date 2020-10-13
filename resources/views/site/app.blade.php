<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

	<link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico">

	<title>Ege Pleks- Pleksiglas İzmir, Reklam malzemeleri İzmir</title>

	<meta name="keywords" content="akrilik levha İzmir,pleksiglas dekota İzmir,kompozit levha İzmir,polikarbon,polikarbonat levha İzmir, reklam malzemeleri İzmir,folyo İzmir" />

	<meta name="description" content="Plegsiglas ve reklam malzemeleri İzmir" />
	
    @include('site.partials.head')
</head>
<body>
@include('site.partials.header')
<div class="row">
    <div class="col-sm-12">
        @if (Session::has('warning_message'))
            <p class="alert alert-warning">{{ Session::get('warning_message') }}</p>
        @elseif(Session::has('error_message'))
            <p class="alert alert-danger">{{ Session::get('error_message') }}</p>
        @endif
    </div>
</div>
@yield('content')
@include('site.partials.bottom_scripts_home')
</body>
</html>