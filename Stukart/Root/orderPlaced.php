<?php
ob_start();
// include header.php file
include ('header.php');
?>

<?php
// include successfull message area
include ('Template/_orderPlacedMessage.php');
// !include successfull message area
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