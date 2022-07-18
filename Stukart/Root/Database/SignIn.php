<?php

class SignIn
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function checkUserLoggedIn(){
        if(isset($_SESSION['user_id'])){
           $id=$_SESSION['user_id'];
           $query="select * from user where user_id='$id'";
           $result = $this->db->con->query($query);
           if($result&& mysqli_num_rows($result)>0){
               $user_data=mysqli_fetch_assoc($result);
               return $user_data;
           }
        }
        else{
            //  Move to login page
            header("Location:loginPage.php");
        }

    }

    public function checkPhoneExistence($phone){
        if(isset($phone)){
            // create sql query
            $query="SELECT * FROM user WHERE phone='$phone'";

            $resultOfQuery = $this->db->con->query($query);
            // execute query
            $result = mysqli_num_rows($resultOfQuery);

        }
        return $result;
    }
    public function retrieveUserData($phone){
        if(isset($phone)){
            // create sql query
            $query="SELECT * FROM user WHERE phone='$phone'";

            // execute query
            $result = $this->db->con->query($query);

            if($result){
                if($result&& mysqli_num_rows($result)>0){
                    $user_data=mysqli_fetch_assoc($result);
                    return $user_data;
                }
            }
        }
    }
}