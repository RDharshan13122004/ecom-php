<?php
    
    if(isset($_GET['delete_users'])){

        $user_list_id=$_GET['delete_users'];
        $delete_user="delete from user_table where user_id=$user_list_id";
        $delete_query=mysqli_query($con,$delete_user);
        if($delete_query){
            echo "<script>alert('This user is been Deleted successfully')</script>";
            echo "<script>window.open('./index.php?list_users','_self')</script>";
        }
        //echo $order_list_id;
    }

    
     
?>