<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>{{ env('APP_NAME') }}</title>

	<link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/tabler-flags.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/tabler-vendor.css') }}" rel="stylesheet">
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/tabler.min.js') }}" defer></script>
	<script src="{{ asset('js/jquery-3.7.1.min.js') }}" defer></script>
</head>
