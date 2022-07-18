<?php

// php cart class
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // to get user_id and item_id and insert into cart table
    public  function addToCart($userid, $itemid){
        if (isset($userid) && isset($itemid)){

            // create sql query
            $query_string = "INSERT INTO cart(user_id,item_id) VALUES('$userid','$itemid')";

            // execute query
            $result = $this->db->con->query($query_string);

            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    // delete cart item using cart item id
    public function deleteCartItem($item_id = null,$user_id=null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id} and user_id={$user_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // delete cart item using cart item id
    public function deleteCart($user_id=null, $table = 'cart'){
        if($user_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE user_id={$user_id}");
            if($result){
                //  Move to order Placed Success Message page
                header("Location:orderPlaced.php");
            }
            return $result;
        }
    }

    // calculate sub total
    public function getCartSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    // get item_it of shopping cart list
    public function getCartId($cartArray = null, $key = "item_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

}