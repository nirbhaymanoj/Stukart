<!--    post method handle-->
<?php
session_start();
// require functions.php file
require ('functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    $phoneExists = $SignIn->checkPhoneExistence($phone);
    if ($phoneExists>0) {
        $userData = $SignIn->retrieveUserData($phone);
        if ($password === $userData['password']) {
            $_SESSION['user_id']=$userData['user_id'];
            // Move to index Page
            header("Location:index.php");

        }
        else{
            ?>
            <script>
                alert("Invalid Password");
            </script>
            <?php
        }
        }
    else {
        ?>
        <script>
            alert("Phone Number not registered");
        </script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to StuKart</title>

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=The+Nautigal:wght@700&display=swap" rel="stylesheet">
    <style>
        .stukartlogo{
            font-family: "The Nautigal", cursive;
            font-size: 70px;
        }
    </style>
</head>
<body class="login-body">
<?php session_start(); ?>
<!-- Start header -->
<header class="login-header">
    <div class="strip d-flex justify-content-between>
        <p class="font-rubik">Welcome to <span class="stukartlogo">Stukart</span></p>
    </div>
</header>
<!-- !Start header -->

<!-- Main site -->
<main>
    <div id="divLogin">
        <p class="font-size-36 font-righteous" id="signinText">Sign in</p>
        <form  method="post">
            <div id="loginForm">
                <input type="text" name="phone" class="textFieldsLogin" placeholder="Phone Number" required>
                <input type="password" name="password" class="textFieldsLogin" placeholder="Password" required>
                <button id="loginButton" type="submit" name="signInButton">Sign in</button>
            </div>
        </form>
        <p id="textBelowLoginButton">Don't have an account?</p>
        <a href="signupPage.php" class="font-size-14" id="signupText">Register here</a>

    </div>
</main>
<!-- !Main site -->
<!-- Footer section -->
<footer>
</footer>
<!-- !Footer section -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>