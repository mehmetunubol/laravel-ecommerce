<div class="col-md-8 col-lg-9 order-2 order-md-2 mb-5 mb-md-0">
<form id="" action="{{ route('account.profile') }}" method="post">
@csrf
<div class="row mb-5">


	<div class="col-md-6 mb-5 mb-md-0">
		<h2 class="font-weight-bold mb-3">{{ __("Profil") }}</h2>

<div class="form-row">

	<div class="form-group col-md-6">
	<label class="text-color-dark font-weight-semibold" for="billing_name">{{ __("İsim") }}</label>
	<input type="text" value="{{$user->first_name}}" class="form-control line-height-1 bg-light-5" name="first_name" id="billing_name">
	</div>
	<div class="form-group col-md-6">
	<label class="text-color-dark font-weight-semibold" for="billing_last_name">{{ __("Soyisim") }}</label>
	<input type="text" value="{{$user->last_name}}" class="form-control line-height-1 bg-light-5" name="last_name" id="billing_last_name">
	</div>

</div>

	<div class="form-row">
			<div class="form-group col-md-12">
			<label class="text-color-dark font-weight-semibold" for="billing_email">{{ __("Email") }}</label>
			<input type="text" value="{{ $user->email }}" class="form-control line-height-1 bg-light-5 @error('email') is-invalid @enderror" name="email" id="billing_email">
			@error('email')
			<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
			</span>
			@enderror
			</div>
	</div>
	


<div class="form-row">
	<div class="form-group col-md-12">
	<label class="text-color-dark font-weight-semibold" for="billing_email">Firma Adı</label>
	<input type="text" value="{{ $user->email }}" class="form-control line-height-1 bg-light-5 @error('email') is-invalid @enderror" name="email" id="billing_email">
	</div>
</div>

<div class="form-row">
	<div class="form-group col-md-6">
	<label class="text-color-dark font-weight-semibold" for="billing_name">Telefon</label>
	<input type="text" value="{{$user->first_name}}" class="form-control line-height-1 bg-light-5" name="first_name" id="billing_name">
	</div>
	<div class="form-group col-md-6">
	<label class="text-color-dark font-weight-semibold" for="billing_last_name">Cep Telefonu</label>
	<input type="text" value="{{$user->last_name}}" class="form-control line-height-1 bg-light-5" name="last_name" id="billing_last_name" required="">

	</div>
</div>

		
	</div>
	<div class="col-md-6">
	
	</div>


<div class="col text-LEFT">
<button class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3" type="submit">{{ __("Kaydet") }}</button>
</div>
								

</div>
							
								
</form>


</div>