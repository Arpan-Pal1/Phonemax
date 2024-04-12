<?php
include '../connection/connection.php';

$id=$_GET['id'];
$deletequery="DELETE FROM `brands` WHERE brand_id=$id ";
$query=mysqli_query($con,$deletequery);
if($query){
    ?>
    <script>
        alert('Deleted successfully')
       
    </script>
   <?php header('location:admin_dashboard.php?view_brands'); ?>
<?php
}else{
?>
    <script>
        alert('Deleted failed')
        
    </script>
<?php
}


?>