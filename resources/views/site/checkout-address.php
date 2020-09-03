<!DOCTYPE html>
<html lang="tr">

		<?php require_once("../../../public/customertemplate/head/head.php"); ?>

<body>
<div class="body">

		<?php require_once("sections/header.php"); ?>

<div role="main" class="main">

		<?php require_once("sections/page_title.php"); ?>


<div class="container">



	<form id="" action="#" method="post">

<div class="row mb-5">


	<div class="col-md-6 mb-5 mb-md-0">
											<h2 class="font-weight-bold mb-3">FATURA ADRESİM</h2>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label class="text-color-dark font-weight-semibold" for="billing_name">NAME:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="billing_name" id="billing_name" required>
												</div>
												<div class="form-group col-md-6">
													<label class="text-color-dark font-weight-semibold" for="billing_last_name">LAST NAME:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="billing_last_name" id="billing_last_name" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="billing_company">COMPANY NAME:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="billing_company" id="billing_company" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="billing_address">ADDRESS:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="billing_address" id="billing_address" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="billing_address2" id="billing_address2" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="billing_city">CITY / TOWN:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="billing_city" id="billing_city" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label class="text-color-dark font-weight-semibold" for="billing_email">VERGİ NUMARASI:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="billing_email" id="billing_email" required>
												</div>
												<div class="form-group col-md-6">
													<label class="text-color-dark font-weight-semibold" for="billing_phone">VERGİ DAİRESİ:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="billing_phone" id="billing_phone" required>
												</div>
											</div>

<div class="form-group col-md-6">
<a href="checkout-cart.php" class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3">< SEPETE GERİ DÖN</a>
</div>
	</div>
	<div class="col-md-6">
											<h2 class="font-weight-bold mb-3">TESLİMAT ADRESİM</h2>

											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="shipping_company">COMPANY NAME:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="shipping_company" id="shipping_company" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="shipping_address">ADDRESS:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="shipping_address" id="shipping_address" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="shipping_address2" id="shipping_address2" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="shipping_city">CITY / TOWN:</label>
													<input type="text" value="" class="form-control line-height-1 bg-light-5" name="shipping_city" id="shipping_city" required>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col">
													<label class="text-color-dark font-weight-semibold" for="shipping_notes">NOTES:</label>
													<textarea class="form-control line-height-1 bg-light-5" name="shipping_notes" id="shipping_notes" rows="7" required></textarea>
												</div>
											</div>
<div class="form-row">
<div class="col-4 order-1 text-left">
Adresleri onaylıyorsanız ödeme işlemine geçebilirsiniz -->
</div>

<div class="col-4 order-2">
<button class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3" type="submit">ADRESİ GÜNCELLE </button>
</div>


<div class="col-4 order-3 text-right">
<a href="checkout-pay.php" class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3">ÖDEMEYE GEÇ > </a>
</div>
</div>

	</div>




</div>


								</form>






</div>

</div>

		<?php require_once("sections/footer_lite.php"); ?>

</div>
		<?php require_once("../../../public/customertemplate/head/bottom_scripts_lite.php"); ?>

</body>
</html>
