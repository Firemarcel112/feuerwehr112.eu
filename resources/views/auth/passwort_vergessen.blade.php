@extends('layout.auth')

@section('app:content')
	<div class="card card-md">
		<div class="card-header justify-content-center d-flex">
			<div class="col-11"></div>
			<div class="d-flex justify-content-center">
				<div class="me-2">
					<x-tag-nacht-toggle />
				</div>
				<x-sprachen-toggle />
			</div>
		</div>
		<div class="card-body">
		<h2 class="mb-4 text-center h2">{{__('general.passwort_zuruecksetzen')}}</h2>
		<form action="{{'@TODO'}}">

			<div class="mb-3">
				<label class="form-label">
					{{__('general.email')}}
				</label>
				<input type="text" class="form-control" placeholder="email@mail.com">
			</div>

			<div class="form-footer">
				<button type="submit" class="btn btn-primary w-100">{{__('general.passwort_zuruecksetzen')}}</button>
			</div>
		</form>
		</div>
	</div>

	<div class="mt-3 text-center text-secondary">
		{{__('general.anmelden')}}? <a href="{{route('login')}}">{{__('general.anmelden')}}</a>
	</div>
@endsection
