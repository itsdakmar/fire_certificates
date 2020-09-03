@component('mail::message')
# Notification from jabatan bomba melaka.

Your Fire certificate for premise <b>{{ $premise_name }}</b> will expired on <b>{{ $expired_date }}</b>. Please do renewal before the expired date to avoid any fine.
<br>
Total amount need to pay is : <b>RM {{ $total }}</b>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
