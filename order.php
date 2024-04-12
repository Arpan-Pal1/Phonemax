<?php
 include './connection/connection.php';
 include 'common_function.php';
 session_start();
 $user_name=$_SESSION['first_name'];
 $user_id=$_SESSION['user_id'];

if(!isset($user_name)){
    ?>
<script>
    window.location.href = "http://localhost/mobile/index.php";
</script>
<?php
}
 ?>

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
         <link rel="stylesheet" href="./style.css">
 
        
 
         <!-- icon cdn link -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/svg-with-js.min.css" integrity="sha512-U7WyVKwgyoYSa+qowujpUQIH3omU6SlFFr8m6kiEuuM1lWqoiURgTNskMFEf1la4PDNQzMws/G1u0wKGNxVbcQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
         <!-- font awesome cdn link -->
         <script src="https://kit.fontawesome.com/1d1639d6b9.js" crossorigin="anonymous"></script>
 </head>
 <body>
     <!-- nav bar -->
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





     <div class="container ">
         <p class="h3 text-center my-3">Order List</p>
     <table class="table able-success table-striped">
   <thead>
     <tr>
         <th scope="col">Product name</th>
         <th scope="col">Image</th>
       <th scope="col">Invoice no</th>
       <th scope="col">Product Quantity</th>
       <th scope="col">Product Price</th>
       <th scope="col">Payment Mehod</th>
       <th scope="col">Status</th>
       <th scope="col">Date</th>
       
     </tr>
   </thead>
   <tbody>
       <?php
         $selectquery="SELECT * FROM `orders` WHERE user_id=$user_id";
         $query=mysqli_query($con,$selectquery);
         while($result=mysqli_fetch_array($query)){
             $user_id=$result['user_id'];
             $product_id=$result['product_id'];
             //user data
             $user="SELECT * FROM `user` WHERE user_id=$user_id";
                 $userQ=mysqli_query($con,$user);
                 $userDetails=mysqli_fetch_array($userQ);
 
             //product data
             $product="SELECT * FROM `products` WHERE product_id=$product_id";
                 $productQ=mysqli_query($con,$product);
                 $productDetails=mysqli_fetch_array($productQ);
                 $image=explode("../uploads/",$productDetails['product_image']);
                 
             ?>
             <tr>
                    <td><?php echo $productDetails['product_name']; ?></td>
                    <td><img src="./uploads/<?php echo $image[1]; ?>" alt="" height="80px" width="80px"></td>
                <td><?php echo $result['invoice_no']; ?></td>
                <td class="text-center"><?php echo $result['qty']; ?></td> 
                <td><?php echo $productDetails['product_price']; ?></td> 
                <td><?php echo $result['payment_method']; ?></td> 
                <td><?php echo $result['status']; ?></td> 
                <td><?php echo $result['time']; ?></td> 
             
             
            
           </tr>
 
           <?php
         }
 
 
 
     ?>
    
     
   </tbody>
 </table>
 
     </div>
 
 
 
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
     integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
     crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
     integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
     crossorigin="anonymous"></script>
 </body>
 </html>


