@includeFirst(['layout.head'])

	<body class="antialiased fw112-body">

		<div class="page page-center">
			<div class="container py-4 container-tight">
				<div class="mb-4 text-center">
					<h1><a href="{{route('home')}}">{{env('APP_NAME')}}</a></h1>
				</div>
				@yield('app:content')
			</div>
		</div>
	</body>
