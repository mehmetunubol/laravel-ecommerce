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
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> {{ __("Sipariş") }} {{ __("Numarası") }} </th>
                            <th> {{ __("Müşteri") }} </th>
                            <th class="text-center"> {{ __("Toplam Tutar") }}  </th>
                            <th class="text-center"> {{ __("Ürünler") }}  </th>
                            <th class="text-center"> {{ __("Ödeme Durumu") }} </th>
                            <th class="text-center"> {{ __("Durum") }} </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transfers as $transfer)
                            <tr>
                                <td>{{ $transfer->order_number }}</td>
                                <td>{{ $transfer->user->fullName }}</td>
                                <td class="text-center">{{ $transfer->grand_total }} {{ config('settings.currency_symbol') }}</td>
                                <td class="text-center">{{ $transfer->item_count }}</td>
                                <td class="text-center">
                                    @if ($transfer->payment_status == 1)
                                        <span class="badge badge-success">{{ __("Tamamlandı") }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __("Tamamlanmadı") }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-success">{{ $transfer->status }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.orders.show', $transfer->order_number) }}" class="btn btn-sm btn-primary"><i class="fa fa-star"></i></a>
                                        <a href="{{ route('admin.orders.edit', $transfer->order_number) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('admintemplate/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admintemplate/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
            }
        } );
    </script>
@endpush