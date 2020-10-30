@extends('site.app')
@section('title', 'Kategoriler')
@section('content')
<div class="body">
	<div role="main" class="main">
		<div class="container">

			<ul class="nav sort-source mb-3" data-sort-id="products" data-option-key="filter"
				data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">

			</ul>
			<div class="row">
				@if($is_sidebar_on)
					@include("site.pages.category_products.products_sidebar")
				@endif


				@include("site.pages.category_products.list_products")

			</div>

			<hr class="mt-5 mb-4">
		</div>

	</div>
		@include("site.sections.our_catalogue")




	@include("site.sections.footer")

</div>

@stop
