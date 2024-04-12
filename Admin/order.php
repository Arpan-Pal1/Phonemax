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

        <!-- including connection -->
        <?php
            include '../connection/connection.php';
        ?>

        <!-- icon cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/svg-with-js.min.css" integrity="sha512-U7WyVKwgyoYSa+qowujpUQIH3omU6SlFFr8m6kiEuuM1lWqoiURgTNskMFEf1la4PDNQzMws/G1u0wKGNxVbcQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- font awesome cdn link -->
        <script src="https://kit.fontawesome.com/1d1639d6b9.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container ">
        <p class="h3 text-center my-3">Order List</p>
    <table class="table able-success table-striped">
  <thead>
    <tr>
      <th scope="col">User name</th>
      <th scope="col">Invoice no</th>
      <th scope="col">Product name</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Product Price</th>
      <th scope="col">Payment Mehod</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">Address</th>
      
    </tr>
  </thead>
  <tbody>
      <?php
        $selectquery="SELECT * FROM `orders`";
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

                
            ?>
            <tr>
            <td><?php echo $userDetails['first_name']." ".$userDetails['last_name']; ?></td>
            <td><?php echo $result['invoice_no']; ?></td>
            <td><?php echo $productDetails['product_name']; ?></td>
            <td class="text-center"><?php echo $result['qty']; ?></td> 
            <td><?php echo $productDetails['product_price']; ?></td> 
            <td><?php echo $result['payment_method']; ?></td> 
            <td><?php echo $result['status']; ?></td> 
            <td><?php echo $result['time']; ?></td> 
            <td><?php echo $userDetails['address']; ?></td> 
            
           
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