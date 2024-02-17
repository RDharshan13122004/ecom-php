<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered text-center mt-5">
    <thead class="table-info">
        <?php
            $get_users="select * from user_table";
            $result=mysqli_query($con,$get_users);
            $row_count=mysqli_num_rows($result);
            echo "
            <tr>
                <th>S.no</th>
                <th>User name</th>
                <th>User email</th>
                <th>User Image</th>
                <th>User address</th>
                <th>User mobile</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody class='table-secondary text-dark'>
            ";

            if($row_count==0){
                echo "<h2 class='text-danger text-center mt-5'>No Users recived yet</h2>";
            }
            else{
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)){
                    $user_id=$row_data['user_id'];
                    $username=$row_data['user_name'];
                    $user_email=$row_data['user_email'];
                    $user_image=$row_data['user_image'];
                    $user_address=$row_data['user_address'];
                    $user_mobile=$row_data['user_mobile'];
                    $number++;
        ?>


                <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $user_email ?></td>
                    <td><img src="../user_area/user_image/<?php echo $user_image ?>" alt="<?php echo $username ?>" style='width:100px; height:100px; object-fit:contain;'></td>
                    <td><?php echo $user_address ?></td>
                    <td><?php echo $user_mobile ?></td>
                    <td><a href='index.php?delete_users=<?php echo $user_id ?>' class="text-dark"><i class='fa-solid fa-trash'></i></a></td>
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