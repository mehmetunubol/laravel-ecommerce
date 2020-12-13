@extends('site.app')
@section('title', 'Ürün')
@section('content')
<div class="body">
    <div role="main" class="main">
        <div class="container">

            <div class="container">
                @if (Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                @elseif(Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @elseif(Session::has('errors'))
                    @foreach (Session::get('errors')->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif

                <div class="col-md-8 col-lg-9 order-2 order-md-2 mb-5 mb-md-0">
                    <form id="" action="{{ route('checkout.payment.akbank.pay') }}" method="post">
						@csrf
                        <div class="row mb-5">


                            <div class="col-md-6 mb-5 mb-md-0">
                                <h2 class="font-weight-bold mb-3">ÖDEME SAYFASI</h2>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <header class="card-header">
												<div class="form-row">
                                                    <div class="form-group col-md-12">
														<h4 class="card-title mt-2">Toplam Tutar: {{ $order->grand_total }} {{ config('settings.currency_symbol') }}
															<input hidden type="text" value="{{ $order->id }}" class="form-control line-height-1 bg-light-5" name="order" id="" required=""/>
														</h4>
													</div>
                                                </div>
                                            </header>
                                            <article class="card-body">

                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="text-color-dark font-weight-semibold" for="">Kart
                                                            Üzerindeki İsim</label>
                                                        <input type="text" value=""
                                                            class="form-control line-height-1 bg-light-5" name="card_name" id="" required="">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="text-color-dark font-weight-semibold" for="">Kart
                                                            Numarası</label>
                                                        <input type="text" value=""
                                                            class="form-control line-height-1 bg-light-5 " name="card_number"
                                                            id="" required="">
                                                    </div>
                                                </div>

                                                <div class="form-row">

                                                    <div class="form-group col-md-4">
                                                        <label class="text-color-dark font-weight-semibold"
                                                            for="billing_name">Son Kullanım Tarihi- Ay</label>
                                                        <input type="text" value=""
                                                            class="form-control line-height-1 bg-light-5"
                                                            name="end_month" id="" required="">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="text-color-dark font-weight-semibold"
                                                            for="billing_last_name">Son Kullanım Tarihi- Yıl</label>
                                                        <input type="text" value=""
                                                            class="form-control line-height-1 bg-light-5"
                                                            name="end_year" id="" required="">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label class="text-color-dark font-weight-semibold" for="">CVC:
                                                            Güvenlik Kodu</label>
                                                        <input type="text" value=""
                                                            class="form-control line-height-1 bg-light-5"
                                                            name="cvc_code" id="" required="">
                                                    </div>

                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">






                            </div>


                            <div class="col text-LEFT">
                                </br>
                                <button class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3"
                                    type="submit">Ödemeyi Gerçekleştir</button>
                            </div>


                        </div>


                    </form>


                </div>

            </div>

        </div>

        </br></br></br></br>
        @include("site.partials.footer_lite")
    </div>
    @stop