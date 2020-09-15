@extends('site.app')
@section('title', 'Kategoriler')
@section('content')
<div class="body">
	<div role="main" class="main">
		<div class="container">


<div class="row align-items-center justify-content-between mb-4">
<div class="col-auto mb-3 mb-sm-0">
<form method="get">
<div class="custom-select-1">
<select class="form-control border">
<option value="popularity">Fiyat: Azalan</option>
<option value="rating">Fiyat: Artan</option>
<option value="date" selected="selected">Tarih: Önce Yeni</option>
<option value="price">Tarih: Önce Eski</option>
<option value="price-desc">En çok tercih edilen</option>
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


<ul class="nav sort-source mb-3" data-sort-id="products" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">

</ul>
		
<div class="sort-destination-loader sort-destination-loader-showing">
	<div class="portfolio-list sort-destination" data-sort-id="products">
		@forelse($category->products as $product)
		<div class="col-sm-6 col-md-3 p-0 isotope-item clothes">
		<div class="product portfolio-item portfolio-item-style-2">
		<div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
		<span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
		<a href="{{ route('product.show', $product->slug) }}">
		@if ($product->images->count() > 0)
			<img src="{{ asset('storage/'.$product->images->first()->full) }}" class="img-fluid" alt="">
		@else
	        <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
	    @endif
		</a>
		<span class="image-frame-action">
		<a href="#" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">SEPETE EKLE</a>
		</span>
		</span>
		</div>
		<div class="product-info d-flex flex-column flex-lg-row justify-content-between">
		<div class="product-info-title">
		<h3 class="text-color-default text-2 line-height-1 mb-1"><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
		<span class="price font-primary text-4"><strong class="text-color-dark">{{ config('settings.currency_symbol').$product->sale_price }}</strong></span>
		<span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">{{ config('settings.currency_symbol').$product->price }}</strong></span>
		</div>

		</div>
		</div>
		</div>
		@empty
			<p>{{ __("Hayır") }} Products found in {{ $category->name }}.</p>
		@endforelse
	</div>

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


</div>


		@include("site.sections.our_catalogue")

</div>


		@include("site.partials.footer")

</div>

@stop
