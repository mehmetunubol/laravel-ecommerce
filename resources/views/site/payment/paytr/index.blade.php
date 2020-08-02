@extends('site.app')
@section('title', __("PayTR Ödeme Ekranı"))
@section('content')
    <section class="section-pagetop bg-dark">
            <div class="container clearfix">
                <h2 class="title-page">{{ __("PayTR") }}</h2>
            </div>
        </section>
        <section class="section-content bg padding-y border-top">
            <!--<iframe src="https://www.paytr.com/odeme/guvenli/<?php //echo $token;?>" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
            -->
            {{$token}}
        </section>
    </section>
@stop
@push('scripts')
    <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
    <script>iFrameResize({},'#paytriframe');</script>
@endpush