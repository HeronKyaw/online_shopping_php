<?php
    $dbhost = "127.0.0.1";
    $dbuser = "os_admin";
    $dbpass = "admin@os2221";
    $dbname = "db_online_shopping";
    $conn = mysqLi_connect($dbhost, $dbuser, $dbpass);
    mysqli_select_db($conn, $dbname);
?>