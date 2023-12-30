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
						<h2 class="mb-4 text-center h2">{{ __('general.email_verifizierung') }}</h2>
						@include('standard.alerts')
						<form action="" method="POST" autocomplete="off" novalidate>
							@csrf
							<div class="mb-3">
								@include('components.form.input', [
									'name' => __('general.email'),
									'type' => 'email',
									'input_name' => 'email',
									'value' => old('email')?? $email?? null,
									'placeholder' => __('general.email_eingeben'),
								])
							</div>
							<div class="mb-2">
								@include('components.form.input', [
									'name' => __('general.token'),
									'input_name' => 'token',
									'value' => old('token')?? $token?? null,
									'placeholder' => __('general.token_eingeben'),
								])
							</div>

							<div class="form-footer">
								<button type="submit" name="neuer_link" value="1" class="btn btn-primary w-100 mb-2">{{ __('general.neuen_link_anfordern') }}</button>
								<button type="submit" class="btn btn-primary w-100">{{ __('general.bestaetigen') }}</button>
							</div>
						</form>
					</div>
				</div>
				<div class="text-center text-muted mt-3">
					{{ __('general.bereits_bestaetigt') }} <a href="{{ route('login') }}" tabindex="-1">{{ __('general.anmelden') }}</a>
				</div>
			</div>
		</div>
	</body>
@endsection
