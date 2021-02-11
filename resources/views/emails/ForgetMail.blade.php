@component('mail::message')
# Forget Password MAil

request to reset password

@component('mail::button', ['url' => ''])
reset password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
