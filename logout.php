<?php session_start(); ?>
<?php
 
$_SESSION['username'] = NULL;
$_SESSION['password'] = NULL;
$_SESSION['email'] = NULL;
$_SESSION['user_role'] = NULL;

header("Location: login.php");


?>