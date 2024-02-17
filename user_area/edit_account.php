<?php

    if(isset($_GET['edit_account']))
    {
        $user_session_name=$_SESSION['username'];
        $select_query="select * from user_table where user_name='$user_session_name'";
        $result_query=mysqli_query($con,$select_query);
        $row_fetch=mysqli_fetch_assoc($result_query);
        $user_id=$row_fetch['user_id'];
        $username=$row_fetch['user_name']; 
        $user_email=$row_fetch['user_email'];
        $user_address=$row_fetch['user_address'];
        $user_mobile=$row_fetch['user_mobile'];
    }    
        
    if(isset($_POST['user_update']))
    {
        $update_id=$user_id;
        $user_name=$_POST['user_username'];
        $user_update_email=$_POST['user_email'];
        $user_update_address=$_POST['user_address'];
        $user_update_mobile=$_POST['user_mobile'];
        $user_update_img=$_FILES['user_image']['name'];
        $user_update_tmp=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_update_tmp,"./user_image/$user_update_img");

        //update query
        $update_data="update user_table set user_name='$user_name',user_email='$user_update_email',user_image='$user_update_img',user_address='$user_update_address',user_mobile=$user_update_mobile where user_id=$update_id";
        $result_U_query=mysqli_query($con,$update_data);
        if($result_U_query){
            echo "<script>alert('Date update successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }
        
   

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_username" value="<?php echo $username ;?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_email" value="<?php echo $user_email ;?>">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control" name="user_image">
            <img src="./user_image/<?php echo $user_image?>" alt="" style='width: 100px; height:100px; object-fit:contain;'>
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php echo $user_address ;?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?php echo $user_mobile ;?>">
        </div>
        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update">
    </form>
</body>
</html>