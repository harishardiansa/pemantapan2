<?php
session_start();
session_destroy();
$_SESSION['destroy_notification']
="Anda telah logout.";
header('location:login.php');
?>