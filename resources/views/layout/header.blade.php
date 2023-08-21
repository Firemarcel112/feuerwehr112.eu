
<header class="navbar navbar-expand-md d-print-none" >
	<div class="container-xl">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
		</button>
		<h1 class="navbar-brand d-none-navbar-horizontal pe-0 pe-md-3 fw112-logo">
				<a href="/" class="fw112-logo">
					{{env('APP_NAME')}}
				</a>
		</h1>
		<div class="flex-row navbar-nav order-md-last">
			{{-- Tag und Nachtmodus umschalten --}}
			<div class="d-flex">
					<a class="px-0 cursor-pointer nav-link toggle-theme" title="{{__('general.tag_nacht_modus_umschalten')}}" data-bs-toggle="tooltip" data-bs-placement="bottom">
						@include('standard.icons.sun')
						@include('standard.icons.moon')
					</a>
					<div class="nav-item dropdown d-flex ms-1 me-2">
						<span class="flag flag-country-{{App::getLocale()}} cursor-pointer" data-bs-toggle="dropdown"></span>
						<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end">
							<div class="list-group list-group-flush">
								@foreach($sprachen as $sprache)
								<a href="?language={{$sprache->getCode()}}" class="cursor-pointer list-group-item">
									<span class="flag flag-country-{{$sprache->getCode()}}"></span>
									<span class="ms-2">{{$sprache->getBezeichnung()}}</span>
								</a>

							@endforeach
							</div>

						</div>
					</div>
			</div>
			@auth
					{{-- Benachrichtigung --}}
					<div class="nav-item dropdown d-flex me-3">
						<a href="#" class="px-0 nav-link" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
						<span class="badge bg-red"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Benachrichtigungen</h3>
									<span class="ms-2 d-flex badge bg-primary">10</span>
								</div>
								<div class="list-group list-group-flush">
									<a class="list-group-item" href="#">
										Example Notification
									</a>
								  </div>
							</div>
						</div>
					</div>
					{{-- Benutzer --}}
					<div class="nav-item dropdown">
						<a href="#" class="p-0 nav-link d-flex lh-1 text-reset" data-bs-toggle="dropdown">
						<span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
						<div class="d-none d-xl-block ps-2">
							<div>USERNAME</div>
							<div class="mt-1 small text-muted">RANK</div>
						</div>
						</a>
						<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
							<a href="#" class="dropdown-item">Profile</a>
							<div class="dropdown-divider"></div>
							<a href="./settings.html" class="dropdown-item">Settings</a>
							<a href="./sign-in.html" class="dropdown-item">Logout</a>
						</div>
					</div>
			@endauth
			@guest
					<div class="nav-item">
						<a class="nav-link" href="#">{{__('general.menu.anmelden_registrieren')}}</a>
					</div>
			@endguest
		</div>
	</div>
</header>
<nav class="navbar navbar-expand-md">
	<div class="collapse navbar-collapse" id="navbar-menu">
		  <div class="navbar">
			<div class="container-xl">
				<ul class="navbar-nav">
					<li class="nav-item active">
					<a class="nav-link" href="./" >
						<span class="nav-link-icon d-md-none d-lg-inline-block">
							@include('standard.icons.home')
						</span>
						<span class="nav-link-title">
							{{__('general.menu.startseite')}}
						</span>
					</a>
					</li>
				</ul>
			{{-- Suche --}}
			{{-- <div class="order-first my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-md-last">
				<form action="./" method="get" autocomplete="off" novalidate>
				  <div class="input-icon">
					<span class="input-icon-addon">
					  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
					  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
					</span>
					<input type="text" value="" class="form-control" placeholder="{{__('general.suchen')}}..." aria-label="Search in website">
				  </div>
				</form>
			</div> --}}
			</div>
		  </div>
	</div>
</nav>
