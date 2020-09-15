<div class="col-md-8 col-lg-9 order-2 order-md-2 mb-5 mb-md-0">
<h1> TAKİP LİSTEM </h1>

<div class="col">


<div class="table-responsive">
<table class="shop-cart-table w-100">
<thead>

<tr>
<th class="product-remove">SİL</th>
<th class="product-thumbnail">ÜRÜN</th>
<th class="product-name"><strong>ÜRÜN ADI</strong></th>
<th class="product-price"><strong>STOK DURUMU</strong></th>
<th class="product-quantity"><strong>FİYATI</strong></th>
<th class="product-subtotal"><strong>LİNK</strong></th>
</tr>

</thead>
<tbody>

@forelse ($wishlists as $wishlist)
<tr class="cart-item">

	<td class="product-remove">
		<form action="{{ route('wishlist.remove') }}" method="POST" role="form" id="removeFromWishlist">
	        @csrf
	        <input type="hidden" name="productId" value="{{ $wishlist->product->id }}">
	        <button type="submit"><i class="fas fa-times" aria-label="Remove"></i></button>
	    </form>

	</td>

	<td class="product-thumbnail">
		<img src="" class="img-fluid" width="67" alt="" />
	</td>

	<td class="product-name">
		<a href="">{{$wishlist->product->name}}</a>
	</td>

	<td class="product-price">
		STOKTA VAR
	</td>

	<td class="product-price">
		<span class="product-quantity">{{ $wishlist->product->price }} TL</span>
	</td>

</tr>
@empty
<div class="col-sm-12">
    <p class="alert alert-warning">{{ __("No") }} orders to display.</p>
</div>
@endforelse


</tbody>
</table>
</div>

</div>



						</div>

</div>



