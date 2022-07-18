<!-- Shopping cart section  -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-cart-submit'])){
        $deletedrecord = $Cart->deleteCartItem($_POST['item_id'],$_POST['user_id']);
    }
    if (isset($_POST['proceed_to_buy'])){
        date_default_timezone_set("Asia/Calcutta");
        $ord_date=date("d M,Y");
        $ord_time=date("H:i");
        foreach ($product->getDataForUser('cart',$user_id) as $cart_item){
            $Orders->placeOrderCart($user_id,$cart_item['item_id'],$ord_date,$ord_time);
        }
        $Cart->deleteCart($user_id);
    }
}
?>
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getDataForUser('cart',$user_id) as $item1) :
                $cart = $product->getProduct($item1['item_id']);
                $subTotal[] = array_map(function ($item1) use($in_favourites,$user_id){
                ?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="./Database_product_images/<?=$item1['item_image_url'] ?>" style="height: 180px;" alt="cart1"
                             class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item1['item_name'] ?? "Unknown"; ?></h5>
                        <small>by <?php echo $item1['item_seller'] ?? "Brand"; ?></small>
                        <!-- Add to favourite -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item1['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <?php
                                    if (in_array($item1['item_id'], $in_favourites ?? [])){
                                        echo '<button type="submit" name="favourites_remove_submit" class="btn btn-success font-size-12"> <span><i class="fas fa-star"></i></span></button>';
                                    }else{
                                        echo '<button type="submit" name="favourites_add_submit" class="btn font-size-12"> <span><i class="far fa-star"></i></span></button>';
                                    }
                                    ?>

                                </form>
                            </div>
                        </div>
                        <!--  !Add to favourite-->

                        <form method="post">
                            <input type="hidden" value="<?php echo $item1['item_id'] ?? 0; ?>" name="item_id">
                            <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
                            <button type="submit" name="delete-cart-submit" class="btn btn-warning my-2 font-baloo px-3">Delete</button>
                        </form>

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            Rs <span class="product_price" data-id="<?php echo $item1['item_id'] ?? '0'; ?>"><?php echo $item1['item_selling_price'] ?? 0; ?></span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                    <?php
                    return $item1['item_selling_price'];
                }, $cart); // closing array_map function
                endforeach;
                ?>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span
                                class="text-danger">Rs <span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getCartSum($subTotal) : 0; ?></span>
                                    </span> </h5>
                        <form method="post">
                        <button type="submit" name="proceed_to_buy" class="btn btn-warning mt-3">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->