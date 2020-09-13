<!DOCTYPE html>
<html lang="tr">

		<?php require_once("customertemplate/head/head.php"); ?>

<body>
<div class="body">

		<?php require_once("sections/header.php"); ?>

<div role="main" class="main">

		<?php require_once("sections/page_title.php"); ?>


<div class="container">

<div class="row">

	<?php require_once("content/account_page_sidebar.php"); ?>


<?php

$accountMenu=$_REQUEST['accountMenu'];

switch ($accountMenu) {

case "1":require_once("account/my-orders.php"); break;
case "2":require_once("account/wishlist.php"); break;
case "3":require_once("account/my-adresses.php"); break;
case "4":require_once("account/my-info.php"); break;
case "5":require_once("account/return-policy.php"); break;
case "6":require_once("account/terms-of-sale.php"); break;
case "7":require_once("account/cookie-policy.php"); break;
case "8":require_once("account/privacy-policy.php"); break;
case "9":require_once("account/size-guide.php"); break;
case "10":require_once("account/about-us.php"); break;
case "11":require_once("account/contact-us.php"); break;
case "12":require_once("account/sign-out.php"); break;
default:
require_once("account/my-orders.php");

}
?>



</div>

</div>

</div>


		<?php require_once("sections/footer_lite.php"); ?>

</div>


		<?php require_once("customertemplate/head/bottom_scripts_lite.php"); ?>

</body>
</html>
