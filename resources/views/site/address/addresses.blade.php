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
					<div class="col">
						<div class="table-responsive">
							<table class="table">
								<thead>
										<tr class="cart-item border_bottom_2">
										
										<th class="product-thumbnail">{{__("ADRES ADI")}}</th>
										<!-- <th class="product-name"><strong>{{__("İSİM")}}</strong></th> -->
										<th class="product-name"><strong>{{__("TELEFON")}}</strong></th>
										<th class="product-name"><strong>{{__("ADRES")}}</strong></th>
										<th class="product-price"><strong>{{__("İLÇE")}}</strong></th>
										<th class="product-quantity"><strong>{{__("İL")}}</strong></th>
										<!-- <th class="product-subtotal"><strong>{{__("ÜLKE")}}</strong></th> -->			
										<th class="product-subtotal"><strong>{{__("DÜZENLE")}}</strong></th>
											<th class="product-remove">SİL</th>
									</tr>

								</thead>
								<tbody>
									@forelse ($addresses as $address)
										<tr class="cart-item border_bottom_2">
								
											<td>
												{{$address->address_name}}
											</td>

											<td>
												{{$address->phone}}
											</td>
											<td width="300">
												{{ $address->address }}
											</td>
											<td >
												{{$address->district}}
											</td>
											<td>
												{{$address->city}}
											</td>

											<td >
												<a class="btn btn-rounded font-weight-bold btn-h-1 btn-v-1 btn-warning" href="/address/edit/{{$address->id}}">{{__('Düzenle')}}</a>
											</td>
											<td class="product-remove">
													<form action="{{ route('address.delete') }}" method="POST" role="form" id="removeFromaddress">
													@csrf
													<input type="hidden" name="addressID" value="{{ $address->id }}">
													<button class="btn btn-rounded font-weight-bold  btn-danger"type="submit"><i class="fas fa-trash" aria-label="Remove"></i></button>
													</form>
											</td>
										</tr>
</br>
									@empty
										<div class="col-sm-12">
										    <p class="alert alert-warning">Kayıtlı adresiniz bulunmamaktadır.</p>
										</div>
									@endforelse


								</tbody>
							</table>
</br>
				<a class="btn btn-primary btn-rounded font-weight-bold btn-h-1 btn-v-2" href="/address/create">{{__('Yeni Adres Ekle')}}</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include("site.partials.footer_lite")
@stop