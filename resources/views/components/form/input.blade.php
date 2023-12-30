@switch($type?? 'text')
	@case('password')
		<label @class([
			'form-label',
			'required' => !empty($required),
			...$classes ?? [],
		])>{{ $name ?? __('general.passwort') }}</label>
		<div class="input-group input-group-flat">
			<input type="password" @class(['form-control', ...$input_classes ?? []]) @required(!empty($required)) name="{{ $input_name ?? 'passwort' }}"
				placeholder="************">
			<span class="input-group-text">
				<a href="#" class="link-secondary" title="{{ __('general.passwort_anzeigen') }}" data-bs-toggle="tooltip">
					@include('standard.icons.eye', [
						'classes' => ['js-passwort_anzeigen'],
					])
				</a>
			</span>
		</div>
	@break

	@case('checkbox')
		<label @class(['form-check', ...$classes ?? []])>
			<input type="checkbox" name="{{ $input_name ?? 'checkbox_name' }}" @class(['form-check-input', ...$input_classes ?? []]) @required(!empty($required)) />
			<span @class(['form-check-label', 'required' => !empty($required)])>{!! $name ?? 'MISSING_NAME' !!}</span>
		</label>
	@break

	@default
		<div class="mb-3">
			<label @class([
				'form-label',
				'required' => !empty($required),
				...$classes ?? [],
			])>
				{{ $name ?? 'missing_name' }}
			</label>
			<input type="{{ $type ?? 'text' }}" @class(['form-control', ...$input_classes ?? []]) name="{{ $input_name ?? 'missing_name' }}"
				placeholder="{{ $placeholder ?? 'missing_placeholder' }}" value="{{ $value ?? old($input_name, '') }}"
				@if (!empty($type) && $type == 'file') accept="{{ $accept ?? 'image/*' }}" @endif
				@if (!empty($type) && $type == 'number') step="{{ $step ?? '0.01' }}" @endif @required(!empty($required))>
		</div>
	@break
@endswitch
