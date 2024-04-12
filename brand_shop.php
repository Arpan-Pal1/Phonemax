<?php
    include './connection/connection.php';
    $id=$_GET['id'];
        
        $selectQuery="SELECT * FROM `products` WHERE brand_id=$id";
        $query=mysqli_query($con,$selectQuery);

        $selectQuery2 = "SELECT * FROM `brands` WHERE brand_id=$id";
        $query2=mysqli_query($con,$selectQuery2);
        $row=mysqli_fetch_assoc($query2);
?>

<html>
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css"> 

    

    <title>Online Refurbished Mobile Store</title>
    <link rel="icon" href="img/logo_title.png">
    <style>

.banner-button{
    font-size: larger;
    align-items: center;
    justify-content: center;
    border-radius: 80px;
    transition: 500ms;
}
.products{
    background-color:#ffffff;
    border-radius: 7px;
    margin-bottom: 1%; 
}
.img-fluid2{
    height: 230px;
    width: 200px;
}
.banner-btn{
    font-size: century;
}
    </style>
    <script>
        function login(){
            alert('To access cart you have to log in first')
            window
        }
    </script>
</head>
<body style="background-color:antiquewhite;">
    

    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg bg-light navbar-light pt-0 pb-0 sticky-top">
        <div class="container-fluid">
        <a href="index.php"> <img src="img/logo.png" class="nav-logo" alt="logo"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php#top">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#aboutus">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contactus">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="bi-cart3 nav-link" onclick="login()" href="#"> CART</a>
                    </li>
                    <li class="nav-item">
                        <a class="bi-box-arrow-in-right nav-link" href="login.php"> LOG IN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navigation bar ends here -->


    <div class="heading">
        <h2><?php echo strtoupper($row['brand_name']); ?> PRODUCT</h2>
    </div>
    <!-- cards starts here -->

    <!-- all product showing logic -->
    <?php
        
        while($result=mysqli_fetch_assoc($query)){
                $image=explode("../uploads/",$result['product_image']);

            ?>
            <div class="container products">
                <div class="row" style="align-items:center">
                    <div class="col-md-3" style="flex:0 0 0;">
                       <img src="./uploads/<?php echo $image[1]; ?>" alt="image_upload" class="img-fluid2"> 
                    </div>
                    <div class="col-md-7">
                        <h1><?php echo $result['product_name'];?></h1>
                        <p>
                        <?php echo $result['product_desc'];?> 
                        </p>
                        <h5>Price- ₹<?php echo $result['product_price'];?></h5>
                    </div>
                    <div class="col-md-2">
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-warning banner-button" disabled>ADD TO CART</button>
                            <!-- <button type="button" class="btn btn-info banner-button" disabled>BUY NOW</button> -->
                        </div>
                    </div>
                </div>
            </div>
            <?php

        }

?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>



</body>
</html>