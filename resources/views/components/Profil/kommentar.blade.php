<div class="row mb-2">
	<div class="col-auto">
		@if(!empty($avatar))
			<img class="avatar" src="{{ asset($avatar) }}">
		@else
			<span class="avatar">
				{{ substr($benutzername, 0, 2) }}
			</span>
		@endif
	</div>
	<div class="col">
		<div class="text-truncate">
			<strong>
				{{ __('general.kommentar_von') }}
				<a href="{{ route('profil.index', ['benutzername' => $benutzername]) }}">
					{{ $benutzername }}
				</a>
			</strong>
		</div>
		<div class="my-2">
			{{ $text }}
		</div>
		<div class="text-secondary">
			{{ $datum }}
		</div>
	</div>
	<div class="col-auto align-self-center">
		@include('standard.icons.edit')
		@include('standard.icons.trash-x', [
			'classes' => [
				'text-red',
			]
		])
	</div>
</div>
<hr>
