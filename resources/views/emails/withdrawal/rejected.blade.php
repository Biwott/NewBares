@component('mail::message')
# Withdrawal Request Rejected!

Withdrawal Request ID# <b>{{$withdrawal['code']}}</b> of
<b>{{number_format($withdrawal['final_amount'], 0,'.', ',')}}</b>
has been Declined! <br>
Kindly try Again!


@component('mail::button', ['url' => route('user.dashboard')])
Dashboard
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent