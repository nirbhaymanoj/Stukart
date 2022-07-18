<?php
session_start();
if(isset($_SESSION['user_id'])){
    unset($_SESSION['user_id']);
//  Move to login page
    header("Location:loginPage.php");
}

