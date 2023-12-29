<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layout.head')
<body>
	<div class="page">
		@include('layout.header')
		<div class="page-wrapper">
			@section('page_header')
				<div class="page-header d-print-none">
					<div class="container-xl">
						<div class="row g-2 align-items-center">
							<div class="col">
								<div class="page-pretitle">
									@yield('pre_title', 'Default PreTitle')
								</div>
								<h2 class="page-title">
									@yield('page_title', 'Default Pagetitle')
								</h2>
							</div>
							<div class="col-auto ms-auto d-print-none">
								<div class="btn-list">
									@yield('header_btn', '')
								</div>
							</div>
						</div>
					</div>
				</div>
			@endsection
			@yield('page_header')
			@section('page_body')
				<div class="page-body">
					<div class="container-xl">
						<div class="row">
							@yield('content')
						</div>
					</div>
				</div>
			@endsection
			@yield('page_body')
			@include('layout.footer')
		</div>
	</div>
</body>
</html>

