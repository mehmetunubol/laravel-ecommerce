<section class="section pt-0 pb-5">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col">
                <div class="overflow-hidden">
                    <span
                        class="d-block top-sub-title text-color-primary appear-animation animated maskUp appear-animation-visible"
                        data-appear-animation="maskUp" style="animation-delay: 100ms;">EGEPLEKS</span>
                </div>
                <div class="overflow-hidden mb-2">
                    <h2 class="font-weight-bold mb-0 appear-animation animated maskUp appear-animation-visible"
                        data-appear-animation="maskUp" data-appear-animation-delay="200"
                        style="animation-delay: 200ms;">YENİ ÜRÜNLER</h2>
                </div>
            </div>
        </div>
        <div class="row appear-animation animated fadeInUpShorter appear-animation-visible"
            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" style="animation-delay: 400ms;">
            <div class="col">
                <div class="owl-carousel owl-theme nav-style-3 owl-loaded owl-drag owl-carousel-init"
                    data-plugin-options="{'loop': true, 'autoplay': false, 'items': 4, 'nav': true, 'dots': false, 'margin': 20, 'autoplayHoverPause': true, 'autoHeight': true}">
                    <div class="owl-stage-outer owl-height" style="height: 318.5px;">
                        <div class="owl-stage"
							style="transform: translate3d(-3390px, 0px, 0px); transition: all 0.25s ease 0s; width: 6780px;">
							
							<?php $products = \App\Models\Product::orderBy('id', 'desc')->get();?>
							@foreach($products as $i => $product)
                            <div class="owl-item cloned" style="width: 262.5px; margin-right: 20px;">
                                <div class="text-center">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                        <div
                                            class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                            <a href="{{ route('product.show', $product->slug) }}">
												@if ($product->images->count() > 0)
													<img src="{{ asset('storage/'.$product->images->first()->full) }}" class="img-fluid" alt="">
												@else
													<div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
												@endif
                                            </a>
                                            <div class="image-frame-action">
                                                <a href="{{ route('product.show', $product->slug) }}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ÜRÜNÜ GÖR</a>
                                            </div>
                                        </div>
                                    </div>
									<h3 class="text-color-default text-2 mb-0"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }} </a></h3>
									@if(isset($product->sale_price))
										<span class="price font-primary text-4"><strong class="text-color-dark">{{ $product->sale_price }} {{ config('settings.currency_symbol') }}</strong></span>
										<span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">{{ $product->price }} {{ config('settings.currency_symbol') }}</strong></span>
									@else
										<span class="price font-primary text-4"><strong class="text-color-dark">{{ $product->price }} {{ config('settings.currency_symbol') }}</strong></span>
									@endif
                                </div>
                            </div>
							@endforeach

                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"></button><button
                            type="button" role="presentation" class="owl-next"></button></div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
        </div>
    </div>
</section>
