@extends('layout.app')

@section('pre_title')
	{{ __('general.profil') }} / {{ $benutzer->getBenutzername() }}
@endsection

@section('page_title')
@endsection

@if ($benutzer->getId() == auth()->user()?->getId() ?? null)
	@section('header_btn')
		<a class="btn btn-primary">
			{{ __('general.profil_bearbeiten') }}
		</a>
	@endsection
@endif

@section('content')
	<div class="row">
		<div class="card">
			<div class="card-header" style="height:200px; background: url({{ asset($benutzer->profil->getBannerPfad()) }})">
				@if(!empty($benutzer->profil->getAvatarPfad()))
					<img class="avatar avatar-lg" src="{{ asset($benutzer->profil->getAvatarPfad()) }}">
				@else
					<span class="avatar avatar-lg">{{ substr($benutzer->getBenutzername(), 0, 2) }}</span>
				@endif

				<div class="ms-3 mt-4">
					<div>
						<h2 class="mb-2">{{ $benutzer->getBenutzername() }}</h2>
						<span class="badge bg-red">Administrator</span>
						@if ($benutzer->isNeu())
							<span class="badge bg-blue">{{ strtoupper(__('general.neu')) }}</span>
						@endif
					</div>
					<div class="mt-2 card">
						<div class="card-body" style="width:286px">
							@php
								$geschlecht = $benutzer->profil->getGeschlecht();
								$alter = $benutzer->profil->getAlter();
								$mitglied_seit = $benutzer->getCreatedAt()->format('d.m.Y');
							@endphp
							<p class="mb-0 text-secondary">
								<b>
									@if (!empty($geschlecht))
										{{ __('database.profile.geschlecht.' . $geschlecht) }},
									@endif
									@if (!empty($alter) && $alter > 0)
										{{ $benutzer->profil->getAlter() }},
									@endif
									@if (!empty($mitglied_seit))
										{{ __('general.mitglied_seit') }}
										{{ $benutzer->getCreatedAt()->format('d.m.Y') }}
									@endif
								</b>
							</p>
							<p class="mb-0 text-secondary"><b>Beitraege: 19</b></p>
							<p class="mb-0 text-secondary"><b>Reaktionen: 20</b></p>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="card mt-4">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
					<li class="nav-item" role="presentation">
						<a href="#tabs-home-3" class="nav-link" data-bs-toggle="tab" aria-selected="true"
							role="tab">
							@include('standard.icons.user', [
								'classes' => ['me-2'],
							])
							{{ __('general.ueber_mich') }}
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a href="#tabs-profile-3" class="nav-link active" data-bs-toggle="tab" aria-selected="false" role="tab"
							tabindex="-1">
							@include('standard.icons.notes', [
								'classes' => ['me-2'],
							])
							{{ __('general.pinnwand') }}
						</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane" id="tabs-home-3" role="tabpanel">
						<h4>{{ __('general.persoenliche_informationen') }}</h4>
						@php
							$geburtsdatum = $benutzer->profil->getGeburtsdatum()->format('d.m.Y');
							$geburstag_in = $benutzer->profil->getGeburtstagIn();
						@endphp
						@if (!empty($alter) && $alter > 0)
							<p>{{ __('general.geburtsdatum') }}: {{ $geburtsdatum }}
								({{ __('general.geburtstag_in', [
									'tage_count' => (int)$geburstag_in,
									'tage' => ($geburstag_in < 0) ? __('general.tag') : __('general.tagen')
								]) }})</p>
						@endif
						<hr>
						<h4>Feuerwehr Informationen</h4>
						<p>Feuerwehr: FFW Bad Kissingen</p>
						<p>Dienstgrad: Feuerwehrmann</p>
						<p>Funktion: Ausbilder</p>
					</div>
					@php
						$text = "Testkommentar";
					@endphp
					<div class="tab-pane active show" id="tabs-profile-3" role="tabpanel">
						<div class="divide-y">
							<div>
								@forelse($kommentare?? [] as $kommentar)
									@include('components.Profil.kommentar', [
										'avatar' => $kommentar->user->profil->getAvatarPfad()?? null,
										'benutzername' => $kommentar->user->getBenutzername(),
										'datum' => $kommentar->getCreatedAt()->format('d.m.Y H:i:s'),
										'text' => $kommentar->getKommentar(),
									])
								@empty
								@endforelse
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">

			</div>
		</div>
	@endsection
