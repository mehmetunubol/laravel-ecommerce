@extends('site.app')
@section('title', 'Reset Password')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email adresinizi onaylayın') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Yeni bir onaylama linki email hesabınıza yollandı.') }}
                        </div>
                    @endif

                    {{ __('Devam etmeden önce, lütfen kayıt olduğunuz email hesabınıza gelen email doğrulama linkine tıklayın.') }}
                    {{ __('Böyle bir email almadıysanız') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('yenisini almak için buraya tıklayın') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
