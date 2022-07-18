<?php

class Orders
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function placeOrderCart($user_id,$item_id,$ord_date,$ord_time)
    {
        if (isset($user_id) && isset($item_id)){
            $query_string = "INSERT INTO orders(user_id,item_id,ord_date,ord_time) VALUES('$user_id','$item_id','$ord_date','$ord_time')";
            // execute query
            $result = $this->db->con->query($query_string);
        }
    }

    public function placeOrderItem($user_id,$item_id,$ord_date,$ord_time)
    {
        if (isset($user_id) && isset($item_id)){
            $query_string = "INSERT INTO orders(user_id,item_id,ord_date,ord_time) VALUES('$user_id','$item_id','$ord_date','$ord_time')";
            // execute query
            $result = $this->db->con->query($query_string);
        }
        if($result){
            //  Move to order Placed Success Message page
            header("Location:orderPlaced.php");
        }
    }
}