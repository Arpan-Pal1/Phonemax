<?php
    include './connection/connection.php';
    include 'common_function.php';
    session_start();
    $user_name=$_SESSION['first_name'];


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

   <!-- font awesome cdn link -->
   <script src="https://kit.fontawesome.com/1d1639d6b9.js" crossorigin="anonymous"></script>

</head>
<body style="background-color:antiquewhite;">
   

    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg bg-light navbar-light pt-0 pb-0 sticky-top">
        <div class="container-fluid">
            <img src="img/logo.png" class="nav-logo" alt="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="profile.php#top" active>HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_shop.php">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutus">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactus">CONTACT</a>
                    </li>
                    <li class="nav-item">
                    <span class="badge "><a class="bi-cart3 nav-link" href="cart.php"><sup><?php cartItem(); ?></sup></span></a>

                    </li>
                    
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"> </i><?php  echo $user_name ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="cart.php">Cart</a></li>
                        <li><a class="dropdown-item" href="order.php">My Order</a></li>
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                    </ul>
                    </li>
                                      
                </ul>
            </div>
        </div>
    </nav>

    <div class="heading">
        <h2>UPDATE CART</h2>
    </div>


    <?php

$ip = getIPAddress(); 

$product_id=$_GET['id'];
$product="select * from products where product_id=$product_id";
$productQuery=mysqli_query($con,$product);
$product_result=mysqli_fetch_assoc($productQuery);
$product_qty=$product_result['product_qty'];
$image=explode("../uploads/",$product_result['product_image']);
// $quantity=$product_result['qty'];

if(isset($_POST['submit'])){
    $qty=$_POST['qty'];
    if($product_qty<$qty){
        ?>
        <script>
            alert('<?php echo $qty." ".$product_result['product_name']; ?> are not available');
            window.location.href = "http://localhost/mobile/cart.php";

        </script>
        <?php
    }else{

    $updatQquery="update cart set qty=$qty where ip_address='$ip' and product_id=$product_id";

$queryOfCart=mysqli_query($con,$updatQquery);
if($queryOfCart){
    ?>
    <script>
        alert('successfully updated')
        window.location.href = "http://localhost/mobile/cart.php";

    </script>
    <?php
}else{
    ?>
    <script>
        alert('failed')
        

    </script>
    <?php
}
}
}

?>




<form action="" method="post">
    <div class="card m-auto" style="width: 18rem;">
  <img src="./uploads/<?php echo $image[1]; ?>" width="250px" height="280px" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><u><?php echo $product_result['product_name'];  ?></u></h5>
    <p class="card-text"><?php echo $product_result['product_desc'];  ?></p>
    <p class="card-text"><strong><?php echo $product_result['product_qty']; ?></strong> items available</p>
    <label for="qty" >Add more Quantities</label>
    <input type="number" name="qty" id=""qty>
    <button type="submit" class="btn btn-primary mt-3" name="submit">Update</a>
  </div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
</body>
</html>