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
<div class="container">
    <!-- showing brands name logic -->
    <?php
        $getid=$_GET['id'];
        $selectquery="select * from brands where brand_id=$getid";
        $query=mysqli_query($con,$selectquery);
        
        $result = mysqli_fetch_assoc($query);



    ?>

        <p class="h3 text-center">Update brands</p>
    <form method="post" action="" class="mt-5 border p-4 bg-light shadow">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Brands</label>
        <input type="text" class="form-control w-25" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brands Name" name="brand_name" value="<?php echo $result['brand_name']  ?>" required>
      </div>
        <button class="btn btn-primary" type="submit" name="submit">Update Brands</button>
    
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>

</html>

<!-- update brand name logic -->

<?php
    if(isset($_POST['submit'])){
        $brand_name=$_POST['brand_name'];
        $updatequery="UPDATE `brands` SET brand_name='$brand_name' WHERE brand_id=$getid";
        $q=mysqli_query($con,$updatequery);
        if($q){
            ?>
                <script>
                    alert('updated successfully')
                   
                </script>
               <?php header('location:admin_dashboard.php?view_brands'); ?>
            <?php
        }else{
            ?>
                <script>
                    alert('updated failed')
                    
                </script>
            <?php
        }
    }


?>

