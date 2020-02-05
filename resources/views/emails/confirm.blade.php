@component('mail::message')
# Hello {{ $user->name }}

You changed your email. Please verify email using this button:

@component('mail::button', ['url' => route('verify', $user->verification_token ) ])
Verify Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent