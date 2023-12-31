@extends('layout.minimal')

@section('app')
	<body class="d-flex flex-column">
		<div class="page page-center">
			<div class="container container-tight py-4">
				@include('standard.alerts')
				<form class="card card-md" method="POST">
					@csrf
					<div class="card-header">
						<div class="row">
							<div class="col h-24 d-flex">
								<div class="mr-2">
									@include('components.tag-nacht-toggle')
								</div>
								<div>
									@include('components.sprachen-toggle')
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<h2 class="card-title text-center mb-4">{{ __('general.neuen_account_erstellen') }}</h2>
						<div class="mb-3">
							@include('components.form.input', [
								'name' => __('general.benutzername'),
								'input_name' => 'benutzername',
								'placeholder' => 'MaxMuster112',
								'required' => true,
							])
						</div>
						<div class="mb-3">
							@include('components.form.input', [
								'name' => __('general.email'),
								'type' => 'email',
								'input_name' => 'email',
								'placeholder' => 'max.muster@mail.de',
								'required' => true,
							])
						</div>
						<div class="mb-3">
							@include('components.form.input', [
								'type' => 'password',
								'required' => true,
							])
						</div>
						<div class="mb-3">
							@include('components.form.input', [
								'type' => 'checkbox',
								'input_name' => 'datenschutz',
								'required' => true,
								'name' => __('general.datenschutz_akzeptieren', [
									'span_open' => "<span><a href='" . route('home') . "'>",
									'span_close' => '</a></span>',
								]),
							])
						</div>
						<div class="form-footer">
							<button type="submit"
								class="btn btn-primary w-100">{{ __('general.account_erstellen') }}</button>
						</div>
					</div>
				</form>
				<div class="text-center text-muted mt-3">
					{{ __('general.bereits_registriert') }} <a href="{{ route('login') }}"
						tabindex="-1">{{ __('general.anmelden') }}</a>
				</div>
			</div>
		</div>
	</body>
@endsection
