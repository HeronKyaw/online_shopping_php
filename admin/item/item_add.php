<?php
    include("../confs/config.php");

    $title = $_POST['title'];
    $brand = $_POST['brand'];
    $review = $_POST['review'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    $expired_date = date('Y-m-d H:i:s', strtotime("+3 months", strtotime("now")));

    if($photo) {
        move_uploaded_file($tmp, "../image/$photo");
    }

    $sql = "INSERT INTO tbl_item (title, brand, review, price, photo, category_id, reached_date, expired_date) VALUES ('$title', '$brand', '$review', '$price', '$photo', '$category_id', now(), $expired_date)";
    mysqli_query($conn, $sql);
    header("location: item_list.php");
?>