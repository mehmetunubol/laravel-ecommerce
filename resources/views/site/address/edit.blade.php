@extends('site.app')
@section('title', 'Login')
@section('content')
<div class="body">
	<div role="main" class="main">
		<div class="container">
			<div class="row">
				@include("site.pages.account.account_page_sidebar")
				<div class="col-md-8 col-lg-9 order-2 order-md-2 mb-5 mt-5 mb-md-0">
					<form id="" action="{{ route('address.update') }}" method="post">
						@csrf
						<div class="row mb-5">
							<div class="col-md-6 mb-5 mb-md-0">
								<h2 class="font-weight-bold mb-3">{{__("ADRES DÜZENLE")}}</h2>
								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark font-weight-semibold" for="address_name">{{__("ADRES ADI")}}:</label>
										<input type="text" value="{{ $address->address_name }}" class="form-control line-height-1 bg-light-5" name="address_name" id="address_name" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark font-weight-semibold" for="firm_name">{{__("FİRMA ADI")}}:</label>
										<input type="text" value="{{ $address->firm_name }}" class="form-control line-height-1 bg-light-5" name="firm_name" id="firm_name" >
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
										<input type="text" value="{{ $address->phone }}" class="form-control line-height-1 bg-light-5" name="phone" id="phone">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark font-weight-semibold" for="cell_phone">{{__("CEP TELEFON")}}:</label>
										<input type="text" value="{{ $address->cell_phone }}" class="form-control line-height-1 bg-light-5" name="cell_phone" id="cell_phone" required>
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
										<label class="text-color-dark font-weight-semibold" for="tax_administration">{{__("VERGİ DAİRESİ")}}:</label>
										<input type="text" value="{{ $address->tax_administration }}" class="form-control line-height-1 bg-light-5" name="tax_administration" id="tax_administration" >
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark font-weight-semibold" for="tax_no">{{__("VERGİ NUMARASI")}}:</label>
										<input type="text" value="{{ $address->tax_no }}" class="form-control line-height-1 bg-light-5" name="tax_no" id="tax_no" >
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark font-weight-semibold" for="country">{{__("ÜLKE")}}:</label>
										<select id="country" name="country"  class="form-control bg-light-5 text-color-dark border-0" aria-label="ÜLKE" required="">
											@include('site.address.countriesDropdownList')
										</select>
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