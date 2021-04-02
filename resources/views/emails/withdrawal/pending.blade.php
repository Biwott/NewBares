@component('mail::message')
# Withdrawal Request Pending!

Withdrawal Request ID# <b>{{$withdrawal['code']}}</b> of <b>{{number_format($withdrawal['final_amount'], 0,'.', ',')}}</b>
has been submitted! <br>
Kindly await approval.



@component('mail::button', ['url' => route('user.dashboard')])
Dashboard
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent