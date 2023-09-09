<?php
    session_start();
    unset($_SESSION['auth']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    header("location: ../admin/index.php");