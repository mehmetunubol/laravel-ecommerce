@extends('site.app')
@section('title', 'Ürün')
@section('content')
<div class="body">
	<div role="main" class="main">
		<div class="container">

			<div class="row">
                <div class="col-sm-12">
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                </div>
            </div>

<section class="section pt-0">
					<div class="container">
						<div class="row mb-5">
							<div class="col">
								<form class="shop-cart" method="get" action="#">
									@csrf
									<div class="table-responsive">
										<table class="shop-cart-table w-100">
										<thead>

												<tr class="text-center">
													<th class="product-remove"></th>
													<th class="product-thumbnail"></th>
													<th class="product-name text-left"><strong>{{__('Ürün')}}</strong></th>
													<th class="product-attr"><strong>{{__('Özellikler')}}</strong></th>
													<th class="product-price"><strong>{{__('Birim Fiyatı')}}</strong></th>
													<th class="product-quantity"><strong>{{__('Adet')}}</strong></th>
													<th class="product-subtotal"><strong>{{__('Total')}}</strong></th>
												</tr>

											</thead> 
											<tbody>
												@forelse($cartItems as $item)
<tr class="cart-item border_bottom">

<td class="product-remove"><a href="{{ route('checkout.cart.remove', $item->id) }}"><i class="fas fa-times" aria-label="Remove"></i></a></td>
<td class="product-thumbnail"><img src="{{ asset('storage/'.$item->attributes->imagePath) }}" class="img-fluid" width="67" alt="" /></td>
<td class="product-name"><a href="/product/{{$item->attributes->slug}}">{{ Str::words($item->name,20) }}</a></td>
<td class="product-attr">
@php 
$attrs = $item->attributes->selected_attributes
@endphp
@if( $attrs != null)
@foreach(array_keys($attrs) as $key)
<strong>{{ ucwords($key) }}: </strong> {{ $attrs[$key] }}
@endforeach
@endif
</td>

<td class="product-price"><span class="unit-price"> {{$item->price }} {{ config('settings.currency_symbol')}}</span></td>
<td class="product-quantity">

<div class="quantity">
<a type="button" class="minus" href="/cart/decrementItemQuantity/{{ $item->id }}">-</a>
<input type="number" step="1" min="1" name="quantity" value="{{ $item->quantity }}" title="Qty" class="qty" size="2">
<a type="button" class="plus" href="/cart/incrementItemQuantity/{{ $item->id }}">+</a>
</div>
</td>

<td class="product-subtotal"><span class="sub-total"><strong>{{($item->price*$item->quantity) }}{{ config('settings.currency_symbol')}}</strong></span></td>
			
</tr>

												<input type="hidden" name="id" value="{{$item->id}}">
								

												@empty
												<p class="alert alert-warning">{{ __("Sepetin Boş") }}</p>

												@endforelse




<tr class="border-bottom-0">
<td colspan="6" class="px-0">
<div class="row mx-0">
<div class="col-md-5 px-0 mb-3 mb-md-0">

<a href="/" class="btn btn-outline btn-default btn-primary btn-2 btn-icon-effect-1" target="_self">
<span class="wrap">
<i class="fa fa-chevron-left "></i><span>{{__('ALIŞVERİŞE DEVAM')}}</span>
</span>
</a>


<div class="input-group input-group-style-3 rounded">

<!--  HEDİYE ÇEKİ/KUPONU İÇİN TASARIM
<input type="text" class="form-control bg-light-5 border-0" placeholder="İNDİRİM KODU..." aria-label="Enter Coupon Code">
<span class="input-group-btn bg-light-5 p-1">
<button class="btn btn-primary font-weight-semibold btn-h-3 rounded h-100" type="submit">{{__('UYGULA')}}</button>
</span>
-->
</div>
</div>

<div class="col-md-7 text-right px-0">

<!--<button class="btn btn-dark btn-outline btn-rounded font-weight-bold btn-h-2 btn-v-3" type="submit">SEPETİ GÜNCELLE</button>-->
</div>
</div>
</td>
</tr>
											</tbody>
										</table>
									</div>

								</form>
							</div>
						</div>
