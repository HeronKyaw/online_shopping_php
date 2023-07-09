<?php
    include("../confs/config.php");

    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_item WHERE id = $id";

    mysqli_query($conn, $sql);
    header("location: item_list.php");
?>