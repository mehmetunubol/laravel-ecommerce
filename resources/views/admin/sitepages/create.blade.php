@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@push('styles')
    <link type="text/css" href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
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
                <form id="form" action="{{ route('admin.sitepages.store') }}" method="POST" role="form" enctype="multipart/form-data">
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
                            <textarea hidden name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                            <div name="contenteditor" id="contenteditor" class="form-control">
                                {{ old('content') }}
                            </div>
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
@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="/admintemplate/js/plugins/quill.htmlEditButton.min.js"></script> 
    <script>
        Quill.register("modules/htmlEditButton", htmlEditButton);
        var options = {
            modules: {
                htmlEditButton: {}
            },
            theme: 'snow'
        };
        var quill = new Quill('#contenteditor', options);
            $("#form").on("submit",function(){
                $("#content").val(quill.root.innerHTML);
                return true;
            });        
    </script>
@endpush
