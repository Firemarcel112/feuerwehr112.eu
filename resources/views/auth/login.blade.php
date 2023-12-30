@extends('layout.minimal')

@section('app')
	<body class="d-flex flex-column">
		<div class="page page-center">
			<div class="container py-4 container-tight">
				<div class="card card-md">
					<div class="card-body">
						<h2 class="mb-4 text-center h2">{{ __('general.einloggen') }}</h2>
						@include('standard.alerts')
						<form action="" method="POST" autocomplete="off" novalidate>
							@csrf
							<div class="mb-3">
								<label class="form-label">{{ __('general.benutzername') }}</label>
								<input type="text" class="form-control" name="benutzername" placeholder="maxMuster1"
									autocomplete="off">
							</div>
							<div class="mb-2">
								<label class="form-label">
									{{ __('general.passwort') }}
								</label>
								<div class="input-group input-group-flat">
									<input type="password" name="passwort" class="form-control"
										placeholder="{{ __('general.passwort') }}" autocomplete="off">
								</div>
							</div>
							<div class="mb-2">
								<label class="form-check">
									<input type="checkbox" name="erinnern" class="form-check-input" />
									<span class="form-check-label">{{ __('general.angemeldet_bleiben') }}</span>

								</label>
							</div>
							<div class="form-footer">
								<button type="submit" class="btn btn-primary w-100">{{ __('general.einloggen') }}</button>
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
