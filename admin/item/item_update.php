<?php
    include("../../confs/config.php");

    $id = $_POST['id'];
    $title = $_POST['title'];
    $brand = $_POST['brand'];
    $review = $_POST['review'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    $expired_date = date('Y-m-d H:i:s', strtotime("+3 months", strtotime("now")));

    if($photo) {
        move_uploaded_file($tmp, "../image/items/$photo");
        $sql = "UPDATE tbl_item SET title='$title', photo='$photo', category_id='$category_id', brand='$brand' , review='$review', price='$price', reached_date=now(), expired_date='$expired_date' WHERE id='$id'";
    } else {
        $sql = "UPDATE tbl_item SET title='$title', category_id='$category_id', brand='$brand' , review='$review', price='$price', reached_date=now(), expired_date='$expired_date' WHERE id='$id'";
    }

    mysqli_query($conn, $sql);
    header("location: item_list.php");
?>