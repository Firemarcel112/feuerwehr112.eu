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
		<h2 class="mb-4 text-center h2">{{__('general.zum_account_einloggen')}}</h2>
		<form action="{{'@TODO'}}">

			<div class="mb-3">
				<label class="form-label">
					{{__('general.username')}}
				</label>
				<input type="text" class="form-control" placeholder="max.muster112">
			</div>

			<div class="mb-2">
				<label class="form-label">
					{{__('general.passwort')}}
					<span class="form-label-description">
						<a href="{{route('passwort_vergessen')}}">
							{{__('general.passwort_vergessen')}}
						</a>
					</span>
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

			<div class="mb-2">
				<label class="form-check">
					<input type="checkbox" class="form-check-input">
					<span class="form-check-label">{{__('general.eingeloggt_bleiben')}}</span>
				</label>
			</div>
			<div class="form-footer">
				<button type="submit" class="btn btn-primary w-100">{{__('general.einloggen')}}</button>
			</div>
		</form>
		</div>
		{{-- @TODO Zusätzliche Login Möglichkeiten --}}
		@if(false)
			<div class="hr-text">{{__('general.oder')}}</div>
			<div class="card-body">
			<div class="row">
			<div class="col"><a href="#" class="btn w-100">
			<!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5"></path></svg>
			Login with Github
			</a></div>
			<div class="col"><a href="#" class="btn w-100">
			<!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
			<svg xmlns="http://www.w3.org/2000/svg" class="icon text-twitter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z"></path></svg>
			Login with Twitter
			</a></div>
			</div>
			</div>
		@endif
	</div>

	<div class="mt-3 text-center text-secondary">
		{{__('general.kein_account')}}? <a href="{{route('registrieren')}}">{{__('general.registrieren')}}</a>
	</div>
@endsection
