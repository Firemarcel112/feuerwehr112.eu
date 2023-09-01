@includeFirst(['layout.head'])

	<body class="antialiased fw112-body">

		<div class="page page-wrapper">
			@include('layout.header')

			<main>
				<div class="page-header d-print-none">
					<div class="container-xl">
						<div class="row g-2 align-items-center">
						<div class="col">
							<div class="page-pretitle">
								{{$area?? env('APP_NAME')}}
							</div>
							<h2 class="page-title">
								{{$pageTitle?? env('APP_NAME')}}
							</h2>
						</div>
						@yield('header:actions')
						</div>
					</div>
				</div>
				<div class="page-body">
					@yield('app:content')
				</div>
			</main>
			@include('layout.footer')
		</div>
	</body>
