<div class="col-md-8 col-lg-9 order-2 order-md-2 mb-5 mb-md-0">
<h1> SİPARİŞLERİM </h1>

<div class="col">
<form class="shop-cart" method="post" action="#">

<div class="table-responsive">
<table class="shop-cart-table w-100">
<thead>

<tr>
<th class="product-price">{{ __("Sipariş Numarası") }}</th>
<th class="product-thumbnail">{{ __("Tarih") }}</th>
<th class="product-name"><strong>{{ __("Ürün Adı") }}</strong></th>
<th class="product-price"><strong>{{ __("Durum") }}</strong></th>
<th class="product-quantity"><strong>{{ __("Fiyat") }}</strong></th>
<th class="product-subtotal"><strong>{{ __("Kargo Takip") }}</strong></th>
</tr>

</thead>
<tbody>

@forelse ($orders as $order)
<tr class="cart-item">

<td class="product-price">
{{ $order->order_number }}
</td>

<td class="product-thumbnail">
{{ $order->created_at }}
</td>

<td class="product-name">
<a href="">ürünler gösterilecek</a>
</td>

<td class="product-price">
<strong>{{ strtoupper($order->status) }}</strong>
</td>

<td class="product-price">
<span class="product-quantity">{{ round($order->grand_total, 2) }} {{ config('settings.currency_symbol') }}</span>
</td>



<td class="product-subtotal">
<span class="sub-total"><strong><a href="">LİNK</a></strong></span>
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

</form>
</div>



						</div>

</div>