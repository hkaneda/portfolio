@component('mail::message')
{{ $user }}様<br>
この度はななゆめやでのご購入ありがとうございます。<br>

お客様が購入した商品は<br>

@foreach ($checkout_items as $item)
・{{ $item->item->product_name }}｜{{$item->quantity}}個|{{number_format($item->quantity*$item->item->price)}}円
<br>
@endforeach

となります。<br>

<br>
またのご利用をお待ちしております。


<br>
{{ config('app.name') }}
@endcomponent
