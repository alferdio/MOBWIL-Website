<?php
    session_start();
    unset($_SESSION['ua']);
    session_destroy();
    header("location:index.php");
?>