<?php

    include("../includes/connect.php");

    if(isset($_POST['insert_product'])){
        $product_tile=$_POST['Product_title'];
        $product_description=$_POST['description'];
        $product_keyword=$_POST['Product_keywords'];
        $product_categories=$_POST['Product_categories'];
        $product_brands=$_POST['Product_brands'];
        $product_price=$_POST['Product_price'];
        $product_status='true';


        //accessing images
        $product_img1=$_FILES['Product_image1']['name'];
        $product_img2=$_FILES['Product_image2']['name'];
        $product_img3=$_FILES['Product_image3']['name'];

        //accessing image tmp name
        $temp_img1=$_FILES['Product_image1']['tmp_name'];
        $temp_img2=$_FILES['Product_image2']['tmp_name'];
        $temp_img3=$_FILES['Product_image3']['tmp_name'];

        //checking empty condition

        if($product_tile=='' or $product_description=='' or $product_keyword=='' or $product_categories=='' or $product_brands=='' or $product_img1=='' or $product_img2=='' or $product_img3=='' or $product_price=='' ){
            echo "<script> alert('Please fill all the availabe fields')</script>";
            exit();
        }
        else{
            move_uploaded_file($temp_img1,"./product_images/$product_img1");
            move_uploaded_file($temp_img2,"./product_images/$product_img2");
            move_uploaded_file($temp_img3,"./product_images/$product_img3");

            //insert query
            $inst="insert into products(product_title, product_description, product_keywords, category_id, brand_id, product_img1 , product_img2, product_img3, product_price, date, status) values('$product_tile','$product_description','$product_keyword','$product_categories','$product_brands','$product_img1','$product_img2','$product_img3','$product_price',NOW(),'$product_status')";
            $resl_q = mysqli_query($con,$inst);
            if($resl_q){
                echo "<script> alert('Successfully insert the products')</script>";
            }
        }


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Css own-->
    <link rel="stylesheet" href="cs.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center"> Insert Products</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <!--title-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_title" class="form-label">Product title</label>
                <input type="text" name="Product_title" id="Product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required>
            </div>

            <!-- description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required>
            </div>

             <!-- keywords-->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="Product_keywords" id="Product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required>
            </div>

            <!--Categories-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="Product_categories" id="" class="form-select">
                    <option value="">Select a category</option>
                    <?php 
                        $sqipc="select * from category";
                        $sqipcres=mysqli_query($con,$sqipc);

                        while($rows=mysqli_fetch_assoc($sqipcres)){
                            $category_titles=$rows['category_title'];
                            $category_ids=$rows['category_id'];
                            echo "<option value='$category_ids'>$category_titles</option>";
                        }
                    
                    ?>
                    <!--
                    <option value="">category2</option>
                    <option value="">category3</option>
                    <option value="">category4</option> --> 
                </select>             
            </div>

            <!--Brands-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="Product_brands" id="" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php 
                        $sqipb="select * from brands";
                        $sqipbres=mysqli_query($con,$sqipb);

                        while($rowss=mysqli_fetch_assoc($sqipbres)){
                            $brands_titles=$rowss['brand_title'];
                            $brands_ids=$rowss['brand_id'];
                            echo "<option value='$brands_ids'>$brands_titles</option>";
                        }
                    
                    ?>
                </select>               
            </div>   
            
            <!--Image 1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_image1" class="form-label">Product image 1</label>
                <input type="file" name="Product_image1" id="Product_image1" class="form-control" required>
            </div>

            <!--Image 2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_image2" class="form-label">Product image 2</label>
                <input type="file" name="Product_image2" id="Product_image2" class="form-control" required>
            </div>

            <!--Image 3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_image3" class="form-label">Product image 3</label>
                <input type="file" name="Product_image3" id="Product_image3" class="form-control" required>
            </div>

            <!-- price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_price" class="form-label">Product price</label>
                <input type="text" name="Product_price" id="Product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required>
            </div>
            <!-- submit-->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" id="insert_product" class="btn btn-info mb-3 px-3" value="Insert product">
            </div>
        </form>
    </div>
    
</body>
</html>