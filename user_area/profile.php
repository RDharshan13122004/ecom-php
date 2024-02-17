<!--connect database file-->

<?php
  include("../includes/connect.php");

  //connecting funtions files

  include("../functions/common_functions.php");
  session_start();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-mart</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Css own-->
    <link rel="stylesheet" href="../cs.css">
    <style>
      body
      {
            overflow-x: hidden;
        }
        /*
      .profile_img
      {
            width: 100%;
            height: 100%;
        }
        */

    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-info-subtle">
  <div class="container-fluid">
    <a class="navbar-brand kk" href="#"><h1>E - mart</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_sigin.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='search_data'>
        <button class="btn btn-outline-success" type="submit" name="search_data_product">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- Calling cart function-->

<?php

  cart();

?>

<!-- Second child -->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
    <?php 

      if(!isset($_SESSION['username'])){
        echo"<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>";
      }
      else{
        echo"<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
      </li>";
      }
    
      if(!isset($_SESSION['username'])){
        echo"<li class='nav-item'>
        <a class='nav-link' href='user_login.php'>Login</a>
        </li>";
      }
      else{
        echo"<li class='nav-item'>
        <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
      }
    
    
    ?>
  </ul>
</nav>

 <!-- 3rd child-->
  <div class="bg-light">
    <h3 class="text-center">Hidden store</h3>
    <p class="text-center">Communications is at the heart of e-commerce and community</p>
  </div>




<!-- 4th child-->

<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center">
            <li class="nav-item bg-info">
                <a href="" class="nav-link text-light"><h4>Your profile</h4></a>
            </li>
            <?php
                $username=$_SESSION['username'];

                $User_img="select * from user_table where user_name='$username'";
                $user_img_q=mysqli_query($con,$User_img);
                $row_img=mysqli_fetch_array($user_img_q);
                $user_image=$row_img['user_image'];
                echo "
                <li class='nav-item'>
                <img src='./user_image/$user_image' alt='$username' style='width: 90%; margin:auto; display:block; height: 100%;' class='my-4'>
                </li>"
                ;


            ?>
            <li class="nav-item">
                <a href="profile.php" class="nav-link text-light">Pending orders</a>
            </li> 
            <li class="nav-item">
                <a href="profile.php?edit_account" class="nav-link text-light">Edit account</a>
            </li>
            <li class="nav-item">
                <a href="profile.php?my_orders" class="nav-link text-light">My orders</a>
            </li> 
            <li class="nav-item">
                <a href="profile.php?delete_account" class="nav-link text-light">Delete Account</a>
            </li> 
            <li class="nav-item">
                <a href="logout.php" class="nav-link text-light">Logout</a>
            </li>
        </ul>
    </div>

    <div class="col-md-10 text-center">
        <?php
          get_user_order_details();

          if(isset($_GET['edit_account'])){
            include('edit_account.php');
          }
          if(isset($_GET['my_orders']))
          {
            include('user_orders.php');
          }
          if(isset($_GET['delete_account']))
          {
            include('delete_account.php');
          }
        ?>
    </div>
</div>

  <div class="footcontainer bg-info-subtle text-center p-3"> 
    <p>All rights reserved &copy;- designed by Dharshan-2023</p>
  </div>
    <!--botstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>