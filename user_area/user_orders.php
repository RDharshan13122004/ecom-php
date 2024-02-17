<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        $username=$_SESSION['username'];
        $get_users="select * from user_table where user_name='$username'";
        $result=mysqli_query($con,$get_users);
        $row_fetch=mysqli_fetch_assoc($result);
        $user_id=$row_fetch['user_id'];
    ?>
    <h3 class="text-success">All my Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="table-info">
            <tr>
                <th>S.no</th>
                <th>Amount Due</th>
                <th>Total products</th>
                <th>Invoice number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>status</th>
            </tr>

        </thead>
        <tbody class="table-secondary">
            <?php
                $number=0;
                $get_order_details="select * from user_orders where user_id=$user_id";
                $result_orders=mysqli_query($con,$get_order_details);
                while($row_orders=mysqli_fetch_assoc($result_orders)){
                    $number++;
                    $order_id=$row_orders['order_id'];
                    $amount_due=$row_orders['amount_due'];
                    $amount_due=$row_orders['amount_due'];
                    $total_products=$row_orders['total_product'];
                    $invoice_number=$row_orders['invoice_number'];
                    $order_status=$row_orders['order_status'];
                    if($order_status=='pending'){
                        $order_status='Incomplete';
                    }
                    else{
                        $order_status='Complete';
                    }
                    $order_date=$row_orders['order_date'];
                    echo "
                    <tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>";
                ?>
                <?php
                    if($order_status=='Complete'){
                        echo "<td>Paid</td>";

                    }
                    else{
                        echo "
                        <td><a href='confirm_payment.php?order_id=$order_id' class='text-dark'>Confirm</a></td>
                        </tr>";
                    }
                        
                    
                }


            ?>
            
        </tbody>
            

        
    </table>
</body>
</html>