<div class="row">
<div class="col-md-6 mb-5 mb-md-0">

<div class="col mb-5">
<!--
			<h2 class="font-weight-bold text-4 mb-3">Kargo Hesaplama</h2>
			<form class="shipping-calculator" action="#" method="post">
			<div class="form-row">
			<div class="form-group col">
			<div class="custom-select-1">
			<select class="form-control bg-light-5 text-color-dark border-0" aria-label="Choose a country" required>
			<option value="">Seçiniz...</option>
			<option value="AT">Austria</option>
			<option value="FR">France</option>
			<option value="DE">Germany</option>
			<option value="GR">Greece</option>
			<option value="IT">Italy</option>
			<option value="RU">Russia</option>
			<option value="ES">Spain</option>
			<option value="SZ">Swaziland</option>
			<option value="SE">Sweden</option>
			<option value="CH">Switzerland</option>
			<option value="TR">Turkey</option>
			</select>
			</div>
			</div>
			</div>
			<div class="form-row mb-3">
			<div class="form-group col-md-6">
			<input type="text" value="" class="form-control bg-light-5 border-0" placeholder="State / Country" required>
			</div>
			<div class="form-group col-md-6">
			<input type="text" value="" class="form-control bg-light-5 border-0" placeholder="PostCode / ZIP" required>
			</div>
			</div>
			<div class="form-row">
			<div class="col">
			<button class="btn btn-dark btn-outline btn-rounded font-weight-bold btn-h-3 btn-v-3" type="submit">SEPETİ GÜNCELLE</button>
			</div>
			</div>
			</form>
-->
</div>
<!--
<div class="col">
<form class="shipping-calculator" action="#" method="post">
	<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="shipping_notes">SİPARİŞ NOTU::</label>
													<textarea class="form-control line-height-1 bg-light-5" name="shipping_notes" id="shipping_notes" rows="7" required></textarea>
												</div>
<button class="btn btn-dark btn-outline btn-rounded font-weight-bold btn-h-3 btn-v-3" type="submit">NOTU KAYDET</button>
</form>
</div>
-->
</div>

<div class="col-md-6">

			<h2 class="font-weight-bold text-4 mb-3">{{__('SEPET TOPLAM')}}</h2>
			<div class="table-responsive">
			<table class="cart-totals w-100">
			<tbody>
			<!--
			<tr>
			<td><span class="cart-total-label">ARA TOPLAM</span></td>
			<td><span class="cart-total-value">100 TL</span></td>
			</tr>

			<tr>
			<td><span class="cart-total-label">KARGO</span></td>
			<td><span class="cart-total-value">ÜCRETSİZ KARGO</span></td>
			</tr>

			<tr>
			<td><span class="cart-total-label">İNDİRİM</span></td>
			<td><span class="cart-total-value"> - 50TL / % 50</span></td>
			</tr>

			<tr>
			<td><span class="cart-total-label">KDV</span></td>
			<td><span class="cart-total-value">18 TL</span></td>
			</tr>
			-->
			<tr>
			<td><span class="cart-total-label">{{__('TOPLAM')}}</span></td>
			<td><span class="cart-total-value text-color-primary text-4">{{\Cart::getSubTotal()}}{{ config('settings.currency_symbol')}}</span></td>
			</tr>


			<tr class="border-bottom-0">
			<td><span class="cart-total-label">{{__('Sepetinizi onaylıyorsanız adres seçimine geçiniz')}} 	<i class="lnr lnr-arrow-right"></i></span></td>
			<td>

<a href="{{route('checkout.index')}}" class="btn btn-outline btn-default btn-primary btn-2 btn-icon-effect-1" target="_self">
<span class="wrap">
<span>{{__('ADRES SEÇİMİ')}}</span><i class="fa fa-chevron-right "></i>
</span>
</a>


			</td>
			</tr>



			</tbody>
			</table>
			</div>
</div>
</div>





</div>
</section>


</div>

</div>

		@include("site.partials.footer_lite")

</div>

@stop