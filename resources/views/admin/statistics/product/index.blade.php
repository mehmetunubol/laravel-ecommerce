@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> {{ __("Ürün") }}</th>
                            <th class="text-center"> {{ __("Kaç kere ?") }} </th>
                            <th class="text-center"> {{ __("En Son Güncellenme") }} </th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $index = 0;?>
                            @foreach($stats as $stat)
                                <tr>
                                    <td>{{ $index }}</td>
                                    <td><a href="{{ route('admin.products.edit', $stat->product->id) }}" class="btn btn-sm btn-primary">{{ $stat->product->name }}</a</td>
                                    <td>{{ $stat->count }}</td>
                                    <td>{{ $stat->updated_at}}</td>
                                </tr>
                                <?php $index++;?>
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