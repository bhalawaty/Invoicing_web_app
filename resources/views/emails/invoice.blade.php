@component('mail::message')
    # Introduction
    # hi {{$invoice['name']}} your invoice
    ## name :{{$invoice['name']}}
    ## email :{{$invoice['email']}}
    ## mobile :{{$invoice['mobile']}}
    ## amount :{{$invoice['amount']}} EGP
    ## due date :{{$invoice['due_date']}}

    @component('mail::button', ['url' => ''])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
