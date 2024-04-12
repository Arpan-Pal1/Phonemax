<?php
    session_start();
    
    if(!isset( $_SESSION['first_name'])){
        header('location:index.php');
    }else{
        $first_name=$_SESSION['first_name'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


        <!-- external css -->
        <link rel="stylesheet" href="../style.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-light navbar-light pt-0 pb-0 sticky-top">
        <div class="container-fluid">
            <img src="../img/logo.png" class="nav-logo" alt="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#top">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_dashboard.php?view_products">PRODUCT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_dashboard.php?view_brands">BRAND</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_dashboard.php?view_orders">ORDERES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_dashboard.php?contact">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">LOG OUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- offcanvas -->
    <div class="mt-5 d-flex flex-column justify-content-center align-items-center button_offcanvas">
        <p class="h2 my-2 ">Want to add somthing</p>
    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add Here </button>
    </div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Welocme <?php echo $first_name; ?></h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column">
  <a href="admin_dashboard.php?add_product"><button type="button" class="btn btn-primary my-3">Add Product</button></a>
  <a href="admin_dashboard.php?add_brands"><button type="button" class="btn btn-primary" name="add-btn-brands">Add Brands</button></a>
  </div>
</div>

<div class="conatiner my-5">
<?php
    if(isset($_GET['add_brands'])){
        include 'add_brands.php';
    }if(isset($_GET['add_product'])){
        include 'add_product.php';
    }
    if(isset($_GET['view_brands'])){
        include 'view_brands.php';
    }
    if(isset($_GET['brand_update'])){
        include 'brand_update.php';
    }
    if(isset($_GET['view_products'])){
        include 'view_products.php';
    }
    if(isset($_GET['contact'])){
        include 'view_contact.php';
    }
    if(isset($_GET['view_orders'])){
        include 'order.php';
    }

?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>
</html>