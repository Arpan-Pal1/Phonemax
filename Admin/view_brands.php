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
<table class="table table-striped table-hover text-center container">
  <p class="h3 text-center">List of brands</p>
  <thead>
    <tr>
      <th scope="col">Brand_id</th>
      <th scope="col">Brand_name</th>
      <th scope="col" colspan="2" >Status</th>
      
    </tr>
  </thead>
  <tbody>
  
      
    <?php

      $selectquery="SELECT * FROM brands";
      $query=mysqli_query($con,$selectquery);
      while($result=mysqli_fetch_assoc($query)){
        ?>
        <tr>
        <th scope="row"><?php echo $result['brand_id']?></th>
        <td><?php echo $result['brand_name']?></td>
        <td ><a href="brand_update.php?id=<?php echo $result['brand_id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
        <td ><a href="brand_delete.php?id=<?php echo $result['brand_id']?>"><i class="fa fa-trash"></i></td>
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

