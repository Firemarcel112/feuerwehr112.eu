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
		<h2 class="mb-4 text-center h2">{{__('general.registrieren')}}</h2>
		<form action="{{'@TODO'}}">

			<div class="mb-3">
				<label class="form-label">
					{{__('general.username')}}
				</label>
				<input type="text" class="form-control" placeholder="max.muster112">
			</div>

			<div class="mb-3">
				<label class="form-label">
					{{__('general.passwort')}}
				</label>
				<div class="input-group input-group-flat">
					<input type="password" class="form-control" placeholder="{{__('general.passwort')}}">
					<span class="input-group-text">
						<a class="fw112-passwort-anzeigen link-secondary cursor-pointer" data-bs-original-title="{{__('general.passwort_anzeigen')}}" data-bs-toggle="tooltip">
							@include('standard.icons.eye')
						</a>
					</span>
				</div>
			</div>

			<div class="mb-3">
				<label class="form-label">
					{{__('general.passwort_wiederholen')}}
				</label>
				<div class="input-group input-group-flat">
					<input type="password" class="form-control" placeholder="{{__('general.passwort_wiederholen')}}">
					<span class="input-group-text">
						<a class="fw112-passwort-anzeigen link-secondary cursor-pointer" data-bs-original-title="{{__('general.passwort_wiederholen')}}" data-bs-toggle="tooltip">
							@include('standard.icons.eye')
						</a>
					</span>
				</div>
			</div>

			<div class="mb-3">
				<label class="form-label">
					{{__('general.email')}}
				</label>
				<input type="text" class="form-control" placeholder="info@email.com">
			</div>


			<div class="form-footer">
				<button type="submit" class="btn btn-primary w-100">{{__('general.registrieren')}}</button>
			</div>
		</form>
		</div>
	</div>

	<div class="mt-3 text-center text-secondary">
		{{__('general.schon_einen_account')}}? <a href="{{route('login')}}">{{__('general.anmelden')}}</a>
	</div>
@endsection
