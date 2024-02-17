<!--connect database file-->

<?php
  include("includes/connect.php");

  //connecting funtions files

  include("functions/common_functions.php");

  session_start();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E - mart</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Css own-->
    <link rel="stylesheet" href="cs.css">
    <style>
      body
      {
        overflow-x: hidden;
      }
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php
          if(!isset($_SESSION['username']))
          {
            echo "
            <li class='nav-item'>
              <a class='nav-link' href='./user_area/user_sigin.php'>Register</a>
            </li>";
          }
          else{
            echo"
            <li class='nav-item'>
             <a class='nav-link' href='./user_area/profile.php'>My Account</a>
            </li>
            ";
          }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
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
        <a class='nav-link' href='./user_area/user_login.php'>Login</a>
      </li>";
      }
      else{
        echo"<li class='nav-item'>
        <a class='nav-link' href='./user_area/logout.php'>Logout</a>
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

<div class="row px-1">
  <div class="col-md-10">
    <!--product-->
    <div class="row">
      <!--fetching gprdoucts-->
      <?php
        get_all_products();
        get_uniquecate(); 
        get_unique_brand();
      ?>
      <!--
      <div class="col-md-4 mb-2">
        <div class="card">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-info">Add to cart</a>
            <a href="#" class="btn btn-secondary">View more</a>
          </div>
        </div>
      </div>-->
      <!-- row end-->
    </div>
    <!-- col end-->
  </div>

  <div class="col-md-2 bg-secondary p-0">
    <!--sidenav-->

    <!-- brands to  be displayed -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
      </li>
      <?php
      
      getbrands();

      ?>        
    </ul>

    <!-- categories to be displayed-->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
      </li>
      <?php
      
      getcategory();

      ?>        
    </ul>
  </div>
</div>




  <div class="footcontainer bg-info-subtle text-center p-3"> 
    <p>All rights reserved &copy;- designed by Dharshan-2023</p>
  </div>
    <!--botstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>