<aside class="sidebar col-md-4 col-lg-3 order-1 order-md-1">
	</br></br>
<div class="accordion accordion-default accordion-toggle accordion-style-1 accordion-style-1-no-borders-divider accordion-style-1-no-expand mb-4" role="tablist">

<div class="card">
<div class="card-header accordion-header" role="tab" id="pages">
<h3 class="text-3 mb-0">
<a href="#" class="pt-0" data-toggle="collapse" data-target="#togglePages" aria-expanded="false" aria-controls="togglePages">HESABIM / BİLGİLENDİRME</a>
</h3>
</div>
<div id="togglePages" class="accordion-body collapse show" aria-labelledby="pages">
<div class="card-body">
		<ul class="list list-unstyled">
				<li class="mb-2"><a href="/account/orders" class="font-weight-semibold"><i class="fas fa-angle-right ml-1 mr-1 pr-2"></i>{{__('Siparişlerim')}}</a></li>
				<li class="mb-2"><a href="/account/wishlist" class="font-weight-semibold"><i class="fas fa-angle-right ml-1 mr-1 pr-2"></i>{{__('Takip Listem')}}</a></li>
				<li class="mb-2"><a href="/addresses" class="font-weight-semibold"><i class="fas fa-angle-right ml-1 mr-1 pr-2"></i>{{__('Adreslerim')}}</a></li>
				<li class="mb-2"><a href="/account/my-info" class="font-weight-semibold"><i class="fas fa-angle-right ml-1 mr-1 pr-2"></i>{{__('Kişisel Bilgilerim')}}</a></li>
				<li class="mb-2"><a href="/account/return-policy" class="font-weight-semibold"><i class="fas fa-angle-right ml-1 mr-1 pr-2"></i>{{__('Kargo ve İade Koşulları')}}</a></li>
				<li class="mb-2"><a href="/account/terms-of-sale" class="font-weight-semibold"><i class="fas fa-angle-right ml-1 mr-1 pr-2"></i>{{__('Satış Sözleşmesi')}}</a></li>
				<li class="mb-2"><a href="/account/cookie_policy" class="font-weight-semibold"><i class="fas fa-angle-right ml-1 mr-1 pr-2"></i>{{__('Çerez Politikası')}}</a></li>
				<li class="mb-2"><a href="/account/privacy-policy" class="font-weight-semibold"><i class="fas fa-angle-right ml-1 mr-1 pr-2"></i>{{__('Gizlilik Koşulları')}}</a></li>
				<li class="mb-2"><a href="/account/size-guide" class="font-weight-semibold"><i class="fas fa-angle-right ml-1 mr-1 pr-2"></i>{{__('Renk ve Ölçü Rehberi')}}</a></li>
				<li class="mb-2"><a href="/about_us" class="font-weight-semibold"><i class="fas fa-angle-right ml-1 mr-1 pr-2"></i>{{__('Hakkımızda')}}</a></li>
				<li class="mb-2"><a href=" {{ route('contact.index') }} " class="font-weight-semibold"><i class="fas fa-angle-right ml-1 mr-1 pr-2"></i>{{__('İletişim')}}</a></li>


	<li class="mb-2">

		<a href="{{ route('logout') }}" class="font-weight-semibold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-angle-right ml-1 mr-1 pr-2"></i>{{ __("Çıkış Yap")}} </a>

		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
	</li>

		</ul>
</div>
</div>
</div>
</aside>
