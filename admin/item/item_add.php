<?php
    include("../../confs/config.php");

    $title = $_POST['title'];
    $brand = $_POST['brand'];
    $review = $_POST['review'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category_id = $_POST['category_id'];
    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    $expired_date = date('Y-m-d H:i:s', strtotime("+3 months", strtotime("now")));

    if($photo) {
        $file_extension = pathinfo($photo, PATHINFO_EXTENSION);
        $new_filename = $brand . '_' . uniqid() . '.' . $file_extension;
        move_uploaded_file($tmp, "../../storage/upload/$new_filename");
    }

    $sql = "INSERT INTO tbl_item (title, brand, review, price, stock, photo, category_id, reached_date, expired_date) VALUES ('$title', '$brand', '$review', '$price', '$stock', '$new_filename', '$category_id', now(), '$expired_date')";
    mysqli_query($conn, $sql);
    header("location: item_list.php");
?>