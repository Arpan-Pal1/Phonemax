<?php
    include './connection/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                        <h4 class="mb-5 text-secondary">User Signup</h4>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label>First Name<span class="text-danger">*</span></label>
                                <input type="text" name="fname" class="form-control" placeholder="Enter First Name"
                                    required>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label>Last Name<span class="text-danger">*</span></label>
                                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name"
                                    required>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email"
                                    required>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label>Mobile number<span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Mobile number"
                                    required>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label>Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password"
                                    required>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label>Confirm Password<span class="text-danger">*</span></label>
                                <input type="password" name="cpassword" class="form-control"
                                    placeholder="Confirm Password" required>
                            </div>

                            <div class="mb-3 col-md-12">

                                <label>Address</label>
                                <textarea class="form-control" name="address" placeholder="Enter your address"
                                    required></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary float-end" type="submit" name="submit">Signup Now</button>
                            </div>
                        </div>

                        </div>
                </form>
                <p class="text-center mt-3 text-secondary">If you have account, Please <a href="login.php">Login Now</a>
                </p>
                
            </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
</body>

</html>

<?php
if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];

        $emailquery = "select * from user where email='$email'";
        $query = mysqli_query($con,$emailquery);
        $email_count = mysqli_num_rows($query);
        // $emial_count=mysql_affected_rows($query);

        if($email_count > 0){
            ?>
            <script>
            alert('email already exists')
            window.location.href = "http://localhost/mobile/login.php";
            </script>
            
<?php

        }else{
            $password=$_POST['password'];
            $cpassword=$_POST['cpassword'];
            if($password === $cpassword){
                $encrypt_password = password_hash($password,PASSWORD_BCRYPT);
                

                $insert = "INSERT INTO `user`( first_name, last_name, email, phone, password, address) VALUES ('$fname','$lname','$email','$phone','$encrypt_password','$address')";
                $q = mysqli_query($con,$insert);

                if($q){
                    ?>
                        <script>
                                alert("inserted successfully")
                                window.location.href = "http://localhost/mobile/login.php";
                        </script>

                       
                    <?php
                    
                }else{
                    ?>
                        <script>
                                alert("failed");
                        </script>

                        <?php
                    
                }
            }else{
                ?>
                        <script>
                            alert("password incorrect");
                            window.location.href = "http://localhost/mobile/signup.php";
                        </script>

             
                            
                        
<?php
            }
        }
    }


?>