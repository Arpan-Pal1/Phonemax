<?php
    include './connection/connection.php';
    include 'common_function.php';
    session_start();
    $user_name=$_SESSION['first_name'];
    $user_id=$_SESSION['user_id'];


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

    <div class="heading">
        <h2>YOUR CART</h2>
    </div>
    <div class="container">
      
       
<?php

            $ip = getIPAddress(); 
            $total_price=0;
            
            $cart_query="select * from cart where ip_address='$ip'";
            $queryOfCart=mysqli_query($con,$cart_query);
            $cartItemCount=mysqli_num_rows($queryOfCart);
            if($cartItemCount>0){
                echo ' <table class="table table-bordered text-center fs-5">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Product name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col" colspan="2">Operation</th>
                  </tr>
                </thead>
                <tbody>
                <form action="" methd="post">';
            while($row=mysqli_fetch_assoc($queryOfCart)){
                $productId=$row['product_id'];
                $quantity=$row['qty'];
                $select_product="select * from products where product_id=$productId";
                $result_product=mysqli_query($con,$select_product);
                while($row_product=mysqli_fetch_array($result_product)){
                    $product_price=array($row_product['product_price']*$quantity);
                    $price=$row_product['product_price'];
                    $name=$row_product['product_name'];
                    $image=explode("../uploads/",$row_product['product_image']);
                    // $image=$row_product['product_image'];
                    $product_value=array_sum($product_price);
                    $total_price += $product_value;
                    
                    

        ?>



              <tr>
                <td><strong><?php echo $name; ?></strong></td>
                <td><img src="./uploads/<?php echo $image[1]; ?>" alt="" height="80px" width="80px"></td>
                <td><strong><?php echo $quantity; ?></strong></td>


      <?php
                    if(isset($_POST['update'])){
                        $ip = getIPAddress(); 
                        $product_id=$_GET['id'];
                        $qty=$_POST['add_qty'];

                        $quantityQuery="update cart set qty=$qty where ip_address='$ip' and product_id=$product_id";
                        $qu=mysqli_query($con,$quantityQuery);
                        $total_price = $total_price * $qty;

                    }
                    ?> 
                



                <td>₹<?php echo $price ?></td>
                <td>
                    <a href="update_cart.php?id=<?php echo $productId;  ?>" class="btn btn-primary px-3 py-2 border-0 mx-3"  name="update">Update cart</a>

                    <a href="cart.php?id=<?php echo $productId;  ?>" class="btn btn-primary px-3 py-2 border-0 mx-3"  name="update">Delete Item</a>
                      
                        
            </td>
              </tr>
<?php
                }
            }
        }else{
            echo '<p class="h2 text-center">Your cart is empty</p>';
        }

?>





        </form>

            </tbody>
          </table>

          <?php

            $ip = getIPAddress(); 
            
            
            $cart_query="select * from cart where ip_address='$ip'";
            $queryOfCart=mysqli_query($con,$cart_query);
            $cartItemCount=mysqli_num_rows($queryOfCart);
            if($cartItemCount>0){
          echo '<div class="d-flex my-5">
          <p class="h4">Total Amount- ₹</p><strong class="h4">'. $total_price .'</strong> 
            <a href="profile.php"> <button class="btn btn-primary border-0 mx-5">Continue Shopping</button> </a>
            <button class="btn btn-primary border-0 " data-bs-toggle="modal" data-bs-target="#exampleModal">Check Out</button> </a>


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment Method</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        We are currently not taking online payment!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" disabled>Online Payment</button>
        <form method="post" action=""><button type="submit" name="submit" class="btn btn-primary" >Pay On Delivary</button></fprm>
      </div>
    </div>
  </div>
</div>

        </div>';
            }else{
                echo '
                <div class="d-flex justify-content-center my-5">
                <a href="user_shop.php"> <button class="btn btn-primary border-0 mx-5">Shop Now</button> </a>
                </div>';
            }
       ?> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

</body>
</html>


<?php

    if(isset($_GET['id'])){
        $ip = getIPAddress(); 
        $product_id=$_GET['id'];
        $delete="delete from cart where ip_address='$ip' and product_id=$product_id";
        $deleteQuery=mysqli_query($con,$delete);
        if($deleteQuery){
            ?>
            <script>
                alert('item removed from cart')
                window.location.href = "http://localhost/mobile/cart.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert('failed')
                window.location.href = "http://localhost/mobile/cart.php";
            </script>
            <?php
        }
    }


?>





<!-- order placed function call here -->
<?php

if(isset($_POST['submit'])){
    $ip = getIPAddress(); 
    $invoice_no=rand(1000000000,9999999999);
    $payment_mode="Pay on Delivery";
    $cart="SELECT * FROM `cart` WHERE ip_address='$ip'";
    if($cartQuery=mysqli_query($con,$cart)){
        while($r=mysqli_fetch_array($cartQuery)){
            $p_id=$r['product_id'];
            $p_qty=$r['qty'];

            $insert="INSERT INTO `orders`( user_id, product_id, qty, invoice_no, payment_method, time, status) VALUES ($user_id,$p_id,$p_qty,'$invoice_no','$payment_mode',NOW(),'successful')";

            if($insertQ=mysqli_query($con,$insert)){
                $productQ="SELECT * FROM `products` WHERE product_id=$p_id";
                $productquery=mysqli_query($con,$productQ);
                $result=mysqli_fetch_array($productquery);
                $product_qty=(int)$result['product_qty'];
                $new_qty=$product_qty-$p_qty;

                $update="UPDATE `products` SET `product_qty`='$new_qty' WHERE product_id=$p_id";
                if($updateQ=mysqli_query($con,$update)){
                    $delete="DELETE FROM `cart` WHERE product_id=$p_id";
                    $deleteQ=mysqli_query($con,$delete);
                
                    

                }else{
                    echo '<script> alert("error") </script>';

                }

            }else{
                echo '<script> alert("not done") </script>';

            }
            echo '<script> alert("Order successfull") 
            window.location.href = "http://localhost/mobile/user_shop.php";

            </script>';

        }
        
    }else{
        echo '<script> alert("error") </script>';

    }

}


?>
