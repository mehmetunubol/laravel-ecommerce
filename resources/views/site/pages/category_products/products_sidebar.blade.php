<aside class="sidebar col-md-4 col-lg-3 order-2 order-md-1">
	<div class="accordion accordion-default accordion-toggle accordion-style-1" role="tablist">

		<div class="card">
			<div class="card-header accordion-header" role="tab" id="categories">
				<h5 class="mb-0">
					<a href="#" data-toggle="collapse" data-target="#toggleCategories" aria-expanded="false"
						aria-controls="toggleCategories">KATEGORİ:</a>
				</h5>
			</div>
			<div id="toggleCategories" class="accordion-body collapse show" role="tabpanel"
				aria-labelledby="categories">
				<div class="card-body">
					<ul class="list list-unstyled mb-0">
						@forelse($categories as $cate)
							<li><a href="{{ route('category.show', $cate->slug) }}">{{ $cate->name }}</a></li>
						@empty
							<li><a href="#" {{__("Kategori yok")}}></a></li>
						@endforelse
					</ul>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header accordion-header" role="tab" id="price">
				<h5 class="mb-0">
					<a href="#" data-toggle="collapse" data-target="#togglePrice" aria-expanded="false"
						aria-controls="togglePrice">{{__("FİYAT")}}:</a>
				</h5>
			</div>
			<div id="togglePrice" class="accordion-body collapse show" role="tabpanel" aria-labelledby="price">
				<div class="card-body">
					<div class="slider-range-wrapper">

						<form class=" contact-form form-style-2 d-flex align-items-center justify-content-between"
							method="get">

							<input type="text" value="" data-msg-required="." maxlength="20" class="form-control"
								name="priceLow" id="priceLow" placeholder="" required> -
							<input type="text" value="" data-msg-required="." maxlength="20" class="form-control"
								name="priceHigh" id="priceHigh" placeholder="" required>
							<button type="submit"
								class="btn btn-primary btn-h-1 font-weight-bold rounded-0">FILTER</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			@forelse($attributes as $attribute)
				<div class="card-header accordion-header" role="tab" id="sizes">
					<h5 class="mb-0">
						<a href="#" data-toggle="collapse" data-target="#toggleSizes" aria-expanded="false"
							aria-controls="toggleSizes">{{ $attribute->name }}:</a>
					</h5>
				</div>
				<div id="toggleSizes" class="accordion-body collapse show" role="tabpanel" aria-labelledby="sizes">
					<div class="card-body">
						<ul class="list list-inline list-filter">
							@forelse($attribute->values as $attribute_value)
								<li class="list-inline-item">
									<a href="{{ route('category.show', [ 'slug' => $category->slug, 'filter' => "$attribute_value->value"]) }}">
										{{ $attribute_value->value }} 
									</a>
								</li>
							@empty
								<li></li>
							@endforelse
						</ul>
					</div>
				</div>
			@empty
			@endforelse
		</div>
	</div>
</aside>