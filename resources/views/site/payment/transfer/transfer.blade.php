@extends('site.app')
@section('title', 'Ürün')
@section('content')
<div class="body">
    {{$order->order_number}}
    </br></br></br></br>
    @include("site.partials.footer_lite")
</div>
@stop