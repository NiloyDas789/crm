<x-mail::message>
# Dear {{ $details['name'] }},


    {{ $details['body']}}
    {{ $details['amount'] }}

<x-mail::button :url="''">
   Click HEre to Payment
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
