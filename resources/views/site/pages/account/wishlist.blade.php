@extends('site.app')
@section('title', '{{__("Wishlist")}}')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">My Account - Wishlist</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <main class="col-sm-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">{{ __("SKU") }}</th>
                                <th scope="col">{{ __("Ürün Adı") }}</th>
                                <th scope="col">{{ __("Fiyat") }}</th>
                                <th scope="col">{{ __("İşlem") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($wishlists as $wishlist)
                                <tr>
                                    <th scope="row">{{ $wishlist->product->sku }}</th>
                                    <td>{{ $wishlist->product->name }}</td>
                                    <td>{{ $wishlist->product->price }}</td>
                                    <td>
                                        <form action="{{ route('wishlist.remove') }}" method="POST" role="form" id="removeFromWishlist">
                                            @csrf
                                            <input type="hidden" name="productId" value="{{ $wishlist->product->id }}">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> {{__("Remove From Wishlist") }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="col-sm-12">
                                    <p class="alert alert-warning">{{ __("Hayır") }} orders to display.</p>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </section>
@stop