<!doctype html>
<html lang="es" class="fuelux">
<head>
	<meta charset="UTF-8">
    @section('styles')
    {{ Html::style('assets/css/fuelux.css') }}
	{{ Html::style('assets/css/fuelux-responsive.min.css')}}
	{{ Html::style('assets/css/font-awesome.css')}}
	{{ Html::style('assets/css/main.css')}}
	@show
	<title>
		@yield('titulo')
	</title>
</head>
<body>
@include('top-menu')

<div class="container-fluid">
	@include('notifications')
	@yield('contenido')
</div>
	@section('scripts')
		{{ Html::script('assets/js/jquery-1.9.1.js')}}
    	{{ Html::script('assets/js/loader.js')}}
    @show
</body>
</html>

