<?php
include './connection/connection.php';
include 'common_function.php';
session_start();
$user_name=$_SESSION['first_name'];
if(!isset($user_name)){
    ?>
<script>
    window.location.href = "index.php";
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
                        <a class="nav-link" aria-current="page" href="#top" active>HOME</a>
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
    <!-- navigation bar ends here -->


    <!-- carousel -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" >
            <div class="carousel-item active" data-bs-interval="2500">
            <a href="user_shop.php"> <img src="img/carousel1.png" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item" data-bs-interval="2500">
               <a href="user_shop.php"> <img src="img/carousel2.png" class="d-block w-100" alt="..."></a>
            </div>
            <div class="carousel-item" data-bs-interval="2500">
            <a href="user_shop.php"><img src="img/carousel3.png" class="d-block w-100" alt="..."></a>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- carousel ends here -->


    <div class="heading">
        <h2>Why PhoneMax?</h2>
    </div>
    <!-- cards-1 -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="bi bi-wallet2 icons"></h2>
                        <h5 class="card-title">VALUE FOR MONEY</h5>
                        <p class="card-text">Big on quality, small on price. Pre-owned smartphones that fit every budget perfectly.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="bi bi-shield-check icons"></h2>
                        <h5 class="card-title">UPTO 12 MONTHS WARRANTY*</h5>
                        <p class="card-text">Spotting issues while using your purchase? Our warranty will get you covered. T&C apply.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="bi bi-arrow-repeat icons"></h2>
                        <h5 class="card-title">EASY 7 DAY REPLACEMENT*</h5>
                        <p class="card-text">All items are eligible for free replacement, within 7 days of delivery. T&C apply.</p>
                    </div>
                </div>
          </div>
        </div>
    </div>
    <!-- cards-1 ends here -->


    <div class="heading">
        <h2>Price Like Never Before</h2>
    </div>
    <!-- cards-2 -->
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="card" style=" border-color: orange; border-radius: 5px;" >    
                    <img src="img/adv1.jpg" class="card-img-top" alt="offer-2">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style=" border-color: orange; border-radius: 5px;" >    
                    <img src="img/adv2.jpg" class="card-img-top" alt="offer-2">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style=" border-color: orange; border-radius: 5px;" >    
                    <img src="img/adv3.jpg" class="card-img-top" alt="offer-2">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card" style=" border-color: orange; border-radius: 5px;" >    
                    <img src="img/adv4.jpg" class="card-img-top" alt="offer-2">
                </div>
            </div>
        </div>
    </div>
    <!-- cards-2 ends here -->


    <div class="heading">
        <h2>SHOP BY BRANDS</h2>
    </div>
    <!-- cards-3 -->
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="card" >    
                   <a href="user_brand_shop.php?id=1"><img src="img/Apple-logo.jpg" class="card-img-top" alt="apple"></a>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card" >    
                   <a href="user_brand_shop.php?id=2"><img src="img/Nokia-logo.jpg" class="card-img-top" alt="nokia"></a>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card" >    
                   <a href="user_brand_shop.php?id=8"><img src="img/OnePlus-logo.jpg" class="card-img-top" alt="Oneplus"></a>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card" >    
                   <a href="user_brand_shop.php?id=5"><img src="img/Samsung-logo.jpg" class="card-img-top" alt="Samsung"></a>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card" >    
                   <a href="user_brand_shop.php?id=6"><img src="img/Vivo-logo.jpg" class="card-img-top" alt="Vivo"></a>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="card" >    
                   <a href="user_brand_shop.php?id=9"><img src="img/Xiaomi-logo.jpg" class="card-img-top" alt="Mi"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- cards-3 ends here -->


    <!-- about us -->
    <section id="aboutus">
        <div class="heading">
            <h3>ABOUT US</h3>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <h3>Who Are We</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                     a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                      remaining essentially unchanged.
                <p>
                <h3>What We Do</h3>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking 
                    at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as 
                    opposed to using 'Content here, content here', making it look like readable English. 
                <p> 
                <h3>Sale of Refurbished Phone:</h3> 
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some 
                    form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use
                     a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All
                      the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the 
                      first true generator on the Internet.
                </p><br>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-4" style="margin-top: 5%">
                <img src="img/logo.png" class="img-fluid" alt="logo">
            </div>
        </div>
        </div>
    </section>
    <!-- about us ends here -->


    <div class="container banner">
        <div class="banner-text">
            <div class="row">
                <div class="col-sm-10">
                   <h3>Buy Quality Refurbished Smartphones</h3>
                   <p>at mind-blowing prices</p>
                </div>
                <div class="col-sm-2"><br>
                   <a href="user_shop.php"><button type="button" id="banner-button" class="btn btn-outline-warning"><b>Shop now</b></button></a>
                </div>
            </div>
        </div>
    </div>
    

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
                    <form method="post" action="">
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
                                    <input type="text" name="phone" class="form-control">
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
