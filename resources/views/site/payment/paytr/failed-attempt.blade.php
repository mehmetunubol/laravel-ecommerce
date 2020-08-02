@extends('site.app')
@section('title', __("PayTR Ödeme Ekranı"))
@section('content')
  <section class="section-pagetop bg-dark">
      <div class="container clearfix">
          <h2 class="title-page">{{ __("PayTR") }}</h2>
      </div>
  </section>
  <section class="section-content bg padding-y border-top">

    <section id="content">
      <div class="content-wrap topmargin bottommargin">
        <div class="container clearfix">
          <div class="row">
            <div class="col_full">
              <div class="panel panel-default divcenter noradius noborder">
                <div id="resheader" class="feature-box fbox-center fbox-bg fbox-border fbox-effect">
                  <div class="fbox-icon">
                    <i id="icon" class="icon-ok"></i>
                  </div>
                  <h3>:-( {{__("Bir sorun var")}} !!!
                    <span id="result" class="subtitle">{{__("Lütfen tekrar ödeme yapmayı deneyiniz.")}}</span>
                  </h3>
                  <a id="button" href="/cart" class="button button-3d button-small button-rounded button-white button-light">{{__("Siparişlerim")}}</a>
                </div>

            </div>
          </div>
        </div>
      </div>
    </section>


  </section>
</section>
  @stop