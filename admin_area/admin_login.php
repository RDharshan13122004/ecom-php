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
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-fex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../admin_area/admin_img/cac-ky-nang-cua-hr-administrator.jpg" alt="admin registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" placeholder="Enter your username" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-info py-2 px-3 border-0" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php" class="link-danger">Register</a></p>
                    </div>
                </form>
            </div>    
        </div>
    </div>
</body>
</html>


<?php

    if(isset($_POST['admin_login']))
    {
        $admin_username=$_POST['username'];
        $admin_userpassword=$_POST['password'];

        $select_query="select * from admin_table where admin_name='$admin_username'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        $admin_ip=getIPAddress();

        if($row_count>0){
            $_SESSION['adminname']=$admin_username;
            if(password_verify($admin_userpassword,$row_data['admin_password'])){
                //echo"<script>alert('login successfully')</script>";
                if($row_count==1){
                    $_SESSION['username']=$user_username;
                    echo"<script>alert('login successfully')</script>";
                    echo"<script>window.open('index.php','_self')</script>";

                }
            }
            else{
                echo"<script>alert('Invalid Credentials')</script>";
            }
        }
    }


?>