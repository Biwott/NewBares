@component('mail::message')
# Welcome to Earnest Ventures

We are Happy to welcome you to our platform. Kindly make package payments to enjoy the premium features! You are
welcomed!

@component('mail::button', ['url' => route('user.deposit.funds')])
Activate Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent