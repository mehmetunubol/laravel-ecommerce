@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.sitepages.create') }}" class="btn btn-primary pull-right">{{ __("Sayfa") }} {{ __("Ekle") }}</a>
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
                            <th> {{ __("Başlık") }}</th>
                            <th> {{ __("Slug") }}</th>
                            <th> {{ __("Tip") }} </th>
                            <th> {{ __("Header") }} </th>
                            <th> {{ __("Footer") }} </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sitepages as $sitepage)
                            <tr>
                                <td>{{ $sitepage->id }}</td>
                                <td>{{ $sitepage->title }}</td>
                                <td>{{ $sitepage->slug }}</td>
                                <td>{{ $sitepage->type_id }}</td>
                                <td>{{ $sitepage->show_in_header }}</td>
                                <td>{{ $sitepage->show_in_footer }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.sitepages.edit', $sitepage->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.sitepages.delete', $sitepage->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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