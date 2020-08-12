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
                            <th> {{ __("Kategori") }} </th>
                            <th> # </th>
                            <th> Id </th>
                            <th> SKU </th>
                            <th> {{ __("İsim") }}</th>
                            <th class="text-center"> {{ __("Özel Sıralama") }} </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                    <tr>
                                        <form action="{{ route('admin.products.setOrder') }}" method="POST" role="form">
                                            @csrf
                                            <td> @foreach($product->categories as $category) {{ $category->name }} @endforeach</td>
                                            <td data-order="{{ ($product->order)?$product->order:'last' }}">{{ $product->order }}</td>
                                            <td><input hidden id="product_id" name="product_id" value="{{ $product->id }}"/>{{ $product->id }}</td>
                                            <td>{{ $product->sku }}</td>
                                            <td>{{ $product->name }}</td>    
                                            <td>
                                                <input
                                                    class="form-control @error('order') is-invalid @enderror"
                                                    type="number"
                                                    placeholder="{{ __('Özel Sıralamayı gir') }}"
                                                    id="order"
                                                    name="order"
                                                    value="{{ old('order', $product->order) }}"
                                                />
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Second group">
                                                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ __("Kaydet") }}</button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
                                </form>
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
    <script type="text/javascript">$('#sampleTable').DataTable({ "order": [[ 0, "asc" ], [ 1, 'desc' ]] });</script>
@endpush