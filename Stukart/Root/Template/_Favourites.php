<?php

shuffle($product_shuffle);
?>
<!-- Favourites -->
<section id="favourites">
    <div class="container py-5">
        <?php
        $noOfFavourites=0;
        foreach ($product->getDataForUser('favourites',$user_id) as $item2) :
        $noOfFavourites=$noOfFavourites+1;
        endforeach;
        ?>
        <h4 class="font-rubik font-size-20">Favourites (<?php echo $noOfFavourites; ?>)</h4>
        <hr>
        <!-- owl carousel  -->
        <div class="owl-carousel owl-theme">
            <?php
            foreach ($product->getDataForUser('favourites',$user_id) as $item) :
            $favourites = $product->getProduct($item['item_id']);
            $subTotal[] = array_map(function ($item) use($in_favourites,$in_cart,$user_id){
                ?>
            <div class="item py-2 px-4">
                <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'productDetails.php',  $item['item_id']); ?>"><img src="./Database_product_images/<?=$item['item_image_url'] ?>" class="img-fluid img-dim"></a>
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
                                }
                                ?>

                            </form>
                        </div>
                        <div class="price py-2">
                            <span>Rs <?php echo $item['item_selling_price'] ?? '0' ; ?></span>
                        </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
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
                <?php
                return $item['item_selling_price'];
            }, $favourites); // closing array_map function
            endforeach;
            ?>

        <!-- !owl carousel  -->
    </div>
</section>
<!-- !Favourites  -->