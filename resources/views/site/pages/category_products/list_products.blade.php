@php
	$wholeClassName = "col"
@endphp
@if($is_sidebar_on)
 	@php $wholeClassName = "col-md-8 col-lg-9 order-1 order-md-2 mb-5 mb-md-0" @endphp
@endif

<div class="{{$wholeClassName}}">

	<div class="row align-items-center justify-content-between mb-4">
		<div class="col-auto mb-1 mb-sm-0">
			<button class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2" onclick="window.location.href = `{{Request::url()}}?sb`;">
				ÜRÜNLERİ FİLTRELE
			</button>
		</div>
		<div class="col-auto mb-3 mb-sm-0">
			<form method="post">
				<div class="custom-select-1">
					<select class="form-control border" onchange="window.location.href = `{{Request::url()}}?order=${value}`;">
						<option value="" disabled selected>{{__('SIRALAMA')}}</option>
						<option value="price-desc">{{__('Fiyat: Azalan')}}</option>
						<option value="price-asc">{{__('Fiyat: Artan')}}</option>
						<option value="id-asc">{{__('Tarih: Önce Eski')}}</option>
						<option value="id-desc">{{__('Tarih: Önce Yeni')}}</option>
						<option value="order-desc">{{__('En çok tercih edilen')}}</option>
					</select>
				</div>
			</form>






		</div>
		<div class="col-auto">
			<div class="d-flex align-items-center">
				<span>Listelenen: 1-9 / 60 Ürün</span>
			</div>
		</div>
	</div>

	<div class="row">
		@forelse($category->products as $product)
			<div class="col-sm-6 col-md-3 p-0 isotope-item clothes">
				<div class="product portfolio-item portfolio-item-style-2">
					<div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
						<span
							class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
							<a href="{{ route('product.show', $product->slug) }}">
								@if ($product->images->count() > 0)
									<img src="{{ asset('storage/'.$product->images->first()->full) }}" class="img-fluid" alt="">
								@else
									<div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
								@endif
							</a>
							<span class="image-frame-action">
								<a href="{{ route('product.show', $product->slug) }}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">{{ __("ÜRÜNÜ GÖR") }}</a>
							</span>
						</span>
					</div>
					<div class="product-info d-flex flex-column flex-lg-row justify-content-between">
						<div class="product-info-title">
							<h3 class="text-color-default text-2 line-height-1 mb-1">
								<a href="{{ route('product.show', $product->slug) }}"> {{ $product->name }}
								</a>
							</h3>
							@if(isset($product->sale_price))
								<span class="price font-primary text-4">
									<strong class="text-color-dark">
										{{ config('settings.currency_symbol').$product->sale_price }}
									</strong>
								</span>
								<span class="old-price font-primary text-line-trough text-1">
									<strong class="text-color-default">
										{{ config('settings.currency_symbol').$product->price }}
									</strong>
								</span>
							@else
								<span class="price font-primary text-4">
									<strong class="text-color-dark">
										{{ config('settings.currency_symbol').$product->price }}
									</strong>
								</span>
							@endif
						</div>

					</div>
				</div>
			</div>
			@empty
			<p> {{ $category->name }}: {{ __("Bu Kategoride hiç ürün yok") }}.</p>
		@endforelse
	</div>



	<hr class="mt-5 mb-4">
	<div class="row align-items-center justify-content-between mb-2 pb-2">
		<div class="col-auto mb-3 mb-sm-0">
			<span>Listelenen: 1-9 / 60 Ürün</span>
		</div>
		<div class="col-auto">
			<nav aria-label="Page navigation example">
				<ul class="pagination mb-0">
					<li class="page-item">
						<a class="page-link prev" href="#" aria-label="Previous">
							<span><i class="fas fa-angle-left" aria-label="Previous"></i></span>
						</a>
					</li>
					<li class="page-item active"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item">...</li>
					<li class="page-item"><a class="page-link" href="#">15</a></li>
					<li class="page-item">
						<a class="page-link next" href="#" aria-label="Next">
							<span><i class="fas fa-angle-right" aria-label="Next"></i></span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>