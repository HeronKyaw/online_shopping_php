<?php
    session_start();
    include ('../confs/config.php');
    $usernameOrEmail = $_POST['nameOrEmail'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT username, password, email, phone_number, isAdmin FROM tbl_users WHERE username = '$usernameOrEmail' OR email = '$usernameOrEmail'");
    $info = mysqli_fetch_assoc($query);
    if ($info !== null) {
        if ($info['password'] == $password) {
            $_SESSION['auth'] = true;
            $_SESSION['username'] = $info['username'];
            $_SESSION['email'] = $info['email'];
            $_SESSION['phone_number'] = $info['phone_number'];
            $_SESSION['isAdmin'] = $info['isAdmin'];
            if ($info['isAdmin']) {
                header("location: ../other/admin_or_normal_login.php");
            } else {
                header("location: ../index.php");
            }
        } else {
            header("location: ../admin/index.php?login=failed");
        }
    } else {
        header("location: ../admin/index.php?login=not-found");
    }