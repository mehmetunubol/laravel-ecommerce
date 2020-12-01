<section class="section">
<div class="container">




<div class="row text-center mb-4">
	<div class="col">
	<div class="overflow-hidden">
	<span class="d-block top-sub-title text-color-primary appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" style="animation-delay: 100ms;">EN ÇOK SATANLAR</span>
	</div>
	<div class="overflow-hidden mb-2">
	<h2 class="font-weight-bold mb-0 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="200" style="animation-delay: 200ms;">POPÜLER ÜRÜNLERİMİZ</h2>
	</div>
	</div>
</div>


<div class="row">

<?php $products = \App\Models\Product::orderBy('price', 'desc')->get();?>

@foreach($products as $i => $product)
@if($i < 8)

	<div class="col-sm-6 col-lg-3 mb-lg-0 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
	<div class="text-center mb-4">

			<div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
				<div class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
				<a href="{{ route('product.show', $product->slug) }}">
				@if ($product->images->count() > 0)
				<img src="{{ asset('storage/'.$product->images->first()->full) }}" class="img-fluid" alt="">
				@else
				<div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
				@endif
				</a>
				<span class="image-frame-action">
				<a href="{{ route('product.show', $product->slug) }}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ÜRÜNÜ GÖR</a>
				</span>
				</div>
			</div>

			<h3 class="text-color-default text-2 mb-0"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }} </a></h3>
			@if(isset($product->sale_price))
			<span class="price font-primary text-4"><strong class="text-color-dark">{{ $product->sale_price }}</strong></span>
			<span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">{{ $product->price }}</strong></span>
			@else
			<span class="price font-primary text-4"><strong class="text-color-dark">{{ $product->price }}</strong></span>
			@endif

	</div>
	</div>

@endif
@endforeach
</div>


</div>
</section>
