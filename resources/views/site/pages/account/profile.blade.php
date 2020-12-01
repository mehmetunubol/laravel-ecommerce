@extends('site.app')
@section('title', 'Register')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">{{ __("Kayıt Ol") }}</h2>
        </div>
    </section>
    <section class="section-content bg padding-y">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">{{ __("Profil") }}</h4>
                    </header>
    <article class="card-body">
        <form action="{{ route('account.profile') }}" method="POST" role="form">
            @csrf
            <div class="form-row">
                <div class="col form-group">
                    <label for="first_name">{{ __("İsim") }}</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ $user->first_name }}">
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col form-group">
                    <label for="last_name">{{ __("Soyisim") }}</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ $user->last_name }}">
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="email">{{ __("E-Mail Adresi") }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $user->email }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">{{ __("Adres") }}</label>
                <input class="form-control" type="text" name="address" id="address" value="{{ $user->address }}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">{{ __("Şehir") }}</label>
                    <input type="text" class="form-control" name="city" id="city" value="{{ $user->city }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="country">{{ __("Ülke") }}</label>
                    <select id="country" class="form-control" name="country">
                        <option value="Turkey" <?php echo ($user->country == 'Turkey')?'selected':''; ?>>Turkey</option>
                        <option value="United Kingdom" <?php echo ($user->country == 'United Kingdom')?'selected':''; ?>>United Kingdom</option>
                        <option value="France" <?php echo ($user->country == 'France')?'selected':''; ?>>France</option>
                        <option value="United States" <?php echo ($user->country == 'Turkey')?'United States':''; ?>>United States</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block"> {{ __("Güncelle") }} </button>
            </div>
        </form>
    </article>
                    <!--<div class="border-top card-body text-center">Delete the account <a href="{{ route('account.delete') }}">Delete</a></div>-->
                </div>
            </div>
        </div>
    </section>
@stop