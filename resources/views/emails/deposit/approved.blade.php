@component('mail::message')
# Deposit Successfully Processed!

Funds Deposit ID# <b>{{$deposit['details']}}</b> of <b>{{number_format($deposit['amount'], 0,'.', ',')}}</b> has been
approved.

@component('mail::button', ['url' => route('user.package.list')])
Invest Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent