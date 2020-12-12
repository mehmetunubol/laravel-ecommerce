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
                    @elseif(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <div class="row mb-5">

                <div class="col-md-5 mb-5 mb-md-0">
                    @if($product->images->count() > 0)
                        <img src="{{ asset('storage/'.$product->images->first()->full) }}"
                            class="img-fluid" alt="">
                        <span>
                            @foreach($product->badges as $badge)
                                {{ $badge->name }}
                            @endforeach
                        </span>
                    @else
                        <img src="https://via.placeholder.com/176" class="img-fluid"></a>
                    @endif

                    @if($product->images->count() > 0)

                        <div class="owl-carousel owl-theme manual dots-style-2 nav-style-2 nav-color-dark mb-3"
                            id="thumbGalleryDetail">
                            @foreach($product->images as $image)
                                <div><img src="{{ asset('storage/'.$image->full) }}"
                                        class="img-fluid" alt=""></div>
                            @endforeach
                        </div>

                    @else
                        <img src="https://via.placeholder.com/176" class="img-fluid"></a>
                    @endif

                    <!--
					<div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
					<div><span class="d-block"><img alt="Product Image" src="img/demo/1.jpg" class="img-fluid"></span></div>
					<div><span class="d-block"><img alt="Product Image" src="img/demo/product-2.jpg" class="img-fluid"></span></div>
					<div><span class="d-block"><img alt="Product Image" src="img/demo/product-3.jpg" class="img-fluid"></span></div>
					<div><span class="d-block"><img alt="Product Image" src="img/demo/product-4.jpg" class="img-fluid"></span></div>
					</div> -->

                </div>

                <div class="col-md-7">

                    <h2 class="line-height-1 font-weight-bold mb-3">{{ $product->name }}</h2>
                    @if($product->sale_price > 0)
                        <span class="price font-primary text-6">
                            <strong class="text-color-dark">
                                <span class="num" id="productPrice">{{ $product->sale_price }}</span><span class="currency">{{ config('settings.currency_symbol') }}</span>
                            </strong>
                        </span>
                        <span id="productPriceOld" class="old-price font-primary text-line-trough text-4">
                            <strong class="text-color-default">
                                <span class="num">{{ $product->price }}</span><span class="currency">{{ config('settings.currency_symbol') }}</span>
                            </strong>
                        </span>
                    @else
                        <span class="price font-primary text-6">
                            <strong class="text-color-dark">
                                <span class="num" id="productPrice">{{ $product->price }}</span><span class="currency">{{ config('settings.currency_symbol') }}</span>
                            </strong>
                        </span>

                    @endif
                    @if(auth()->user())

                        <div class="d-flex mt-2 mb-2">
                            @if($wishlist)
                                <form action="{{ route('wishlist.remove') }}" method="POST"
                                    role="form" id="removeFromWishlist">
                                    @csrf
                                    <input type="hidden" name="productId" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-danger"><i
                                            class="lnr lnr-heart text-3 mr-1"></i>
                                        {{ __("Favorilerden Çıkar") }}</button>
                                </form>
                            @else
                                <form action="{{ route('wishlist.add') }}" method="POST" role="form"
                                    id="removeFromWishlist">
                                    @csrf
                                    <input type="hidden" name="productId" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-success"><i
                                            class="lnr lnr-heart text-3 mr-1"></i>
                                        {{ __("Favorilere Ekle") }}</button>
                                </form>
                            @endif
                        </div>
                    @endif

                    <hr class="my-4">

                    <ul class="list list-unstyled">
                        @if($product->status)
                            <!--<p class="mt-4">{{ $product->description }}</p>-->

                            <li>STOK DURUMU: <strong>STOKTA VAR</strong></li>
                            <hr class="my-4">

                            <form class="shop-cart d-flex align-items-center" action="{{ route('product.add.cart') }}" method="post" enctype="multipart/form-data">
                                <div class="container">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <dl class="dlist-inline">
                                                @foreach($attributes as $attribute)
                                                    @php $attributeCheck = in_array($attribute->id, $product->attributes->pluck('attribute_id')->toArray()) @endphp
                                                    @if ($attributeCheck)
                                                        <dt>{{ $attribute->name }}: </dt>
                                                        <dd>
                                                            <select class="form-control form-control-sm option" style="width:180px;" name="{{ mb_strtolower($attribute->name ) }}">
                                                                <option data-price="0" value="-1"> {{ $attribute->name }} seç</option>
                                                                @foreach($product->attributes as $attributeValue)
                                                                    @if ($attributeValue->attribute_id == $attribute->id && $attributeValue->quantity > 0)
                                                                        <option
                                                                            name="{{ $attribute->name }}"
                                                                            data-price="{{ $attributeValue->price }}"
                                                                            value="{{ $attributeValue->value }}"> {{ ucwords($attributeValue->value . ' +'. $attributeValue->price) }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </dd>
                                                    @endif
                                                @endforeach
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="row right">
                                        <div class="col-sm-3">
                                            <div class="quantity">
                                                <input type="button" value="-" class="minus">
                                                <input type="number" step="1" min="1" name="qty" value="1" title="Qty" class="qty" size="2">
                                                <input type="button" value="+" class="plus">
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="productId" value="{{ $product->id }}">
                                            <input type="hidden" name="price" id="finalPrice"
                                                value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">
                                                <!-- <a class="add-to-cart btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-h-2 btn-fs-2 ml-3" href="{{ route('contact.index') }}">{{ __("SİPARİŞ VER")}}</a> -->
                                            <button type="submit"
                                                class="add-to-cart btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-h-2 btn-fs-2 ml-3">{{ __("Sepete Ekle") }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <hr class="my-4">
                        @else
                            <li>STOK DURUMU: <strong>STOKTA YOK</strong></li>
                            <!--<p class="mt-4">{{ $product->description }}</p>-->
                        @endif
                        <li>ÜRÜN KODU: <strong>{{ $product->sku }}</strong></li>
                    </ul>


                    <!--
                    <ul class="list list-inline list-filter mt-0 pb-0">
                        <li class="list-inline-item">
                            <a href="#">A1</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">A2</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">A3</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">A4</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">A5</a>
                        </li>
                    </ul>-->
                    <!--
                    <div class="d-flex align-items-center">
                        <span class="text-2">PAYLAŞ</span>
                        <ul class="social-icons social-icons-dark social-icons-1 ml-3">
                            <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank"
                                    title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank"
                                    title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank"
                                    title="Instagram"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    -->
                </div>

            </div>

            <div class="row mb-5">
                <div class="col">

                    <ul class="nav nav-tabs nav-tabs-default" id="productDetailTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold active" id="productDetailDescTab" data-toggle="tab"
                                href="#productDetailDesc" role="tab" aria-controls="productDetailDesc"
                                aria-expanded="true">ÜRÜN AÇIKLAMASI</a>
                        </li>
                        <!-- TODO TODO: teknik bilgi
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" id="productDetailMoreInfoTab" data-toggle="tab"
                                href="#productDetailMoreInfo" role="tab" aria-controls="productDetailMoreInfo">TEKNİK
                                BİLGİLER</a>
                        </li>
                        -->
                    </ul>

                    <div class="tab-content" id="contentTabProductDetail">

                        <div class="tab-pane fade pt-4 pb-4 show active" id="productDetailDesc" role="tabpanel"
                            aria-labelledby="productDetailDescTab">
                            <p class="text-color-light-3">{{ $product->description }}</p>

                            <p class="text-color-light-3 mb-0"></p>
                        </div>
                        <!-- TODO: teknik bilgi
                        <div class="tab-pane fade pt-4 pb-4" id="productDetailMoreInfo" role="tabpanel"
                            aria-labelledby="productDetailMoreInfoTab">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th class="border-top-0" scope="row">SIZE</th>
                                        <td class="border-top-0">31, 32, 33, 34, 35</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">COLOR</th>
                                        <td>blue, red, rosa, white</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">STYLE</th>
                                        <td>classic, modern</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        -->

                    </div>

                </div>
            </div>
        </div>
        @include("site.content.related_products");
        @include("site.content.recently_viewed_products");
    </div>
    @include("site.sections.our_catalogue")
    @include("site.partials.footer")

</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            /*$('#addToCart').submit(function (e) {
                if ($('.option').val() == 0) {
                    e.preventDefault();
                    alert('Please select an option');
                }
            });*/
            let memory = {};
            $('.option').change(function () {
                const extraPrice = Number($(this).find(':selected').data('price')),
                    currentPrice = parseFloat($('#finalPrice').attr('value')),
                    attrName = $(this).find(':selected').attr('name');
                if( memory[attrName] === undefined ) {
                    memory[attrName] = 0;
                }
                const finalPrice = (extraPrice + currentPrice - memory[attrName]).toFixed(2);
                memory[attrName] = extraPrice;
                $('#finalPrice').val(finalPrice);
                $('#productPrice').html(finalPrice);
                $('#productPriceOld').html("");
            });
        });
    </script>
@endpush
@stop

