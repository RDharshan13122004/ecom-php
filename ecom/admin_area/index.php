<?php

    include('../includes/connect.php');
    include('../functions/common_functions.php');
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
    <!--navbar-->
    <!--1st child-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info-subtle">
            <div class="container-fluid">
                <a class="navbar-brand kk" href="#"><h1>E - mart</h1></a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome <?php echo $_SESSION['adminname']?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>

    <!--2nd child-->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <!-- 3rd child-->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-3">
                <p class="text-light text-center">Welcome <?php echo $_SESSION['adminname']?></p>
            </div>
            <div class="text-light text-center">
                <button class="my-3"><a href="Insert_p.php" class="nav-link text-light bg-info m-1 p-2">Insert Products</a></button>
                <button class="my-3"><a href="index.php?view_products" class="nav-link text-light bg-info m-1 p-2">View products</a></button>
                <!--this ? is Get method symbol and next to 
                it is a variable which is-> insertc
                you need to in php isset because inside 
                if the variable in button is true the
                it while display inside the div area -->
                <button class="my-3"><a href="index.php?insertc" class="nav-link text-light bg-info m-1 p-2">Insert Categories</a></button>
                <button class="my-3"><a href="index.php?view_categories" class="nav-link text-light bg-info m-1 p-2">View Categories</a></button>
                <button class="my-3"><a href="index.php?inb" class="nav-link text-light bg-info m-1 p-2">Insert Brands</a></button>
                <button class="my-3"><a href="index.php?view_brands" class="nav-link text-light bg-info m-1 p-2">View Brands</a></button>
                <button class="my-3"><a href="index.php?list_orders" class="nav-link text-light bg-info m-1 p-2">All orders</a></button>
                <button class="my-3"><a href="index.php?list_payment" class="nav-link text-light bg-info m-1 p-2">All Payments</a></button>
                <button class="my-3"><a href="index.php?list_users" class="nav-link text-light bg-info m-1 p-2">List users</a></button>
                <button class="my-3"><a href="index.php?logoutpage" class="nav-link text-light bg-info m-1 p-2">Logout</a></button>
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['logoutpage'])){
            include("logoutpages.php");
        } 
    ?>

    <!--4th child-->
    <div class="container my-3">
        <?php
            if(isset($_GET['insertc'])){
                include("Insert_c.php");
            }
            if(isset($_GET['inb'])){
                include("Insert_b.php");
            }
            if(isset($_GET['view_products'])){
                include("view_products.php");
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_products'])){
                include('delete_product.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_category.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brand.php');
            }
            if(isset($_GET['edit_category'])){
                include('edit_categories.php');
            }
            if(isset($_GET['edit_brands'])){
                include('edit_brands.php');
            }
            if(isset($_GET['delete_category'])){
                include('delete_categories.php');
            }
            if(isset($_GET['delete_brands'])){
                include('delete_brand.php');
            }
            if(isset($_GET['list_orders'])){
                include('list_order.php');
            }
            if(isset($_GET['delete_order'])){
                include('delete_orders.php');
            }
            if(isset($_GET['list_payment'])){
                include('list_payments.php');
            }
            if(isset($_GET['delete_payments'])){
                include('delete_payment.php');
            }
            if(isset($_GET['list_users'])){
                include('list_user.php');
            }
            if(isset($_GET['delete_users'])){
                include('delete_user.php');
            }           
        ?>
    </div>

    <div class="footcontainer bg-info-subtle text-center p-3"> 
        <p>All rights reserved &copy;- designed by Dharshan-2023</p>
    </div>

    <!--botstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!--2 link-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>