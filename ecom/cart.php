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
      body{
        overflow-x: hidden;
      }
      .cart_img
      {
        width: 50px;
        height: 50px;
        object-fit: contain;
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
            <li class="nav-item">
              <a class="nav-link" href="./user_area/user_sigin.php">Register</a>
            </li>
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
        <!--
        <li class="nav-item">
          <a class="nav-link" href="./user_area/user_login.php">Login</a>
        </li>
        -->
      </ul>
    </nav>

    <!-- 3rd child-->
      <div class="bg-light">
        <h3 class="text-center">Hidden store</h3>
        <p class="text-center">Communications is at the heart of e-commerce and community</p>
      </div>

    <!-- 4th child-->

      <div class="container">
        <div class="row">
          <form action="" method="post">
            <table class="table table-boarded text-center">
                  <!-- php code to display dynamic data -->
                    <?php
                      $get_ip_add=getIPAddress();
                      $total=0;
                      $cart_query="select * from  cart_details where Ip_address='$get_ip_add'";
                      $rest_cq=mysqli_query($con,$cart_query);
                      $rest_count=mysqli_num_rows($rest_cq);
                      if($rest_count>0)
                      {
                        echo "
                            <thead>
                              <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                              </tr>
                            </thead>
                            <tbody>
                        ";
                        while($row=mysqli_fetch_array($rest_cq))
                        {
                          $product_id=$row['product_id'];
                          $slpr="select * from products where product_id='$product_id'";
                          $result_products=mysqli_query($con,$slpr);
                          while($row_pr_price=mysqli_fetch_array($result_products))
                          {
                            $prodt_price=array($row_pr_price['product_price']);
                            $pr_tabl=$row_pr_price['product_price'];
                            $pr_titl=$row_pr_price['product_title'];
                            $pr_img1=$row_pr_price['product_img1'];
                            $prodt_values=array_sum($prodt_price);
                            $total+=$prodt_values;
                       
                    ?>
                          <tr>
                            <td><?php echo"$pr_titl";?></td>
                            <td><img src="./admin_area/product_images/<?php echo"$pr_img1";?>" alt="<?php echo"$pr_titl"; ?>" class="cart_img"></td>
                            <td><input type="text" name="qty"></td>
                            <?php
                              $gt_p_ad=getIPAddress();
                              if(isset($_POST['Update_cart'])){
                                $quantities=$_POST['qty'];
                                $upadate_cart="update cart_details set Quantity=$quantities where Ip_address='$gt_p_ad'";
                                $ruc=mysqli_query($con,$upadate_cart);
                                $total=$total*$quantities;
                              }
                            ?>
                            <td><?php echo"$pr_tabl"; ?>/-</td>
                            <td><input type="checkbox" name="Removeitem[]" value="<?php echo"$product_id"; ?>"></td>
                            <td>
                              <!--<button class=' btn btn-info px-3 py-2 mx-1 text-light' type='submit' name='update_cart' value='Update cart'>Update cart</button>-->
                              <input type="submit" value="Update Cart" class="btn bg-info text-light px-3 py-2 border-0 mx-3" name="Update_cart">
                              <input type="submit" value="Remove" class="btn bg-info text-light px-3 py-2 border-0 mx-3" name="Remove_cart">                            
                            </td>
                          </tr>
                    <?php 
                          }
                        }
                      }
                      else{
                        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                      }
                    
                    ?>
                    
                    <!--
                    <td>Apple</td>
                    <td><img src="admin_area/product_images/dell15 1.jpeg" alt="" class="cart_img"></td>
                    <td><input type="text" name="" id=""></td>
                    <td>/-</td>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>
                        <button class=" btn btn-info px-3 py-2 mx-1 text-light">Update</button>
                        <button class=" btn btn-info px-3 py-2 mx-1 text-light">Remove</button>
                    </td>-->
                </tbody>
            </table>
            <!--Subtotal-->
            <div class="d-flex my-5">
                <?php
                  $get_ip_add=getIPAddress();
                  $cart_query="select * from  cart_details where Ip_address='$get_ip_add'";
                  $rest_cq=mysqli_query($con,$cart_query);
                  $rest_count=mysqli_num_rows($rest_cq);
                  if($rest_count>0)
                  {

                    echo"
                    <h4 class='px-3'>Subtotal: <strong class='text-info'>$total/-</strong ></h4>
                    <input type='submit' value='Continue shopping' class='btn bg-info text-light px-3 py-2 border-0 mx-3' name='continue_shopping'>
                    <button class='btn btn-secondary p-3 py-2 border-0'><a href='./user_area/checkout.php' class='text-decoration-none text-light'>Chechout</a></button>
                    ";
                  }
                  else{
                    echo "<input type='submit' value='Continue shopping' class='btn bg-info text-light px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                  }
                  if(isset($_POST['continue_shopping'])){
                    echo"<script>window.open('index.php','_self')</script>";
                  }
                
                ?>
            </div>
          </form>  
          <!-- function to remove item-->
          <?php 

            function remove_cart_item(){


              global $con;

              if(isset($_POST['Remove_cart'])){
                foreach($_POST['Removeitem'] as $remove_id){
                  echo $remove_id;
                  $delete_query="delete from cart_details where product_id=$remove_id";
                  $run_delete=mysqli_query($con,$delete_query);
                  if($run_delete){
                    echo"<script>window.open('cart.php','_self')</script>";
                  }
                }
              }
            }           
            echo $remove_item=remove_cart_item();
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