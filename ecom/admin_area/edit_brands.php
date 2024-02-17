<?php

    if(isset($_GET['edit_brands'])){

        $edit_brand=$_GET['edit_brands'];

        $get_brand="select * from brands where brand_id=$edit_brand";
        $result=mysqli_query($con,$get_brand);
        $row=mysqli_fetch_assoc($result);
        $brand_title=$row['brand_title'];
        //echo $brand_title;
    }

    if(isset($_POST['edit_bra'])){
        $bra_title=$_POST['brand_title'];

        $update_query="update brands set brand_title='$bra_title' where brand_id=$edit_brand";
        $result_bra=mysqli_query($con,$update_query);
        if($result_bra){
            echo"<script>alert('The brand is been updated successfully')</script>";
            echo"<script>window.open('./index.php?view_brand','_self')</script>";
        }
    }



?>


<div class="container mt-3">
    <h1 class="text-center"> Edit brand </h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label"> Brand Title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" value="<?php echo $brand_title ?>" required>
        </div>
        <input type="submit" value="Update brand" class="btn btn-info px-3 mb-3" name="edit_bra">
    </form>
</div>