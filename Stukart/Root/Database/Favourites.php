<?php

class Favourites
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // to get user_id and item_id and insert into cart table
    public  function addToFavourites($userid, $itemid){
        if (isset($userid) && isset($itemid)){

            // create sql query
            $query_string = "INSERT INTO favourites(user_id,item_id) VALUES('$userid','$itemid')";

            // execute query
            $result = $this->db->con->query($query_string);

            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    // delete cart item using cart item id
    public function deleteFavourites($item_id = null,$user_id=null, $table = 'favourites'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id} and user_id={$user_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // get item_it of shopping cart list
    public function getFavouritesId($favouritesArray = null, $key = "item_id"){
        if ($favouritesArray != null){
            $favourites_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $favouritesArray);
            return $favourites_id;
        }
    }
}