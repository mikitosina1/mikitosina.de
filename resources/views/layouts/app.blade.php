<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
	@vite(['resources/js/app.js',
		'node_modules/bootstrap-icons/font/bootstrap-icons.css',
		'resources/css/app.css', 'resources/css/aside.css',
		'resources/css/user_cloud.css'
	])
</head>
<body>
	<div id="app">
		@include('layouts.aside')
		<main class="py-4">
			@yield('content')
		</main>
		@include('layouts.user_cloud')
	</div>
	@include('layouts.footer')
</body>
</html>
