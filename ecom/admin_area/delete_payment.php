<?php
    
    if(isset($_GET['delete_payments'])){

        $payment_list_id=$_GET['delete_payments'];
        $delete_payment="delete from user_payments where order_id=$payment_list_id";
        $delete_query=mysqli_query($con,$delete_payment);
        if($delete_query){
            echo "<script>alert('This payment is been Deleted successfully')</script>";
            echo "<script>window.open('./index.php?list_payments','_self')</script>";
        }
        //echo $order_list_id;
    }

    
     
?>