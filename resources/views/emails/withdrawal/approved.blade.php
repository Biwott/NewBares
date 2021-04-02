@component('mail::message')
# Withdrawal Request Approved!

Withdrawal Request ID# <b>{{$withdrawal['code']}}</b> of <b>{{number_format($withdrawal['final_amount'], 0,'.', ',')}}</b> has been Approved! <br> 
Kindly Check your Registered Safaricom Number for Payment!



@component('mail::button', ['url' => route('user.dashboard')])
Dashboard
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
