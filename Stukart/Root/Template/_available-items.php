
<?php
$brand = array_map(function ($pro){ return $pro['item_seller']; }, $product_shuffle);
$unique = array_unique($brand);
sort($unique);
shuffle($product_shuffle);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['special_price_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
}

?>
<!-- Special price  -->
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Available Items</h4>

        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Items</button>
            <button class="btn" data-filter=".Stationary">Stationary</button>
            <button class="btn" data-filter=".Furniture">Furniture</button>
            <button class="btn" data-filter=".Gadgets">Gadgets</button>
            <button class="btn" data-filter=".Others">Others</button>
        </div>
        <hr>

        <div class="grid">
            <?php array_map(function ($item) use($in_cart,$in_favourites,$user_id){ ?>
            <div class="grid-item border <?php echo $item['item_category'] ?? "Category" ; ?>">
                <div class="item py-2 px-4">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'productDetails.php',  $item['item_id']); ?>"><img src="./Database_product_images/<?=$item['item_image_url'] ?>" alt="product1" class="img-fluid img-dim"></a>
                        <div class="text-center">
                            <h6><?php $string=$item['item_name'];
if (strlen($string) > 15) {

    // truncate string
    $stringCut = substr($string, 0, 15);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= '...';
    echo $string;
}
else
    echo $string
 ?? "Unknown"; ?></h6>
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
                                <span>Rs <?php echo $item['item_selling_price'] ?? 0 ?></span>
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
            </div>
            <?php }, $product_shuffle) ?>
        </div>
    </div>
</section>
<!-- !Special price  -->