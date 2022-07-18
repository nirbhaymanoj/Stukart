<?php
ob_start();
// include header.php file
include ('header.php');
?>

<?php
// include top sale area
include ('Template/_top-sale.php');
// !include top sale area
?>

<?php
// include special price area
include('Template/_available-items.php');
// !include special price area
?>

<?php
// include footer.php file
include ('footer.php');
?>