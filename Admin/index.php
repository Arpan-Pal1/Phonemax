<?php
include '../connection/connection.php';
session_start();

if(isset($_POST['submit'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    $emailquery="SELECT * FROM `admin` WHERE email='$email'";
    $query=mysqli_query($con,$emailquery);

    $email_count=mysqli_num_rows($query);

    if($email_count>0){
        $result=mysqli_fetch_assoc($query);
        $db_pass=$result['password'];

        $check_pass=password_verify($password,$db_pass);

        if($check_pass){
            $_SESSION['first_name']=$result['first_name'];
            ?>
            <script>
                alert('login successfully')
                window.location.href = "admin_dashboard.php";
            </script>
             
              <?php
            
         }else{
             ?>
             <script>
                 alert('invalid password')
                 window.location.href = "http://localhost/mobile/admin/index.php";

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


        <!-- external css -->
        <link rel="stylesheet" href="../style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light navbar-light pt-0 pb-0 sticky-top">
        <div class="container-fluid">
            <img src="../img/logo.png" class="nav-logo" alt="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">SIGN UP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactus">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="signup-form">
                    <form action="" method="post" class="mt-5 border p-4 bg-light shadow">
                        <h4 class="mb-5 text-secondary">Admin Login</h4>
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



    <section id="contactus">
        <div class="footer">
        <div class="heading">
            <h3>CONTACT US</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3 style="font-family: 'Lucida Sans';">Follow us on social media</h3>
                    <a href="//www.facebook.com" id="icons" class="bi bi-facebook"></a>
                    <a href="//www.snapchat.com/" id="icons" class="bi bi-snapchat"></a>
                    <a href="//www.instagram.com" id="icons" class="bi bi-instagram"></a>
                    <a href="//www.twitter.com" id="icons" class="bi bi-twitter"></a>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-3">
                    <h5>Contact</h5><br>
                    <i class="bi bi-telephone-fill"> Phone: +91 9876543210</i><br>
                    <i class="bi bi-envelope-fill">  Email: phonemax@gmail.com</i>
                </div>
            </div>
            <div class="footer1">
                <i>Copyright &copy; 2022, All rights reserved. Designed by A, A, R</i>
            </div>
        </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
</body>

</html>



