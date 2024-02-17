<?php

    //including  connect file

    //include('../ecom/includes/connect.php');

    //getting products

    function getproduct()
    {
        global $con;

        //condition to check isset or not
        if(!isset($_GET['category']))
        {

            if(!isset($_GET['brand']))
            {
                $Select_Query="select * from products order by rand() limit 0,9"; 
                $Result_query=mysqli_query($con,$Select_Query);
                //$RW=mysqli_fetch_assoc($Result_query);
                while($RW=mysqli_fetch_assoc($Result_query))
                {
                    $pdt_id=$RW['product_id'];
                    $pdt_tile=$RW['product_title'];
                    $pdt_descr=$RW['product_description'];
                    $pdt_kywd=$RW['product_keywords'];
                    $pdt_c_id=$RW['category_id'];
                    $pdt_b_id=$RW['brand_id'];
                    $pdt_img1=$RW['product_img1'];
                    $pdt_price=$RW['product_price'];
                    echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$pdt_img1' class='card-img-top' alt='$pdt_tile' style='width: 100%; height: 200px; object-fit: contain;'>
                            <div class='card-body'>
                                <h5 class='card-title'>$pdt_tile</h5>
                                <p class='card-text'>$pdt_descr.</p>
                                <p class='card-text'>Price : $pdt_price/-</p>
                                <a href='index.php?add_to_cart=$pdt_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$pdt_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
                }
            }
        }
    }

    //getting all products

    function get_all_products(){

        global $con;

        //condition to check isset or not
        if(!isset($_GET['category']))
        {

            if(!isset($_GET['brand']))
            {
                $Select_Query="select * from products order by rand()"; 
                $Result_query=mysqli_query($con,$Select_Query);
                //$RW=mysqli_fetch_assoc($Result_query);
                while($RW=mysqli_fetch_assoc($Result_query))
                {
                    $pdt_id=$RW['product_id'];
                    $pdt_tile=$RW['product_title'];
                    $pdt_descr=$RW['product_description'];
                    $pdt_kywd=$RW['product_keywords'];
                    $pdt_c_id=$RW['category_id'];
                    $pdt_b_id=$RW['brand_id'];
                    $pdt_img1=$RW['product_img1'];
                    $pdt_price=$RW['product_price'];
                    echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$pdt_img1' class='card-img-top' alt='$pdt_tile' style='width: 100%; height: 200px; object-fit: contain;'>
                            <div class='card-body'>
                                <h5 class='card-title'>$pdt_tile</h5>
                                <p class='card-text'>$pdt_descr.</p>
                                <p class='card-text'>Price : $pdt_price/-</p>
                                <a href='index.php?add_to_cart=$pdt_id' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$pdt_id' class='btn btn-secondary'>View more</a>
                            </div>
                        </div>
                    </div>";
                }
            }
        }
    }        

    // getting unique categories

    function get_uniquecate()
    {

        global $con;
        //condition to check isset or not
        if(isset($_GET['category']))
        {
            $category_id=$_GET['category'];

            $Select_Query="select * from products where category_id=$category_id"; 
            $Result_query=mysqli_query($con,$Select_Query);
            //$RW=mysqli_fetch_assoc($Result_query);
            $num_of_rows=mysqli_num_rows($Result_query);
            if($num_of_rows==0){
                echo"<h2 class='text-center text-danger'>No stock for this Category</h2>";
            }

            while($RW=mysqli_fetch_assoc($Result_query))
            {
                $pdt_id=$RW['product_id'];
                $pdt_tile=$RW['product_title'];
                $pdt_descr=$RW['product_description'];                    
                $pdt_kywd=$RW['product_keywords'];
                $pdt_c_id=$RW['category_id'];
                $pdt_b_id=$RW['brand_id'];
                $pdt_img1=$RW['product_img1'];
                $pdt_price=$RW['product_price'];
                echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$pdt_img1' class='card-img-top' alt='$pdt_tile' style='width: 100%; height: 200px; object-fit: contain;'>
                        <div class='card-body'>
                            <h5 class='card-title'>$pdt_tile</h5>
                            <p class='card-text'>$pdt_descr.</p>
                            <p class='card-text'>Price : $pdt_price/-</p>
                            <a href='index.php?add_to_cart=$pdt_id' class='btn btn-info'>Add to cart</a>
                            <a href='product_details.php?product_id=$pdt_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";
            }
        }
    }


    // getting unique brands
    function get_unique_brand()
    {

        global $con;
        //condition to check isset or not
        if(isset($_GET['brand']))
        {
            $brand_id=$_GET['brand'];

            $Select_Query="select * from products where brand_id=$brand_id"; 
            $Result_query=mysqli_query($con,$Select_Query);
            //$RW=mysqli_fetch_assoc($Result_query);

            $num_of_row=mysqli_num_rows($Result_query);
            if($num_of_row==0){
                echo"<h2 class='text-center text-danger'>This brand is not available for service</h2>";
            }
            while($RW=mysqli_fetch_assoc($Result_query))
            {
                $pdt_id=$RW['product_id'];
                $pdt_tile=$RW['product_title'];
                $pdt_descr=$RW['product_description'];                    
                $pdt_kywd=$RW['product_keywords'];
                $pdt_c_id=$RW['category_id'];
                $pdt_b_id=$RW['brand_id'];
                $pdt_img1=$RW['product_img1'];
                $pdt_price=$RW['product_price'];
                echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$pdt_img1' class='card-img-top' alt='$pdt_tile' style='width: 100%; height: 200px; object-fit: contain;'>
                        <div class='card-body'>
                            <h5 class='card-title'>$pdt_tile</h5>
                            <p class='card-text'>$pdt_descr.</p>
                            <p class='card-text'>Price : $pdt_price/-</p>
                            <a href='index.php?add_to_cart=$pdt_id' class='btn btn-info'>Add to cart</a>
                            <a href='product_details.php?product_id=$pdt_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";
              }
        }
    }

    //Get brands to insert in navside
    function getbrands(){
        global $con;
        $brand_q="select * from brands";
        $brand_res=mysqli_query($con,$brand_q);
        //$row_data=mysqli_fetch_assoc($brand_res);
        //$row_data['brand_title'];
        //echo $row_data['brand_title'];
        while($row_data=mysqli_fetch_assoc($brand_res))
        {
          $b_title=$row_data['brand_title'];
          $b_id=$row_data['brand_id'];
          echo "
            <li class='nav-item'>
              <a href='index.php?brand=$b_id' class='nav-link text-light'>$b_title</a>
            </li>"
          ;
        }
    }

    //Get category to insert in navside

    function getcategory(){

        global $con;
        $category_q="select * from category";
        $category_res=mysqli_query($con,$category_q);
        //$row_data=mysqli_fetch_assoc($category_res);
        //$row_data['category_title'];
        //echo $row_data['category_title'];
        while($row_data=mysqli_fetch_assoc($category_res)){
            $c_title=$row_data['category_title'];
            $c_id=$row_data['category_id'];
            echo "
            <li class='nav-item'>
                <a href='index.php?category=$c_id' class='nav-link text-light'>$c_title</a>
            </li>"
            ;
        }
    }


    function search_product(){

        global $con;
        if(isset($_GET['search_data_product'])){
            $search_data_values=$_GET['search_data'];
            $Search_Query="select * from products where product_keywords like '%$search_data_values%'"; 
            $Result_query=mysqli_query($con,$Search_Query);
            //$RW=mysqli_fetch_assoc($Result_query);
            $num_of_row=mysqli_num_rows($Result_query);
            if($num_of_row==0){
                echo"<h2 class='text-center text-danger'>No results match. No products found on this category!</h2>";
            }
            while($RW=mysqli_fetch_assoc($Result_query))
            {
                $pdt_id=$RW['product_id'];
                $pdt_tile=$RW['product_title'];
                $pdt_descr=$RW['product_description'];
                $pdt_kywd=$RW['product_keywords'];
                $pdt_c_id=$RW['category_id'];
                $pdt_b_id=$RW['brand_id'];
                $pdt_img1=$RW['product_img1'];
                $pdt_price=$RW['product_price'];
                echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$pdt_img1' class='card-img-top' alt='$pdt_tile' style='width: 100%; height: 200px; object-fit: contain;'>
                        <div class='card-body'>
                            <h5 class='card-title'>$pdt_tile</h5>
                            <p class='card-text'>$pdt_descr.</p>
                            <p class='card-text'>Price : $pdt_price/-</p>
                            <a href='index.php?add_to_cart=$pdt_id' class='btn btn-info'>Add to cart</a>
                            <a href='product_details.php?product_id=$pdt_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div>";
            }
        }
    }



    // view details function

    function view_details() 
    {
        global $con;

        if(isset($_GET['product_id']))
        {

            if(!isset($_GET['category']))
            {

                if(!isset($_GET['brand']))
                {
                    $pd_id=$_GET['product_id'];
                    $Select_Query="select * from products where product_id=$pd_id"; 
                    $Result_query=mysqli_query($con,$Select_Query);
                    //$RW=mysqli_fetch_assoc($Result_query);
                    while($RW=mysqli_fetch_assoc($Result_query))
                    {
                        $pdt_id=$RW['product_id'];
                        $pdt_tile=$RW['product_title'];
                        $pdt_descr=$RW['product_description'];
                        $pdt_kywd=$RW['product_keywords'];
                        $pdt_c_id=$RW['category_id'];
                        $pdt_b_id=$RW['brand_id'];
                        $pdt_img1=$RW['product_img1'];
                        $pdt_img2=$RW['product_img2'];
                        $pdt_img3=$RW['product_img3'];
                        $pdt_price=$RW['product_price'];
                        echo "
                        <div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$pdt_img1' class='card-img-top' alt='$pdt_tile' style='width: 100%; height: 200px; object-fit: contain;'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$pdt_tile</h5>
                                    <p class='card-text'>$pdt_descr.</p>
                                    <p class='card-text'>Price : $pdt_price/-</p>
                                    <a href='index.php?add_to_cart=$pdt_id' class='btn btn-info'>Add to cart</a>
                                    <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-8'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h4 class='text-center text-info mb-5'>Related products</h4>
                                </div>
                                <div class='col-md-6'>
                                    <img src='./admin_area/product_images/$pdt_img2' class='card-img-top' alt='$pdt_tile' style='width: 100%; height: 200px; object-fit: contain;'>
                                </div>
                                <div class='col-md-6'>
                                    <img src='./admin_area/product_images/$pdt_img3' class='card-img-top' alt='$pdt_tile' style='width: 100%; height: 200px; object-fit: contain;'>
                                </div>
                            </div>
                        </div>";
                    }
                }
            } 
        }     
    }

    //get ip address function

    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
