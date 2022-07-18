<?php

class Sell
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // to insert item into product table
    public  function addToProduct($productSeller, $productName,$new_img_name,$productMRP,$productSellingPrice,$productDescription,$productCategory){
        if (isset($productSeller) && isset($productName) && isset($new_img_name) && isset($productMRP) && isset($productSellingPrice) && isset($productDescription) && isset($productCategory)){

            // create sql query
            $query_string = "INSERT INTO product(item_seller,item_category,item_name,item_mrp,item_selling_price,item_image_url,item_description) VALUES('$productSeller','$productCategory','$productName','$productMRP','$productSellingPrice','$new_img_name','$productDescription')";

            // execute query
            $result = $this->db->con->query($query_string);

            if ($result){
                ?>
                <script>
                    alert("Product listed for selling");
                </script>
                <?php
            }
        }
    }
}