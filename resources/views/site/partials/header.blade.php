<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 120}">
<div class="header-body">

<div class="header-top">
<div class="header-top-container container">


<div class="header-row">


<div class="header-column justify-content-start">

<span class="d-none d-sm-flex align-items-center">
<i class="fas fa-envelope mr-1"></i>
info@egepleks.com.tr
</span>
<span class="d-none d-sm-flex align-items-center ml-4">
<i class="fas fa-phone mr-1"></i>
<a href="tel:+1234567890">0 232 376 80 56 pbx</a>
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

	<li class="nav-item"><a href="/account/my-info" class="nav-link">{{__("Hesabım")}}</a></li>
	<li class="nav-item">
		<a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __("Çıkış Yap")}} </a>
	</li>

	<li class="nav-item"><a href="/account/wishlist" class="nav-link">FAVORİLERİM</a></li>
	<li class="nav-item"><a href="{{ route('checkout.cart') }}" class="nav-link">SEPET</a></li>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

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
							<h2 class="text-color-default font-secondary text-1 mt-3 mb-0">{{$item->name}}</h2>
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
								<a href="#" class="btn btn-light btn-rounded justify-content-center align-items-center"><i class="fas fa-times"></i></a>
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
					<div class="row">

						<div class="col p-1 text-center">
							<a href="{{ route('checkout.cart') }}" class="btn btn-outline btn-default btn-primary btn-2">ALIŞ VERİŞİ TAMAMLA</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
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
			<li><a class="dropdown-item" href="certificates.php">SERTİFİKALAR</a></li>
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
<a href="Teklif İstiyorum" class="btn btn-outline btn-default btn-primary btn-2 btn-icon-effect-1" target="_blank">
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