/*
    $ip = getIPAddress();  
    echo 'User Real IP Address - '.$ip;  
*/



// cart function

function cart(){
    if(isset($_GET['add_to_cart']))
    {

        global $con;

        $ips = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_quy="select * from cart_details where Ip_address='$ips' and product_id=$get_product_id";
        $resq=mysqli_query($con,$select_quy);
        $nof=mysqli_num_rows($resq);
        if($nof > 0){
            echo "<script>alert('This item is already present inside cart')</script>";
            echo"<script>window.open('index.php','_self')</script>";
        }
        else{
            $Ist_qry="insert into cart_details (product_id,Ip_address,Quantity) values ($get_product_id,'$ips',0)";
            $rqs=mysqli_query($con,$Ist_qry);
            echo "<script>alert('Item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


// function to get cart item numbers

function cart_item(){

    if(isset($_GET['add_to_cart']))
    {

        global $con;

        $ips = getIPAddress();
 
        $select_quy="select * from cart_details where Ip_address='$ips'";
        $resq=mysqli_query($con,$select_quy);
        $Count_cart_items=mysqli_num_rows($resq);
        
    }
    else
    {
        global $con;

        $ips = getIPAddress();
 
        $select_quy="select * from cart_details where Ip_address='$ips'";
        $resq=mysqli_query($con,$select_quy);
        $Count_cart_items=mysqli_num_rows($resq);
    }
    echo $Count_cart_items;
}


// total cart price in side navbar function

function total_cart_price()
{

    global $con;

    $get_ip_add=getIPAddress();
    $total=0;
    $cart_query="select * from  cart_details where Ip_address='$get_ip_add'";
    $rest_cq=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($rest_cq)){
        $product_id=$row['product_id'];
        $slpr="select * from products where product_id='$product_id'";
        $result_products=mysqli_query($con,$slpr);
        while($row_pr_price=mysqli_fetch_array($result_products)){
            $prodt_price=array($row_pr_price['product_price']);
            $prodt_values=array_sum($prodt_price);
            $total+=$prodt_values;
        }
    }
    echo $total;
}


// get user order details

    function get_user_order_details()
    {
        global $con;
        $username=$_SESSION['username'];
          $get_details="select * from user_table where user_name='$username'";
          $result_query=mysqli_query($con,$get_details);
          while($row_query=mysqli_fetch_array($result_query))
          {
              $user_id=$row_query['user_id'];
              if(!isset($_GET['edit_account']))
              {
                  if(!isset($_GET['my_orders']))
                  {
                      if(!isset($_GET['delete_account']))
                      {
                          $get_orders="select * from user_orders where user_id=$user_id and order_status='pending'";
                          $result_orders_query=mysqli_query($con,$get_orders);
                          $row_count=mysqli_num_rows($result_orders_query);
                          if($row_count>0)
                          {
                                echo "<h3 class='text-center text-success mt-5 mb-2'>you have <span class='text-danger'>$row_count</span> pending orders</h3>
                                <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>
                                ";
                          }
                          else{
                                echo "<h3 class='text-center text-success mt-5 mb-2'>you have Zero pending orders</h3>
                                <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>
                                ";
                          }
                      }
                  }
              }
          }
    }
?>

