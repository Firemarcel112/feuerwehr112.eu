<li @class(['nav-item', 'active' => request()->route()->getName() == $route])>
	<a class="nav-link" href="{{ route($route) }}">
		@if(!empty($icon))
		<span class="nav-link-icon d-md-none d-lg-inline-block">
			@include("standard.icons.{$icon}")
		</span>
		@endif
		<span class="nav-link-title">
			@if(!empty($sprach_key))
				{{ __($key_group?? 'navigation' . '.' . $sprach_key) }}
			@else
				{{ $text ?? 'DEFAULT LINK' }}
			@endif
		</span>
	</a>
</li>
