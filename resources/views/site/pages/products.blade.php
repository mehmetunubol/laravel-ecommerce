@extends('site.app')
@section('title', 'Arama')
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
         </div>
         <ul class="nav sort-source mb-3" data-sort-id="products" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
         </ul>
         <div class="sort-destination-loader sort-destination-loader-showing">
            <div class="portfolio-list sort-destination" data-sort-id="products">
               @forelse($products as $product)
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
                           @if(isset($product->sale_price))
                           <span class="price font-primary text-4"><strong class="text-color-dark"> {{$product->sale_price }} {{ config('settings.currency_symbol')}}</strong></span>
                           <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default"> {{$product->price }} {{ config('settings.currency_symbol')}}</strong></span>
                           @else
                           <span class="price font-primary text-4"><strong class="text-color-dark"> {{ $product->price }} {{ config('settings.currency_symbol')}}</strong></span>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
               @empty
               <p> {{ __("Hiç ürün bulunamadı") }}.</p>
               @endforelse
            </div>
         </div>
         <hr class="mt-5 mb-4">
         
         {{ $products->links()}}

      </div>
    </div>
      @include("site.sections.our_catalogue")
   @include("site.partials.footer")
</div>
@stop
