<?php

    include('../includes/connect.php');

    include('../functions/common_functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username:</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required >
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">E-mail:</label>
                        <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required >
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image:</label>
                        <input type="file" name="user_image" id="user_image" class="form-control" placeholder="Enter your email" autocomplete="off" required >
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password:</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required >
                    </div>
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password:</label>
                        <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required >
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address:</label>
                        <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required >
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact:</label>
                        <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required >
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="btn bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold">Already have an account? <a href="user_login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php 

if(isset($_POST['user_register'])){

    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($_POST['user_password'],PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

    //select query

    $select_query="select * from user_table where user_name='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo"<script>alert('Username and Email are already exist')</script>";
    }
    elseif($user_password!=$conf_user_password){
        echo"<script>alert('password do not match')</script>";
    }
    else{
        //insert query

         move_uploaded_file($user_image_tmp,"./user_image/$user_image");
        $insert_query="insert into user_table (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_mobile')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script>alert('Data inserted successfully')</script>";
        }
        else{
            die(mysqli_error($con));
        }
    }
    
    //selecting cart items
    $select_cart_items="select * from cart_details where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_username;
        echo"<script>alert('you have items in your cart')</script>";
        echo"<script>window.open('checkout.php','_self')</script>";
    }
    else{
        echo"<script>window.open('../index.php','_self')</script>";
    }
 
}


?>


<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="jak.css">
    <title>Sign In</title>
</head>
<body>
    <div class="container">
        <div class="gop">
            <h1>E - Mart</h1>
            <span>Sign In</span>
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="con ur">
                    
                    <label class="form-control">
                        Username :
                    </label> <br>
                    <input type="text" name="urname" class="lcon" placeholder="Username">
                       
                </div>
                <div class="con em"> 
                    <label class="form-control">
                        E-mail :
                    </label> <br>
                    <input type="text" name="emname" class="lcon" placeholder="E-mail">
                </div>
                <div class="con em"> 
                    <label class="form-control">
                        User image :
                    </label> <br>
                    <input type="text" name="user_img" class="lcon" placeholder="user img">
                </div>
                <div class="con pass">
                    <label class="form-control">
                        Password : 
                    </label><br>
                    <input type="password" name="paword" class="lcon" id="textPassword" placeholder="Password">  
                </div>
                <div>
                    
                    <label for="ck" class="showLabel">
                        <input type="checkbox" name="ck" id="show"> Show password
                    </label>
                </div>
                <br><br>
                <div class="opg">
                    <button type="submit" class="oob">Sign In</button>        
                </div>
                <div class="ll">
                    Are you a not amember ? then <a href="login.php">Login In</a>
                </div>
                <script src="sp.js"></script>
            </form>
        </div>
    </div>

</body>
</html>
-->