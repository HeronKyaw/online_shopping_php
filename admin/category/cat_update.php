<?php
    include("../../confs/config.php");
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $remark = $_POST['remark'];
    $status = $_POST['status'] ?? 1;


$sql = "UPDATE tbl_category SET name = '$name', remark = '$remark', status = '$status', modified_date = now() WHERE id = $id";
    mysqli_query($conn, $sql);
    header("location: cat_list.php");
?>