@if(!empty(auth()->user()))
	@php $_user = auth()->user() @endphp
@endif

<header class="navbar navbar-expand-md d-print-none">
	<div class="container-xl">
		{{-- Mobile Navigation --}}
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
			aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
			<a href="{{ route('home') }}">
				<img src="xy" width="150" height="32" alt="{{ env('APP_NAME') }}" class="navbar-brand-image">
			</a>
		</h1>
		{{-- Topbar --}}
		<div class="navbar-nav flex-row order-md-last">
			<div class="d-none d-md-flex">
				@include('components.tag-nacht-toggle')
				@include('components.sprachen-toggle')
				</a>
				@if(Auth::check())
					<div class="nav-item dropdown d-none d-md-flex me-3">
						<a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
							aria-label="Show notifications">
							@include('standard.icons.bell')
							{{-- Für Später Notifications --}}
							{{-- <span class="badge bg-red"></span> --}}
						</a>
						<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Last updates</h3>
							</div>
							<div class="list-group list-group-flush list-group-hoverable">
								<div class="list-group-item">
									<div class="row align-items-center">
										<div class="col-auto"><span
												class="status-dot status-dot-animated bg-red d-block"></span>
										</div>
										<div class="col text-truncate">
											<a href="#" class="text-body d-block">Example 1</a>
											<div class="d-block text-muted text-truncate mt-n1">
												Change deprecated html tags to text decoration classes (#29604)
											</div>
										</div>
										<div class="col-auto">
											<a href="#" class="list-group-item-actions">
												<!-- Download SVG icon from http://tabler-icons.io/i/star -->
												<svg xmlns="http://www.w3.org/2000/svg"
													class="icon text-muted" width="24" height="24"
													viewBox="0 0 24 24" stroke-width="2"
													stroke="currentColor" fill="none"
													stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none" />
													<path
														d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
												</svg>
											</a>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="row align-items-center">
										<div class="col-auto"><span class="status-dot d-block"></span></div>
										<div class="col text-truncate">
											<a href="#" class="text-body d-block">Example 2</a>
											<div class="d-block text-muted text-truncate mt-n1">
												justify-content:between ⇒ justify-content:space-between (#29734)
											</div>
										</div>
										<div class="col-auto">
											<a href="#" class="list-group-item-actions show">
												<!-- Download SVG icon from http://tabler-icons.io/i/star -->
												<svg xmlns="http://www.w3.org/2000/svg"
													class="icon text-yellow" width="24" height="24"
													viewBox="0 0 24 24" stroke-width="2"
													stroke="currentColor" fill="none"
													stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none" />
													<path
														d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
												</svg>
											</a>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="row align-items-center">
										<div class="col-auto"><span class="status-dot d-block"></span></div>
										<div class="col text-truncate">
											<a href="#" class="text-body d-block">Example 3</a>
											<div class="d-block text-muted text-truncate mt-n1">
												Update change-version.js (#29736)
											</div>
										</div>
										<div class="col-auto">
											<a href="#" class="list-group-item-actions">
												<!-- Download SVG icon from http://tabler-icons.io/i/star -->
												<svg xmlns="http://www.w3.org/2000/svg"
													class="icon text-muted" width="24" height="24"
													viewBox="0 0 24 24" stroke-width="2"
													stroke="currentColor" fill="none"
													stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none" />
													<path
														d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
												</svg>
											</a>
										</div>
									</div>
								</div>
								<div class="list-group-item">
									<div class="row align-items-center">
										<div class="col-auto"><span
												class="status-dot status-dot-animated bg-green d-block"></span>
										</div>
										<div class="col text-truncate">
											<a href="#" class="text-body d-block">Example 4</a>
											<div class="d-block text-muted text-truncate mt-n1">
												Regenerate package-lock.json (#29730)
											</div>
										</div>
										<div class="col-auto">
											<a href="#" class="list-group-item-actions">
												<!-- Download SVG icon from http://tabler-icons.io/i/star -->
												<svg xmlns="http://www.w3.org/2000/svg"
													class="icon text-muted" width="24" height="24"
													viewBox="0 0 24 24" stroke-width="2"
													stroke="currentColor" fill="none"
													stroke-linecap="round" stroke-linejoin="round">
													<path stroke="none" d="M0 0h24v24H0z" fill="none" />
													<path
														d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
												</svg>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				@endif
			</div>
			<div class="nav-item dropdown">
				@if(Auth::check())
					<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
					aria-label="Open user menu">
					<span class="avatar avatar-sm"
						style="background-image: url(./static/avatars/000m.jpg)"></span>
					<div class="d-none d-xl-block ps-2">
						<div>{{ $_user->getBenutzername() }}</div>
						<div class="mt-1 small text-muted">UI Designer</div>
					</div>
					</a>
					<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
					<a href="#" class="dropdown-item">Status</a>
					<a href="./profile.html" class="dropdown-item">Profile</a>
					<a href="#" class="dropdown-item">Feedback</a>
					<div class="dropdown-divider"></div>
					<a href="./settings.html" class="dropdown-item">Settings</a>
					<a href="{{ route('logout') }}" class="dropdown-item">{{ __('general.abmelden') }}</a>
					</div>
				@else
					<a class="nav-link d-flex" href="{{ route('login') }}">{{ __('general.anmelden') }} | {{ __('general.registrieren') }}</a>
				@endif
			</div>
		</div>
	</div>
</header>
<header class="navbar-expand-md">
	<div class="collapse navbar-collapse" id="navbar-menu">
		<div class="navbar">
			<div class="container-xl">
				<ul class="navbar-nav">
					@include('components.nav-item', [
							'icon' => 'home',
							'route' => 'home',
							'sprach_key' => 'startseite',
						])
				</ul>
				{{-- Suchbar --}}
				{{-- <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
					<form action="./" method="get" autocomplete="off" novalidate>
						<div class="input-icon">
							<span class="input-icon-addon">
								<!-- Download SVG icon from http://tabler-icons.io/i/search -->
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
									height="24" viewBox="0 0 24 24" stroke-width="2"
									stroke="currentColor" fill="none" stroke-linecap="round"
									stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none" />
									<path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
									<path d="M21 21l-6 -6" />
								</svg>
							</span>
							<input type="text" value="" class="form-control" placeholder="Search…"
								aria-label="Search in website">
						</div>
					</form>
				</div> --}}
			</div>
		</div>
	</div>
</header>
