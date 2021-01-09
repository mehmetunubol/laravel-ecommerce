@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-bar-chart"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><i class="fa fa-globe"></i> {{ $order->order_number }}</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">{{ __("Tarih") }}: {{ $order->created_at->toFormattedDateString() }}</h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-3">{{ __("Müşteri") }}
                            <address><strong>{{ $order->user->fullName }}</strong><br>Email: {{ $order->user->email }}</address>
                        </div>
                        <div class="col-3">{{ __("Kargo Adresi") }}
                            <address><strong>{{ $order->first_name }} {{ $order->last_name }}</strong><br>{{ $order->address }}<br>{{ $order->city }}, {{ $order->country }} {{ $order->post_code }}<br>{{ $order->phone_number }}<br></address>
                        </div>
                        <div class="col-3">
                            <b>{{ __("Sipariş Numarası") }}:</b> {{ $order->order_number }}<br>
                            <b>{{ __("Toplam") }}:</b> {{ round($order->grand_total, 2) }} {{ config('settings.currency_symbol') }}<br>
                            <b>{{ __("Ödeme Methodu") }}:</b> {{ $order->payment_method }}<br>
                            <b>{{ __("Ödeme Durumu") }}:</b> {{ $order->payment_status == 1 ?  __("Tamamlandı") : __("Tamamlanmadı") }}<br>
                            <b>{{ __("Sipariş Durumu") }}:</b> {{ __(orderStatusToTr($order->status)) }}<br>
                        </div>
                        <div class="col-3">
                        <form action="{{ route('admin.orders.update') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="tile-body">
                                <input hidden id="number" name="number" value="{{$order->order_number}}"/>
                                <div class="form-group">
                                    @foreach($states as $state)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" id="state" name="state" value="{{$state}}"
                                                {{ $order->status == $state ? 'checked' : '' }}
                                                /> {{ __(orderStatusToTr($state)) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ __("Güncelle") }}</button>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-secondary" href="{{ route('admin.orders.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>{{ __("Geri") }}</a>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>{{ __("ID") }}</th>
                                    <th>{{ __("Ürün") }}</th>
                                    <th>{{ __("Ürün Id") }}</th>
                                    <th>{{ __("Adet") }}</th>
                                    <th>{{ __("Ücret") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->product->sku }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ round($item->price, 2) }}{{ config('settings.currency_symbol') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection