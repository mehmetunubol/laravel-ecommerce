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
                        <div class="col-12">
                            <h2 class="text-center page-header"><i class="fa fa-globe"></i> {{ $sitesearch->search }}</h2>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="row">
                        <div class="col-6">
                            <h5 class="text-center">{{ __("Ilk Arama Zamanı") }}</h5> <h6 class="text-center">{{ $sitesearch->created_at->toDayDateTimeString() }}</h6>
                        </div>
                        <div class="col-6">
                            <h5 class="text-center">{{ __("Son Arama Zamanı") }}</h5> <h6 class="text-center">{{ $sitesearch->updated_at->toDayDateTimeString() }}</h6>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="row invoice-info">
                        <div class="col-4 text-center"><strong>{{ __("Aranan Kelime") }}</strong>
                            <br>{{ $sitesearch->search }}<br>
                        </div>
                        <div class="col-4 text-center"><strong>{{ __("Kaç Kere Aranmış") }}</strong>
                            <br>{{ $sitesearch->count }}
                        </div>
                        <div class="col-4 text-center"><strong>{{ __("Son Arama Dönen Sonuç Sayısı") }}</strong>
                            <br>{{ $sitesearch->results }}
                        </div>
                    </div>
                    <br><br><br><br>
                    <div class="row">
                        <div class="col-md-6 offset-3 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">{{ __("Arama ile eşleşen ürün id'leri") }}</th>
                                    <th class="text-center">{{ __("Ürüne git") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($sitesearch->result_ids as $id)
                                        <tr>
                                            <td class="text-center">{{ $id }}</td>
                                            <td class="text-center"><a href="{{ route('admin.products.edit', $id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a></td>
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