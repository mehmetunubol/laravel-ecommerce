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
                            <th> {{ __("Product") }}</th>
                            <th class="text-center"> {{ __("Count") }} </th>
                            <th class="text-center"> {{ __("Updated At") }} </th>
                        </tr>
                        </thead>
                        <tbody>
                            {{ $index = 1 }}
                            @foreach($stats as $stat)
                                <tr>
                                    <td>{{ $index}}</td>
                                    <td><a href="{{ route('admin.products.edit', $stat->product->id) }}" class="btn btn-sm btn-primary">{{ $stat->product->name }}</a</td>
                                    <td>{{ $stat->count }}</td>
                                    <td>{{ $stat->updated_at}}</td>
                                </tr>
                                @php($index++)@endphp
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
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush