<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered text-center mt-5">
    <thead class="table-info">
        <?php
            $get_payment="select * from user_payments";
            $result=mysqli_query($con,$get_payment);
            $row_count=mysqli_num_rows($result);
            echo "
            <tr>
                <th>S.no</th>
                <th>Invoice number</th>
                <th>Amount</th>
                <th>payment mode</th>
                <th>Order date</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody class='table-secondary text-dark'>
            ";

            if($row_count==0){
                echo "<h2 class='text-danger text-center mt-5'>No payments recived yet</h2>";
            }
            else{
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)){
                    $order_id=$row_data['order_id'];
                    $payment_id=$row_data['payment_id'];
                    $amount=$row_data['amount'];
                    $invoice_number=$row_data['invoice_number'];
                    $payment_mode=$row_data['payment_mode'];
                    $date=$row_data['date'];
                    $number++;
        ?>


                <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $invoice_number ?></td>
                    <td><?php echo $amount ?></td>
                    <td><?php echo $payment_mode ?></td>
                    <td><?php echo $date ?></td>
                    <td><a href='index.php?delete_payments=<?php echo $order_id ?>' class="text-dark"><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                
                <?php

                }
            }
                ?>
        
    </tbody>
</table>


<!-- Modal type="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="./index.php?list_orders" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_order=<?php //echo $order_id ?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div> -->