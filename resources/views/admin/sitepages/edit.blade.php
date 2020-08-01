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
                <form action="{{ route('admin.sitepages.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">{{ __("Başlık") }} <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $sitepage->title) }}"/>
                            <input type="hidden" name="id" value="{{ $sitepage->id }}">
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
                            <div class="row">
                                    @if ($sitepage->logo != null)
                                    <div class="col-md-2">
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                                <img src="{{ asset('storage/'.$sitepage->logo) }}" id="sitepageLogo" class="img-fluid" alt="img">
                                        </figure>
                                    </div>
                                @endif
                                <div class="col-md-10">
                                    <label class="control-label">{{ __("Logo") }}</label>
                                    <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo"/>
                                    @error('logo') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content"> {{ __("İçerik") }}</label>
                            <textarea name="content" id="content" rows="8" class="form-control">{{ old('content', $sitepage->content) }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input"
                                            type="checkbox"
                                            id="show_in_header"
                                            name="show_in_header"
                                            {{ $sitepage->show_in_header == 1 ? 'checked' : '' }}
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
                                            {{ $sitepage->show_in_footer == 1 ? 'checked' : '' }}
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