<?php

// require MySQL Connection
require ('database/DBController.php');

// require Product Class
require('database/Product.php');

// require Cart Class
require ('database/Cart.php');

// require Favourites Class
require ('database/Favourites.php');

// require SignUp Class
require ('database/SignUp.php');

// require SignIn Class
require ('database/SignIn.php');

// require Orders Class
require ('database/Orders.php');

// require Sell Class
require ('database/Sell.php');


// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

// Cart object
$Cart = new Cart($db );

// Favourites Object
$Favourites = new Favourites($db );

// SignUp Object
$SignUp = new SignUp($db );

// SignIn Object
$SignIn = new SignIn($db );

// Orders Object
$Orders = new Orders($db );

// Sell Object
$Sell = new Sell($db );