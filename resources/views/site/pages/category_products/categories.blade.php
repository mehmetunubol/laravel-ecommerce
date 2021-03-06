@extends('site.app')
@section('title', 'Kategoriler')
@section('content')
<div class="body">
	<div role="main" class="main">
		<div class="container">

	<div class="row p-1 m-3 ">
<h2 class="font-weight-bold text-6 mb-3">ÜRÜN KATEGORİLERİMİZ</h2>
<div class="col">
</div>
</div>


			<ul class="nav sort-source mb-3" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
				<li class="nav-item" data-option-value="*"><a class="nav-link active" href="#"></a></li>

				<li class="nav-item" data-option-value=".brands"><a class="nav-link text-uppercase" href="#"></a></li>

				<li class="nav-item" data-option-value=".design"><a class="nav-link text-uppercase" href="#"></a></li>

				<li class="nav-item" data-option-value=".web"><a class="nav-link text-uppercase" href="#"></a></li>

				<li class="nav-item" data-option-value=".ads"><a class="nav-link text-uppercase" href="#"></a></li>
			</ul>

			<div class="sort-destination-loader sort-destination-loader-showing min-height-800" data-plugin-remove-min-height>
			<ul class="portfolio-list portfolio-list-style-2 sort-destination" data-sort-id="portfolio">

			@forelse ($categories as $category)
			<li class="col-sm-6 col-md-3 p-0 mb-3 isotope-item  ">
				<div class="portfolio-item text-center">
					<a href="/category/{{$category->slug}}">
						<span class="image-frame image-frame-style-1 box-shadow-effect-1   mb-3 ">
						<span class="image-frame-wrapper">
						<img src="{{ asset('storage/'.$category->image) }}" class="img-fluid" alt="">
		
						</span>
					</a>
						<h2 class="font-weight-bold line-height-4 text-4 mb-0">
					<a href="/category/{{$category->slug}}" class="link-color-dark">{{$category->name}}</a>
					</h2>
				</div>
			</li>
			@empty
				{{__("Kategori yok")}}
			@endforelse



			</ul>
			</div>




		</div>


			@include("site.sections.our_catalogue")

	</div>


		@include("site.partials.footer")

</div>

@stop
