<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <h3 class="text-center text-success">All products</h3>
    <table class="table table-bordered-mt-5">
        <thead class="table-info">
            <tr class="text-center">
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-secondary">

            <?php
                $number=0;
                $get_products="select * from products";
                $result=mysqli_query($con,$get_products);
                while($row=mysqli_fetch_assoc($result)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_img1=$row['product_img1'];
                    $product_price=$row['product_price'];
                    $status=$row['status'];
                    $number++;
                    ?>
                    <!--echo $product_title."<br>";-->
                    <tr class='text-center'>
                        <td><?php echo $number ?></td>
                        <td><?php echo $product_title ?></td>
                        <td><img src='../admin_area/product_images/<?php echo $product_img1 ?>' alt='<?php echo $product_title?>' style='width:100px; height:100px; object-fit:contain;'></td>
                        <td><?php echo $product_price ?>/-</td>
                        <td>
                            <?php
                            $get_count="select * from order_pending where product_id=$product_id";
                            $result_count=mysqli_query($con,$get_count);
                            $row_count=mysqli_num_rows($result_count);
                            echo $row_count;
                            
                            ?>
                        </td>
                        <td><?php echo $status ?></td>
                        <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                        <td><a href='index.php?delete_products=<?php echo $product_id ?>' class="text-dark"><i class='fa-solid fa-trash'></i></a></td>
                    </tr>
            <?php
                }
            ?><!--
            <tr class="text-center">
                <td>1.</td>
                <td>Mango</td>
                <td><img src="../admin_area/product_image/" alt=""></td>
                <td>444</td>
                <td>1</td>
                <td>true</td>
                <td><a href="" class="text-dark"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="" class="text-dark"><i class="fa-solid fa-trash"></i></a></td>
            </tr>-->
        </tbody>
    </table>

    <!--model type="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body">
                <h4>Are you sure you want to delete this?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="./index.php?view_products" class="text-light text-decoration-none">No</a></button>
                <button type="button" class="btn btn-primary"><a href='index.php?delete_products=<?php //echo $product_id ?>' class="text-light text-decoration-none">Yes</a></button>
            </div>
            </div>
        </div>
    </div>
</body>
</html>-->