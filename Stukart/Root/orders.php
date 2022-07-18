<?php
ob_start();
// include header.php file
include ('header.php');
?>

<?php
// include orders area
count($product->getDataForUser('orders',$user_id)) ? include ('Template/_orders.php') :  include ('Template/Not found/_ordersNotFound.php');
// !include orders area
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