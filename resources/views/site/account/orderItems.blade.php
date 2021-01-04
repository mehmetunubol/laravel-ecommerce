@extends('site.app')
@section('title', 'Orders')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">My Account - Orders</h2>
            
            <h2 class="title-page">My Account - Order Details</h2>



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
                                <tr class="text-center">
                                    <th class="product-thumbnail"></th>
                                    <th class="product-name text-left"><strong>{{__('Ürün')}}</strong></th>
                                    <th class="product-price"><strong>{{__('Birim Fiyatı')}}</strong></th>
                                    <th class="product-quantity"><strong>{{__('Adet')}}</strong></th>
                                    <th class="product-subtotal"><strong>{{__('Total')}}</strong></th>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    
                                    <td class="product-thumbnail"><img src="{{ asset('storage/'.$item->product->images->first()->full) }}" class="img-fluid" width="67" alt="" /></td>
                                    <td class="product-name"><a href="/product/{{$item->product->slug}}">{{ Str::words($item->product->name,20) }}</a></td>
                             

                                    <td class="product-price"><span class="unit-price"> {{round($item->price,2) }} {{ config('settings.currency_symbol')}}</span></td>
                                    <td class="product-quantity">

                                    <div class="quantity">
                                    
                                    <span>{{ $item->quantity }}</span>
                                    
                                    </div>
                                    </td>

                                    <td class="product-subtotal"><span class="sub-total"><strong>{{($item->price*$item->quantity) }}{{ config('settings.currency_symbol')}}</strong></span></td>
                                </tr>
                               
                            @empty
                                <div class="col-sm-12">
                                    <p class="alert alert-warning">{{ __("Sipariş detayı bulunamadı") }} </p>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </main>
            </div>
        </div>
    </section>
@stop