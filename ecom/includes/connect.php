<?php

    $con=mysqli_connect('localhost','root','','mystore');
    if(!$con){
        die(mysqli_error($con));
    }
?>