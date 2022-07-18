<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $test=1;
    if (isset($_POST['product_name'])) {
        $productName = $_POST['product_name'];
    }
    if (isset($_FILES['product_image'])) {
        $productImageName=$_FILES['product_image']['name'];
        $tmp_name = $_FILES['product_image']['tmp_name'];
        $img_ex = pathinfo($productImageName, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        $img_upload_path = 'Database_product_images/'.$new_img_name;

    }
    if (isset($_POST['product_mrp'])) {
        $productMRP = $_POST['product_mrp'];
    }
    if (isset($_POST['product_selling_price'])) {
        $productSellingPrice = $_POST['product_selling_price'];
    }
    if (isset($_POST['product_description'])) {
        $productDescription =trim($_POST['product_description']);
    }
    if (isset($_POST['product_category'])) {
        $productCategory = $_POST['product_category'];
    }
    else{
        ?>
        <script>
            alert("Please select product category");
        </script>
        <?php
        $test=0;
    }

    if(!strlen($productDescription)){
        ?>
        <script>
            alert("Please enter product description");
        </script>
        <?php
        $test=0;
    }
    if($test==1){
        $productSeller=$user_profile['name'];
        $Sell->addToProduct($productSeller, $productName,$new_img_name,$productMRP,$productSellingPrice,$productDescription,$productCategory);
        move_uploaded_file($tmp_name, $img_upload_path);

    }
}
?>
<!--Sell section-->
<div id="containerSell" class="m-auto">
    <h4 class="font-rubik font-size-36 title">Sell Product</h4>
    <hr>
    <form id="sellForm" method="post" enctype="multipart/form-data">
        <div class="product-details">
            <div class="input-box">
                <span class="details">Product Name</span>
                <input type="text" name="product_name" placeholder="Enter product name" required>
            </div>
            <div class="input-box">
                <span class="details">Product Image</span>
                <input type="file" name="product_image" id="fileInput" accept="image/*" required>
            </div>
            <div class="input-box">
                <span class="details">Product MRP</span>
                <input type="number" placeholder="Enter product MRP" name="product_mrp" required>
            </div>

            <div class="input-box">
                <span class="details">Product Selling Price</span>
                <input type="number" placeholder="Enter product selling price" name="product_selling_price" required>
            </div>

        </div>
        <div class="input-box">
            <span class="details">Product Description</span>
            <textarea  rows="3" cols="50" id="product-description" name="product_description" required>
            </textarea>

        </div>
        <div class="product-type">
            <input type="radio" name="product_category" value="Stationary" id="dot-1">
            <input type="radio" name="product_category" value="Furniture" id="dot-2">
            <input type="radio" name="product_category" value="Gadgets" id="dot-3">
            <input type="radio" name="product_category" value="Others" id="dot-4">
            <span class="product-title">Product Type</span>
            <div id="productTypeSection">
                <label for="dot-1">
                    <span class="dot one"></span>
                    <span class="type">Stationary</span>
                </label>
                <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="type">Furniture</span>
                </label>
                <label for="dot-3">
                    <span class="dot three"></span>
                    <span class="type">Gadgets</span>
                </label>
                <label for="dot-4">
                    <span class="dot four"></span>
                    <span class="type">Others</span>
                </label>
            </div>
        </div>
        <div class="button">
            <input type="submit" value="Sell Product">
        </div>
    </form>




</div>
<!--!Sell section-->
