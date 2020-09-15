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
											<div class="form-row">
												<div class="form-group col-md-6">
													<label class="text-color-dark font-weight-semibold" for="billing_name">{{ __("İsim") }}</label>
													<input type="text" value="{{auth()->user()->first_name}}" class="form-control line-height-1 bg-light-5" name="first_name" id="billing_name" required>
												</div>
												<div class="form-group col-md-6">
													<label class="text-color-dark font-weight-semibold" for="billing_last_name">{{ __("Soyisim") }}:</label>
													<input type="text" value="{{auth()->user()->last_name}}" class="form-control line-height-1 bg-light-5" name="last_name" id="billing_last_name" required>
												</div>
											</div>
											
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="billing_address">{{ __("Adres") }}:</label>
													<input type="text" value="{{ auth()->user()->address }}" class="form-control line-height-1 bg-light-5" name="address" id="billing_address" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="post_code">{{ __("Posta kodu") }}:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="post_code" id="post_code">
												</div>
											</div>
											
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="city">{{ __("Şehir") }}:</label>
													<input type="text" value="{{ auth()->user()->city }}" class="form-control line-height-1 bg-light-5" name="city" id="city" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="country">{{ __("Ülke") }}:</label>
													<input type="text" value="{{ auth()->user()->country }}" class="form-control line-height-1 bg-light-5" name="country" id="country" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="phone_number">{{ __("Telefon Numarası") }}:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="phone_number" id="phone_number" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="country">{{ __("Email") }}:</label>
													<input type="text" value="{{ auth()->user()->email }}" class="form-control line-height-1 bg-light-5" name="amail" id="country" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="notes">{{ __("Sipariş Notu") }}:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="notes" id="notes">
												</div>
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
