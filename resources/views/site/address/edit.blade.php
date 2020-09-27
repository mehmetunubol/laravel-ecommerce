@extends('site.app')
@section('title', 'Login')
@section('content')
<div class="body">
	<div role="main" class="main">
		<div class="container">
			<div class="row">
				@include("site.pages.account.account_page_sidebar")
				<div class="col-md-8 col-lg-9 order-2 order-md-2 mb-5 mb-md-0">
					<form id="" action="{{ route('address.update') }}" method="post">
						@csrf
						<div class="row mb-5">
							<div class="col-md-6 mb-5 mb-md-0">
								<h2 class="font-weight-bold mb-3">{{__("ADRES DÜZENLE")}}</h2>
								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark font-weight-semibold" for="address">{{__("ADRES ADI")}}:</label>
										<input type="text" value="{{ $address->address_name }}" class="form-control line-height-1 bg-light-5" name="address_name" id="address_name" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label class="text-color-dark font-weight-semibold" for="first_name">{{__("ADINIZ")}}:</label>
										<input type="text" value="{{ $address->first_name }}" class="form-control line-height-1 bg-light-5" name="first_name" id="first_name" required>
									</div>
									<div class="form-group col-md-6">
										<label class="text-color-dark font-weight-semibold" for="last_name">{{__("SOYADINIZ")}}:</label>
										<input type="text" value="{{ $address->last_name }}" class="form-control line-height-1 bg-light-5" name="last_name" id="last_name" required>
									</div>
								</div>
							
								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark font-weight-semibold" for="address">{{__("ADRES")}}:</label>
										<input type="text" value="{{ $address->address }}" class="form-control line-height-1 bg-light-5" name="address" id="address" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark font-weight-semibold" for="phone">{{__("TELEFON")}}:</label>
										<input type="text" value="{{ $address->phone }}" class="form-control line-height-1 bg-light-5" name="phone" id="phone" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label class="text-color-dark font-weight-semibold" for="district">{{__("İLÇE")}}:</label>
										<input type="text" value="{{ $address->district }}" class="form-control line-height-1 bg-light-5" name="district" id="district" required>
									</div>
									<div class="form-group col-md-6">
										<label class="text-color-dark font-weight-semibold" for="city">{{__("ŞEHİR")}}:</label>
										<input type="text" value="{{ $address->city }}" class="form-control line-height-1 bg-light-5" name="city" id="city" required>
									</div>
								</div>

								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark font-weight-semibold" for="country">{{__("ÜLKE")}}:</label>
										<input type="text" value="{{ $address->country }}" class="form-control line-height-1 bg-light-5" name="country" id="country" required>
									</div>
								</div>
								<input type="hidden" name="id" value="{{$address->id}}">
								<div class="col text-right">
									<button class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3" type="submit">{{__("KAYDET")}}</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@include("site.partials.footer_lite")
@stop