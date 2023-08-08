<?php
    include("../confs/config.php");   
    $id=$_GET['id'];
    $status=$_GET['status'];

    mysqli_query($conn,"UPDATE tbl_orders SET status=$status, received_date=now() WHERE id=$id");
    header("location: order.php");
    ?>