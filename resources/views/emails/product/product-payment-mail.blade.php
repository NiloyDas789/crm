<x-mail::message>
    # Dear ,




    Hi {{ $details['name'] }},

    {{ $details['body']}}.
    Please let me know if there's anything you need from my end to initiate payment.

    Hopefully you payment on time.

    Please organize the payment for this invoice.


    Thanks,</br>
    {{ config('app.name') }}
</x-mail::message>
