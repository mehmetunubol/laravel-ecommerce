@extends('admin.app')
@section('title')  @endsection
@push('styles')
    <link type="text/css" href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> </h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title"></h3>
                <form id="form" action="{{ route("admin.users.sendMailToUsers") }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="subject">{{ __("Mail Konusu") }} <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('subject') is-invalid @enderror" type="text" name="subject" id="subject" value="{{ old('subject') }}"/>
                            @error('title') {{ $message }} @enderror
                        </div>
                        <? // This data can be retrieved from a new DB table such as PageTypeTable ?>
                        <div class="form-group">
                            <label class="control-label" for="content"> {{ __("İçerik") }}</label>
                            <textarea hidden name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                            <div name="contenteditor" id="contenteditor" class="form-control">
                                {{ old('content') }}
                            </div>
                        </div>
                        
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ __("Gönder") }}</button>
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
