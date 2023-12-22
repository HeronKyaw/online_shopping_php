<?php
    include("../../confs/config.php");

    $id = $_POST['id'];
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
        $photo_sql = "SELECT photo FROM tbl_item WHERE id = $id";

        // Retrieve the filename from the database
        $result = mysqli_query($conn, $photo_sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $filename = $row['photo'];

            // Delete the file from the storage directory
            $filepath = "../../storage/upload/$filename";
            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }
        $file_extension = pathinfo($photo, PATHINFO_EXTENSION);
        $new_filename = $brand . '_' . uniqid() . '_' . '.' . $file_extension;
        move_uploaded_file($tmp, "../../storage/upload/$new_filename");
        $sql = "UPDATE tbl_item SET title='$title', photo='$new_filename', category_id='$category_id', brand='$brand', stock='$stock', review='$review', price='$price', reached_date=now(), expired_date='$expired_date' WHERE id='$id'";
    } else {
        $sql = "UPDATE tbl_item SET title='$title', category_id='$category_id', brand='$brand', stock='$stock', review='$review', price='$price', reached_date=now(), expired_date='$expired_date' WHERE id='$id'";
    }

    mysqli_query($conn, $sql);
    header("location: item_list.php");
