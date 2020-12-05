<section class="section bg-light-2 mt-1">
					<div class="container">
						<div class="row">
							<div class="col">
								<h2 class="font-weight-bold text-6 mb-4">{{__("Benzer Ürünler")}}</h2>
							</div>
						</div>
						<div class="row">
							@foreach($similarProducts as $sProduct)
							<div class="col-sm-6 col-md-3 mb-4">
								<div class="product portfolio-item portfolio-item-style-2">
									<div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
										<span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
											<a href="{{ route('product.show', $sProduct->slug) }}">
												@if ($sProduct->images->count() > 0)
													<img src="{{ asset('storage/'.$sProduct->images->first()->full) }}" class="img-fluid" alt="">
												@else
													<img src="https://via.placeholder.com/176" class="img-fluid" ></a>
												@endif
											</a>
											<span class="image-frame-action">
												<a href="{{ route('product.show', $sProduct->slug) }}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">SEPETE AT</a>
											</span>
										</span>
									</div>
									<div class="product-info d-flex flex-column flex-lg-row justify-content-between">
										<div class="product-info-title">
											<h3 class="text-color-default text-2 line-height-1 mb-1"><a href="{{ route('product.show', $sProduct->slug) }}">{{ $sProduct->name }}</a></h3>
											@if(isset($sProduct->sale_price))
												<span class="price font-primary text-4"><strong class="text-color-dark">{{$sProduct->sale_price }}{{ config('settings.currency_symbol')}}</strong></span>
												<span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">{{$sProduct->price }}{{ config('settings.currency_symbol')}}</strong></span>
											@else
												<span class="price font-primary text-4"><strong class="text-color-dark">{{$sProduct->price }}{{ config('settings.currency_symbol')}}</strong></span>
											@endif
										</div>

									</div>
								</div>
							</div>
							@endforeach

						</div>
					</div>
				</section>
