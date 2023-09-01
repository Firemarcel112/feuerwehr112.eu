<div class="nav-item dropdown d-flex align-self-center">
	<span class="flag flag-country-@if(App::isLocale('en'))us @else{{App::getLocale()}}@endif cursor-pointer" data-bs-toggle="dropdown"></span>
	<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end">
		<div class="list-group list-group-flush">
			@foreach($sprachen as $sprache)
				<a href="?language={{$sprache->getCode()}}" class="cursor-pointer list-group-item">
					<span class="flag flag-country-@if($sprache->getCode() == 'en')us @else{{$sprache->getCode()}} @endif"></span>
					<span class="ms-2">{{$sprache->getBezeichnung()}}</span>
				</a>
			@endforeach
		</div>
	</div>
</div>
