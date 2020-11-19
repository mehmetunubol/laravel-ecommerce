@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <!--<a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right">{{ __("Ekle") }} User</a>-->
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
                            <th class="text-center"> {{ __("İsim") }}</th>
                            <th class="text-center"> {{ __("Email") }} </th>
                            <th class="text-center"> {{ __("Adres") }} </th>
                            <th class="text-center"> {{ __("Siparişler") }} </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->first_name . " " . $user->last_name}}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->orders }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <!--<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>-->
                                            <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            <a href="{{ route('admin.users.loginToUser', $user->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-arrow-circle-right"></i></a>
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