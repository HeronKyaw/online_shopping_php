<?php
    include("confs/config.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_category WHERE id = $id";
    mysqli_query($conn, $sql);
    header("location: cat_list.php");
?>