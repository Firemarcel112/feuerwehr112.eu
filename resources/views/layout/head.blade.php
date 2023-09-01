<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{$pageTitle ?? env('APP_NAME')}}</title>
	{{-- Fonts --}}

	{{-- Styles --}}
	<link rel="stylesheet" href="{{asset('css/boostrap-min.css')}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-flags.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-payments.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-vendors.min.css">
	<link rel="stylesheet" href="{{asset('css/custom-styles.css')}}">

	{{-- Scripts --}}
	{{-- <script type="text/javascript" src="{{asset('bootstrapjs/bootstrap.bundle.min.js')}}"></script> --}}
	<script src="{{asset('js/tabler.min.js')}}" defer></script>
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
	<script>
	</script>
</head>
