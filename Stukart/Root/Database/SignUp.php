<?php

class SignUp
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public  function registerUser($name,$phone,$email,$password,$age,$city,$pincode,$gender){
        if (isset($name) && isset($phone) && isset($email) && isset($password) && isset($age) && isset($city) && isset($pincode) && isset($gender)){

            // create sql query
            $query_string ="INSERT INTO user(name,phone,email,password,age,city,pincode,gender) VALUES('$name','$phone','$email','$password','$age','$city','$pincode','$gender')";

            // execute query
            $result = $this->db->con->query($query_string);
        }
        return $result;
    }
    public function checkPhoneDuplicacy($phone){
        if(isset($phone)){
            // create sql query
            $query="SELECT * FROM user WHERE phone='$phone'";

            $resultOfQuery = $this->db->con->query($query);
            // execute query
            $result = mysqli_num_rows($resultOfQuery);

        }
        return $result;
    }
    public function checkEmailDuplicacy($email){
        if(isset($email)){
            // create sql query
            $query="SELECT * FROM user WHERE email='$email'";

            $resultOfQuery = $this->db->con->query($query);
            // execute query
            $result = mysqli_num_rows($resultOfQuery);

        }
        return $result;
    }
}