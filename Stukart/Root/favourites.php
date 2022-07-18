<?php
ob_start();
// include header.php file
include ('header.php');
?>

<?php
// include favourites area
count($product->getDataForUser('favourites',$user_id)) ? include('Template/_Favourites.php') :  include ('Template/Not found/_Favourites-not-found.php');
// !include favourites area
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