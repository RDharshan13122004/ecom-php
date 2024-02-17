<?php

    include('../includes/connect.php');

    include('../functions/common_functions.php');
    @session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--own css-->
    <link rel="stylesheet" href="../cs.css">

    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-fex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../admin_area/admin_img/bia 2.png" alt="admin registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter your username" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter your confirm password" class="form-control" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-info py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>    
        </div>
    </div>
</body>
</html>


<?php

    if(isset($_POST['admin_registration']))
    {
        $admin_name=$_POST['username'];
        $admin_email=$_POST['email'];
        $admin_password=$_POST['password'];
        $admin_hash_password= password_hash($_POST['password'],PASSWORD_DEFAULT)  ;
        $admin_conf_password=$_POST['confirm_password'];
        $admin_ip=getIPAddress();

        $select_query="select *  from admin_table where admin_name='$admin_name' or admin_email='$admin_email'";
        $result=mysqli_query($con,$select_query);
        $row_query=mysqli_num_rows($result);
        if($row_query>0)
        {
            echo"<script>alert('Username and Email are already exist')</script>";
        }
        elseif($admin_password!=$admin_conf_password)
        {
            echo"<script>alert('password do not match')</script>";
        }
        else
        {
            $insert_query="insert into admin_table (admin_name,admin_email,admin_password,admin_ip) values ('$admin_name','$admin_email','$admin_hash_password','$admin_ip')";
            $insert_result=mysqli_query($con,$insert_query);
            if($insert_result){
                $_SESSION['adminname']= $admin_name;
                echo "<script>alert('Data inserted successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }

    }


?>