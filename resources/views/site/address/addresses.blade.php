@extends('site.app')
@section('title', 'Login')
@section('content')
<div class="body">
	<div role="main" class="main">
		<div class="container">
			<div class="row">
				@include("site.account.account_page_sidebar")
				<div class="col-md-8 col-lg-9 order-2 order-md-2 mb-5 mb-md-0">
					<h1> {{ __("ADRESLERİM") }} </h1>
					<a class="btn btn-success" href="/address/create">{{__('Yeni Adres Ekle')}}</a>
					<div class="col">
						<div class="table-responsive">
							<table class="shop-cart-table w-100">
								<thead>
									<tr>
										<th class="product-remove">SİL</th>
										<th class="product-thumbnail">{{__("ADRES ADI")}}</th>
										<th class="product-name"><strong>{{__("İSİM")}}</strong></th>
										<th class="product-name"><strong>{{__("TELEFON")}}</strong></th>
										<th class="product-name"><strong>{{__("ADRES")}}</strong></th>
										<th class="product-price"><strong>{{__("İLÇE")}}</strong></th>
										<th class="product-quantity"><strong>{{__("İL")}}</strong></th>
										<th class="product-subtotal"><strong>{{__("ÜLKE")}}</strong></th>
										<th class="product-subtotal"><strong>{{__("DÜZENLE")}}</strong></th>
									</tr>

								</thead>
								<tbody>
									@forelse ($addresses as $address)
										<tr class="cart-item">
											<td class="product-remove">
												<form action="{{ route('address.delete') }}" method="POST" role="form" id="removeFromaddress">
											        @csrf
											        <input type="hidden" name="addressID" value="{{ $address->id }}">
											        <button type="submit"><i class="fas fa-times" aria-label="Remove"></i></button>
											    </form>
											</td>
											<td>
												{{$address->address_name}}
											</td>
											<td >
												{{$address->first_name}} {{$address->last_name}}
											</td>
											<td>
												{{$address->phone}}
											</td>
											<td width="150">
												{{ $address->address }}
											</td>
											<td >
												{{$address->district}}
											</td>
											<td>
												{{$address->city}}
											</td>
											<td >
												{{$address->country}}
											</td>
											<td >
												<a class="btn btn-warning" href="/address/edit/{{$address->id}}">{{__('Düzenle')}}</a>
											</td>
										</tr>
									@empty
										<div class="col-sm-12">
										    <p class="alert alert-warning">{{ __("No") }} orders to display.</p>
										</div>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include("site.partials.footer_lite")
@stop