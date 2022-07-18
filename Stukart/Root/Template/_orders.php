<!-- Orders section  -->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <?php
        $noOfOrders=0;
        foreach ($product->getDataForUser('orders',$user_id) as $item2) :
            $noOfOrders=$noOfOrders+1;
        endforeach;
        ?>
        <h5 class="font-rubik font-size-20">Orders (<?php echo $noOfOrders; ?>)</h5>
        <hr>
        <!-- Order items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getDataForUser('orders',$user_id) as $item):
                    $item3=$item;
                    $item1 = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item) use($item3){
                        ?>
                        <!-- order item -->
                        <div class="row border-bottom py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="./Database_product_images/<?=$item['item_image_url'] ?>" style="height: 180px;" alt="order"
                                     class="img-fluid">
                            </div>
                            <div class="col-sm-6">
                                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                                <small>by <?php echo $item['item_seller'] ?? "Brand"; ?></small>

                            </div>

                            <div class="col-sm-4 text-right">
                                <div class="font-size-20 font-baloo">
                                     <span class="product_price"><?php echo $item3['ord_date'] ?? 0; ?><br><?php echo $item3['ord_time'] ?? 0; ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- !order item -->
                <?php
                        return $item['item_selling_price'];
                    }, $item1); // closing array_map function
                endforeach;
                ?>
            </div>
            <!--  !Order items   -->
        </div>
</section>
<!-- !Orders section  -->