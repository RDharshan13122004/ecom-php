<?php

    include("../includes/connect.php");
    if(isset($_POST['Insert_cat'])){
        $category_title=$_POST['cat_title'];

        $sq="select * from category where category_title='$category_title'";
        $selres=mysqli_query($con,$sq);
        $nr=mysqli_num_rows($selres);
        if($nr > 0){
           echo "<script>alert('This is presented in the category already')</script>";
        }
        else{
            $iq="insert into category (category_title) values('$category_title')";
            $result=mysqli_query($con,$iq);
            if($result){
                echo"<script>alert('Category has been insert successfully')</script>";
            }
        }
        
    }
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info"  id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Categortes" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="form-control bg-info my-3" name="Insert_cat" value="Insert Categories">
</div>
</form>

