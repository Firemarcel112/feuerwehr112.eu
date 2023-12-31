@extends('layout.minimal')

@section('app')
	<body class="d-flex flex-column">
		<div class="page page-center">
			<div class="container py-4 container-tight">
				<div class="card card-md">
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
						<h2 class="mb-4 text-center h2">{{ __('general.anmelden') }}</h2>
						@include('standard.alerts')
						<form action="" method="POST" autocomplete="off" novalidate>
							@csrf
							<div class="mb-3">
								@include('components.form.input', [
									'name' => __('general.benutzername'),
									'input_name' => 'benutzername',
									'required' => true,
									'placeholder' => __('general.benutzername_eingeben'),
								])
							</div>
							<div class="mb-2">
								@include('components.form.input', [
									'name' => __('general.passwort'),
									'type' => 'password',
									'placeholder' => __('general.passwort_eingeben'),
									'required' => true,
								])
							</div>
							<div class="mb-2">
								@include('components.form.input', [
									'name' => __('general.angemeldet_bleiben'),
									'type' => 'checkbox',
									'input_name' => 'erinnern',
								])
							</div>
							<div class="form-footer">
								<button type="submit" class="btn btn-primary w-100">{{ __('general.anmelden') }}</button>
							</div>
						</form>
					</div>
				</div>
				<div class="text-center text-muted mt-3">
					{{ __('general.keinen_account') }} <a href="{{ route('registrieren') }}" tabindex="-1">{{ __('general.registrieren') }}</a>
				</div>
			</div>
		</div>
	</body>
@endsection
