<?php
    include './connection/connection.php';
    include 'common_function.php';
    session_start();
    $user_name=$_SESSION['first_name'];
    
    if(!isset($user_name)){
        ?>
    <script>
        window.location.href = "http://localhost/mobile/index.php";
    </script>
    <?php
    }

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

    <style>

.banner-button{
    font-size: larger;
    align-items: center;
    justify-content: center;
    border-radius: 80px;
    transition: 500ms;
    width:100%;
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
        let btn = document.querySelectorAll("#btn-click");

        btn.addEventListener("mouseup", ()=>{
                alert('You have to log in first')
        });

            

    </script>
</head>
<body style="background-color:antiquewhite;">
   

    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg bg-light navbar-light pt-0 pb-0 sticky-top">
        <div class="container-fluid">
           <a href="index.php"> <img src="img/logo.png" class="nav-logo" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="profile.php#top">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_shop.php">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php#aboutus">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php#contactus">CONTACT</a>
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
    <!-- navigation bar ends here -->
<!-- add to cart function -->
<?php  addToCart() ?>

    <div class="heading">
        <h2>PRODUCTS</h2>
    </div>
    <!-- cards starts here -->

    <!-- all product showing logic -->
    <?php

        $selectQuery="select * from products";
        $query=mysqli_query($con,$selectQuery);
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
                        <p>Quality- <?php echo $result['product_quality']; ?></p>
                        <?php
                            if($result['product_qty']==0){
                                echo '<h4 class="text-danger">Out of Stocks</h4>';
                            }elseif($result['product_qty']>0 && $result['product_qty']<5){
                                echo '<h4 class="text-danger">Only few lefts</h4>';
                                echo '<h5>Price- ₹'.$result['product_price'].'</h5>';

                            }else{
                                echo '<h5>Price- ₹'.$result['product_price'].'</h5>';

                            }


?>
                        
                        
                    </div>
                    <div class="col-md-2">
                        <div class="d-grid gap-2">
                            <?php
                                if($result['product_qty']==0){
                                    echo '<button type="button" class="btn btn-warning banner-button" disabled>ADD TO CART</button></a>
                                    ';
                                }else{
?>
                            <a href="user_shop.php?add_to_cart=<?php echo $result['product_id'] ?>"><button type="button" class="btn btn-warning banner-button" >ADD TO CART</button></a>
                            <!-- <button type="button" class="btn btn-info banner-button" >BUY NOW</button> -->
                     <?php   }  ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php

        }

?>


    <!-- footer starts here -->
    <section id="contactus">
        <div class="footer">
            <div class="heading">
                <h3>CONTACT US</h3>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-sm-4">
                        <h3 style="font-family: 'Lucida Sans';">Follow us on social media</h3>
                        <a href="//www.facebook.com" id="icons" class="bi bi-facebook"></a>
                        <a href="//www.snapchat.com/" id="icons" class="bi bi-snapchat"></a>
                        <a href="//www.instagram.com" id="icons" class="bi bi-instagram"></a>
                        <a href="//www.twitter.com" id="icons" class="bi bi-twitter"></a>
                    </div>

                    <div class="col-sm-5">
                        <h3 style="font-family: 'Lucida Sans';">Leave a comment</h3>
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-4">Name:</div>
                                    <div class="col-sm-5">
                                       <input type="text" name="name" class="form-control">
                                    </div>
                                <div class="col-sm-4">Email address:*</div>
                                    <div class="col-sm-5">
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                <div class="col-sm-4">Mobile No:</div>
                                    <div class="col-sm-5">
                                        <input type="tel" name="phone" class="form-control">
                                    </div>
                                <div class="col-sm-4">Message:*</div>
                                    <div class="col-sm-5">
                                        <input type="text" name="msg" class="form-control">
                                    </div>
                            </div>
                            <input type="submit" style="align-items: center;" value="Submit" name="save" class="btn btn-success"/>
                        </form>
                    </div>

                    <div class="col-sm-3">
                        <h4>Contact Details</h4><br>
                        <i class="bi bi-telephone-fill"> Phone: +91 9876543210</i><br>
                        <i class="bi bi-envelope-fill">  Email: phonemax@gmail.com</i>
                    </div>
                </div>

                <div class="footer1">
                    <i>Copyright &copy; 2022, All rights reserved. Designed & Developed by Arpan Pal</i>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
</body>
</html>

<?php

include './connection/connection.php';


    if(isset($_POST['save'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $msg=$_POST['msg'];
    
        $insert="INSERT INTO `contact`( name, email, phone, msg) VALUES ('$name','$email','$phone','$msg')";
        $query=mysqli_query($con,$insert);
        if($query){
            ?>
            <script>
                alert('comment has been sent')
            </script>
            
            <?php
        }else{
            ?>
            <script>
                alert("can't send your comment")
            </script>
                
            <?php
        }
    
    }
    




?>
  



<!-- for adding in cart -->

