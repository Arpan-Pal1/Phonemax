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
        <p class="h3 text-center my-3">Product List</p>
    <table class="table able-success table-striped">
  <thead>
    <tr>
      <th scope="col">Product name</th>
      <th scope="col">Description</th>
      <th scope="col">Quality</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col" colspan="2" >Status</th>
      
    </tr>
  </thead>
  <tbody>
      <?php
        $selectquery="SELECT * FROM `products`";
        $query=mysqli_query($con,$selectquery);
        while($result=mysqli_fetch_array($query)){
            ?>
            <tr>
            <td><?php echo $result['product_name']; ?></td>
            <td><?php echo $result['product_desc']; ?></td>
            <td><?php echo $result['product_quality']; ?></td>
            <td><?php echo $result['product_qty']; ?></td> 
            <td><img src="<?php echo $result['product_image'];?>" height="100px" width="100px alt="image2"></th>
            <td><?php echo $result['product_price']; ?></td>
            <td ><a href="product_update.php?id=<?php echo $result['product_id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
        <td ><a href="product_delete.php?id=<?php echo $result['product_id']?>"><i class="fa fa-trash"></i></td>
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