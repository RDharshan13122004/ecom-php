<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
</head>
<body>
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" value="Delete Account" name="delete" class="form-control w-50 m-auto">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" value="Don't Delete Account" name="dont_delete" class="form-control w-50 m-auto">
        </div>
    </form>
</body>
</html>

<?php
    $username_session=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="delete from user_table where user_name='$username_session'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Account Deleted successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }

    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";
    }


?>