<?php 

    if(isset($_GET['delete_products'])){
        $delete_id=$_GET['delete_products'];

        $delete_product="delete from products where product_id=$delete_id";
        $reuslt_product=mysqli_query($con,$delete_product);
        if($reuslt_product){
            echo "<script>alert('product deleted successfully')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }

?>