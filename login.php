<?php
    session_start();
    include './connection/connection.php';

    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=$_POST['password'];

        $emailquery="select * from user where email='$email'";
        $q=mysqli_query($con,$emailquery);
        $email_count=mysqli_num_rows($q);
    
        if($email_count){
            $result = mysqli_fetch_assoc($q);
            $db_pass = $result['password'];
            
            
            $check_pass=password_verify($password,$db_pass);
            
    
            if(!$check_pass){
                ?>
                <script>
                    alert('invalid password')
                    window.location.href = "http://localhost/mobile/login.php";

                </script>
                <?php
               
            }else{
                $_SESSION['first_name']=$result['first_name'];
                $_SESSION['user_id']=$result['user_id'];
               ?>
               <script>
                   alert('login successfully')
                   window.location.href = "http://localhost/mobile/profile.php";
               </script>
                
                 <?php
            }
        }else{
            ?>
            <script>
                alert('invalid email')
            </script>
            <?php
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   <link rel="stylesheet" href="style.css">

   <title>Online Refurbished Mobile Store</title>
   <link rel="icon" href="img/logo_title.png">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="signup-form">
                    <form action="" method="post" class="mt-5 border p-4 bg-light shadow">
                        <h4 class="mb-5 text-secondary">User Login</h4>
                        <div class="row">

                            <div class="mb-3 col-md-12">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email"
                                    required>
                            </div>


                            <div class="mb-3 col-md-12">
                                <label>Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password"
                                    required>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-primary float-end" type="submit" name="submit">Login Now</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center mt-3 text-secondary">Didn't have account, Please <a href="signup.php">Signup
                            Now</a></p>
                </div>
            </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
</body>
</html>
