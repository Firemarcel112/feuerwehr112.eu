<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>{{$pageTitle ?? env('APP_NAME')}}</title>

		{{-- Fonts --}}

		{{-- Styles --}}
		<link rel="stylesheet" href="{{asset('styles/styles.css')}}">

		{{-- Scripts --}}

	</head>

	<body class="antialiased">

		<header>

		</header>

		<main>
			@yield('main:content')
		</main>

		<footer>

		</footer>

	</body>
