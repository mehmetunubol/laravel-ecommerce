<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 120}">
<div class="header-body">

<div class="header-top">
<div class="header-top-container container">


<div class="header-row">


<div class="header-column justify-content-start">

<span class="d-none d-sm-flex align-items-center">

<a href="mailto:info@egepleks.com.tr">info@egepleks.com.tr</a><i class="fas fa-envelope ml-1 mr-1 pl-2"></i>
</span>
<span class="d-none d-sm-flex align-items-center ml-4">

<a href="tel:02323768056">0 232 376 80 56 pbx</a><i class="fas fa-phone ml-1 mr-1 pl-2"></i>
</span>

<!--
<ul class="header-top-social-icons social-icons social-icons-transparent d-none d-md-block">
<li class="social-icons-facebook">
<a href="https://www.facebook.com//" target="_blank" title="Facebook"><i class="fab  fa-facebook-f"></i></a>
</li>
<li class="social-icons-instagram">
<a href="https://www.instagram.com//" target="_blank" title="Instragram"><i class="fab  fa-instagram"></i></a>
</li>
</ul> -->

</div>


<div class="header-column justify-content-end">




<ul class="nav">

	@if (\Auth::check())

	<li class="nav-item"><a href="/account/my-info" class="nav-link">{{__("Hesabım")}}<i class="fas fa-user ml-1 mr-1 pl-2"></i></a></li>
	<li class="nav-item"><a href="/account/wishlist" class="nav-link">Takip Listem<i class="fas fa-list ml-1 mr-1 pl-2"></i></a></li>
	<li class="nav-item"><a href="{{ route('checkout.cart') }}" class="nav-link">Sepetim
		<i class="fas fa-shopping-cart"></i>		<span class="badge badge-primary rounded-circle">{{$cartItems->count()}}</span>

	</a></li>


<!-- 
<div class="mini-cart order-4">

<div class="mini-cart-icon">
<img src="/customertemplate/img/icons/cart-bag.svg" class="img-fluid" alt="" />
<span class="badge badge-primary rounded-circle">{{$cartItems->count()}}</span>
</div>

<div class="mini-cart-content">
<div class="inner-wrapper bg-light rounded">
@forelse($cartItems as $item)
<div class="mini-cart-product">
<div class="row">
<div class="col-7">
<h2 class="text-color-default font-secondary text-1 mt-4 mb-0">{{$item->name}}</h2>
<strong class="text-color-dark">
<span class="qty">{{$item->quantity}}x</span>
@if ($item->sale_price > 0)
<span class="product-price">{{ config('settings.currency_symbol') }} {{$item->sale_price}} </span>
@else
<span class="product-price">{{$item->price}}</span>
@endif
</strong>
</div>
<div class="col-5">
<div class="product-image">
<img src="{{ asset('storage/'.$item->attributes->imagePath) }}" class="img-fluid rounded" alt="" />
</div>
</div>
</div>
</div>
@empty
{{__("Sepette ürün bulunmamaktadır")}}
@endforelse
<div class="mini-cart-total">
<div class="row">
<div class="col">
<strong class="text-color-dark">{{__('TOPLAM')}}:</strong>
</div>
<div class="col text-right">
<strong class="total-value text-color-dark">{{\Cart::getSubTotal()}}</strong>
</div>
</div>
</div>
<div class="mini-cart-actions">
<div class="row text-center">
<div class="col-md-6 p-1">
</div>
<div class="col-md-6 col-last p-1">
<a href="{{ route('checkout.cart') }}" class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3">SEPETE GİT</a>
</div>
</div>
</div>
</div>
</div>
</div> -->
@else
	 <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">{{ __("Giriş / Kayıt")}}</a></li> 
@endif


</ul>
</div>
</div>
</div>
</div>

<div class="header-container container">
<div class="header-row">

<div class="header-column justify-content-start">
<div class="header-logo">
<a href="/">
<img alt="LOGO" width="150" height="75" src="/customertemplate/img/vikingLogo.png">
</a>
</div>
</div>

<div class="header-column justify-content-end">


<div class="header-search-expanded">
<form method="POST" action="{{ route('sitesearch.product') }}">
	@csrf
	<div class="input-group bg-light border">
		<input type="text" class="form-control text-4" name="search" placeholder="{{__('Sitede aramak için buraya yazın')}}" aria-label="arama kısmı">
		<span class="input-group-btn">
			<button class="btn" type="submit"><i class="lnr lnr-magnifier text-color-dark"></i></button>
		</span>
	</div>
</form>
</div>


<a href="#" class="header-search-button order-1 text-5 d-none d-sm-block mt-1 mr-1 ml-1 mr-xl-2"><i class="lnr lnr-magnifier"></i></a>

<div class="header-nav">
<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">


<nav class="collapse">
<ul class="nav flex-column flex-lg-row" id="mainNav">


			<li class=""><a class="" href="/">ANASAYFA</a></li>

			<li class="dropdown">
			<a class="dropdown-item dropdown-toggle" href="#">KURUMSAL</a>
			<ul class="dropdown-menu">
			<li><a class="dropdown-item" href="/about_us">HAKKIMIZDA</a></li>
<!-- 			<li><a class="dropdown-item" href="certificates.php">SERTİFİKALAR</a></li> -->
			</ul>
			</li>

			<li class="dropdown">
			<a class="dropdown-item dropdown-toggle" href="/categories">ÜRÜNLER</a>
			<ul class="dropdown-menu">
			@forelse ($categories as $category)
			<li><a class="dropdown-item" href="/category/{{$category->slug}}">{{$category->name}}</a></li>
			@empty
			<li>{{__("Gösterilecek kategori yok")}}</li>
			@endforelse
			</ul>
			</li>


			<li class=""><a class="" href="/catalogue">KATALOG</a></li>

			<li class=""><a class="" href="/contact">İLETİŞİM</a></li>
</ul>
</nav>


</div>

 <div class="header-button d-none d-sm-flex ml-1 ">
<a href="http://www.egepleks.com/contact" class="btn btn-outline btn-default btn-primary btn-2 btn-icon-effect-1" target="_self">
<span class="wrap">
<span>ÖZEL PROJE</span><i class="fa fa-star "></i>
</span>
</a>
</div>

<button class="header-btn-collapse-nav ml-3" data-toggle="collapse" data-target=".header-nav-main nav">
<span class="hamburguer">
<span></span>
<span></span>
<span></span>
</span>
<span class="close">
<span></span>
<span></span>
</span>
</button>

</div>
</div>


</div>
</div>
</div>
</header>