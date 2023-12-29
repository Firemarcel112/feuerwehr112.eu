<a class="cursor-pointer nav-link toggle-theme" title="{{ __('general.tag_nacht_modus_umschalten') }}"
	data-bs-toggle="tooltip" data-bs-placement="bottom">
	@include('standard.icons.sun', [
		'classes' => [
			'js-sun',
			'd-none',
		]
	])
	@include('standard.icons.moon', [
		'classes' => [
			'js-moon',
			'd-none',
		]
	])
</a>
