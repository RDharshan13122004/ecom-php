<?php
    
    if(isset($_GET['delete_order'])){

        $order_list_id=$_GET['delete_order'];
        $delete_order="delete from user_orders where order_id=$order_list_id";
        $delete_query=mysqli_query($con,$delete_order);
        if($delete_query){
            echo "<script>alert('This order is been Deleted successfully')</script>";
            echo "<script>window.open('./index.php?list_orders','_self')</script>";
        }
        //echo $order_list_id;
    }

    
     
?>