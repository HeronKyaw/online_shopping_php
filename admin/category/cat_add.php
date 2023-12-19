<?php
    include("../../confs/config.php");

    $name = $_POST['name'];
    $remark = $_POST['remark'];
    $status = $_POST['status'] ?? 1;

    $sql = "INSERT INTO tbl_category (name, remark, created_date, modified_date, status) VALUES ('$name', '$remark', now(), now(), '$status')";

    mysqli_query($conn, $sql);
    header("location: cat_list.php");
?>