@component('mail::message')
# Wellcome Email

dear {{ $name }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
