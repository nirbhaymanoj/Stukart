<?php
if (!isset($_SESSION['$item_id_previous'])) {
    $_SESSION['$item_id_previous'] = $_GET['item_id'];
    $item_id_previous = $_SESSION['$item_id_previous'];
}
else{
    if(is_null($_GET['item_id']?? null)){
        $item_id_previous = $_SESSION['$item_id_previous'];
    }
    else{
        $_SESSION['$item_id_previous'] = $_GET['item_id'];
        $item_id_previous = $_SESSION['$item_id_previous'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['proceed_to_buy'])) {
        date_default_timezone_set("Asia/Calcutta");
        $ord_date=date("d M,Y");
        $ord_time=date("H:i");
        $Orders->placeOrderItem($user_id, $item_id_previous,$ord_date,$ord_time);
    }
}

$item_id = $_GET['item_id'] ?? $item_id_previous;
foreach ($product->getData() as $item) :
if ($item['item_id'] == $item_id) :
?>
<!--   product  -->
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <img src="./Database_product_images/<?=$item['item_image_url'] ?>" alt="product" class="img-fluid productImageProductDetails">

            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                <small>by <?php echo $item['item_seller'] ?? "Brand"; ?></small>
                <div class="d-flex">
                    <div class="my-2">
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user_profile['user_id']; ?>">
                            <?php
                            if (in_array($item['item_id'], $in_favourites ?? [])){
                                echo '<button type="submit" name="favourites_remove_submit" class="btn btn-success font-size-12"> <span><i class="fas fa-star"></i></span></button>';
                            }else{
                                echo '<button type="submit" name="favourites_add_submit" class="btn font-size-12"> <span><i class="far fa-star"></i></span></button>';
                            }
                            ?>

                        </form>
                    </div>
                </div>
                <hr class="m-0">

                <!---    product price       -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>M.R.P:</td>
                        <td><strike><?php echo $item['item_mrp']?></strike></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Deal Price:</td>
                        <td class="font-size-20 text-danger">Rs <span><?php echo $item['item_selling_price'] ?? 0; ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>You Save:</td>
                        <td><span class="font-size-16 text-danger"><?php echo $item['item_mrp'] - $item['item_selling_price'] ?></span></td>
                    </tr>
                </table>
                <!---    !product price       -->

                <hr>
                <div class="form-row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <form method="post">
                        <button type="submit" name="proceed_to_buy" class="btn btn-danger form-control">Place Order</button>
                        </form>
                    </div>
                    <div class="col">
                    <form method="post">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $user_profile['user_id']; ?>">
                        <?php
                        if (in_array($item['item_id'], $in_cart ?? [])){
                            echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                            $item_id_previous=$item_id;
                        }else{
                            echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                        }
                        ?>

                    </form>
                    </div>
                </div>
            </div>

            <div class="col-12 py-4">
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <p class="font-rale font-size-14"><?php echo $item['item_description'] ?></p>
            </div>
        </div>
    </div>
</section>
<!--   !product  -->
<?php
endif;
endforeach;
?>