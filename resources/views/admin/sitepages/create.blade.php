@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.sitepages.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">{{ __("Başlık") }} <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            @error('title') {{ $message }} @enderror
                        </div>
                        <? // This data can be retrieved from a new DB table such as PageTypeTable ?>
                        @php
                            $types=array();
                            $type['id'] = 1;
                            $type['name'] = "Temel";
                            array_push($types, $type);
                        @endphp
                        <div class="form-group">
                            <label class="control-label" for="types">{{ __("Tip") }}</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                            @foreach($types as $type)
                            <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{ __("Logo") }}</label>
                            <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo"/>
                            @error('logo') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content"> {{ __("İçerik") }}</label>
                            <textarea name="content" id="content" rows="8" class="form-control">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input"
                                            type="checkbox"
                                            id="show_in_header"
                                            name="show_in_header"
                                        />{{ __("Header") }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input"
                                            type="checkbox"
                                            id="show_in_footer"
                                            name="show_in_footer"
                                        />{{ __("Footer") }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ __("Kaydet") }}</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.sitepages.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>{{ __("İptal") }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection