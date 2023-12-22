<?php
    include("../../confs/config.php");

    $id = $_GET['id'];
    $sql = "DELETE FROM tbl_item WHERE id = $id";
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

    mysqli_query($conn, $sql);
    header("location: item_list.php");
?>