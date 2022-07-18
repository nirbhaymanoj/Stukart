<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StuKart</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- font icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">

    <!-- Material Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <?php
    // require functions.php file
    require ('functions.php');
    session_start();
    $user_profile=$SignIn->checkUserLoggedIn();
    $user_id=$user_profile['user_id'];
    $in_cart = $Cart->getCartId($product->getDataForUser('cart',$user_id));
    $in_favourites = $Favourites->getFavouritesId($product->getDataForUser('favourites',$user_id));
    ?>

</head>
<body>
<!-- Start header -->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <div class="font-rale font-size-14" id="divTop">
            <a href="logout.php" class="px-3 border-right border-left text-dark logoutWishlistAnchor" id="logoutAnchor">Logout</a>
        </div>
    </div>
    <span id="stukartlogo" >Stukart</span>
    <!-- Primary navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg" id="navbarHome">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto font-rubik">
                    <li class="nav-item">
                        <a class="nav-link font-size-20" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-size-20" href="favourites.php">Favourites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-size-20" href="orders.php">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-size-20" href="profile.php">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-size-20" href="sell.php">Sell</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-size-20" href="aboutUs.php">About Us</a>
                    </li>
                </ul>
                <form action="#" class="font-size-14 font-rale">
                    <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                        <span class="font-size-16 px-2 text-white "><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getDataForUser('cart',$user_id)); ?></span>
                    </a>
                </form>
                </form>
            </div>
        </div>
    </nav>
    <!-- !Primary navbar -->
</header>
<!-- !Start header -->

<!-- Main site -->
<main id="main-site">