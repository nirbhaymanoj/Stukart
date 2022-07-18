<?php

shuffle($product_shuffle);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['top_sale_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
    if (isset($_POST['favourites_add_submit'])){
        // call method addToCart
        $Favourites->addToFavourites($_POST['user_id'], $_POST['item_id']);
    }
    if (isset($_POST['favourites_remove_submit'])){
        // call method addToCart
        $Favourites->deleteFavourites($_POST['item_id'],$_POST['user_id']);
    }
}
?>
<!-- Top sale  -->
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
        <!-- owl carousel  -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item){ ?>
            <div class="item py-2 px-4">
                <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'productDetails.php',  $item['item_id']); ?>"><img src="./Database_product_images/<?=$item['item_image_url'] ?>" alt="product1" class="img-fluid img-dim"></a>
                    <div class="text-center">
                        <h6><?php $string=$item['item_name'];
                            if (strlen($string) > 40) {

                                // truncate string
                                $stringCut = substr($string, 0, 40);
                                $endPoint = strrpos($stringCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '...';
                                echo $string;
                            }
                            else
                                echo $string ?? "Unknown";  ?></h6>
                        <div class="rating text-warning font-size-12">
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                <?php
                                if (in_array($item['item_id'], $in_favourites ?? [])){
                                    echo '<button type="submit" name="favourites_remove_submit" class="btn btn-success font-size-12"> <span><i class="fas fa-star"></i></span></button>';
                                }else{
                                    echo '<button type="submit" name="favourites_add_submit" class="btn font-size-12"> <span><i class="far fa-star"></i></span></button>';
                                }
                                ?>

                            </form>
                        </div>
                        <div class="price py-2">
                            <span>Rs <?php echo $item['item_selling_price'] ?? '0' ; ?></span>
                        </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                            <?php
                            if (in_array($item['item_id'], $in_cart ?? [])){
                                echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                            }else{
                                echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                            }
                            ?>

                        </form>
                    </div>
                </div>
            </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- !owl carousel  -->
    </div>
</section>
<!-- !Top sale  -->