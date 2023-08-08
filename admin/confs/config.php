<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "db_online_shopping";
    $conn = mysqLi_connect($dbhost, $dbuser, $dbpass);
    mysqli_select_db($conn, $dbname);
?>