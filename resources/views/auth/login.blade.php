@extends('site.app')
@section('title', 'Login')
@section('content')


<div class="container">



<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
				<div class="bg-primary rounded p-5">
					<span class="top-sub-title text-color-light-2">KAYITLI ÜYELER</span>
					<h2 class="text-color-light font-weight-bold text-4 mb-4">Giriş Yapın</h2>

					<form action="{{ route('login') }}" id="frmSignIn" method="post">
						@csrf
						<div class="form-row">
							<div class="form-group col mb-2">
								<label class="text-color-light-2" for="frmSignInEmail">{{ __("E-Mail Adresi") }}</label>

								<input type="email" value="{{ old('email') }}" maxlength="100" class="form-control bg-light rounded border-0 text-1 @error('email') is-invalid @enderror" name="email" id="frmSignInEmail">
								@error('email')
                                	<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col">
								<label class="text-color-light-2" for="frmSignInPassword">{{ __("Şifre") }}</label>
								<input type="password" value="" class="form-control bg-light rounded border-0 text-1 @error('password') is-invalid @enderror" name="password" id="frmSignInPassword">
							</div>
							@error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="form-row mb-3">
							<div class="form-group col">
								<div class="form-check checkbox-custom checkbox-custom-transparent checkbox-default">
						        	<input class="form-check-input" type="checkbox" id="frmSignInRemember" name="remember" {{ old('remember') ? 'checked' : '' }}>
					        		<label class="form-check-label text-color-light-2" for="frmSignInRemember">
					          			{{ __('Beni Hatırla') }}
					        		</label>
						      	</div>
						    </div>
					      	<div class="form-group col text-right">
					      		<a href="{{route('password.request')}}" class="forgot-pw text-color-light-2 d-block">{{ __('Şifremi Unuttum')}}</a>
					      	</div>
						</div>
						<div class="row align-items-center">
							<div class="col text-right">
								<button type="submit" class="btn btn-dark btn-rounded btn-v-3 btn-h-3 font-weight-bold">{{ __("Giriş") }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-6 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
				<div class="border rounded h-100 p-5">
					<span class="top-sub-title text-color-primary">{{__('HESABINIZ YOKSA KAYIT OLUN')}}</span>

					<h2 class="font-weight-bold text-4 mb-4">hızlı kayıt</h2>

					<form action="{{ route('register') }}" id="frmRegister" role="form" method="post">
						@csrf
						<div class="form-row">
							<div class="form-group col mb-2">
								<label for="frmFirstName">{{ __("İsim") }}</label>
								<input type="text" value="{{ old('first_name') }}" maxlength="100" class="form-control bg-light-5 rounded border-0 text-1 @error('first_name') is-invalid @enderror" name="first_name" id="frmFirstName">
								@error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col mb-2">
								<label for="frmLastName">{{ __("Soyisim") }}</label>
								<input type="text" value="{{ old('last_name') }}" maxlength="100" class="form-control bg-light-5 rounded border-0 text-1 @error('last_name') is-invalid @enderror" name="last_name" id="frmLastName">
								
								@error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col mb-2">
								<label for="frmRegisterEmail">{{ __("E-Mail Adresi") }}</label>
								<input type="email" value="{{ old('email') }}" maxlength="100" class="form-control bg-light-5 rounded border-0 text-1 @error('email') is-invalid @enderror" name="email" id="frmRegisterEmail">

								@error('email')
                                	<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

							</div>
						</div>
						<div class="form-row mb-5">
							<div class="form-group col-lg-6">
								<label for="frmRegisterPassword">{{ __("Şifre") }}</label>
								<input type="password" value="" class="form-control bg-light-5 rounded border-0 text-1 @error('password') is-invalid @enderror" name="password" id="frmRegisterPassword">

								@error('password')
                                	<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							<div class="form-group col-lg-6">
								<label for="frmRegisterPasswordConfirmation">{{ __("Şifreyi Tekrarla") }}</label>
								<input type="password" value="" class="form-control bg-light-5 rounded border-0 text-1 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="frmRegisterPasswordConfirmation">

								@error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col mb-2">
								<label for="frmAddress">{{ __("Adres") }}</label>
								<input type="text" value="{{ old('address') }}" maxlength="100" class="form-control bg-light-5 rounded border-0 text-1 " name="address" id="frmAddress">
							</div>
						</div>	
						<div class="form-row mb-5">
							<div class="form-group col-lg-6">
								<label for="frmCity">{{ __("Şehir") }}</label>
								<input type="text" value="{{ old('city') }}" maxlength="100" class="form-control bg-light-5 rounded border-0 text-1 " name="city" id="frmCity">
							</div>
												
							<div class="form-group col-lg-6">
								<label for="frmCountry">{{ __("Ülke") }}</label>
								<select id="frmCountry" class="form-control bg-light-5 rounded border-0 text-1" name="country">
                                    <option value="Turkey" selected="">Türkiye</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="France">France</option>
                                    <option value="United States">United States</option>
                                </select>
							</div>
						</div>


						<div class="row align-items-center">
							<div class="col text-right">
								<button type="submit" class="btn btn-primary btn-rounded btn-v-3 btn-h-3 font-weight-bold">{{__('KAYIT OL')}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

@stop
