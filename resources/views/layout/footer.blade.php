<footer class="footer footer-transparent d-print-none">
	<div class="container-xl">
		<div class="flex-row-reverse text-center row align-items-center">
			<div class="col-lg-auto ms-lg-auto">
			<ul class="mb-0 list-inline list-inline-dots">
				<li class="list-inline-item">
					<a class="link-secondary" rel="noopener">
						Impressum
					</a>
				</li>
				<li class="list-inline-item">
					<a class="link-secondary" rel="noopener">
						Datenschutz
					</a>
				</li>
				<li class="list-inline-item">
					<a class="link-secondary" rel="noopener">
						AGB
					</a>
				</li>
			</ul>
		</div>
		<div class="mt-3 col-12 col-lg-auto mt-lg-0">
			<ul class="mb-0 list-inline list-inline-dots">
				<li class="list-inline-item">
					Copyright © 2023 - {{date('Y')}}
					<a href="." class="link-secondary">{{env('APP_NAME')}}</a>
				</li>
				{{-- <li class="list-inline-item"> --}}
					{{-- @TODO ChangeLog einbauen --}}
					{{-- <a href="./changelog.html" class="link-secondary" rel="noopener">
					v1.0.0-beta19
					</a> --}}
				{{-- </li> --}}
			</ul>
		</div>
	</div>
</footer>
