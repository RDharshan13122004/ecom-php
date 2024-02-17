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
    <style>
        body{
            overflow-x: hidden;
        }
        
    </style>
</head>
<body>
    <!-- php code to access user id -->
    <?php
    
    $user_ip=getIPAddress();
    $get_user="select * from user_table where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_assoc($result);
    $user_id=$run_query['user_id'];
    
    
    
    
    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../img/images.jpeg" alt="paypal transaction img"></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>" target="_blank" class="text-decoration-none"><h2 class="text-center text-info">Pay offline</h2></a>
            </div>
        </div>
    </div>
</body>
</html>