@extends('site.app')
@section('title', 'Ürün')
@section('content')
<div class="body">
    <div role="main" class="main">
        <div class="container">



    <form id="" action="{{ route('checkout.place.order') }}" method="post">
        @csrf
<div class="row mb-5">


    <div class="col-md-6 mb-5 mb-md-0">
        <h2 class="font-weight-bold mb-3">{{ __("Fatura Adresim") }}</h2>

        <label for="billing_address">Adres Seç:</label>
        @if ( count($addresses)>0 )
        <select name="billing_address" id="billing_address">
            @forelse ($addresses as $address)
            <option value="{{$address->id}}">{{$address->address_name}}</option>
            @empty
            {{__("Lütfen adres ekleyin")}}
            @endforelse
        </select>
                                            
        @else
            <a href="{{route('address.create')}}" class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3">{{__("Adres Ekle")}}</a>
        @endif
<div class="col-md-6">
                                            <h2 class="font-weight-bold mb-3">TESLİMAT ADRESİM</h2>

                                            <label for="addresses">Adres Seç:</label>
        @if ( count($addresses)>0 )
        <select name="delivery_address" id="delivery_address">
            
            @forelse ($addresses as $address)
            <option value="{{$address->id}}">{{$address->address_name}}</option>
            @empty
            {{__("Lütfen adres ekleyin")}}
            @endforelse
        </select>
        @else
            <a href="{{route('address.create')}}" class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3">{{__("Adres Ekle")}}</a>
        @endif


    </div>




<div class="form-group col-md-6">
<a href="{{route('checkout.cart')}}" class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3">< SEPETE GERİ DÖN</a>
</div>

<div class="form-row">
<div class="col-4 order-1 text-left">
Adresleri onaylıyorsanız ödeme işlemine geçebilirsiniz -->
</div>

<div class="col-4 order-2">
<button class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3" type="submit">ADRESİ GÜNCELLE </button>
</div>

</div>
    </div>
<!--
    <div class="col-md-6">
                                            <h2 class="font-weight-bold mb-3">TESLİMAT ADRESİM</h2>

                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="text-color-dark font-weight-semibold" for="shipping_company">COMPANY NAME:</label>
                                                    <input type="text" value="" class="form-control line-height-1 bg-light-5" name="shipping_company" id="shipping_company" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="text-color-dark font-weight-semibold" for="shipping_address">ADDRESS:</label>
                                                    <input type="text" value="" class="form-control line-height-1 bg-light-5" name="shipping_address" id="shipping_address" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <input type="text" value="" class="form-control line-height-1 bg-light-5" name="shipping_address2" id="shipping_address2" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="text-color-dark font-weight-semibold" for="shipping_city">CITY / TOWN:</label>
                                                    <input type="text" value="" class="form-control line-height-1 bg-light-5" name="shipping_city" id="shipping_city" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <label class="text-color-dark font-weight-semibold" for="shipping_notes">NOTES:</label>
                                                    <textarea class="form-control line-height-1 bg-light-5" name="shipping_notes" id="shipping_notes" rows="7" required></textarea>
                                                </div>
                                            </div>


    </div>
-->
<div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">{{ __("Siparişiniz") }}</h4>
                                    </header>
                                    <article class="card-body">
                                        <dl class="dlist-align">
                                            <dt>Total cost: </dt>
                                            <dd class="text-right h5 b"> {{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }} </dd>
                                        </dl>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <input id="payment_method" name="payment_method" type="radio" class="" value="paytr" checked> {{ __("Paytr") }}</input>
                            </div>
                            <div class="col-md-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3">{{ __("SİPARİŞ VER") }}</button>
                            </div>
                        </div>
                    </div>


</div>


                                </form>






</div>

</div>

            @include("site.partials.footer_lite")

</div>

@stop
