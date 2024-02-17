<?php

    include("../includes/connect.php");
    if(isset($_POST['insert_brands_btn'])){
        $brands_title=$_POST['brands_title'];

        $sq="select * from brands where brand_title='$brands_title'";
        $selres=mysqli_query($con,$sq);
        $nr=mysqli_num_rows($selres);
        if($nr > 0){
           echo "<script>alert('This is Brand already presented')</script>";
        }
        else{
            $iq="insert into brands (brand_title) values('$brands_title')";
            $result=mysqli_query($con,$iq);
            if($result){
                echo"<script>alert('The {$brands_title} has been insert successfully')</script>";
            }
        }
        
    }
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info"  id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brands_title" placeholder="Insert Brands" aria-label="Brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
    <!--<input type="submit" class="form-control bg-info" name="Insert_cat" value="Insert Categories">-->
    <button class="bg-info p-2 my-3 border-0" name="insert_brands_btn">Insert Brands</button>
</div>
</form>