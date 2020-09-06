@component('mail::message')
# Notification from jabatan bomba melaka.

Fire certificate for premise <b>{{ $premise_name }}</b> will expired on <b>{{ $expired_date }}</b>.
<br>
{{--Total amount need to pay is : <b>RM {{ $total }}</b>--}}

Thanks,<br>
JBPM Negeri Melaka
@endcomponent
