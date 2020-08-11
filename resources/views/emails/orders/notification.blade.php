@component('mail::message')
# Order Details

Shipper Email: {{$order->email}}

Address: {{$order->shipping_address_1}}

Address 2: {{$order->shipping_address_2}}

Address 3: {{$order->shipping_address_3}}

Product: {{$product->name}}

@endcomponent
