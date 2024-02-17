<?php
    if(isset($_GET['edit_products'])){
        $edit_id=$_GET['edit_products'];
        $get_data="select * from products where product_id=$edit_id";
        $result=mysqli_query($con,$get_data);
        $row=mysqli_fetch_assoc($result);
        $product_title=$row['product_title'];
        //echo $product_title;
        $product_description=$row['product_description'];
        $product_keywords=$row['product_keywords'];
        $category_id=$row['category_id'];
        $brands_id=$row['brand_id'];
        $product_image1=$row['product_img1'];
        $product_image2=$row['product_img2'];
        $product_image3=$row['product_img3'];
        $product_price=$row['product_price'];


        //fetching category name

        $select_category="select  * from category where category_id=$category_id ";
        $result_category=mysqli_query($con,$select_category);
        $row_category_title=mysqli_fetch_assoc($result_category);
        $category_title=$row_category_title['category_title'];
        //echo $category_title;

        //fetching brand name

        $select_brand="select  * from brands where brand_id=$brands_id ";
        $result_brand=mysqli_query($con,$select_brand);
        $row_brand_title=mysqli_fetch_assoc($result_brand);
        $brand_title=$row_brand_title['brand_title'];
        //echo $brand_title;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">
                    Product Title
                </label>
                <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $product_title ?>" required>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_desc" class="form-label">
                    Product Description
                </label>
                <input type="text" name="product_desc" id="product_desc" class="form-control" value="<?php echo $product_description ?>" required>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">
                    Product keywords
                </label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"  value="<?php echo $product_keywords ?>" required>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <select name="products_category" id="products_category" class="form-select">
                    <label for="products_category" class="form-label">
                        Product Category
                    </label>
                    <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                    <?php
                        $select_category_all="select  * from category";
                        $result_category_all=mysqli_query($con,$select_category_all);
                        while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                            $category_title=$row_category_all['category_title'];
                            $categorys_id=$row_category_all['category_id'];      
                            echo "<option value='$categorys_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <select name="products_brands" id="products_brands" class="form-select">
                    <label for="products_brands" class="form-label">
                        Product Brands
                    </label>
                    <option value="<?php echo $brands_id ?>"><?php echo $brand_title ?></option>
                    <?php
                        $select_brand_all="select  * from brands";
                        $result_brand_all=mysqli_query($con,$select_brand_all);
                        while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                            $brand_title=$row_brand_all['brand_title'];
                            $brands_id=$row_brand_all['brand_id'];
                            echo "<option value='$brands_id'>$brand_title</option>";
                        }
                        
                        
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">
                    Product Image 1
                </label>
                <div class="d-flex w-90 m-auto">
                    <input type="file" name="product_image1" id="product_image1" class="form-control" required>
                    <img src="./product_images/<?php echo $product_image1 ?>" alt="" class="product_img1" style="width:100px; height:100px; object-fit:contain;">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">
                    Product Image 2
                </label>
                <div class="d-flex w-90 m-auto">
                    <input type="file" name="product_image2" id="product_image2" class="form-control" required>
                    <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="product_img2" style="width:100px; height:100px; object-fit:contain;">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label">
                    Product Image 3
                </label>
                <div class="d-flex w-90 m-auto">
                    <input type="file" name="product_image3" id="product_image3" class="form-control" required>
                    <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="product_img3" style="width:100px; height:100px; object-fit:contain;">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">
                    Product Price
                </label>
                <input type="text" name="product_price" id="product_price" class="form-control" value="<?php echo $product_price ?>" required>
            </div>
            <div class="w-50 m-auto">
                <input type="submit" name="edit_product" id="edit_product" value="Update product" class="btn btn-info px-3 mb-3">
            </div>
        </form>
    </div>

    <!-- editing products -->
    <?php

    if(isset($_POST['edit_product']))
    {
        $products_title=$_POST['product_title'];
        $products_desc=$_POST['product_desc'];
        $products_keywrd=$_POST['product_keywords'];
        $products_category=$_POST['products_category'];
        $products_brand=$_POST['products_brands'];
        $products_price=$_POST['product_price'];


        $products_img1=$_FILES['product_image1']['name'];
        $products_img2=$_FILES['product_image2']['name'];      
        $products_img3=$_FILES['product_image3']['name'];  

        $temps_img1=$_FILES['product_image1']['tmp_name'];
        $temps_img2=$_FILES['product_image2']['tmp_name'];      
        $temps_img3=$_FILES['product_image3']['tmp_name']; 

        //checking of fields empty or not
        if($products_title=='' or $products_desc=='' or $products_keywrd=='' or $products_category=='' or $products_brand=='' or $products_img1=='' or $products_img2=='' or $products_img3=='' or $products_price==''){
            echo "<script>alert('Please fill all the fields and continue the process')</script>";
        }
        else{
            move_uploaded_file($temps_img1,"./product_images/$products_img1");
            move_uploaded_file($temps_img2,"./product_images/$products_img2");
            move_uploaded_file($temps_img3,"./product_images/$products_img3");

            // query to update products 
            $update_product="update products set product_title='$products_title',product_description='$products_desc',product_keywords='$products_keywrd',category_id='$products_category',brand_id='$products_brand',product_img1='$products_img1',product_img2='$products_img2',product_img3='$products_img3',product_price='$products_price',date=NOW(),status='true' where product_id=$edit_id";
            $result_update=mysqli_query($con,$update_product);
            if($result_update){
                echo "<script>alert('Product updated successfully')</script>";
                echo "<script>window.open('./Insert_p.php','_self')</script>";
            }
        }
    }
    ?>
</html>