@component('mail::message')
# Order details

You have ordered the product {{$product->name}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
