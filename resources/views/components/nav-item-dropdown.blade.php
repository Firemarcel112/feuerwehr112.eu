<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
		@if(!empty($icon))
			<span class="nav-link-icon d-md-none d-lg-inline-block">
				@include("standard.icons.{$icon}")
			</span>
		@endif
		<span class="nav-link-title">
			@if(!empty($sprach_key))
				{{ __($key_group?? 'general' . '.' . $sprach_key) }}
			@else
				{{ $text ?? 'DEFAULT LINK' }}
			@endif
		</span>
	</a>
	<div class="dropdown-menu">
		<div class="dropdown-menu-columns">
			<div class="dropdown-menu-column">
				@foreach($dropdown_items as $dropdown_item)
				<a class="dropdown-item" href="{{ $dropdown_item['route'] }}">
					@if(!empty($dropdown_item['sprach_key']))
						{{ __($dropdown_item['key_group']?? 'general' . '.' . $dropdown_item['sprack_key']) }}
					@else
						{{ $dropdown_item['text'] ?? 'DEFAULT LINK' }}
					@endif
				</a>
				@endforeach
			</div>
		</div>
	</div>
</li>
