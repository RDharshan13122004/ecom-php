<!--if u delete an empty brand there is no problem 
occurs or if u delete an brand which has a product it 
show some error to rectify the error u need delete 
all product belongs to the brand-->

<?php
    if(isset($_GET['delete_brands']))
    {
        $delete_brand=$_GET['delete_brands'];

        $delete_query="delete from brands where brand_id=$delete_brand";
        $result=mysqli_query($con,$delete_query);
        if($result)
        {
            echo "<script>alert('Brand is been Deleted successfully')</script>";
            echo "<script>window.open('./index.php?view_brand','_self')</script>";
        }        

    }

?>