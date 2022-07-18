<?php
ob_start();
// include header.php file
include ('header.php');
?>

<?php
// include shopping cart area
count($product->getDataForUser('cart',$user_id)) ? include ('Template/_shopping-cart.php') :  include ('Template/Not found/_cart_notFound.php');
// !include shopping cart area
?>

<?php
// include top sale area
include ('Template/_top-sale.php');
// !include top sale area
?>

<?php
// include footer.php file
include ('footer.php');
?>
