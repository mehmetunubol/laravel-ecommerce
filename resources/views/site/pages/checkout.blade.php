@extends('site.app')
@section('title', 'Ürün')
@section('content')
<div class="body">
    <div role="main" class="main">
        <div class="container">
            </br>
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @elseif(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @elseif(Session::has('errors'))
                        @foreach (Session::get('errors')->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
            <form id="" action="{{ route('checkout.place.order') }}" method="get">
                @csrf
                <div class="row show-grid">
                    <!-- SEPET ADRES SEÇİMİ -->
                    <div class="col-lg-4">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Teslimat Adresi Seçiniz:</h4>
                            </header>
                            <article class="card-body">
                                @if( count($addresses)>0 )
                                    <select name="delivery_address" id="delivery_address" class="form-control bg-light-5 text-color-dark border-0" aria-label="TESLİMAT ADRESİM" required="">
                                        @forelse($addresses as $address)
                                            <option value="{{ $address->id }}">{{ $address->address_name }}</option>
                                        @empty
                                            {{ __("Lütfen adres ekleyin") }}
                                        @endforelse
                                    </select>
                                @else
                                    <a href="{{ route('address.create') }}" class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3">{{ __("Adres Ekle") }}</a>
                                @endif
                            </article>
                        </div>
                        </br>
                        <div class="card">
                            <header class="card-header">

                                <h4 class="card-title mt-2">Fatura Adresi Seçiniz:</h4>

                            </header>
                            <article class="card-body">


                                @if( count($addresses)>0 )
                                    <select name="billing_address" id="billing_address" class="form-control bg-light-5 text-color-dark border-0" aria-label="Fatura Adresim" required="">
                                        @forelse($addresses as $address)
                                            <option value="{{ $address->id }}">{{ $address->address_name }}</option>
                                        @empty
                                            {{ __("Lütfen adres ekleyin") }}
                                        @endforelse
                                    </select>
                                @else
                                    <a href="{{ route('address.create') }}" class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3">{{ __("Adres Ekle") }}</a>
                                @endif


                            </article>
                        </div>


                    </div>

                    <!-- //SEPET ADRES SEÇİMİ -->


                    <!-- ÖDEME METHODU SEÇİMİ -->


                    <div class="col-lg-4">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">Ödeme Methodu Seçiniz</h4>
                                    </header>
                                    <article class="card-body">

                                        <dl class="dlist-align">
                                            <input id="payment_method" name="payment_method" type="radio" class="" value="akbank" checked> KREDİ KARTI</input>
                                        </dl>

                                        <dl class="dlist-align">
                                            <input id="payment_method" name="payment_method" type="radio" class="" value="transfer"> HAVALE</input>
                                        </dl>

                                    </article>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!--// ÖDEME METHODU SEÇİMİ -->

                    <!-- ÖDEME ÖZETİ ve SÖZLEŞMELER -->
                    <div class="col-lg-4">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">Toplam Tutar: {{ \Cart::getSubTotal() }} {{ config('settings.currency_symbol') }}</h4>
                                    </header>
                                    <article class="card-body">

                                        <dl class="dlist-align">
                                            <input id="form1_accept" name="form1_accept" type="checkbox" class="" > 
                                                Ön Bilgilendirme Formu'nu okudum ve kabul ediyorum.
                                            </input>
                                        </dl>

                                        <dl class="dlist-align">
                                            <input id="form2_accept" name="form2_accept" type="checkbox" class="">
                                                Satış Sözleşmesi'ni okudum ve kabul ediyorum.
                                            </input>
                                        </dl>

                                    </article>
                                </div>
                            </div>
                        </div>

                        </br>

                        <div class="row">

                            <div class="col-6 order-1">
                                <a class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3" href="{{ route('addresses') }}">ADRESLERİ DÜZENLE</a>
                            </div>

                            <div class="col-6 col-last  order-2">
                                <button class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3" type="submit">SİPARİŞİ TAMAMLA</button>

                            </div>

                        </div>


                    </div>

                    <!-- //ÖDEME ÖZETİ ve SÖZLEŞMELER -->




                </div>

            </form>
        </div>
    </div>
    </br></br></br></br>
    @include("site.partials.footer_lite")
</div>
@stop