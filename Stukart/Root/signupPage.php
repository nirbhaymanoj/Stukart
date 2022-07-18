<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<body id="signupPageBody">

<!-- Start header -->
<header id="header">
    <div  class="strip d-flex">
        <p id="signupHeader" class="font-rubik font-size-48">Sign Up</p>
    </div>
</header>
<!-- !Start header -->
<?php
// require functions.php file
require ('functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset($_POST['name'])){
    $name =$_POST['name'] ;
}
if (isset($_POST['phone'])){
    $phone =$_POST['phone'] ;
}
if (isset($_POST['email'])){
    $email =$_POST['email'] ;
}
if (isset($_POST['password'])){
    $password =$_POST['password'] ;
}if (isset($_POST['cpassword'])){
    $cpassword =$_POST['cpassword'] ;
}
if (isset($_POST['age'])){
    $age =$_POST['age'] ;
}
if (isset($_POST['city'])){
    $city =$_POST['city'] ;
}
if (isset($_POST['pincode'])){
    $pincode =$_POST['pincode'] ;
}
if (isset($_POST['gender'])){
    $gender =$_POST['gender'] ;
}
//$pass=password_hash($password,PASSWORD_BCRYPT);
//$cpass=password_hash($cpassword,PASSWORD_BCRYPT);
$phoneExists=$SignUp->checkPhoneDuplicacy($phone);
if($phoneExists>0){
    ?>
<script>
    alert("Phone Number already registered");
</script>
<?php
}
else{
    $emailExists=$SignUp->checkEmailDuplicacy($email);
    if($emailExists>0){
?>
    <script>
        alert("Email already registered");
    </script>
    <?php
    }
    else{
        if($password==$cpassword){
            $result=$SignUp->registerUser($name,$phone,$email,$password,$age,$city,$pincode,$gender);
            if ($result) {
                // Move to success message Page
                header("Location:successMessage.php");
            }
        }
        else{
    ?>
    <script>
        alert("Passwords not matching");
    </script>
    <?php
        }
    }
    }

}



?>

<!-- Main site -->
<main>

    <div id="signupForm">
        <form method="post">
            <div class="textFieldsDiv" id="firstRowSignup">
                <input type="text" class="textfield" name="name" placeholder="Name" id="" required>
                <input type="tel" pattern="[0-9]{10}" class="textfield" name="phone" placeholder="Phone" id="" required>
                <input type="email" class="textfield" name="email" placeholder="Email" id="" required>
            </div>
            <div class="textFieldsDiv" id="secondRowSignup">
                <input type="number" class="textfield" name="age" placeholder="Age" id="" required>
                <input type="text" class="textfield" name="city" placeholder="City" id="" required>
                <input type="number" pattern="[0-9]{6}" name="pincode" class="textfield" placeholder="Pincode" id="" required>
            </div>
            <div class="textFieldsDiv" id="thirdRowSignup">
                <input type="text" class="textfield" name="password" placeholder="Password" id="" required>
                <input type="text" class="textfield" name="cpassword" placeholder="Re-enter Password" id="" required>
                <div class="textFieldsDiv" id="selectGenderDiv">
                    <select name="gender" id="selectGender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="textFieldsDiv">
                <Button id="signupButton">Sign Up</Button>
            </div>
        </form>
    </div>
</main>
<!-- !Main site -->
<!-- Footer section -->
<footer>

</footer>
<!-- !Footer section -->

</body>
</html>