<!DOCTYPE html>
<html lang="tr">

		<?php require_once("../../../public/customertemplate/head/head.php"); ?>

<body>
<div class="body">

		<?php require_once("sections/header.php"); ?>

<div role="main" class="main">

		<?php require_once("sections/page_title.php"); ?>


<div class="container">



<section class="section">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
								<div class="bg-primary rounded p-5">
									<span class="top-sub-title text-color-light-2">KAYITLI ÜYELER</span>
									<h2 class="text-color-light font-weight-bold text-4 mb-4">Giriş Yapın</h2>

									<form action="../../index.html" id="frmSignIn" method="post">
										<div class="form-row">
											<div class="form-group col mb-2">
												<label class="text-color-light-2" for="frmSignInEmail">EMAIL</label>
												<input type="email" value="" maxlength="100" class="form-control bg-light rounded border-0 text-1" name="email" id="frmSignInEmail" required>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												<label class="text-color-light-2" for="frmSignInPassword">ŞİFRE</label>
												<input type="password" value="" class="form-control bg-light rounded border-0 text-1" name="password" id="frmSignInPassword" required>
											</div>
										</div>
										<div class="form-row mb-3">
											<div class="form-group col">
												<div class="form-check checkbox-custom checkbox-custom-transparent checkbox-default">
										        	<input class="form-check-input" type="checkbox" id="frmSignInRemember">
									        		<label class="form-check-label text-color-light-2" for="frmSignInRemember">
									          			Beni Hatırla
									        		</label>
										      	</div>
										    </div>
									      	<div class="form-group col text-right">
									      		<a href="#" class="forgot-pw text-color-light-2 d-block">Şifremi Unuttum</a>
									      	</div>
										</div>
										<div class="row align-items-center">
											<div class="col text-right">
												<button type="submit" class="btn btn-dark btn-rounded btn-v-3 btn-h-3 font-weight-bold">GİRİŞ YAP</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-6 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
								<div class="border rounded h-100 p-5">
									<span class="top-sub-title text-color-primary">HESABINIZ YOKSA KAYIT OLUN</span>
									<h2 class="font-weight-bold text-4 mb-4">hızlı kayıt</h2>

									<form action="../../index.html" id="frmRegister" method="post">
										<div class="form-row">
											<div class="form-group col mb-2">
												<label for="frmRegisterEmail">EMAIL</label>
												<input type="email" value="" maxlength="100" class="form-control bg-light-5 rounded border-0 text-1" name="email" id="frmRegisterEmail" required>
											</div>
										</div>
										<div class="form-row mb-5">
											<div class="form-group col-lg-6">
												<label for="frmRegisterPassword">ŞİFRE</label>
												<input type="password" value="" class="form-control bg-light-5 rounded border-0 text-1" name="password" id="frmRegisterPassword" required>
											</div>
											<div class="form-group col-lg-6">
												<label for="frmRegisterPassword2">ŞİFRE TEKRAR</label>
												<input type="password" value="" class="form-control bg-light-5 rounded border-0 text-1" name="password2" id="frmRegisterPassword2" required>
											</div>
										</div>
										<div class="row align-items-center">
											<div class="col text-right">
												<button type="submit" class="btn btn-primary btn-rounded btn-v-3 btn-h-3 font-weight-bold">KAYIT OL</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>



</div>




</div>


		<?php require_once("sections/footer_lite.php"); ?>

</div>


		<?php require_once("../../../public/customertemplate/head/bottom_scripts_lite.php"); ?>

</body>
</html>
