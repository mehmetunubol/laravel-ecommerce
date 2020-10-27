@extends('site.app')
@section('title', 'Login')
@section('content')
<div class="body">
	<div role="main" class="main">
		<div class="container">



	<section class="section">
	<div class="container pb-5">
	<div class="row justify-content-center">
	<div class="col-6 col-md-4 col-lg-5 col-xl-6 mr-sm-auto pb-5 mb-5 pb-md-0 mb-md-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
	<div class="bg-primary position-relative mx-auto" data-plugin-float-element data-plugin-options="{'startPos': 'none', 'speed': 10, 'transition': true, 'style': 'max-width: 250px;'}">
	<div class="rect-size"></div>
	<img src="customertemplate/img/k2.jpg" class="position-absolute" alt="" data-plugin-float-element data-plugin-options="{'startPos': 'none', 'speed': 9, 'horizontal': true, 'transition': true, 'style': 'top: 60px; right: -40%; width: 120%;'}" />
	<img src="customertemplate/img/k1.jpg" class="position-absolute" alt="" data-plugin-float-element data-plugin-options="{'startPos': 'none', 'speed': 8.5, 'transition': true, 'style': 'bottom: -40px; left: -40%; width: 160%;'}" />
	</div>
	</div>
	<div class="col-md-6">
	<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">
	<span class="top-sub-title text-color-primary">EGEPLEKS</span>

	<h2 class="font-weight-bold text-6 mb-3"> Pleksiglastan uygulamalar itina ile yapılır.</h2>
	</div>
	<p class="text-color-light-3 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
	şletmemizde mevcut 2 adet 400w. Pleksi Lazer ve 2 Adet büyük formatlı CNC Router kesim makinalarımızla, Akrilik(Pleksiglas)Levha, Polikarbon, Petg, Aynalı Pleksiglas,PVC,Kompozit Levha, hazırladığınız bilgisayar çıktılarına uygun olarak kesilir.

	</p>

	<p class="text-color-light-3 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">
	Her türlü reklam tüketim malzemelerini bünyesinde bulunduran firmamız, bu malzemelerin toptan satışını yapmaktadır. Bir çok ürünün ithalatını kendimiz yapmakta olup, pek çok ürünün de bölge tek satıcısı olarak hizmetini vermekteyiz.
	</p>

	<!-- <a href="online-katalog/index.html" class="tp-caption btn btn-rounded btn-primary btn-v-2 btn-h-2  font-weight-semibold appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" target="_blank">KATALOĞUMUZU İNCELEYİN</a> -->

	<a href="/customertemplate/assets/catalogue/katalog.pdf"  target="_blank" class="tp-caption btn btn-rounded btn-primary btn-v-2 btn-h-2  font-weight-semibold appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">KATALOĞUMUZU İNCELEYİN</a>





	</div>
	</div>
	</div>
	</section>



</div>


		@include("site.sections.our_catalogue")

</div>


		@include("site.partials.footer_lite")
</div>
@stop

