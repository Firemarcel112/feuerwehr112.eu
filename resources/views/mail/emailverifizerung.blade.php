@component('mail::message')

<p>{{ __('mail.begruessung', ['name' => $benutzername]) }}</p>

<p>{{ __('mail.emailverifizierung.text') }}</p>

<a href="{{ $url }}">{{ __('mail.emailverifizierung.button') }}</a>
<p>{{ __('mail.emailverifizierung.alternativ') }}:</p>
<p>{{ $url }}</p>

@endcomponent
