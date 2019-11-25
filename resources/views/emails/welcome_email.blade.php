@component('mail::message')
# Welcome to ferCodeGram.

This is a community with strong positive values.

Your username is:

@component('mail::button', ['url' => '/'])
Enter in our website
@endcomponent

Thanks,<br>
{{ config('app.name') }} team
@endcomponent
