@component('mail::message')
# Introduction

Thank you for registering!

@component('mail::button', ['url' => 'http://165.227.15.16/'])
Visit Our Blog
@endcomponent

@component('mail::panel', ['url' => ''])
Joining our blog site will make your life better! :-)
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
