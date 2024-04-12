<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <!-- external css -->
    <link rel="stylesheet" href="../style.css">

    <!-- including connection file -->
    <?php
    include '../connection/connection.php';

?>
</head>

<body>

    <div class="container">
        <p class="h3 text-center">Add Product</p>
        <form method="post" action="" enctype="multipart/form-data" class="mt-5 border p-4 bg-light shadow">

            <div class="row m-auto">
                <div class="col-12 mt-2">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name"
                            required>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-group">
                        <label>Brand Name</label>
                        <select class="form-control brand_list" name="brand_id">
                            <option value="">Select Brand</option>
                            <?php
                                    $selectquery="select * from brands";
                                    $query=mysqli_query($con,$selectquery);
                                    while($result=mysqli_fetch_assoc($query)){
                                        $brand_id=$result['brand_id'];
                                        $brand_name=$result['brand_name'];
                                        echo "<option value='$brand_id'>$brand_name</option>";
                                    }

                                ?>

                        </select>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="product_desc" placeholder="Enter product desc"
                            required></textarea>
                    </div>
                </div>


                <div class="col-12 mt-2">
                    <div class="form-group">
                        <label>Product Quality</label>
                        <input type="text" name="product_quality" class="form-control"
                            placeholder="Enter Product Quality" required>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-group">
                        <label>Product Qty</label>
                        <input type="number" name="product_qty" class="form-control"
                            placeholder="Enter Product Quantity" required>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" name="product_price" class="form-control" placeholder="Enter Product Price"
                            required>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-group">
                        <label>Product Keywords <small>(eg: apple, iphone, mobile)</small></label>
                        <input type="text" name="product_keywords" class="form-control"
                            placeholder="Enter Product Keywords" required>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-group">
                        <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <input type="hidden" name="add_product" value="1">
                <div class="col-12 mt-2">
                    <button type="submit" class="btn btn-primary add-product" name="submit">Add Product</button>
                </div>
            </div>

        </form>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
    if(isset($_POST['submit'])){
        $product_name = $_POST['product_name'];
        $brand_id=$_POST['brand_id'];
        $product_desc=$_POST['product_desc'];
        $product_quality=$_POST['product_quality'];
        $product_qty=$_POST['product_qty'];
        $product_price=$_POST['product_price'];
        $product_keywords=$_POST['product_keywords'];
        $file=$_FILES['file'];
        $filename =$file['name'];
        // $fileerror=$file['error'];
        $filetemp=$file['tmp_name'];
        $destinationfile='../uploads/'.$filename;
        move_uploaded_file($filetemp,$destinationfile);

        $insertquery="INSERT INTO `products`(`product_name`, `brand_id`, `product_desc`, `product_quality`, `product_qty`, `product_price`, `product_keywords`, `product_image`) VALUES ('$product_name','$brand_id','$product_desc','$product_quality','$product_qty','$product_price','$product_keywords','$destinationfile')";

        $query=mysqli_query($con,$insertquery);

        if($query){
            ?>
                <script>
                    alert('inserted successfully')

                </script>
                
            <?php
              }else{
                 ?>
                <script>
                alert('updated failed')

                </script>
                <?php
    }
        
    }


?>