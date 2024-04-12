<?php
    include './connection/connection.php';
   
    

    // getting ip address
    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  



    // add to cart function
    function addToCart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();  
        $get_product_id=$_GET['add_to_cart'];

        $selectQueryForCart="select * from cart where ip_address='$ip' and product_id=$get_product_id";
        $resultForCart=mysqli_query($con,$selectQueryForCart);
        // $row=mysqli_fetch_assoc($resultForCart);
        // $numOfRows=mysqli_num_rows($resultForCart);
        

        if(!empty($row=mysqli_fetch_assoc($resultForCart))){
            ?>
                <script>
                    alert('This item is already present inside your cart')
                    window.location.href = "http://localhost/mobile/user_shop.php";
                </script>

            <?php
        }else{
            $insertQuery="insert into cart(product_id,ip_address,qty) values($get_product_id,'$ip',1)";
            $q=mysqli_query($con,$insertQuery);
            if($q){
                ?>
                <script>
                    alert('This item is added in your cart')
                    window.location.href = "http://localhost/mobile/user_shop.php";
                </script>

            <?php
            }else{
                ?>
                <script>
                    alert('failed to insert')
                    
                </script>

<?php
            }

        }
    }

    }





    function cartItem(){
        if(isset($_GET['add_to_cart'])){
            global $con;
            $ip = getIPAddress();  
            
    
            $selectQueryForCart="select * from cart where ip_address='$ip'";
            $resultForCart=mysqli_query($con,$selectQueryForCart);
            // $row=mysqli_fetch_assoc($resultForCart);
            $cart_item=mysqli_num_rows($resultForCart);
            
            
            }else{
                global $con;
                $ip = getIPAddress();  
                
        
                $selectQueryForCart="select * from cart where ip_address='$ip'";
                $resultForCart=mysqli_query($con,$selectQueryForCart);
                $cart_item=mysqli_num_rows($resultForCart);
                
    
            }
            echo $cart_item;
        }
    

?>


<!-- order functionality -->
